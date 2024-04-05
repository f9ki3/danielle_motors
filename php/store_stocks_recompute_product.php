<?php
include '../config/config.php';

// Check if all required parameters are set
if (isset($_POST['totalSellingPrice'], $_POST['materialInvoiceID'])) {

    // Convert and sanitize input data
    $totalSellingPrice = (float)$_POST['totalSellingPrice'];
    $materialInvoiceID = mysqli_real_escape_string($conn, $_POST['materialInvoiceID']);

    // Prepare the SQL statement
    $sql = "UPDATE material_transfer 
            SET totalSellingPrice = ? 
            WHERE material_invoice = ?";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ds", $totalSellingPrice, $materialInvoiceID);

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