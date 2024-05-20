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

    // Calculate the total adjusted price
    $total_adjust = $total_srp - $total_refund_sum;

    // Loop through the product_ids and process only the checked products
    foreach($product_ids as $index => $product_id) {
        // Check if the product is checked before processing
        if(isset($_POST['product_checkbox']) && in_array($product_id, $_POST['product_checkbox'])) {
            $reason = $reasons; // Or you can assign $reason = $reasons[$index]; if each product has a unique reason
            $qty = $qtys[$index];
            $total_refund = $total_refunds[$index];

            $sql = "INSERT INTO returns_customer (user_id, product_id, reason, branch_code, return_date, qty, total_refund, total_srp, total_refund_real, total_adjust, status, transactionID) VALUES ('$user_id', '$product_id', '$reason', '$branch_code', '$return_date', '$qty', '$total_refund', '$total_srp', '$total_refund_sum', '$total_adjust', '$status', '$transactionID')";   
            // Execute the SQL query
            if ($conn->query($sql) === TRUE) {
                echo "New return record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
$conn->close();
?>
