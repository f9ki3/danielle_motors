<?php 
include "../../database.php";
$user_position = "hotdog";
$user_permissions_sql = "SELECT permission FROM user_positions WHERE position_name = '$user_position'";
$user_permissions_res = $conn->query($user_permissions_sql);
if($user_permissions_res->num_rows>0){
    while($row=$user_permissions_res->fetch_assoc()){
        $permission = $row['permission'];
    }
}