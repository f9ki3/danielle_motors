<?php
// Include necessary files
include "../admin/session.php";
include "../database/database.php";

// Check if $branch_code is set
if (isset($branch_code)) {
    try {
        // Start transaction
        $conn->begin_transaction();

        // Prepare and bind the SQL statement using a prepared statement
        $query_draft_stocks = "SELECT * FROM stocks_draft WHERE branch_code = ?";
        $stmt = $conn->prepare($query_draft_stocks);
        $stmt->bind_param("s", $branch_code); // assuming $branch_code is a string
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Fetch each row and process it
            while ($q_row = $result->fetch_assoc()) {
                $product_id = $q_row['product_id'];
                $product_qty = $q_row['product_qty'];
                $ware_location = $q_row['ware_loc_id'];
                $publish_by = $q_row['user_id'];
                $date_added = $q_row['date_added'];
                $stock_branch_code = $q_row['branch_code'];

                // Check if product exists
                $check_product_exist_sql = "SELECT id, rack_loc_id, stocks FROM stocks WHERE product_id = ? AND branch_code = ? LIMIT 1";
                $stmt_exist = $conn->prepare($check_product_exist_sql);
                $stmt_exist->bind_param("ss", $product_id, $stock_branch_code);
                $stmt_exist->execute();
                $result_exist = $stmt_exist->get_result();

                if ($result_exist->num_rows > 0) {
                    // Product exists, update stock
                    $row = $result_exist->fetch_assoc();
                    $stock_id = $row['id'];
                    $new_location = (strpos($row['rack_loc_id'], $ware_location) !== false) ? $row['rack_loc_id'] : $row['rack_loc_id'] . ", " . $ware_location;
                    $new_qty = $row['stocks'] + $product_qty;

                    $update_data = "UPDATE stocks SET rack_loc_id = ?, stocks = ? WHERE id = ?";
                    $stmt_update = $conn->prepare($update_data);
                    $stmt_update->bind_param("sii", $new_location, $new_qty, $stock_id);
                    $stmt_update->execute();
                    $stmt_update->close();
                } else {
                    // Product does not exist, insert new stock
                    $insert_to_stocks = "INSERT INTO stocks (product_id, branch_code, rack_loc_id, stocks) VALUES (?, ?, ?, ?)";
                    $stmt_insert = $conn->prepare($insert_to_stocks);
                    $stmt_insert->bind_param("sssi", $product_id, $stock_branch_code, $ware_location, $product_qty);
                    $stmt_insert->execute();
                    $stmt_insert->close();
                }

                // Delete draft entry
                $delete_sql = "DELETE FROM stocks_draft WHERE branch_code = ? AND product_id = ?";
                $stmt_delete = $conn->prepare($delete_sql);
                $stmt_delete->bind_param("ss", $stock_branch_code, $product_id);
                $stmt_delete->execute();
                $stmt_delete->close();
            }

            // Commit transaction
            $conn->commit();

            $response = "true"; // If execution reaches here, it's successful
        } else {
            // No rows found with the provided branch code
            // Handle this case accordingly
            $response = "false";
        }

        // Close the prepared statement
        $stmt->close();
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        $response = "false";
        // Log or handle the error as needed
    }
} else {
    // $branch_code is not set
    // Handle this case accordingly
    $response = "false";
}
$log_description = "Saved all the stocks from draft.";
$insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$user_id', audit_description = '$log_description', user_brn_code = '$branch_code', audit_date = '$currentTimestamp'";
$conn->query($insert_into_logs);
// Redirect with response
header("Location: ../Inventory/all_stocks/?successful=$response");
exit;
?>
