<?php
// Include necessary files
include "../../admin/session.php";
include "../../database/database.php";

// Initialize an array to store product data
$products = [];

// Query to fetch product data from your database
$sql = "SELECT `id`, `name`, `code`, `supplier_code`, `barcode`, `qr_code`, `models`, `unit_id`, `brand_id`, `category_id`, `active`, `publish_by` FROM `product`";

// Perform the query
$result = $conn->query($sql);

if ($result) {
    // Fetch each row and store in $products array
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Close the database connection
    $conn->close();

    // Set appropriate headers for JSON response
    header('Content-Type: application/json');

    // Return JSON-encoded product data
    echo json_encode($products);
} else {
    // If query fails or no products found, return an empty JSON array
    echo json_encode([]);
}

?>
