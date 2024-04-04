<?php
include "../admin/session.php";
include_once "../database/database.php";
date_default_timezone_set('Asia/Manila');
$currentDateTime = date('Y-m-d H:i:s');
$user_id = $id;

// Check if there is an existing row in the table
$result = mysqli_query($conn, "SELECT MAX(po_id) AS max_po_id FROM purchased_order");
$row = mysqli_fetch_assoc($result);

if ($row['max_po_id'] === null) {
    // If no existing row, set $po_id to 1000
    $po_id = 1000;
} else {
    // If existing row(s) found, increment the maximum po_id value by 1
    $po_id = $row['max_po_id'] + 1;
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $supplier_id = $_POST['supp_id'];
    $estimated_total_amount = $_POST['est_total_amount'];
    $selected_products = $_POST['product_id']; // This will be an array of selected product IDs
    $order_quantities = $_POST['order_qty']; // This will be an array of corresponding order quantities
    $estimated_amounts = $_POST['est_amount']; // This will be an array of estimated amounts
    $insert_po = "INSERT INTO purchased_order (po_id, supplier_id, publish_on, total_est_amount, status, requested_by, branch_code) VALUES ('$po_id', '$supplier_id', '$currentDateTime','$estimated_total_amount', '1', '$user_id', '$branch_code')";
    if($conn->query($insert_po) === TRUE){
        $po_id = $conn->insert_id;
        foreach ($selected_products as $index => $product_id) {
            $quantity = $order_quantities[$index];
            $amount = $estimated_amounts[$index];
            if($amount != "-"){
                $final_amount = $amount;
            } else {
                $final_amount = 0;
            }
            $insert_content = "INSERT INTO purchased_order_content_wh (po_id, product_id, order_qty, est_amount) VALUES ('$po_id', '$product_id', '$quantity', '$final_amount')";
            if($conn->query($insert_content) === TRUE){
                
            }
            
        }
            header("Location: ../Inventory/Purchased-Order-supplier/?error=success");
            $conn->close();
            exit();
    }else {
        echo "error inserting to po table.";
        $conn->close();
        exit();
    }
} else {
    // Form not submitted
    echo "Form not submitted.";
}
?>
