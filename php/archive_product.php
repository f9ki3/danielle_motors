<?php
// Include your database connection script
include '../config/config.php'; // Adjust the path as necessary

// Check if the database connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if productId is set
    if (isset($_POST['productId'])) {
        $productId = $_POST['productId'];

        // Perform database update query to set the status to 0
        $sql = "UPDATE `product` SET `active` = 0 WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productId);

        if ($stmt->execute()) {
            // Return success message
            echo json_encode(array("success" => true, "message" => "Product archived successfully"));
            exit();
        } else {
            // Return error message
            echo json_encode(array("success" => false, "message" => "Error archiving product"));
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
?>
