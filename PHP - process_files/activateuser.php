<?php 
include "../admin/session.php";
include "../database/database.php";

if(isset($_GET['user_id'])){
    $user_id =  $_GET['user_id'];

    $deactivate_user = "UPDATE user SET user_status = 0 WHERE id = '$user_id'";
    if($conn->query($deactivate_user)===TRUE){
        header("Location: ../Inventory/User_Maintenance/");
        $conn->close();
        exit;
    }
}