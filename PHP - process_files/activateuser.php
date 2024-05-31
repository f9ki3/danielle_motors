<?php 
include "../admin/session.php";
include "../database/database.php";

if(isset($_GET['user_id'])){
    $emp_user_id =  $_GET['user_id'];
    $user_info_sql = "SELECT user_fname, user_lname FROM user WHERE id = '$emp_user_id' LIMiT 1";
    $user_info = $conn->query($user_info_sql);
    if($user_info->num_rows>0){
        $row=$user_info->fetch_assoc();
        $employee =  $row['user_fname'] . " " . $row['user_lname'];
    }
    

    $deactivate_user = "UPDATE user SET user_status = 0 WHERE id = '$emp_user_id'";
    if($conn->query($deactivate_user)===TRUE){
        
    }
    $description = "Activated the account of " . $employee . "." ;
    // Set the timezone to Philippines
    date_default_timezone_set('Asia/Manila');
    // Get the current datetime
    $currentDateTime = date('Y-m-d H:i:s');
    $insert_to_logs = "INSERT INTO pos_user_logs SET log_date = '$currentDateTime', log_user_id = '$user_id', logs = '$description'";
    if($conn->query($insert_to_logs)===TRUE){

    }   
    header("Location: ../Inventory/User_Maintenance/");
    $conn->close();
    exit;
}