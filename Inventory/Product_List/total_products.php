<?php
include_once "../../database/database.php";

$sql = "SELECT 
product.COUNT(*)
FROM product
INNER JOIN category ON category.id = product.category_id
INNER JOIN brand ON brand.id = product.brand_id
INNER JOIN unit ON unit.id = product.unit_id
ORDER BY product.id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<span class="text-700 fw-semi-bold">(' . $row['COUNT(*)'] . ')</span>';
} else {
    echo '<span class="text-700 fw-semi-bold">(05)</span>';
}
?>
