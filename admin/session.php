<?php
// Start a session
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in, display the landing page content
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $profile = $_SESSION['img'];

    //for alex
    $user_id =$_SESSION['id'];
} else {
    // User is not logged in, redirect to the login page
    header("Location: ../");
    exit;
}
?>
