<?php
include "../../admin/session.php";
include "../../database/database.php";

// Check if old count is set in session, if not, set it to 0
if (!isset($_SESSION['old_count'])) {
    $_SESSION['old_count'] = 0;
}

// Get the old count from session
$old_count = $_SESSION['old_count'];

// Get the new count
$stmt = $conn->prepare("SELECT COUNT(*) FROM stocks_draft WHERE branch_code = ?");
$stmt->bind_param('s', $branch_code);
$stmt->execute();
$stmt->bind_result($new_count);
$stmt->fetch();
$stmt->close();

// Update the old count in session
$_SESSION['old_count'] = $new_count;

// Compare old and new counts to check if a row was inserted or deleted
if ($new_count > $old_count) {
    echo "A new row was inserted.";
} elseif ($new_count < $old_count) {
    echo "A row was deleted.";
} else {
    echo "No changes.";
}

$conn->close();
?>
