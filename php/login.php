<?php
// Start a session
session_start();

// Set timezone to Manila (GMT+8)
date_default_timezone_set('Asia/Manila');
$currentTimestamp = date('Y-m-d H:i:s');

// Include the database configuration file
include("../config/config.php");

// Check if the POST data is set
if (isset($_POST['uname'], $_POST['pass'])) {
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
    $stmt->bind_param("ssi", $username, $hashed_password, $status);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a row was returned
    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();

        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['user_img'] = $user['user_img'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_fname'] = $user['user_fname'];
        $_SESSION['user_lname'] = $user['user_lname'];
        $_SESSION['user_position'] = $user['user_position'];
        $_SESSION['user_email'] = $user['user_email'];
        $_SESSION['user_contact'] = $user['user_contact'];
        $_SESSION['user_status'] = $user['user_status'];
        $_SESSION['user_otp'] = $user['user_otp'];
        $_SESSION['user_address'] = $user['user_address'];
        $_SESSION['user_brgy'] = $user['user_brgy'];
        $_SESSION['user_municipality'] = $user['user_municipality'];
        $_SESSION['user_province'] = $user['user_province'];
        $_SESSION['user_postalcode'] = $user['user_postalcode'];
        $_SESSION['user_account_type'] = $user['user_account_type'];
        $_SESSION['user_brn_code'] = $user['user_brn_code'];
        $brn_code = $_SESSION['user_brn_code'];
        $user_id = $_SESSION['id']; // Additional variable for user_id (assuming you need it)

        // Retrieve user permissions
        $permission_sql = "SELECT permission_name FROM `groups` WHERE position_name = ?";
        $permission_stmt = $conn->prepare($permission_sql);

        if ($permission_stmt === false) {
            die('Error: ' . htmlspecialchars($conn->error));
        }
    
        $permission_stmt->bind_param("s", $user['user_position']);
        $permission_stmt->execute();
        $permission_result = $permission_stmt->get_result();

        if ($permission_result->num_rows > 0) {
            $permission = $permission_result->fetch_assoc();
            $_SESSION['user_permissions'] = $permission['permission_name'];
        }

        // Retrieve branch information
        $branch_sql = "SELECT * FROM branch WHERE brn_code = ? LIMIT 1";
        $branch_stmt = $conn->prepare($branch_sql);

        if ($branch_stmt === false) {
            die('Error: ' . htmlspecialchars($conn->error));
        }

        $branch_stmt->bind_param("s", $brn_code);
        $branch_stmt->execute();
        $branch_result = $branch_stmt->get_result();

        if ($branch_result->num_rows > 0) {
            $branch = $branch_result->fetch_assoc();
            $_SESSION['branch_name'] = $branch['brn_name'];
            $_SESSION['branch_address'] = $branch['brn_address'] . ", " . $branch['brn_brgy'] . ", " . $branch['brn_municipality'] . ", " . $branch['brn_province'];
            $_SESSION['branch_telephone'] = $branch['brn_telnum'];
            $_SESSION['branch_email'] = $branch['brn_email'];
        }

        // Respond based on user account type and log login action
        if ($_SESSION['user_account_type'] == 0) {
            echo '1';
            $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$user_id', audit_action = 'Logged in from inventory' ,audit_description = 'Login inventory', user_brn_code = '$brn_code', audit_date = '$currentTimestamp'";
        } elseif ($_SESSION['user_account_type'] == 1) {
            echo '2';
            $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$user_id',audit_action = 'Logged in from store' , audit_description = 'Login store', user_brn_code = '$brn_code', audit_date = '$currentTimestamp'";
        }

        // Execute the query
        if ($conn->query($insert_into_logs) === false) {
            die('Error: ' . htmlspecialchars($conn->error));
        }
    } else {
        echo '0';
    }
} else {
    echo '0';
}

// Close the connection
$conn->close();
?>
