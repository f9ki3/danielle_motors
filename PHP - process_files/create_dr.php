<?php
include "../admin/session.php";
include "../database/database.php";
date_default_timezone_set('Asia/Manila');

$delivered_to = "Danielle Motorparts";  //for the meantime
$user_id = $fname ." " . $lname;
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $supplier_id = $_POST['supplier_id'];
    $checked_by = $_POST['checked_by'];
    $approved_by = $_POST['approved_by'];
    $delivered_by = $_POST['delivered_by'];
    $received_date = $_POST['received_date']; //dd/mm/yyyy
    $status = "2"; //incomplete process

    $log_description = "Created Delivery Receipt.";
    $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$id', audit_description = '$log_description'";
    $conn->query($log_description);


    $insert_sql = "INSERT INTO delivery_receipt (supplier_id, delivered_to, status, checked_by, approved_by, delivered_by, received_date, publish_by, branch_code) VALUES ('$supplier_id', '$delivered_to', '$status', '$checked_by', '$approved_by', '$delivered_by', '$received_date', '$user_id', '$branch_code')";
    if($conn -> query($insert_sql) === TRUE ){
        $_SESSION['dr_id'] = $conn->insert_id;
        $dr_id = $_SESSION['dr_id'];

        if(isset($_POST['po_id'])){
            $po_id = $_POST['po_id'];
            $update_po = "UPDATE purchased_order SET `status` = 2 WHERE po_id = '$po_id'";
            $conn->query($update_po);
            $update_dr = "UPDATE delivery_receipt SET po_id = '$po_id' WHERE id = '$dr_id'";
            $conn->query($update_dr);
            // Retrieve the values of product_id, qty, and amount arrays
            $product_ids = $_POST['product_id'];
            $qtys = $_POST['qty'];
            $amounts = $_POST['amount'];

            // Loop through each submitted item
            for ($i = 0; $i < count($product_ids); $i++) {
                // Process each item as needed
                $product_id = $product_ids[$i];
                $qty = $qtys[$i];
                $amount = $amounts[$i];

                // Perform any processing here, such as saving to a database, etc.
                $insert_dr_content = "INSERT INTO delivery_receipt_content SET delivery_receipt_id = '$dr_id', product_id = '$product_id', quantity = '$qty', orig_price = '$amount', price = '$amount'";
                $conn->query($insert_dr_content);
            }
        }
        

        $conn->close();
        header("Location: ../Inventory/Delivery_Receipt_infos/");
        exit();
    }
} else {
    // If someone tries to access this page directly without submitting the form, redirect them
    header("Location: ../Inventory/Create_D.R/?error=undefined"); // Replace index.php with the actual page you want to redirect to
    exit;
}
?>
