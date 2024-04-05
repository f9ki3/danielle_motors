<?php
include '../config/config.php';

// Check if all required parameters are set
if (isset($_POST['totalReturnAmount'],$_POST['totalSellingPrice'], $_POST['materialInvoiceID'])) {

    // Convert and sanitize input data
    $totalReturnPrice = (float)$_POST['totalReturnAmount'];
    $totalSellingPrice = (float)$_POST['totalSellingPrice'];
    $materialInvoiceID = $_POST['materialInvoiceID']; // No need to sanitize if using prepared statement

    // Prepare the SQL statement
    $sql = "UPDATE material_transfer 
            SET totalReturnPrice = totalReturnPrice + ?, totalSellingPrice = totalSellingPrice + ?
            WHERE material_invoice = ?";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "dds", $totalReturnPrice , $totalSellingPrice, $materialInvoiceID);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Data updated successfully!";
        } else {
            echo "Error executing SQL statement: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing SQL statement: " . mysqli_error($conn);
    }
} else {
    // Handle case where not all required parameters are set
    echo "Error: Missing required parameters.";
}

// Close connection
mysqli_close($conn);
?>
