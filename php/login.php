<?php
// Start a session
session_start();

// Include the database configuration file
include("../config/config.php");

// Check if the POST data is set
if(isset($_POST['uname'], $_POST['pass'])) {
    // Get the posted username and password
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    
    // Hash the password using SHA256
    $hashed_password = hash('sha256', $password);

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
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['user_img'] = $row['user_img'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_fname'] = $row['user_fname'];
        $_SESSION['user_lname'] = $row['user_lname'];
        $_SESSION['user_position'] = $row['user_position'];
        $_SESSION['user_email'] = $row['user_email'];
        $_SESSION['user_contact'] = $row['user_contact'];
        $_SESSION['user_status'] = $row['user_status'];
        $_SESSION['user_otp'] = $row['user_otp'];
        $_SESSION['user_address'] = $row['user_address'];
        $_SESSION['user_brgy'] = $row['user_brgy'];
        $_SESSION['user_municipality'] = $row['user_municipality'];
        $_SESSION['user_province'] = $row['user_province'];
        $_SESSION['user_postalcode'] = $row['user_postalcode'];
        $_SESSION['user_account_type'] = $row['user_account_type'];
        $_SESSION['user_brn_code'] = $row['user_brn_code'];
        // ------ inadd ko to pre --azul -- pacheck na lang if magkaconflict
        //azul to fyke may tinatry lang
        $permission_sql = "SELECT permission_name FROM `groups` WHERE position_name = ?";
        $permission_stmt = $conn->prepare($permission_sql);

        if ($permission_stmt === false) {
            // Handle error, perhaps by logging it or showing a message to the user
            die('Error: ' . htmlspecialchars($conn->error));
        }
    
        $permission_stmt->bind_param("s", $row['user_position']);
        // Execute the statement
        $permission_stmt->execute();

        // Get the result
        $permission_result = $permission_stmt->get_result();

        // Check if a row was returned
        if ($permission_result->num_rows > 0) {
            $row = $permission_result->fetch_assoc();
            $_SESSION['user_permissions'] = $row['permission_name'];
        }
        // ------ inadd ko to pre --azul -- pacheck na lang if magkaconflict
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
