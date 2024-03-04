<?php
// Start a session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Redirect to the dashboard page
    header("Location: admin/app");
    exit;
}

?>