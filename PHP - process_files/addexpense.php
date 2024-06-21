<?php
// Include database connection
include "../admin/session.php";
include '../database/database.php';
// Get the current date in 'YYYY-MM-DD' format
$current_date_date_format = date('Y-m-d');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $description = $conn->real_escape_string($_POST['description']);
    $type = $conn->real_escape_string($_POST['type']);
    $amount_only = $conn->real_escape_string($_POST['amount']);
    $amount_des = $_POST['amount_des'];
    $amount = $amount_only . "." . $amount_des;
    // Prepare the SQL statement
    $sql = "INSERT INTO expenses (`description`, `type`, amount, `date`, publish_by) VALUES (?, ?, ?, ?, ?)";
    
    // Use prepared statement to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $description, $type, $amount, $current_date_date_format, $user_id);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to a success page or display a success message
            echo "New expense added successfully!";
            $log_description = "Added expense: " . $description . ".";
            $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$user_id', audit_description = '$log_description', user_brn_code = '$branch_code', audit_date = '$currentTimestamp'";
            $conn->query($insert_into_logs);
            header("Location: ../Inventory/Expenses/?success=$amount");
        } else {
            echo "Error: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    
    // Close the connection
    $conn->close();
    exit;
} else {
    echo "Invalid request method.";
}
?>
