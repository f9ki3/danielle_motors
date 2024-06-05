    <?php
    include '../config/config.php';
    include '../admin/session.php';

    if (isset($_POST['productId'], $_POST['sessionID'], $_POST['sender'], $_POST['qty_sent'], $_POST['qty_warehouse'], $_POST['user_brn_code'], $_POST['qty_total'], $_POST['materialInvoiceID'], $_POST['message'])) {
        $product_id = intval($_POST['productId']);
        $quantity = intval($_POST['qty_sent']);
        $user_brn_code = mysqli_real_escape_string($conn, $_POST['user_brn_code']);
        $return = intval($_POST['qty_total']);
        $materialInvoiceID = mysqli_real_escape_string($conn, $_POST['materialInvoiceID']);
        $sessionID = intval($_POST['sessionID']); // Convert to integer
        $sender = mysqli_real_escape_string($conn, $_POST['sender']); // Assuming cashierName is a string
        $qtyWarehouse = intval($_POST['qty_warehouse']);
        $reason = mysqli_real_escape_string($conn, $_POST['message']); // Retrieve reason from the AJAX request

        if ($product_id <= 0 || $quantity <= 0) {
            echo "Error: Invalid product ID or quantity";
            exit; // Stop execution if input data is invalid
        }

        // Start transaction
        mysqli_begin_transaction($conn);

        try {
            // Prepare the SQL statement to update stocks
            $updateSql = "UPDATE stocks SET stocks = stocks + ?, rack_loc_id = 1 WHERE product_id = ? AND branch_code = ?";
            $stmt = mysqli_prepare($conn, $updateSql);
            mysqli_stmt_bind_param($stmt, "iis", $qtyWarehouse, $product_id, $user_brn_code);

            // Execute the statement to update product stocks
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Error updating product stocks: " . mysqli_error($conn));
            }

            // Check if any rows were affected by the update
            if (mysqli_stmt_affected_rows($stmt) == 0) {
                // Insert a new row into the stocks table
                $insertSql = "INSERT INTO stocks (product_id, branch_code, stocks, rack_loc_id) VALUES (?, ?, ?, 1)";
                $insertStmt = mysqli_prepare($conn, $insertSql);
                mysqli_stmt_bind_param($insertStmt, "isi", $product_id, $user_brn_code, $qtyWarehouse);

                // Execute the insert statement
                if (!mysqli_stmt_execute($insertStmt)) {
                    throw new Exception("Error inserting new row into stocks table: " . mysqli_error($conn));
                }

                mysqli_stmt_close($insertStmt);
                echo "New row inserted into stocks table!";
            } else {
                echo "Product stocks updated successfully!";
            }

            mysqli_stmt_close($stmt);

            // Update the material_transaction status
            $updateStatusSql = "UPDATE material_transaction SET status = 6, branch_code = ?, qty_receive = ?, qty_warehouse = ? WHERE product_id = ? AND material_invoice_id = ?";
            $stmt2 = mysqli_prepare($conn, $updateStatusSql);
            mysqli_stmt_bind_param($stmt2, "ssiii", $user_brn_code, $qtyWarehouse, $quantity, $product_id, $materialInvoiceID);

            // Execute the status update statement
            if (!mysqli_stmt_execute($stmt2)) {
                throw new Exception("Error updating material transaction status: " . mysqli_error($conn));
            }

            mysqli_stmt_close($stmt2);
            echo "Material transaction partial return status updated!";

            // Insert log
            $currentTimestamp = date('Y-m-d H:i:s'); // or your preferred method to get the current timestamp

            $stmt_log = $conn->prepare("INSERT INTO audit (audit_user_id, audit_date, audit_action, audit_description, user_brn_code) VALUES (?, ?, 'Material Transaction', 'Material Transfer Stocks has returned', ?)");
            if ($stmt_log) {
                $stmt_log->bind_param("iss", $user_id, $currentTimestamp, $user_brn_code);
                if ($stmt_log->execute()) {
                    echo "Audit log entry inserted successfully!";
                } else {
                    throw new Exception("Error inserting audit log entry: " . $stmt_log->error);
                }
                $stmt_log->close();
            } else {
                throw new Exception("Error preparing audit log statement: " . $conn->error);
            }

            // Insert into returns table
            $sqlReturns = "INSERT INTO returns (user_id, material_invoice_id, product_id, reason, branch_code, return_date, qty, status) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, 6)";
            $stmtReturns = mysqli_prepare($conn, $sqlReturns);
            mysqli_stmt_bind_param($stmtReturns, "issssi", $sessionID, $materialInvoiceID, $product_id, $reason, $user_brn_code, $quantity);

            // Execute the returns insert statement
            if (!mysqli_stmt_execute($stmtReturns)) {
                throw new Exception("Error saving return entry: " . mysqli_error($conn));
            }

            mysqli_stmt_close($stmtReturns);
            echo "Return entry saved successfully!";

            // Commit transaction
            mysqli_commit($conn);
        } catch (Exception $e) {
            // Rollback transaction
            mysqli_rollback($conn);
            echo $e->getMessage();
        }

    } else {
        echo "Error: Required data not provided";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
