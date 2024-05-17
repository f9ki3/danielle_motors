<?php
include "../../admin/session.php";
include '../config/config.php';

// Check if the necessary POST data is set
if (isset($_POST['productId'], $_POST['input_srp'], $_POST['qty_added'], $_POST['qty_receive'], $_POST['material_invoice_id'], $_POST['user_brn_code'])) {
    // Sanitize and validate input data
    $productId = intval($_POST['productId']); // Convert to integer
    $inputSrp = floatval($_POST['input_srp']); // Convert to float
    $qtyAdded = intval($_POST['qty_added']); // Convert to integer
    $qtyReceived = intval($_POST['qty_receive']); // Convert to integer
    $materialInvoiceId = mysqli_real_escape_string($conn, $_POST['material_invoice_id']);
    $user_brn_code = mysqli_real_escape_string($conn, $_POST['user_brn_code']); // Assuming branch code is a string
    
    // Prepare the SQL statement to insert into material_transaction table
    $sql = "INSERT INTO material_transaction (product_id, material_invoice_id, input_srp, qty_added, qty_receive, branch_code) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters to the statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "isdiss", $productId, $materialInvoiceId, $inputSrp, $qtyAdded, $qtyReceived, $user_brn_code);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Material transaction saved successfully!";
    } else {
        echo "Error saving material transaction: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle case where required POST data is not set
    echo "Error: Required data not provided";
}

// Close the database connection
mysqli_close($conn);
?>