<?php
require_once "../../admin/session.php";
require_once "../../database/database.php";

if(!isset($_SESSION['dr_changes'])){
    $_SESSION['dr_changes'] = 0;
}

$old_count = $_SESSION['dr_changes'];

if(isset($_GET['id'])){
    $dr_id = $_GET['id'];
    $sql = "SELECT COUNT(*) FROM delivery_receipt_content WHERE delivery_receipt_id ='$dr_id'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $new_count = $row['COUNT(*)'];
    }
}

if($old_count != $new_count){
    echo "changes were made";
} else {
    echo "no changes";
}

