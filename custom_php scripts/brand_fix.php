<?php
// Including the database connection file
include "../database/database.php";
if(!isset($_SESSION['brand'])){
    $_SESSION['brand'] = 0;
}
$brand_ko = $_SESSION['brand'];
if($brand_ko == 0 ){
    $response = ""; // Initialize response variable

    $brand_sql = "SELECT * FROM brand";
    $brand_result = $conn->query($brand_sql);
    if ($brand_result->num_rows > 0) {
        while ($brand = $brand_result->fetch_assoc()) {
            $brand_id = $brand['id'];
            $brand_name = strtoupper($brand['brand_name']);
            $break = 0;
            $product_sql = "SELECT * FROM product WHERE brand_id = 0";
            $product_result = $conn->query($product_sql);
            if ($product_result->num_rows > 0) {
                while ($product = $product_result->fetch_assoc()) {
                    $product_name = strtoupper($product['name']);
                    $product_id = $product['id'];
                    if (strpos($product_name, $brand_name) !== false) {
                        $update_product = "UPDATE product SET brand_id = '$brand_id' WHERE id = '$product_id'";
                        if ($conn->query($update_product) === TRUE) {
                            $response .= "Response: Product '" . $product_name . "' was successfully updated. Its brand is now " . $brand_id . "\n";
                            // $break = 1;
                            // break; // Exit the inner loop once a product is updated
                        } else {
                            $response .= "Error updating product: " . $conn->error . "\n";
                        }
                    }
                }
            } else {
                $response = "update brand completed!";
                $_SESSION['brand'] = 0;
                // echo $respone . $_SESSION['brand'];
            }

            // if($break == 1){
            //     break;
            // }

        }
    }
} else {
    $response = "update brand completed!";
    $_SESSION['brand'] = 0;
}
echo json_encode($response);
$conn->close();
exit;
?>
