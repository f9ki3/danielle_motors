<?php
include "../../database/database.php";
// Fetch one product record at a time
$query = "SELECT 
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
          LIMIT 1 OFFSET ?";
$stmt = $conn->prepare($query);

// Set initial offset (start from the beginning)
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$stmt->bind_param("i", $offset);
$stmt->execute();
$result = $stmt->get_result();

// Fetch product data
if ($row = $result->fetch_assoc()) {
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($row);
} else {
    // No more products to fetch
    echo json_encode(null);
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
