<?php 
// Establish database connection
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "dms_db";


$servername = "sql.freedb.tech";
$username = "freedb_dmp_master";
$password = "8@YASU8ypbA2uA%";
$dbname = "freedb_dmp_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// Further code logic goes here

// Close the connection when done
$conn->close();
?>
