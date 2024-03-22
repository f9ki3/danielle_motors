<?php
include '../config/config.php';

// Retrieve data from the AJAX request
$productId = $_POST['productId'];
$quantity = $_POST['stocksToAdd']; // Update to match the key sent in the AJAX request

// Update product stocks
$sql = "UPDATE product SET stocks = stocks + $quantity WHERE id = $productId";

if (mysqli_query($conn, $sql)) {
    echo "Product stocks updated successfully!";
} else {
    echo "Error updating product stocks: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
