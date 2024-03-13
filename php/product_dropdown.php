<?php 
// Assuming your database connection code is already present
// Fetch category data from the database
$products = "SELECT `id`, `product_name`, `models`  FROM `product`";
$productResult = $conn->query($products);


// Check if the query was successful
if ($productResult) {
    $products = $productResult->fetch_all(MYSQLI_ASSOC);
} else {
    // Handle the error appropriately
    die("Error fetching categories: " . $conn->error);
}

$productResult->close();

// Close the connection
$conn->close();
?>