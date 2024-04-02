<?php
include '../config/config.php';

// Check if the necessary POST data is set
if(isset($_POST['productId'], $_POST['materialInvoiceID'])) {
    // Sanitize and validate input data
    $product_id = intval($_POST['productId']); // Convert to integer
    $materialInvoiceID = mysqli_real_escape_string($conn, $_POST['materialInvoiceID']);

    if($product_id <= 0) {
        echo "Error: Invalid product ID";
        exit; // Stop execution if input data is invalid
    }

    // Update the material_transaction status
    $updateStatusSql = "UPDATE material_transaction SET status = 5 WHERE product_id = ? AND material_invoice_id = ?";
    $stmt2 = mysqli_prepare($conn, $updateStatusSql);
    mysqli_stmt_bind_param($stmt2, "is", $product_id, $materialInvoiceID);
    
    if(mysqli_stmt_execute($stmt2)) {
        echo "Material transaction status updated!";
        
        // Update the declined column in another table
        $updateDeclinedSql = "UPDATE material_transfer SET declined = 2 WHERE material_invoice = ?";
        $stmt3 = mysqli_prepare($conn, $updateDeclinedSql);
        mysqli_stmt_bind_param($stmt3, "s", $materialInvoiceID);
        
        if(mysqli_stmt_execute($stmt3)) {
            echo " Declined status updated in another table!";
        } else {
            echo "Error updating declined status in another table: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt3);
    } else {
        echo "Error updating material transaction status: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt2);
} else {
    // Handle case where required POST data is not set
    echo "Error: Required data not provided";
}

// Close the database connection
mysqli_close($conn);
?>
