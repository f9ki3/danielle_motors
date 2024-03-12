<?php
include '../config/config.php';

// Retrieve data from the AJAX request
$materialDate = $_POST['materialDate'];
$materialInvoiceNo = $_POST['materialInvoiceNo'];
$cashierName = $_POST['cashierName'];
$receivedBy = $_POST['receivedBy'];
$inspectedBy = $_POST['inspectedBy'];
$verifiedBy = $_POST['verifiedBy'];

// Validate and sanitize data if needed...

// Insert data into the database
$sql = "INSERT INTO material_transfer (material_date, material_invoice, material_cashier, material_recieved_by, material_inspected_by, material_verified_by) 
        VALUES ('$materialDate', '$materialInvoiceNo', '$cashierName', '$receivedBy', '$inspectedBy', '$verifiedBy')";

if (mysqli_query($conn, $sql)) {
    echo "Data saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
