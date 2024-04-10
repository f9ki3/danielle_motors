<?php
include "../../admin/session.php";
include "../../database/database.php";

$last_inserted_from = "SELECT from_user_id FROM chat_messages WHERE to_user_id = '$user_id' ORDER BY id DESC LIMIT 1";
$last_inserted_from_result = $conn->query($last_inserted_from);
$row=$last_inserted_from->fetch_assoc();

// New value to check
$newValue = $row['from_user_id'];
$_SESSION['specific_message_count'] = 0;
// Query to check if the new value exists
$sql = "SELECT COUNT(*) AS count FROM chat_messages WHERE from_user_id = ? AND to_user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $newValue, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$count = $row['count'];

$_SESSION['specific_message_count'] = $count;
// Check if count is greater than 0
if ($count > 0) {
    echo "no changes";
} else {
    echo "changes happened";
}

// Close connection
$stmt->close();
$conn->close();

?>
