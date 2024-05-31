<?php
include "../admin/session.php";
include "../database/database.php";
$dr_id = $_SESSION['dr_id'];
$log_description = "Saved the Delivery Reciept #:  " . $dr_id . ".";
$insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$id', audit_description = '$log_description'";
$conn->query($log_description);

$update_status = "UPDATE delivery_receipt SET `status` = 1 WHERE id = '$dr_id'";
if($conn->query($update_status) === TRUE ){
    echo "successfully updated!";
    header("Location: ../Inventory/Delivery_Receipt_infos/");
}

$conn->close();
exit;