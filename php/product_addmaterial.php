<?php
// Include your database connection or any required files
include '../config/config.php';

// Fetch product data from the database
$sql = "SELECT `id`, `name`, `code`, `supplier_code`, `barcode`, `image`, `models`, `stocks`, `srp`, `unit_id`, `brand_id`, `category_id`, `active` FROM `product` WHERE 1";
$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Close the database connection
mysqli_close($conn);

// Output JSON data
header('Content-Type: application/json');
echo json_encode($data);
?>
