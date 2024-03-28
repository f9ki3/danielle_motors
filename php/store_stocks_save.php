<?php
include '../config/config.php';

// Check if all required parameters are set
if (isset($_POST['materialDate'], $_POST['materialInvoiceNo'], $_POST['cashierName'], $_POST['receivedBy'], $_POST['totalSellingPrice'])) {

    // Retrieve data from the AJAX request
    $materialDate = mysqli_real_escape_string($conn, $_POST['materialDate']);
    $materialInvoiceNo = mysqli_real_escape_string($conn, $_POST['materialInvoiceNo']);
    $cashierName = mysqli_real_escape_string($conn, $_POST['cashierName']);
    $receivedBy = mysqli_real_escape_string($conn, $_POST['receivedBy']);
    $totalSellingPrice = (float)$_POST['totalSellingPrice']; // Convert to float

    // Validate and sanitize data if needed...

    // Insert data into the database
    $sql = "INSERT INTO material_transfer (material_date, material_invoice, material_cashier, material_recieved_by, totalSellingPrice) 
            VALUES ('$materialDate', '$materialInvoiceNo', '$cashierName', '$receivedBy', $totalSellingPrice)";

    if (mysqli_query($conn, $sql)) {
        echo "Data saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Handle case where not all required parameters are set
    echo "Error: Missing required parameters.";
}

// Close connection
mysqli_close($conn);
?>
