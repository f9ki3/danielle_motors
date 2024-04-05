<?php
include "../../database/database.php";

// Check if product_id is set and not empty
if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    // Prepare and bind the SQL statement with a placeholder for the product id
    $stmt = $conn->prepare("SELECT 
    product.id, 
    product.name AS product_name, 
    product.code,
    product.supplier_code,
    product.image,
    product.models,
    category.category_name,
    brand.brand_name,
    unit.name,
    product.active
FROM product
INNER JOIN category ON category.id = product.category_id
INNER JOIN brand ON brand.id = product.brand_id
INNER JOIN unit ON unit.id = product.unit_id WHERE product.id = ? LIMIT 1");
    $stmt->bind_param("s", $_POST['product_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row is found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row['product_name'];
        $product_model = $row['models'];
        $unit_name = $row['name'];

        // Output the product name and model
        echo json_encode(array("product_name" => $product_name, "product_model" => $unit_name));
    } else {
        // Output if product not found
        echo json_encode(array("error" => "Product not found"));
    }
} else {
    // Output if product_id is not set or empty
    echo json_encode(array("error" => "Product ID is required"));
}
