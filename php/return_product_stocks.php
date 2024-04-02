<?php
include '../config/config.php';

// Check if the necessary POST data is set
if(isset($_POST['productId'], $_POST['qty_sent'], $_POST['materialInvoiceID'])) {
    // Sanitize and validate input data
    $product_id = intval($_POST['productId']); // Convert to integer
    $quantity = intval($_POST['qty_sent']); // Convert to integer
    $materialInvoiceID = mysqli_real_escape_string($conn, $_POST['materialInvoiceID']);

    if($product_id <= 0 || $quantity <= 0) {
        echo "Error: Invalid product ID or quantity";
        exit; // Stop execution if input data is invalid
    }

    // Prepare the SQL statement to update stocks
    $updateSql = "UPDATE stocks SET stocks = stocks + ? WHERE product_id = ? AND branch_code = 'WAREHOUSE'";
    
    // Prepare and bind parameters to the statement
    $stmt = mysqli_prepare($conn, $updateSql);
    mysqli_stmt_bind_param($stmt, "ii", $quantity, $product_id);

    // Execute the statement to update product stocks
    if(mysqli_stmt_execute($stmt)) {
        // Check if any rows were affected by the update
        if(mysqli_stmt_affected_rows($stmt) == 0) {
            // If no rows were affected, it means there's no existing row with the provided product_id and branch_code
            // Insert a new row into the stocks table
            $insertSql = "INSERT INTO stocks (product_id, branch_code, stocks) VALUES (?, 'WAREHOUSE', ?)";
            $insertStmt = mysqli_prepare($conn, $insertSql);
            mysqli_stmt_bind_param($insertStmt, "ii", $product_id, $quantity);
            
            if(mysqli_stmt_execute($insertStmt)) {
                echo "New row inserted into stocks table!";
                
                // Update the material_transaction status
                $updateStatusSql = "UPDATE material_transaction SET status = 6 WHERE product_id = ? AND material_invoice_id = ?";
                $stmt2 = mysqli_prepare($conn, $updateStatusSql);
                mysqli_stmt_bind_param($stmt2, "is", $product_id, $materialInvoiceID);
                
                if(mysqli_stmt_execute($stmt2)) {
                    echo " Material transaction status updated!";
                    
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
                echo "Error inserting new row into stocks table: " . mysqli_error($conn);
            }
            
            mysqli_stmt_close($insertStmt);
        } else {
            echo "Product stocks updated successfully!";
            
            // Update the material_transaction status
            $updateStatusSql = "UPDATE material_transaction SET status = 6 WHERE product_id = ? AND material_invoice_id = ?";
            $stmt2 = mysqli_prepare($conn, $updateStatusSql);
            mysqli_stmt_bind_param($stmt2, "is", $product_id, $materialInvoiceID);
            
            if(mysqli_stmt_execute($stmt2)) {
                echo " Material transaction status updated!";
                
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
        }
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
