<?php
// Including the database connection file
include "../database/database.php";
if(!isset($_SESSION['category'])){
    $_SESSION['category'] = 0;
}
$category_ko = $_SESSION['category'];
if($category_ko == 0 ){
    $response = ""; // Initialize response variable

    $category_sql = "SELECT * FROM category";
    $category_result = $conn->query($category_sql);
    if ($category_result->num_rows > 0) {
        while ($category = $category_result->fetch_assoc()) {
            $category_id = $category['id'];
            $category_name = strtoupper($category['category_name']);
            $break = 0;
            $product_sql = "SELECT * FROM product WHERE category_id = 0";
            $product_result = $conn->query($product_sql);
            if ($product_result->num_rows > 0) {
                while ($product = $product_result->fetch_assoc()) {
                    $product_name = strtoupper($product['name']);
                    $product_id = $product['id'];
                    if (strpos($product_name, $category_name) !== false) {
                        $update_product = "UPDATE product SET category_id = '$category_id' WHERE id = '$product_id'";
                        if ($conn->query($update_product) === TRUE) {
                            $response .= "Response: Product '" . $product_name . "' was successfully updated. Its category is now " . $category_id . "\n";
                            $break = 1;
                            break; // Exit the inner loop once a product is updated
                        } else {
                            $response .= "Error updating product: " . $conn->error . "\n";
                        }
                    }
                }
            } else {
                $response = "update category completed!";
                $_SESSION['category'] = 0;
                // echo $respone . $_SESSION['category'];
            }

            if($break == 1){
                break;
            }

        }
    }
} else {
    $response = "update category completed!";
    $_SESSION['category'] = 0;
}
echo json_encode($response);
$conn->close();
exit;
?>
