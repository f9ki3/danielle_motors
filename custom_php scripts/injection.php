<?php
// Hostinger Database 
$servername = "localhost"; // Localhost kasi dun na tayo sa files sa hostinger mag eedit
$username = "root"; // Bale live development na kasi alam ko hindi pwede ma access outside
$password = ""; // Yung DB ng hostinger
$dbname = "inject"; 

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

// Fetch data from the database
$sql = "SELECT * FROM inject WHERE `COL 1` != 'PRODUCT NAME'";
$res = $conn->query($sql);

$data = array();

while ($row = $res->fetch_assoc()) {
    $data[] = array(
        'product_name' => $row['COL 1'],
        'model' => $row['COL 2'],
        'mm' => $row['COL 3'],
        'unit' => $row['COL 4'],
        'srp' => $row['COL 5'],
        'original_price' => $row['COL 9']
    );
}

// Convert the data to JSON
$json_data = json_encode($data, JSON_PRETTY_PRINT);

// Save the JSON data to a file
file_put_contents('inject.json', $json_data);

// Close the database connection
$conn->close();
?>
