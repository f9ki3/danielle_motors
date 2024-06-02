<?php
include '../admin/session.php';
include '../config/config.php';
// Set timezone to Manila (GMT+8)
date_default_timezone_set('Asia/Manila');
$currentTimestamp = date('Y-m-d H:i:s');

// Get user ID and branch code from the session
$id = $_SESSION['id'];
$user_brn_code = $_SESSION['user_brn_code'];

// Prepare the SQL statement to insert the audit log
$stmt_log = $conn->prepare("INSERT INTO `audit` (`id`, `audit_user_id`, `audit_date`, `audit_action`, `audit_description`, `user_brn_code`) VALUES (NULL, ?, ?, 'logout', 'logout inventory', ?)");
$stmt_log->bind_param("iss", $id, $currentTimestamp, $user_brn_code);
$stmt_log->execute();
if ($stmt_log === false) {
    die('Error: ' . htmlspecialchars($conn->error));
}

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: ../login");
exit;
?>  
