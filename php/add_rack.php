<?php
include '../admin/session.php';
include '../config/config.php';
$status = 0;

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

    // Check if a row was returned
    if ($result->num_rows > 0) {
        // Insert log
        $stmt_log = $conn->prepare("INSERT INTO audit (audit_user_id, audit_date, audit_action, audit_description, user_brn_code) VALUES (?, NOW(), 'update', 'New row inserted into stocks table', ?)");
        $stmt_log->bind_param("is", $user_id, $branch_code); // Assuming $user_id and $branch_code are defined elsewhere
        $stmt_log->execute();
        mysqli_stmt_close($stmt_log);

        // Additional code for successful login
    } else {
        // Respond with '0' to indicate failed login
        echo '0';
    }
} else {
    // Respond with '0' to indicate failed login
    echo '0';
}
?>