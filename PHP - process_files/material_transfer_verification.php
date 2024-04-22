<?php
session_start();
include "../admin/session.php";
include_once "../database/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $invoice_id = $_POST['invoice_id'];
    $inspected_by = $_POST['inspected_by'];
    $verified_by = $_POST['verified_by'];
    $transaction_ids = $_POST['transaction_id'];
    $qty_sent = $_POST['qty_sent'];

    // Function to fetch user details
    function fetchUserDetails($conn, $user_id) {
        $sql = "SELECT user_fname, user_lname, user_position FROM user WHERE id = '$user_id' LIMIT 1";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['user_fname'] . " " . $row['user_lname'] . " - " . $row['user_position'];
        } else {
            return "error";
        }
    }

    // Fetch user details for inspected by and verified by
    $inspected_by_full = fetchUserDetails($conn, $inspected_by);
    $verified_by_full = fetchUserDetails($conn, $verified_by);

    // Update material_transfer table
    $sql_update_material_transfer = "UPDATE material_transfer SET material_inspected_by = '$inspected_by_full', material_verified_by = '$verified_by_full' WHERE material_invoice = '$invoice_id'";
    if (!$conn->query($sql_update_material_transfer)) {
        echo "Error updating material_transfer record: " . $conn->error;
        $conn->close();
        exit();
    }

    // Loop through transaction IDs
    foreach ($transaction_ids as $key => $transaction_id) {
        $quantity_sent = $qty_sent[$key];

        $material_transaction_query = "SELECT product_id, qty_added FROM material_transaction WHERE id = '$transaction_id' LIMIT 1";
        $material_transaction_result = $conn->query($material_transaction_query);
        if($material_transaction_result ->num_rows>0){
            $mtr_row = $material_transaction_result->fetch_assoc();
            $material_transfer_product_id = $mtr_row['product_id'];
            $material_transfer_qty_added = $mtr_row['qty_added'];
            $stock_query = "SELECT pending_order, successful_stock_out_qty FROM stocks WHERE product_id = '$material_transfer_product_id' AND branch_code = '$branch_code' LIMIT 1";
            $stock_result = $conn->query($stock_query);
            $stock_row = $stock_result->fetch_assoc();
            $new_pending_order = $stock_row['pending_order'] - $material_transfer_qty_added;
            $new_successful_stock_out_qty = $stock_row['successful_stock_out_qty'] + $material_transfer_qty_added;

            $update_stocks = "UPDATE stocks SET pending_order = '$new_pending_order', successful_stock_out_qty = '$new_successful_stock_out_qty' WHERE product_id = '$material_transfer_product_id' AND branch_code = '$branch_code'";
            if($conn->query($update_stocks)===TRUE){
                echo "okidoki";
            } else {
                echo $conn->error;
            }
        }
        
        // Update material_transaction table
        $sql_update_material_transaction = "UPDATE material_transaction SET qty_added = '$quantity_sent', status='3' WHERE id = '$transaction_id'";
        if (!$conn->query($sql_update_material_transaction)) {
            echo "Error updating material_transaction record: " . $conn->error;
            $conn->close();
            exit();
        }
    }

    echo "success";
    $conn->close();
    exit();
}
?>
