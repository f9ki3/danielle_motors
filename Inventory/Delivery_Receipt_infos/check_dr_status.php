<?php 
session_start();
$dr_id = $_SESSION['dr_id'];
include "../../database/database.php";

$check_status = "SELECT `status` FROM delivery_receipt WHERE id = '$dr_id' LIMIT 1";
$check_status_res = $conn->query($check_status);
if($check_status_res->num_rows>0){
    $row = $check_status_res -> fetch_assoc();
    $current_status = $row['status'];

    if($current_status == 1){
        $response = "complete";
    } else {
        $response = "pending";
    }
}

echo json_encode($response);
$conn->close();
exit;