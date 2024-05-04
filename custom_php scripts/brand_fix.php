<?php
// Including the database connection file
include "../database/database.php";

$response = ""; // Initialize response variable

$brand_sql = "SELECT * FROM brand";
$brand_result = $conn->query($brand_sql);
if ($brand_result->num_rows > 0) {
    while ($brand = $brand_result->fetch_assoc()) {
        $brand_id = $brand['id'];
        $brand_name = $brand['brand_name'];
        $break = 0;
        $product_sql = "SELECT * FROM product WHERE brand_id = 0";
        $product_result = $conn->query($product_sql);
        if ($product_result->num_rows > 0) {
            while ($product = $product_result->fetch_assoc()) {
                $product_name = $product['name'];
                $product_id = $product['id'];
                if (strpos($product_name, $brand_name) !== false) {
                    $update_product = "UPDATE product SET brand_id = '$brand_id' WHERE id = '$product_id'";
                    if ($conn->query($update_product) === TRUE) {
                        $response .= "Response: Product '" . $product_name . "' was successfully updated. Its brand is now " . $brand_id . "\n";
                        $break = 1;
                        break; // Exit the inner loop once a product is updated
                    } else {
                        $response .= "Error updating product: " . $conn->error . "\n";
                    }
                }
            }
        } else {
            $respone = "update complete!";
        }

        if($break == 1){
            break;
        }

    }
}

echo json_encode($response);

$conn->close();
exit;
?>
