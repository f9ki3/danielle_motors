<?php
include '../config/config.php';

// Check if the necessary POST data is set
if(isset($_POST['productId'], $_POST['qty_sent'], $_POST['srp'], $_POST['materialInvoiceID'])) {
    // Sanitize and validate input data
    $product_id = intval($_POST['productId']); // Convert to integer
    $quantity = intval($_POST['qty_sent']); // Convert to integer
    $srp = floatval($_POST['srp']); // Convert to float
    $materialInvoiceID = mysqli_real_escape_string($conn, $_POST['materialInvoiceID']);

    if($product_id <= 0 || $quantity <= 0 || $srp <= 0) {
        echo "Error: Invalid product ID, quantity, or SRP";
        exit; // Stop execution if input data is invalid
    }

    // Prepare the SQL statement
    $sql = "UPDATE product SET stocks = stocks + ?, srp = ? WHERE id = ?";
    $updatestatus = "UPDATE material_transaction SET status = 4 WHERE material_invoice_id = '$materialInvoiceID'";

    // Prepare and bind parameters to the statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "idi", $quantity, $srp, $product_id);

    // Execute the statement to update product stocks
    if(mysqli_stmt_execute($stmt)) {
        // Prepare and bind parameters for updating the material_transfer status
        $stmt2 = mysqli_prepare($conn, $updatestatus);
        mysqli_stmt_bind_param($stmt2, "i", $_POST['status']); // Assuming materialInvoiceNo is sent in the POST data

        // Execute the statement to update the material_transfer status
        if(mysqli_stmt_execute($stmt2)) {
            echo "Product stocks updated successfully and material transaction status updated!";
        } else {
            echo "Error updating material transfer status: " . mysqli_error($conn);
        }
        // Close the statement for updating material_transfer status
        mysqli_stmt_close($stmt2);
    } else {
        echo "Error updating product stocks: " . mysqli_error($conn);
    }

    // Close the statement for updating product stocks
    mysqli_stmt_close($stmt);
} else {
    // Handle case where required POST data is not set
    echo "Error: Required data not provided";
}

// Close the database connection
mysqli_close($conn);
?>
