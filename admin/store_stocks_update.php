<?php
include '../config/config.php';

// Retrieve data from the AJAX request
$id = isset($_POST['id']) ? $_POST['id'] : null; // ID of the row to be updated
$materialDate = $_POST['materialDate'];
$materialInvoiceNo = $_POST['materialInvoiceNo'];
$cashierName = $_POST['cashierName'];
$receivedBy = $_POST['receivedBy'];
$inspectedBy = $_POST['inspectedBy'];
$verifiedBy = $_POST['verifiedBy'];

// Validate and sanitize data if needed...

// Update data in the database
$sql = "UPDATE material_transfer 
        SET material_date = '$materialDate', 
            material_invoice = '$materialInvoiceNo', 
            material_cashier = '$cashierName', 
            material_recieved_by = '$receivedBy', 
            material_inspected_by = '$inspectedBy', 
            material_verified_by = '$verifiedBy' 
        WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Data updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>