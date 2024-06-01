<?php
include '../admin/session.php';
include '../config/config.php';
// Start the session
session_start();

$stmt_log = $conn->prepare("INSERT INTO `audit` (`id`, `audit_user_id`, `audit_date`, `audit_acition`, `audit_description`) VALUES (NULL, ?, NOW(), 'logout', 'logout account')");
$stmt_log->bind_param("i", $id); 
$stmt_log->execute();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to index.php
header("Location: ../login");
exit;
?>
