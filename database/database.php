<?php
$servername = "db4free.net";
$username = "shingie";
$password = "Respect016!";
$dbname = "fmware";
// $dbname = "dms_db";

// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Log the connection error to a file
    $error_message = "Connection failed: " . $conn->connect_error;
    file_put_contents('connection_errors.log', $error_message, FILE_APPEND);
    
    // Display a generic error message to the user
    die("Connection failed. Please try again later.");
}
?>
