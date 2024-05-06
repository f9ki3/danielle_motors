<?php
// Start a session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['user_account_type'] == 0) {
    // Redirect to the dashboard page
    header("Location: ../Inventory/Dashboard");
    exit;
} else if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['user_account_type'] == 1) {
    // Redirect to the home page
    header("Location: ../POS/Dashboard");
    exit;
} 

?>