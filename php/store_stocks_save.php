<?php
include '../config/config.php';

// Check if all required parameters are set
if (isset($_POST['materialDate'], $_POST['materialInvoiceNo'], $_POST['cashierName'], $_POST['receivedBy'], $_POST['inspectedBy'], $_POST['verifiedBy'], $_POST['totalSellingPrice'], $_POST['totalCostPrice'], $_POST['totalGrossProfit'])) {

    // Retrieve data from the AJAX request
    $materialDate = mysqli_real_escape_string($conn, $_POST['materialDate']);
    $materialInvoiceNo = mysqli_real_escape_string($conn, $_POST['materialInvoiceNo']);
    $cashierName = mysqli_real_escape_string($conn, $_POST['cashierName']);
    $receivedBy = mysqli_real_escape_string($conn, $_POST['receivedBy']);
    $inspectedBy = mysqli_real_escape_string($conn, $_POST['inspectedBy']);
    $verifiedBy = mysqli_real_escape_string($conn, $_POST['verifiedBy']);
    $totalSellingPrice = (float)$_POST['totalSellingPrice']; // Convert to float
    $totalCostPrice = (float)$_POST['totalCostPrice']; // Convert to float
    $totalGrossProfit = (float)$_POST['totalGrossProfit']; // Convert to float

    // Validate and sanitize data if needed...

    // Insert data into the database
    $sql = "INSERT INTO material_transfer (material_date, material_invoice, material_cashier, material_recieved_by, material_inspected_by, material_verified_by, totalSellingPrice, totalCostPrice, totalGrossProfit) 
            VALUES ('$materialDate', '$materialInvoiceNo', '$cashierName', '$receivedBy', '$inspectedBy', '$verifiedBy', $totalSellingPrice, $totalCostPrice, $totalGrossProfit)";

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
