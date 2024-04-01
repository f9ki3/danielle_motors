<?php 
// Assuming your database connection code is already present


// $sql = "SELECT p.`id`, p.`name`, p.`code`, p.`supplier_code`, p.`image`, p.`models`, pl.`srp`, s.`stocks`, p.`unit_id`, p.`brand_id`, p.`category_id`, b.`brand_name`
// Fetch product data from the database including models and brand_id
$sql = "SELECT p.`id`, p.`name`, p.`code`, p.`supplier_code`, p.`image`, p.`models`, pl.`srp`, p.`unit_id`, p.`brand_id`, p.`category_id`, b.`brand_name`
        FROM `product` p 
        INNER JOIN `brand` b ON p.`brand_id` = b.`id`
        INNER JOIN price_list pl ON p.`id` = pl.`product_id`";
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
