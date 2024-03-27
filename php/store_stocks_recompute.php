<?php
include '../config/config.php';

// Check if all required parameters are set
if (isset($_POST['totalSellingPrice'], $_POST['totalCostPrice'], $_POST['totalGrossProfit'], $_POST['materialInvoiceID'])) {

    // Convert and sanitize input data
    $totalSellingPrice = (float)$_POST['totalSellingPrice'];
    $totalCostPrice = (float)$_POST['totalCostPrice'];
    $totalGrossProfit = (float)$_POST['totalGrossProfit'];
    $materialInvoiceID = mysqli_real_escape_string($conn, $_POST['materialInvoiceID']);

    // Prepare and execute the SQL query to update the data
    $sql = "UPDATE material_transfer 
            SET totalSellingPrice = $totalSellingPrice, 
                totalCostPrice = $totalCostPrice, 
                totalGrossProfit = $totalGrossProfit
            WHERE material_invoice = '$materialInvoiceID'";

    if (mysqli_query($conn, $sql)) {
        echo "Data updated successfully!";
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
