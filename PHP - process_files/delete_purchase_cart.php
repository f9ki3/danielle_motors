<?php
include "../admin/session.php";
include "../database/database.php";
$transaction_id = $_SESSION['invoice'];

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $delete_pc = "DELETE FROM purchase_cart WHERE TransactionID ='$transaction_id' AND ProductID='$product_id'";
    if($conn->query($delete_pc)===TRUE){
        echo "Successfully deleted!";
    } else {
        echo "Calm down honey!";
    }
    // echo $product_id;
} else {
    echo "godbless!";
}