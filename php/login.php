<?php
// Start a session
session_start();

include ("../config/config.php");

// Check if the POST data is set
if(isset($_POST['uname'], $_POST['pass'])) {
    // Get the posted username and password
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    // Prepare a SQL statement to check if the username and password exist
    $sql = "SELECT * FROM user WHERE username = ? AND user_password = ? AND user_status = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        // Handle error, perhaps by logging it or showing a message to the user
        die('Error: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters
    $status = 0; // Assuming status is an integer
    $stmt->bind_param("ssi", $username, $password, $status);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a row was returned
    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Set session variables
        $_SESSION['id'] = $row['id'];
        $_SESSION['fname'] = $row['user_fname'];
        $_SESSION['lname'] = $row['user_lname'];
        $_SESSION['email'] = $row['user_email'];
        $_SESSION['contact'] = $row['user_contact'];
        $_SESSION['position'] = $row['user_position'];
        $_SESSION['address'] = $row['user_address'];
        $_SESSION['brgy'] = $row['user_brgy'];
        $_SESSION['municipality'] = $row['user_municipality'];
        $_SESSION['province'] = $row['user_province'];
        $_SESSION['postal_code'] = $row['user_postal_code'];
        $_SESSION['img'] = $row['user_img'];
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;

        // Respond with '1' to indicate successful login
        echo '1';
    } else {
        // Respond with '0' to indicate failed login
        echo '0';
    }
} else {
    // Respond with '0' to indicate failed login
    echo '0';
}

// Close the connection
$conn->close();
?>
