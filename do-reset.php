<?php
// do-reset.php — SHA-256 (hex) to match add_user.php

include 'session.php';
if (session_status() === PHP_SESSION_NONE) { session_start(); }

require __DIR__ . '/database/database.php';

// Normalize DB handle
$db = $db ?? ($mysqli ?? ($conn ?? null));
if (!$db) { http_response_code(500); die('DB connection not available.'); }
@$db->set_charset('utf8mb4');

// ---- Inputs ----
$token   = $_POST['token'] ?? '';
$pass    = isset($_POST['password']) ? trim($_POST['password']) : '';
$confirm = isset($_POST['password_confirm']) ? trim($_POST['password_confirm']) : '';

// Basic checks
if (!preg_match('/^[a-f0-9]{64}$/', $token)) { die('Invalid token.'); }
if ($pass === '' || strlen($pass) < 8 || $pass !== $confirm) {
  die('Password invalid or mismatch.');
}

// ---- Validate token ----
$stmt = $db->prepare("SELECT username, user_email, expires_at, used FROM password_resets WHERE token=? LIMIT 1");
if (!$stmt) { http_response_code(500); die('Token lookup failed.'); }
$stmt->bind_param('s', $token);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
$stmt->close();

if (!$row) { http_response_code(404); die('Token not found.'); }
if ((int)$row['used'] === 1) { http_response_code(410); die('Token already used.'); }
if (new DateTime() > new DateTime($row['expires_at'])) { http_response_code(410); die('Token expired.'); }

$username   = $row['username'];
$user_email = $row['user_email'];

// ---- Hash with SHA-256 *hex* (same as add_user.php) ----
$hash = hash('sha256', $pass, false);  // false = hex output (default)

// ---- Update user password ----
// Use case-insensitive match for username/email (handles Nicx vs nicx)
$upd = $db->prepare(
  "UPDATE user 
     SET user_password=? 
   WHERE LOWER(username)=LOWER(?) AND LOWER(user_email)=LOWER(?) 
   LIMIT 1"
);
if (!$upd) { http_response_code(500); die('Prepare failed while updating password.'); }
$upd->bind_param('sss', $hash, $username, $user_email);
$okExec = $upd->execute();
$upd->close();

if (!$okExec) { die('Failed to update password.'); }

// ---- Mark token as used ----
$use = $db->prepare("UPDATE password_resets SET used=1 WHERE token=?");
if ($use) { $use->bind_param('s', $token); $use->execute(); $use->close(); }

// ---- Done ----
header('Location: /login.php?reset=1');
exit;
