<?php 
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u680032315_dmp_db";


// $servername = "sql.freedb.tech";
// $username = "freedb_dmp_master";
// $password = "8@YASU8ypbA2uA%";
// $dbname = "freedb_dmp_db";

// $servername = "localhost";       // Localhost kasi dun na tayo sa files sa hostinger mag eedit
// $username = "u680032315_dmp";    // Bale live development na kasi alam ko hindi pwede ma access outside
// $password = "Dmpoffice2023";     // Yung DB ng hostinger
// $dbname = "u680032315_dmp_db";   // We will be using FTP and GitAccess

// $servername = "localhost";       // Localhost kasi dun na tayo sa files sa hostinger mag eedit
// $username = "root";    // Bale live development na kasi alam ko hindi pwede ma access outside
// $password = "";     // Yung DB ng hostinger
// $dbname = "u680032315_dmp_db";   // We will be using FTP and GitAccess

//ginawa ko muna yun kanina nung nag aayus ako sa pag migrate bali nag push ako tas discrad yung changes sa connections
//okay pre oks na to wait..

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  // echo "Connected successfully";
}

?>
