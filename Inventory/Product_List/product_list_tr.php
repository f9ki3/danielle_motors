<?php

include "../../database/database.php";
// Assuming $conn is your database connection

// Query to fetch products with necessary details
$query = 'SELECT 
                product.id, 
                product.name, 
                product.code,
                product.supplier_code,
                product.image,
                product.models,
                product.barcode,
                category.category_name,
                brand.brand_name,
                unit.name AS unit_name,
                product.active,
                user.user_fname,
                user.user_lname,
                price_list.wholesale,
                price_list.srp
            FROM product
            LEFT JOIN category ON category.id = product.category_id
            LEFT JOIN brand ON brand.id = product.brand_id
            LEFT JOIN unit ON unit.id = product.unit_id
            LEFT JOIN user ON user.id = product.publish_by
            LEFT JOIN price_list ON price_list.product_id = product.id
            ORDER BY product.id DESC';

$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->bind_result($product_id, $product_name, $product_code, $product_supplier_code, $product_image, $product_models, $product_barcode, $category_name, $brand_name, $unit_name, $product_active, $user_fname, $user_lname, $wholesale, $srp);

$products = array();

// Fetch each product and store in array
while ($stmt->fetch()) {
    $status = $product_active == 1 ? 'Active' : 'Inactive';

    $products[] = array(
        'id' => $product_id,
        'name' => $product_name,
        'code' => $product_code,
        'supplier_code' => $product_supplier_code,
        'image' => $product_image,
        'models' => $product_models,
        'barcode' => $product_barcode,
        'category_name' => $category_name,
        'brand_name' => $brand_name,
        'unit_name' => $unit_name,
        'active' => $status,
        'publish_by' => $user_fname . ' ' . $user_lname,
        'wholesale' => $wholesale,
        'srp' => $srp
    );
}

$stmt->close();

// Return products as JSON
header('Content-Type: application/json');
echo json_encode($products);
?>
