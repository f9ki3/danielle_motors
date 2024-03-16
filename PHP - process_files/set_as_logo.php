<?php
session_start();
require "../database/database.php";
if(isset($_GET['logo_id'])){
    $logo = $_GET['logo_id'];

    // Disable all images
    $disable_sql = "UPDATE logo SET status = 'DISABLED'";
    if($conn->query($disable_sql) === TRUE){
        // Set the selected image as active logo
        $set_As_logo_sql = "UPDATE logo SET status = 'ACTIVE' WHERE id = '$logo'";
        if($conn->query($set_As_logo_sql) === TRUE ){
            $conn->close();
            header("Location: ../Inventory/Logo_Maintenance/?successful=TRUE");
            exit();
        } else {
            echo "Error setting image as logo: " . $conn->error;
        }
    } else {
        echo "Error disabling all images: " . $conn->error;
    }
}