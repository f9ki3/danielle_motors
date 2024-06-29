<?php
// fetch_product_count.php
include "../../database/database.php";
// Fetch count of active products
$sql = "SELECT COUNT(*) AS count FROM product WHERE active = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count = $row['count'];
    echo json_encode(['count' => $count]);  // Return count as JSON
} else {
    echo json_encode(['count' => 0]);  // Return 0 if no products found (optional)
}

$conn->close();
?>
