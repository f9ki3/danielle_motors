<?php
include "../../database/database.php";

$query = "SELECT * FROM product ORDER BY id DESC LIMIT 14545";
$res = $conn->query($query);
if($res->num_rows>0){
    while($row = $res->fetch_assoc()){
        $product_id = $row['id'];
        $product_name = $row['name'];
        $brand_id = $row['brand_id'];
        if($brand_id == 60){
            $update = "UPDATE product SET brand_id = '' WHERE id = '$product_id'";
            if($conn->query($update) === TRUE){
                echo "successfully reverted<br>";
            }
        }

        if(strpos($product_name, "TGO") !== false){
            $update = "UPDATE product SET brand_id = '17' WHERE id = '$product_id'";
            if($conn->query($update) === TRUE){
                echo "successfully updated to takasago<br>";
            }
        }
    }
}