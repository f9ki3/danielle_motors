<?php
include '../admin/session.php';
include '../config/config.php';
// Start the session
session_start();

// Get user ID and branch code from the session
$id = $_SESSION['id'];
$user_brn_code = $_SESSION['user_brn_code'];

// Prepare the SQL statement to insert the audit log
$stmt_log = $conn->prepare("INSERT INTO `audit` (`id`, `audit_user_id`, `audit_date`, `audit_action`, `audit_description`, `user_brn_code`) VALUES (NULL, ?, NOW(), 'logout', 'logout inventory', ?)");
if ($stmt_log === false) {
    die('Error: ' . htmlspecialchars($conn->error));
}
// Bind parameters
$stmt_log->bind_param("is", $id, $user_brn_code); 
$stmt_log->execute();
$_SESSION = array();
// Destroy the session
session_destroy();

// Redirect to login page
header("Location: ../login");
exit;
?>  
