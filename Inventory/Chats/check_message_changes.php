<?php
include "../../admin/session.php";
include "../../database/database.php";



// Check if old count is set in session, if not, set it to 0
if (!isset($_SESSION['old_message_count'])) {
    $old_count = $_SESSION['old_message_count'] = 0;
}

// Get the old count from session
$old_count = $_SESSION['old_message_count'];

// Get the new count
$stmt = $conn->prepare("SELECT COUNT(*) FROM chat_messages WHERE to_user_id = ?");
$stmt->bind_param('s', $user_id);
$stmt->execute();
$stmt->bind_result($new_message_count);
$stmt->fetch();
$stmt->close();

// Update the old count in session
$_SESSION['old_message_count'] = $new_message_count;

// Compare old and new counts to check if a row was inserted or deleted
if ($new_message_count > $old_count) {
    echo "A new row was inserted.";
} elseif ($new_message_count < $old_count) {
    echo "A row was deleted.";
} else {
    echo "No changes.";
}

$conn->close();
?>
