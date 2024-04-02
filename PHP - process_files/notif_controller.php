<?php
session_start();
include "../database/database.php";

// Check if 'doc' parameter is set in the URL
if(isset($_GET['doc'])){
    $document_type = $_GET['doc'];
    $notification_status = $_GET['status'];
    
    if(isset($_GET['doc_id'])){
        $document_id = $_GET['doc_id'];

        if($document_type === "Material Transaction"){
            if($notification_status == 0){
                $updatestatus_sql = "UPDATE notification SET status = 1 WHERE type='$document_type' AND type_id='$document_id'";
                if($conn->query($updatestatus_sql) === TRUE){
                    $conn->close();
                    // echo "tangina";
                    header("Location: ../Inventory/Material_transaction/?transaction=$document_id");
                    exit();
                } else {
                    echo "error updating data";
                }
            } else {
                header("Location: ../Inventory/Material_transaction/?transaction=$document_id");
                exit();
            }
        }
        
    } else {
        if($document_type === "Material Transaction"){
            if($notification_status == 0){
                $updatestatus_sql = "UPDATE notification SET status = 1 WHERE type='$document_type' AND status=0";
                if($conn->query($updatestatus_sql)===TRUE){
                    $conn->close();
                    header("Location: ../Inventory/Material_transfer/");
                    exit();
                } else {
                    echo "error updating data";
                }
            } else {
                header("Location: ../Inventory/Material_transfer/");
                exit();
            }
        }

    }
} else {
    // Handle case when 'doc' parameter is not set
    echo "tangina"; // Output an error message or perform appropriate action
}
?>
