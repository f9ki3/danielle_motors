<?php
include "../database/database.php";

$query = "SELECT * FROM product WHERE brand_id = 0";
$result = $conn->query($query);

if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $product_id = $row['id'];
        $product_name = $row['name'];
        $product_model = $row['models'];

        if(strpos($product_name, "GPR ")!==false){
            $update = "UPDATE product SET `brand_id`= '79' WHERE id = '$product_id'";
            if($conn->query($update) === TRUE){
                echo "Record updated successfully product id: " . $product_id . " <br>product name: " . $product_name . "<br>brand: GPR";
            }
            
        } elseif(strpos($product_name, "RCB ")!==false){
            $update = "UPDATE product SET `brand_id`= '121' WHERE id = '$product_id'";
            if($conn->query($update) === TRUE){
                echo "Record updated successfully product id: " . $product_id . " <br>product name: " . $product_name . "<br>brand: RCB";
            }
            
        } elseif(strpos($product_name, "UMA RACING")!==false){
            $update = "UPDATE product SET `brand_id`= '75' WHERE id = '$product_id'";
            if($conn->query($update) === TRUE){
                echo "Record updated successfully product id: " . $product_id . " <br>product name: " . $product_name . "<br>brand: UMA RACING";
            }
            
        } elseif(strpos($product_name, "PROLINER ")!==false){
            $update = "UPDATE product SET `brand_id`= '128' WHERE id = '$product_id'";
            if($conn->query($update) === TRUE){
                echo "Record updated successfully product id: " . $product_id . " <br>product name: " . $product_name . "<br>brand: PROLINER";
            }
            
        } elseif(strpos($product_name, "CMR ")!==false){
            $update = "UPDATE product SET `brand_id`= '133' WHERE id = '$product_id'";
            if($conn->query($update) === TRUE){
                echo "Record updated successfully product id: " . $product_id . " <br>product name: " . $product_name . "<br>brand: CMR";
            }
            
        } elseif(strpos($product_name, "GALFER ")!==false){
            $update = "UPDATE product SET `brand_id`= '131' WHERE id = '$product_id'";
            if($conn->query($update) === TRUE){
                echo "Record updated successfully product id: " . $product_id . " <br>product name: " . $product_name . "<br>brand: GALFER";
            }
            
        } elseif(strpos($product_name, "SOLFILI ")!==false){
            $update = "UPDATE product SET `brand_id`= '130' WHERE id = '$product_id'";
            if($conn->query($update) === TRUE){
                echo "Record updated successfully product id: " . $product_id . " <br>product name: " . $product_name . "<br>brand: SOLFILI";
            }
            
        } elseif(strpos($product_name, "MORNYSTAR ")!==false){
            $update = "UPDATE product SET `brand_id`= '129' WHERE id = '$product_id'";
            if($conn->query($update) === TRUE){
                echo "Record updated successfully product id: " . $product_id . " <br>product name: " . $product_name . "<br>brand: MORNYSTAR";
            }
            
        }
    }
}