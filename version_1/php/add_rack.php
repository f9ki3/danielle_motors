<?php
// Start a session
session_start();

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "danielle_motors";
$status = 0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the POST data is set
if(isset($_POST['uname']) && isset($_POST['pass'])) {
    // Get the posted username and password
    $rack_id = $_POST['rack_id'];
    $rack_descripion = $_POST['rack_descripion'];
    // Prepare a SQL statement to check if the username and password exist
    $sql = "SELECT * FROM admin WHERE username = ? AND password = ? AND status = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $password, $status);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    

} else {
    // Respond with '0' to indicate failed login
    echo '0';
}
?>
