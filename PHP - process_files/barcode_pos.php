<?php
include "../admin/session.php";
include "../database/database.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the inputs
    $product_barOrQRcode = isset($_POST['barcode_value']) ? htmlspecialchars($_POST['barcode_value']) : '';
    $product_qty = isset($_POST['qty']) ? intval($_POST['qty']) : 0;

    // Check if the transaction file exists
    $transaction_file = "../jsons/" . $user_id . "-Transaction.json";
    if (!file_exists($transaction_file)) {
        // Create the transaction file if it doesn't exist
        $transaction_data = [];
    } else {
        // Load existing transaction data
        $transaction_data = json_decode(file_get_contents($transaction_file), true);
    }

    // Check if the barcode already exists in the transaction data
    $barcode_exists = false;
    $existing_qty = 0; // Initialize existing quantity
    foreach ($transaction_data as $key => $transaction) {
        if ($transaction['barcode'] === $product_barOrQRcode) {
            $barcode_exists = true;
            $existing_qty = $transaction['qty']; // Get existing quantity
            // Update product_qty by adding existing_qty
            $product_qty += $existing_qty;
            // Update the quantity in the transaction data
            $transaction_data[$key]['qty'] = $product_qty;
            break;
        }
    }

    if ($barcode_exists) {
        // Save the updated transaction data to the file with pretty print format
        file_put_contents($transaction_file, json_encode($transaction_data, JSON_PRETTY_PRINT));
        echo "Quantity updated successfully. New Quantity: $product_qty";
    } else {
        // Add new transaction data
        $transaction_data[] = array(
            "barcode" => $product_barOrQRcode,
            "qty" => $product_qty
        );

        // Save the transaction data to the file with pretty print format
        file_put_contents($transaction_file, json_encode($transaction_data, JSON_PRETTY_PRINT));
        echo "Transaction added successfully.";
    }

} else {
    echo "Form submission required.";
}
?>
