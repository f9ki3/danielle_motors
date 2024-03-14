<?php
include '../config/config.php';

// Retrieve material invoice from the AJAX request
$materialInvoiceNo = $_POST['materialInvoiceNo'];
$status = 0;
// Prepare and bind the SQL statement
$sql = "UPDATE material_transfer SET active = ? WHERE material_invoice = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "is",$status, $materialInvoiceNo);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    echo "Active column updated successfully!";
} else {
    echo "Error updating active column: " . mysqli_error($conn); // Print any SQL errors
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
