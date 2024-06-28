<?php
include_once "../../database/database.php";

$sql = "SELECT COUNT(*) as product_count FROM product WHERE active = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['product_count'];
} else {
    // If no products found, return a default value
    echo 0;
}
?>
