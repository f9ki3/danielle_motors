<?php
// Include necessary files
include "../../admin/session.php";
include "../../database/database.php";

// Query to fetch product data from your database
$sql = "SELECT `id`, `name`, `code`, `supplier_code`, `barcode`, `qr_code`, `image`, `models`, `unit_id`, `brand_id`, `category_id`, `active`, `publish_by` FROM `product`";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize an array to store product data
    $products = array();

    // Fetch each row and store in $products array
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Close database connection
    $conn->close();

    // Set appropriate headers for JSON response
    header('Content-Type: application/json');

    // Return JSON-encoded product data
    echo json_encode($products);
} else {
    // If no products found, return an empty JSON array
    echo json_encode([]);
}

?>
