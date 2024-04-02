<?php
// Start session if not already started
session_start();
include_once "../database/database.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $invoice_id = $_POST['invoice_id'];
    $inspected_by = $_POST['inspected_by']; // Inspected by user
    $verified_by = $_POST['verified_by']; // Verified by user
    $transaction_ids = $_POST['transaction_id']; // Array of transaction IDs
    $qty_sent = $_POST['qty_sent']; // Array of quantities sent
    $sql_0 = "UPDATE material_transfer SET material_inspected_by = '$inspected_by' ,material_verified_by = '$verified_by' WHERE material_invoice = '$invoice_id'";
    if($conn->query($sql_0) === TRUE){

    } else {
        $conn->close();
        exit();
    }

    // Loop through the arrays
    foreach ($transaction_ids as $key => $transaction_id) {
        // Retrieve the corresponding quantity sent
        $quantity_sent = $qty_sent[$key];
        
        // Validate data if necessary

        // Process the data (Update the 'qty_sent' in the database)
        // Make sure to sanitize input to prevent SQL injection
        // Perform database update query
        // Example:
        $sql = "UPDATE material_transaction SET qty_added = '$quantity_sent', status='3' WHERE id = '$transaction_id'";
        $conn->query($sql);
        // Note: Replace $conn with your database connection variable

        // Example:
        if ($conn->query($sql) === TRUE) {
            echo "success";
            
        } else {
            echo "Error updating record: " . $conn->error;
            // header("Location: ../Inventory/Material_transaction/transaction=$invoice_id");
            $conn->close();
            exit();
        }
    }
    // header("Location: ../Inventory/Material_transaction/transaction=$invoice_id");
    $conn->close();
    exit();

    // Provide appropriate feedback to the user (e.g., success/failure messages)
    // Redirect the user after processing
}
?>
