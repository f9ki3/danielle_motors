<?php
include "../admin/session.php";
include "../database/database.php";
$dr_id = $_SESSION['dr_id'];

$update_status = "UPDATE delivery_receipt SET `status` = 1 WHERE id = '$dr_id'";
if($conn->query($update_status) === TRUE ){
    echo "successfully updated!";
    header("Location: ../Inventory/Delivery_Receipt_infos/");
}

$conn->close();
exit;