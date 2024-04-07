<?php
session_start();
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
