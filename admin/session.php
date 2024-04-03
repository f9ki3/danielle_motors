<?php
// Start a session
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Retrieve session variables
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $fname = $_SESSION['user_fname']; // Corrected variable name
    $lname = $_SESSION['user_lname']; // Corrected variable name
    $email = $_SESSION['user_email']; // Corrected variable name
    $contact = $_SESSION['user_contact']; // Corrected variable name
    $position = $_SESSION['user_position']; // Corrected variable name
    $profile = $_SESSION['user_img']; // Corrected variable name
    $address = $_SESSION['user_address']; // Corrected variable name
    $brgy = $_SESSION['user_brgy']; // Corrected variable name
    $municipality = $_SESSION['user_municipality']; // Corrected variable name
    $province = $_SESSION['user_province']; // Corrected variable name
    $postal_code = $_SESSION['user_postalcode']; // Corrected variable name
    $branch_code = $_SESSION['user_brn_code']; // Corrected variable name
    // dinagdag ko to fyke --azul patanggal na lang if magerror
    $session_permission = $_SESSION['user_permissions'];
    
    // Additional variable for user_id (assuming you need it)
    $user_id = $_SESSION['id'];

    // Optionally, you can perform additional actions here if needed

} else {
    // User is not logged in, redirect to the login page
    header("Location: ../"); // Assuming your login page is located at the root
    exit;
}
?>
