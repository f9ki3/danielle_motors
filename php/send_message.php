<?php
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the message and other necessary data from the POST request
    $message = $_POST["message"];
    $to_user_id = 11; // Replace 1 with the actual ID of the recipient user
    $from_user_id = 1; // Replace 2 with the actual ID of the sender user
    $status = "sent"; // Assuming the message is sent initially
    
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO chat_messages (date_sent, to_user_id, from_user_id, message, status) VALUES (NOW(), ?, ?, ?, ?)");
    $stmt->bind_param("iiss", $to_user_id, $from_user_id, $message, $status);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Message sent successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Return an error if the request method is not POST
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
