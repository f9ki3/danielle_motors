<?php
include "../admin/session.php";
include "../database/database.php";

$get_last_invoice = "SELECT TransactionID FROM purchase_transactions ORDER BY TransactionID DESC LIMIT 1";
$last_invoice = $conn->query($get_last_invoice);
if($last_invoice->num_rows>0){
    $row = $last_invoice -> fetch_assoc();
    $transaction_id = $row['TransactionID'];
    // Remove all alphabetical characters from the transaction ID
    $transaction_id = preg_replace('/[a-zA-Z]/', '', $transaction_id);

    $new_transaction_id = $transaction_id + 1;

    $insert = "INSERT INTO purchase_transactions SET TransactionID = 'DMP$new_transaction_id', branch_code = '$branch_code'";
    if($conn->query($insert) === TRUE ){
        $_SESSION['invoice'] = "DMP" . $new_transaction_id;
        header("Location: ../Inventory/POS/");
        $conn->close();
        exit;
    }
}