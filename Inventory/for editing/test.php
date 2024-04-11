<?php
include "../../admin/session.php";
// Get form data
$from_user_full_name = $fname . " " . $lname;
$message = $_POST['message'];
$date_sent = date("Y-m-d H:i:s");
$from_user_profile_photo = basename($profile);

// Load existing JSON data
$jsonFile = 'chats.json';
$chats = json_decode(file_get_contents($jsonFile), true);

// Generate new message ID
$message_id = count($chats) + 1;

// Construct new message array
$newMessage = array(
    "message_id" => strval($message_id),
    "from_user_id" => "$user_id",
    "from_user_full_name" => $from_user_full_name,
    "from_user_pfp" => $from_user_profile_photo,
    "message" => $message,
    "to_user_id" => "",
    "to_user_full_name" => "",
    "to_user_pfp" => "",
    "date_sent" => $date_sent,
    "message_status" => "unread"
);

// Add new message to chats array
$chats[] = $newMessage;

// Save updated JSON data
file_put_contents($jsonFile, json_encode($chats, JSON_PRETTY_PRINT));

// Redirect back to form page
exit();
?>
