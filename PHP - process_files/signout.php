<?php
include '../admin/session.php';
include '../config/config.php';
// Set timezone to Manila (GMT+8)
date_default_timezone_set('Asia/Manila');
$currentTimestamp = date('Y-m-d H:i:s');

// Get user ID and branch code from the session
$id = $_SESSION['id'];
$user_brn_code = $_SESSION['user_brn_code'];
$user_account_type = $_SESSION['user_account_type']; // Added user account type

// Initialize variable to store audit log query
$insert_into_logs = '';

// Respond based on user account type and prepare logout action
if ($user_account_type == 0) {
    $action = 'Logout inventory';
    $description = 'Logged out from inventory';
} elseif ($user_account_type == 1) {
    $action = 'Logout store';
    $description = 'Logged out from store';
}

// Prepare the SQL statement to insert the audit log
$stmt_log = $conn->prepare("INSERT INTO `audit` (`audit_user_id`, `audit_date`, `audit_action`, `audit_description`, `user_brn_code`) VALUES (?, ?, ?, ?, ?)");
$stmt_log->bind_param("issss", $id, $currentTimestamp, $action, $description, $user_brn_code);
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
