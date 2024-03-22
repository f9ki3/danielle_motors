<?php
// Include your database connection or any required files
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if productId is set
    if (isset($_POST['code'])) {

        $code = $_POST['code'];
        $status = 0;
        // Perform database update query to set the status to 0
        $sql = "UPDATE product SET active = ? WHERE code = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $status, $code); // Bind parameters

        if ($stmt->execute()) {
            // Return success message
            echo json_encode(array("success" => true, "message" => "Product deactivated successfully"));
            exit();
        } else {
            // Return error message
            echo json_encode(array("success" => false, "message" => "Error deactivating product"));
            exit();
        }
    } else {
        // Return error message if productId is not set
        echo json_encode(array("success" => false, "message" => "Product ID not provided"));
        exit();
    }
} else {
    // Return error message if request method is not POST
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
    exit();
}
// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
