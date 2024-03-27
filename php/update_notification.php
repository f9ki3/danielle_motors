<?php
include '../config/config.php';

// Check if all required parameters are set
if (isset($_POST['sessionID'], $_POST['type_id'], $_POST['type'], $_POST['sender'], $_POST['message'])) {
    // Convert and sanitize input data
    $sessionID = intval($_POST['sessionID']); // Convert to integer
    $type_id = mysqli_real_escape_string($conn, $_POST['type_id']); // Assuming materialInvoiceNo is a string
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $sender = mysqli_real_escape_string($conn, $_POST['sender']); // Assuming cashierName is a string
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Prepare and execute the SQL query to insert the notification
    $sql = "INSERT INTO notification (sessionID, type_id, type, sender, message) 
            VALUES ('$sessionID', '$type_id', '$type', '$sender', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "Notification inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Handle case where not all required parameters are set
    echo "Error: Missing required parameters.";
}

// Close connection
mysqli_close($conn);
?>
