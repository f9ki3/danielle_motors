<?php 
require_once "../../database/database.php";
if(isset($_GET['id'])) {
    $drc_id = $_GET['id'];
    // Sanitize input to prevent SQL injection
    $drc_id = mysqli_real_escape_string($connection, $drc_id);
    $delete_sql = "DELETE FROM delivery_receipt_content WHERE id = '$drc_id'";
    if(mysqli_query($connection, $delete_sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
} else {
    echo "ID parameter not provided";
}
?>
