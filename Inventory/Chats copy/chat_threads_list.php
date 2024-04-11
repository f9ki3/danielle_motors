<?php

// Read JSON data from file
$json_string = file_get_contents('chats.json');

// Decode JSON string to PHP array
$data = json_decode($json_string, true);

// PHP variable representing the user ID you want to check
$user_id = "2"; // Replace with the actual user ID you want to check

// Array to store matched messages
$matched_messages = [];

// Iterate through each message
foreach ($data as $message) {
    // Check if the to_user_id matches the user_id
    if ($message['to_user_id'] === $user_id) {
        // If it matches, add it to the array
        $matched_messages[] = $message;
    }
}

// Now you can display the matched messages however you want
// For example, you can loop through $matched_messages to display each message

foreach ($matched_messages as $message) {
    // Display the message details
    echo "Message ID: " . $message['message_id'] . "<br>";
    echo "From User ID: " . $message['from_user_id'] . "<br>";
    // Display other message details as needed
    echo "<hr>"; // Add a horizontal line between messages for better readability
}

?>
