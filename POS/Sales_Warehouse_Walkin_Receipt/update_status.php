<?php
// Include your database configuration file
include '../../config/config.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve transactionID and itemID from the POST data
    $data = json_decode(file_get_contents("php://input"), true);
    $transactionID = $data['transactionID'];
    $itemID = $data['itemID'];

    // Prepare and bind SQL statement to update status
    $stmt = $conn->prepare("UPDATE purchase_cart SET status = '2' WHERE id = ?");
    $stmt->bind_param("i", $itemID);

    // Execute the statement
    if ($stmt->execute()) {
        // Status updated successfully
        $response = array('success' => true, 'message' => 'Status updated successfully');
        echo json_encode($response);
    } else {
        // Error updating status
        $response = array('success' => false, 'message' => 'Error updating status');
        echo json_encode($response);
    }

    // Close statement
    $stmt->close();
} else {
    // Invalid request method
    $response = array('success' => false, 'message' => 'Invalid request method');
    echo json_encode($response);
}

// Close database connection
$conn->close();
?>
