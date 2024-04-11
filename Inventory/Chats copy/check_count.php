<?php
include "../../admin/session.php";

if(!isset($_SESSION['message_list_count'])){
    $_SESSION['message_list_count'] = 0;
}

$old_count = $_SESSION['message_list_count'];
// Specify the file path
$json_file = 'chats.json';

// Check if the file exists
if (!file_exists($json_file)) {
    die("Error: The JSON file '{$json_file}' does not exist.");
}

// Read JSON data from file
$json_string = file_get_contents($json_file);

// Check if the file was successfully read
if ($json_string === false) {
    die("Error: Failed to read JSON file '{$json_file}'.");
}

// Decode JSON string to PHP array
$data = json_decode($json_string, true);

// Check if the JSON decoding was successful
if ($data === null) {
    die("Error: Failed to decode JSON data.");
}

// Variable to store the total count
$new_count = 0;

// Iterate through each message
foreach ($data as $message) {
    // Check if the to_user_id matches the user_id
    if ($message['to_user_id'] == $user_id) {
        // If it matches, increment the total count
        $new_count++;
    }
}

$_SESSION['message_list_count'] = $new_count;
if($old_count == $new_count){
    echo "No changes";
} else {
    echo "changes were made";
}

?>
