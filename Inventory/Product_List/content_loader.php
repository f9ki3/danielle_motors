<?php
// Include necessary files
include "../../admin/session.php";
include "../../database/database.php";

// Initialize an empty array for product data
$productData = array();

// Query to fetch product data from your database
$sql = "SELECT `id`, `name`, `code`, `supplier_code`, `barcode`, `qr_code`, `image`, `models`, `unit_id`, `brand_id`, `category_id`, `active`, `publish_by` FROM `product`";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch each row and store in $productData array
    while ($row = $result->fetch_assoc()) {
        $productData[] = $row;
    }
} else {
    echo "No products found.";
}

// Close database connection
$conn->close();

// Convert product data to JSON format
$productDataJson = json_encode($productData);

// Set appropriate headers for JSON response
header('Content-Type: application/json');

// Return JSON-encoded product data
echo $productDataJson;
?>
