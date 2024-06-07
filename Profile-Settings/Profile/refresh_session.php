<?php
// Start a session
include "../../admin/session.php";
include "../../database/database.php";

$user_query = "SELECT user_img FROM user WHERE id = '$user_id' LIMIT 1";
$user_rezult = $conn->query($user_query);
if ($user_rezult->num_rows>0) {
    $row = $user_rezult -> fetch_assoc();
    
    $_SESSION['user_img'] = $row['user_img'];
    
    header("Location: index");
    $conn->close();
    exit;
} else {
    // User is not logged in, redirect to the login page
    header("Location: ../"); // Assuming your login page is located at the root
    $conn->close();
    exit;
}
?>
