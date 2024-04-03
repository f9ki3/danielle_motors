<?php
include '../config/config.php';

if(isset($_POST['productId'], $_POST['sessionID'], $_POST['sender'], $_POST['qty_sent'], $_POST['qty_warehouse'], $_POST['user_brn_code'], $_POST['qty_total'], $_POST['materialInvoiceID'], $_POST['message'])) {
    $product_id = intval($_POST['productId']);
    $quantity = intval($_POST['qty_sent']);
    $user_brn_code = mysqli_real_escape_string($conn, $_POST['user_brn_code']);
    $return = intval($_POST['qty_total']);
    $materialInvoiceID = mysqli_real_escape_string($conn, $_POST['materialInvoiceID']);
    $sessionID = intval($_POST['sessionID']); // Convert to integer
    $sender = mysqli_real_escape_string($conn, $_POST['sender']); // Assuming cashierName is a string
    $qtyWarehouse = intval($_POST['qty_warehouse']);
    $reason = mysqli_real_escape_string($conn, $_POST['message']); // Retrieve reason from the AJAX request

    if($product_id <= 0 || $quantity <= 0) {
        echo "Error: Invalid product ID or quantity";
        exit; // Stop execution if input data is invalid
    }

    // Prepare the SQL statement to update stocks
    $updateSql = "UPDATE stocks SET stocks = stocks + ?, rack_loc_id = 1 WHERE product_id = ? AND branch_code = ?";

    // Prepare and bind parameters to the statement
    $stmt = mysqli_prepare($conn, $updateSql);
    mysqli_stmt_bind_param($stmt, "iis", $qtyWarehouse, $product_id, $user_brn_code);

    // Execute the statement to update product stocks
    if(mysqli_stmt_execute($stmt)) {
        // Check if any rows were affected by the update
        if(mysqli_stmt_affected_rows($stmt) == 0) {
            // If no rows were affected, it means there's no existing row with the provided product_id and branch_code
            // Insert a new row into the stocks table
            $insertSql = "INSERT INTO stocks (product_id, branch_code, stocks, rack_loc_id) VALUES (?, ?, ?, 1)";
            $insertStmt = mysqli_prepare($conn, $insertSql);
            mysqli_stmt_bind_param($insertStmt, "isi", $product_id, $user_brn_code, $qtyWarehouse);

            // Execute the insert statement
            if(mysqli_stmt_execute($insertStmt)) {
                echo "New row inserted into stocks table!";
            } else {
                echo "Error inserting new row into stocks table: " . mysqli_error($conn);
            }

            // Close the insert statement
            mysqli_stmt_close($insertStmt);
        } else {
            echo "Product stocks updated successfully!";
        }

        // Update the material_transaction status
        $updateStatusSql = "UPDATE material_transaction SET status = 6, qty_receive = ?, qty_warehouse = ? WHERE product_id = ? AND material_invoice_id = ?";
        $stmt2 = mysqli_prepare($conn, $updateStatusSql);
        mysqli_stmt_bind_param($stmt2, "iiis", $qtyWarehouse, $quantity, $product_id, $materialInvoiceID); // Corrected parameter order

        // Execute the status update statement
        if(mysqli_stmt_execute($stmt2)) {
            echo "Material transaction partial return status updated!";
        } else {
            echo "Error updating material transaction status: " . mysqli_error($conn);
        }

        // Close the status update statement
        mysqli_stmt_close($stmt2);

        // Insert into returns table
        $sqlReturns = "INSERT INTO returns (user_id, product_id, reason, branch_code, return_date, qty, status) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, ?, 'status')";
        $stmtReturns = mysqli_prepare($conn, $sqlReturns);
        
        mysqli_stmt_bind_param($stmtReturns, "iissi", $sessionID, $product_id, $reason, $user_brn_code, $quantity); // Bind the reason to the SQL statement

        // Execute the returns insert statement
        if (mysqli_stmt_execute($stmtReturns)) {
            echo "Return entry saved successfully!";
        } else {
            echo "Error saving return entry: " . mysqli_error($conn);
        }

        // Close the returns insert statement
        mysqli_stmt_close($stmtReturns);
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
