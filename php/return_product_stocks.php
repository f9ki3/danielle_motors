<?php
include '../config/config.php';

if(isset($_POST['productId'], $_POST['qty_sent'],$_POST['user_brn_code'], $_POST['qty_request'], $_POST['materialInvoiceID'])) {
    $product_id = intval($_POST['productId']);
    $quantity = intval($_POST['qty_sent']);
    $user_brn_code = mysqli_real_escape_string($conn, $_POST['user_brn_code']);
    $return = intval($_POST['qty_total']);
    $materialInvoiceID = mysqli_real_escape_string($conn, $_POST['materialInvoiceID']);
    $partialreturn = $return - $quantity;

    if($product_id <= 0 || $quantity <= 0) {
        echo "Error: Invalid product ID or quantity";
        exit;
    }

    $updateSqlpartial = "UPDATE stocks SET stocks = stocks + ? WHERE product_id = ? AND branch_code = ?";
    $stmt4 = mysqli_prepare($conn, $updateSqlpartial);
    mysqli_stmt_bind_param($stmt4, "iis", $partialreturn, $product_id, $user_brn_code);

    if(mysqli_stmt_execute($stmt4)) {
        if(mysqli_stmt_affected_rows($stmt4) == 0) {
            // If no rows were affected, insert a new row
            $insertSql = "INSERT INTO stocks (product_id, branch_code, stocks) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insertSql);
            mysqli_stmt_bind_param($stmt, "isi", $product_id, $user_brn_code, $partialreturn);
            
            if(mysqli_stmt_execute($stmt)) {
                // Re-run the partial update after inserting the new row
                mysqli_stmt_execute($stmt4);
            } else {
                echo "Error inserting new row into stocks table: " . mysqli_error($conn);
            }
            
            mysqli_stmt_close($stmt);
        }
    } else {
        echo "Error updating branch stocks for partial return: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt4);

                    // Prepare the SQL statement to update warehouse stocks
                    $updateSqlWarehouse = "UPDATE stocks SET stocks = stocks - ? WHERE product_id = ? AND branch_code = 'WAREHOUSE'";
    
                    // Bind parameters to the statement
                    $stmtWarehouse = mysqli_prepare($conn, $updateSqlWarehouse);
                    mysqli_stmt_bind_param($stmtWarehouse, "ii", $quantity, $product_id);


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

        } else {
            echo "Error updating declined status in another table: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt3);
    } else {
        echo "Error updating material transaction status: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt2);
} else {
    echo "Error: Required data not provided";
}

mysqli_close($conn);
?>
