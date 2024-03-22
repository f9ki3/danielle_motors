<?php 
// Assuming your database connection code is already present
// Fetch product data from the database including models and brand_id
$sql = "SELECT `product_id`, `orig_price`, `price` FROM `delivery_receipt_content`";
$productResult = $conn->query($sql);

// Check if the query was successful
if ($productResult) {
    $products = $productResult->fetch_all(MYSQLI_ASSOC);
} else {
    // Handle the error appropriately
    die("Error fetching products: " . $conn->error);
}

$productResult->close();

// Close the connection
$conn->close();
?>
