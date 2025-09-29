<?php
// send-reset.php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// REMOVE ANY debug echoes like print_r($_POST); exit;

require __DIR__ . '/database/database.php';

// Normalize DB handle to $db
$db = $db ?? ($mysqli ?? ($conn ?? null));
if (!$db) { http_response_code(500); die('DB connection not available.'); }
@$db->set_charset('utf8mb4');

// ---- Read & sanitize input ----
$username   = isset($_POST['username'])   ? trim($_POST['username'])   : '';
$user_email = isset($_POST['user_email']) ? trim($_POST['user_email']) : '';

$genericMsg = 'If the account exists, a reset link has been sent to the email on file.';

if ($username === '' || !filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['fp_msg'] = 'Please provide a valid username and email.';
  header('Location: /forgot-password.php'); exit;
}

// ---- Ensure password_resets table exists (run once) ----
$db->query("
  CREATE TABLE IF NOT EXISTS password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    token VARCHAR(64) NOT NULL UNIQUE,
    expires_at DATETIME NOT NULL,
    used TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    KEY (username),
    KEY (user_email)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");

// ---- Case-insensitive lookup (handles 'Nicx' vs 'nicx') ----
$sql = "SELECT id FROM user 
        WHERE LOWER(username)=LOWER(?) AND LOWER(user_email)=LOWER(?) 
        LIMIT 1";
$stmt = $db->prepare($sql);
if (!$stmt) { $_SESSION['fp_msg'] = $genericMsg; header('Location: /forgot-password.php'); exit; }
$stmt->bind_param('ss', $username, $user_email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
  // Always respond generically; do not leak account existence
  $stmt->free_result(); $stmt->close();
  $_SESSION['fp_msg'] = $genericMsg;
  header('Location: /forgot-password.php'); exit;
}
$stmt->free_result(); $stmt->close();

// ---- Invalidate any previous active tokens for this user ----
$upd = $db->prepare("UPDATE password_resets SET used=1 
                     WHERE LOWER(username)=LOWER(?) AND LOWER(user_email)=LOWER(?) AND used=0");
$upd->bind_param('ss', $username, $user_email);
$upd->execute();
$upd->close();

// ---- Create new token ----
$token   = bin2hex(random_bytes(32));            // 64 hex chars
$expires = (new DateTime('+30 minutes'))->format('Y-m-d H:i:s');

$ins = $db->prepare("INSERT INTO password_resets (username, user_email, token, expires_at) 
                     VALUES (?,?,?,?)");
if ($ins) {
  $ins->bind_param('ssss', $username, $user_email, $token, $expires);
  $ins->execute();
  $ins->close();
}


// ---- Build reset URL ----
$scheme   = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host     = $_SERVER['HTTP_HOST'] ?? 'localhost';
$resetUrl = "{$scheme}://{$host}/reset.php?token={$token}";

// ---- Send email with PHPMailer ----
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/assets/libs/email/PHPMailer/PHPMailer.php';
require __DIR__ . '/assets/libs/email/PHPMailer/Exception.php';
require __DIR__ . '/assets/libs/email/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.hostinger.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'no_reply@dmp-motors.com';   // your SMTP email
    $mail->Password   = 'Dmpmotors2025!';            // your SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('no_reply@dmp-motors.com', 'Danielle Motors');
    $mail->addAddress($user_email);  // recipient (from form)
    $mail->isHTML(true);
    $mail->Subject = 'Password Reset Request - Danielle Motors';
    $mail->Body    = "
        <p>Hello <b>{$username}</b>,</p>
        <p>We received a request to reset your password. Click the link below to set a new one:</p>
        <p><a href='{$resetUrl}' target='_blank'>Reset Your Password</a></p>
        <p>This link will expire in 30 minutes.</p>
        <br>
        <p>If you didn’t request this, you can ignore this email.</p>
        <p>— Danielle Motors Support</p>
    ";

    $mail->send();
    $_SESSION['fp_msg'] = 'If the account exists, a reset link has been sent to your email.';
} catch (Exception $e) {
    // Log error but still show generic message
    error_log("Mailer Error: {$mail->ErrorInfo}");
    $_SESSION['fp_msg'] = 'If the account exists, a reset link has been sent to your email.';
}

header('Location: /forgot-password.php');
exit;

// ---- Build reset link ----
// $scheme   = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
// $host     = $_SERVER['HTTP_HOST'] ?? 'localhost';
// $resetUrl = "{$scheme}://{$host}/reset.php?token={$token}";

// // TODO: send by email (PHPMailer/SMTP recommended).
// // mail($user_email, 'Password Reset', "Reset your password: {$resetUrl}\n\nThis link expires in 30 minutes.");

// // Show generic message; include dev hint while testing
// $_SESSION['fp_msg'] = $genericMsg . '<br><small>(Dev hint: ' . htmlspecialchars($resetUrl) . ')</small>';
// header('Location: /forgot-password.php'); 
// exit;
