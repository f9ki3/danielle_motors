<?php
include "../admin/session.php";
include "../database/database.php";
date_default_timezone_set('Asia/Manila');

$delivered_to = "Danielle Motorparts";  //for the meantime
$user_id = "admin";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $supplier_id = $_POST['supplier_id'];
    $checked_by = $_POST['checked_by'];
    $approved_by = $_POST['approved_by'];
    $delivered_by = $_POST['delivered_by'];
    $received_date = $_POST['received_date'];
    $status = "2"; //incomplete process


    $insert_sql = "INSERT INTO delivery_receipt (supplier_id, delivered_to, status, checked_by, approved_by, delivered_by, received_date, publish_by, branch_code) VALUES ('$supplier_id', '$delivered_to', '$status', '$checked_by', '$approved_by', '$delivered_by', '$received_date', '$user_id', '$branch_code')";
    if($conn -> query($insert_sql) === TRUE ){
        $_SESSION['dr_id'] = $conn->insert_id;
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
