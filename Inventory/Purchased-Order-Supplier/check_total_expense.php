<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
if(!isset($_SESSION['total_expense'])){
    $_SESSION['total_expense'] = 0;
}

$old_total = $_SESSION['total_expense'];
$current_month = date('m');
$check_Total_expenses = "
    SELECT SUM(drc.total) AS total_expenses_this_month
    FROM delivery_receipt AS dr
    INNER JOIN delivery_receipt_content AS drc ON dr.id = drc.delivery_receipt_id
    WHERE SUBSTRING(dr.received_date, 4, 2) = '$current_month'";
$result = $conn->query($check_Total_expenses);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $total_expenses_this_month = $row['total_expenses_this_month'];
    if($check_Total_expenses != $total_expenses_this_month){
        echo json_encode($total_expenses_this_month);
    } else {
        
    }
    

}

$_SESSION['total_expense'] = $total_expenses_this_month;
?>
