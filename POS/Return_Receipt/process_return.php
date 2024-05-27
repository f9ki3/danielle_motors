<?php
include "../../admin/session.php";
include "../../database/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $product_ids = $_POST['product_id'];
    $reasons = $_POST['reason']; // Fetching all reasons
    $branch_code = $_POST['branch_code'];
    $return_date = $_POST['return_date'];
    $qtys = $_POST['quantity_return'];
    $total_refunds = $_POST['total_refund_amount'];
    $total_srp = $_POST['total_srp']; // Retrieve total_srp
    $status = $_POST['status'];
    $transactionID = $_POST['transactionID']; // Fetch transactionID from the form

    // Calculate the total refund amount for all items
    $total_refund_sum = array_sum($total_refunds);

    // Fetch the total purchase amount from purchase_transactions table
    $sql_total_purchase_amount = "SELECT total FROM purchase_transactions WHERE TransactionID = ?";
    $stmt_total_purchase_amount = $conn->prepare($sql_total_purchase_amount);
    $stmt_total_purchase_amount->bind_param("s", $transactionID);
    $stmt_total_purchase_amount->execute();
    $total_purchase_amount_result = $stmt_total_purchase_amount->get_result();

    // Fetch the total purchase amount
    $total_purchase_amount = 0; // Default value
    if ($total_purchase_amount_result->num_rows > 0) {
        $total_purchase_amount_row = $total_purchase_amount_result->fetch_assoc();
        $total_purchase_amount = $total_purchase_amount_row["total"];
    }

    $stmt_total_purchase_amount->close();

    // Calculate the adjusted total amount
    $total_adjust = $total_purchase_amount - $total_refund_sum;

    // Update the total amount in purchase_transactions table
    $sql_update_total_amount = "UPDATE purchase_transactions SET total = ? WHERE TransactionID = ?";
    $stmt_update_total_amount = $conn->prepare($sql_update_total_amount);
    $stmt_update_total_amount->bind_param("ds", $total_adjust, $transactionID);
    $stmt_update_total_amount->execute();
    $stmt_update_total_amount->close();

    $all_success = true; // Flag to track the overall success of the operation
    $error_message = ''; // Variable to store error messages
    
    // Loop through the product_ids and process only the checked products
    foreach($product_ids as $index => $product_id) {
        // Check if the product is checked before processing
        if(isset($_POST['product_checkbox']) && in_array($product_id, $_POST['product_checkbox'])) {
            $reason = $reasons; // Or you can assign $reason = $reasons[$index]; if each product has a unique reason
            $qty = $qtys[$index];
            $total_refund = $total_refunds[$index];

            // SQL query to insert data into returns_customer table
            $sql = "INSERT INTO returns_customer (user_id, product_id, reason, branch_code, return_date, qty, total_refund, total_srp, total_refund_real, total_adjust, status, transactionID) VALUES ('$user_id', '$product_id', '$reason', '$branch_code', '$return_date', '$qty', '$total_refund', '$total_srp[$index]', '$total_refund_sum', '$total_adjust', '$status', '$transactionID')";
            
            // Execute the SQL query
            if ($conn->query($sql) === TRUE) {
                // Update the purchase_cart table
                $sql_update_cart = "UPDATE purchase_cart SET status = 3 WHERE ProductID = ? AND TransactionID = ?";
                $stmt_update_cart = $conn->prepare($sql_update_cart);
                $stmt_update_cart->bind_param("is", $product_id, $transactionID);
                $stmt_update_cart->execute();
                $stmt_update_cart->close();
            } else {
                $all_success = false;
                $error_message = "Error: " . $sql . "<br>" . $conn->error;
                break; // Stop the loop if there's an error
            }
        } else {
            // If the product is unchecked, update status to 1
            $sql_update_cart = "UPDATE purchase_cart SET status = 1 WHERE ProductID = ? AND TransactionID = ?";
            $stmt_update_cart = $conn->prepare($sql_update_cart);
            $stmt_update_cart->bind_param("is", $product_id, $transactionID);
            $stmt_update_cart->execute();
            $stmt_update_cart->close();
        }
    }

    // If all insertions and updates were successful, update the status of the transaction
    if ($all_success) {
        // Update the status of the transaction to 4
        $sql_update_transaction = "UPDATE purchase_transactions SET status = 3 WHERE TransactionID = ?";
        $stmt_update_transaction = $conn->prepare($sql_update_transaction);
        $stmt_update_transaction->bind_param("s", $transactionID);
        $stmt_update_transaction->execute();
        $stmt_update_transaction->close();

        // Redirect to the same page
        header("Location: ../Return_Receipt/?transaction_code=$transactionID");
        exit();
    } else {
        // Display error message
        echo $error_message;
    }
}

$conn->close();
?>
