<?php
include "../admin/session.php";
include "../database/database.php";
// Set the timezone to Philippines
date_default_timezone_set('Asia/Manila');
// Get the current datetime
$currentDateTime = date('Y-m-d H:i:s');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $location_name = strtoupper($_POST['locName']);


    $check_duplicate_sql = "SELECT location_name FROM ware_location WHERE location_name = '$location_name'";
    $check_duplicate_result = $conn->query($check_duplicate_sql);
    if($check_duplicate_result->num_rows > 0 ){
        header("Location: ../Inventory/Rack_Maintenance/?duplicate=true");
        $conn->close();
        exit;
    } else {
        $insert_sql = "INSERT INTO ware_location SET location_name = '$location_name', publish_date = '$currentDateTime', branch_code = '$branch_code', publish_by = '$user_id', status = 1";
        if($conn->query($insert_sql) === TRUE){
            header("Location: ../Inventory/Rack_Maintenance/?duplicate=false");
            $conn->close();
            exit;
        } else {
            header("Location: ../Inventory/Rack_Maintenance/?error=" . $conn->error);
            $conn->close();
            exit;
        }
    }
}
?>
