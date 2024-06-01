<?php 
include "../admin/session.php";
include "../database/database.php";

if(isset($_GET['user_id'])){
    $user_id =  $_GET['user_id'];
    $employee_info_sql = "SELECT user_fname, user_lname FROM user WHERE id = '$user_id'";
    $employee_info_sql_res = $conn -> query($employee_info_sql);
    if($employee_info_sql_res->num_rows>0){
        $row = $employee_info_sql_res->fetch_assoc();
        $employee_info = $row['user_fname'] . " " . $row['user_lname'];
    }

    $log_description = "Deactivated the account of " . $employee_info . ".";
    $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$id', audit_description = '$log_description', user_brn_code = '$branch_code'";
    $conn->query($log_description);

    $deactivate_user = "UPDATE user SET user_status = 1 WHERE id = '$user_id'";
    if($conn->query($deactivate_user)===TRUE){
        header("Location: ../Inventory/User_Maintenance/");
        $conn->close();
        exit;
    }
}