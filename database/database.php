<?php
// online
$servername = "sql.freedb.tech";
$username = "freedb_dmp_master";
$password = "8@YASU8ypbA2uA%";
$dbname = "freedb_dmp_db";

// local

// $servername = "localhost";
// $username = "root";
// $password = "";
// // $dbname = "dms_db";
// $dbname = "dmp";


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
