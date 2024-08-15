<?php
include "../database/database.php";

$product = "SELECT * FROM product WHERE brand_id = 122 AND brand_id = 85 AND category = '' AND publish_by = 11";
$res = $conn->query($product);

if($res->num_rows>0){
    while($row = $res->fetch_assoc()){
        $product_id = $row['id'];
        $update_product = "UPDATE product SET brand_id = ''";
        if($conn->query($update_product) === TRUE){
            echo "Record updated successfully<br><hr>";
        }
    }
}

$conn->close();
exit;