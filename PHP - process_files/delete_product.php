<?php
include "../database/database.php";

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $delete = "UPDATE product SET active = 2 WHERE id = '$product_id'";
    if($conn->query($delete) === true){
        // Redirect back to the referring page after update
        header("Location: " . $_SERVER['HTTP_REFERER']);
        
    }
}

$conn->close();
exit;