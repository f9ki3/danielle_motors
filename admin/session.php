<?php
// Start a session
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Retrieve session variables
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $fname = $_SESSION['user_fname'];
    $lname = $_SESSION['user_lname'];
    $email = $_SESSION['user_email'];
    $contact = $_SESSION['user_contact'];
    $position = $_SESSION['user_position'];
    $profile = $_SESSION['user_img'];
    $address = $_SESSION['user_address'];
    $brgy = $_SESSION['user_brgy'];
    $municipality = $_SESSION['user_municipality'];
    $province = $_SESSION['user_province'];
    $postal_code = $_SESSION['user_postalcode'];
    $branch_code = $_SESSION['user_brn_code'];
    $session_permission = $_SESSION['user_permissions'];
    $user_id = $_SESSION['id']; // Additional variable for user_id (assuming you need it)
} else {
    // User is not logged in, redirect to the login page
    header("Location: ../"); // Assuming your login page is located at the root
    exit;
}
?>
