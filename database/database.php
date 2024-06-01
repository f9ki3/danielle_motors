<?php

//online
// $servername = "sql.freedb.tech";
// $username = "freedb_dmp_master";
// $password = "8@YASU8ypbA2uA%";
// $dbname = "freedb_dmp_db";

// Hostinger Database 
// $servername = "localhost";       // Localhost kasi dun na tayo sa files sa hostinger mag eedit
// $username = "u680032315_dmp";    // Bale live development na kasi alam ko hindi pwede ma access outside
// $password = "Dmpoffice2023";     // Yung DB ng hostinger
// $dbname = "u680032315_dmp_db";   // We will be using FTP and GitAccess

$servername = "localhost";       // Localhost kasi dun na tayo sa files sa hostinger mag eedit
$username = "root";    // Bale live development na kasi alam ko hindi pwede ma access outside
$password = "";     // Yung DB ng hostinger
$dbname = "u680032315_dmp_db";   // We will be using FTP and GitAccess

// $servername = "localhost";
// $username = "root"; 
// $password = ""; 
// $dbname = "updated";

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