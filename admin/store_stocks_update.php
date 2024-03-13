<?php
include '../config/config.php';

// Retrieve data from the AJAX request
$materialDate = $_POST['materialDate'];
$materialInvoiceNo = $_POST['materialInvoiceNo'];
$cashierName = $_POST['cashierName'];
$receivedBy = $_POST['receivedBy'];
$inspectedBy = $_POST['inspectedBy'];
$verifiedBy = $_POST['verifiedBy'];

// Prepare and bind the SQL statement
$sql = "UPDATE material_transfer 
        SET material_date = ?, 
            material_invoice = ?, 
            material_cashier = ?, 
            material_recieved_by = ?, 
            material_inspected_by = ?, 
            material_verified_by = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssss", $materialDate, $materialInvoiceNo, $cashierName, $receivedBy, $inspectedBy, $verifiedBy);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    echo "Data updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
