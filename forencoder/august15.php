<?php
include "../database/database.php";

// Correct the query to check for brand_id 122 OR 85, handle NULL or empty category, and specify publish_by
$product = "SELECT * FROM product WHERE (brand_id = 122 OR brand_id = 85) AND (category IS NULL OR category = '') AND publish_by = 11";
$res = $conn->query($product);

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $product_id = $row['id'];
        
        // Update only the current product
        $update_product = "UPDATE product SET brand_id = NULL WHERE id = ?";
        
        // Prepare the statement to avoid SQL injection
        if ($stmt = $conn->prepare($update_product)) {
            $stmt->bind_param("i", $product_id); // Bind the product_id as an integer
            if ($stmt->execute()) {
                echo "Record updated successfully for Product ID: $product_id<br><hr>";
            } else {
                echo "Error updating record for Product ID: $product_id<br><hr>";
            }
            $stmt->close();
        }
    }
} else {
    echo "No records found.";
}

$conn->close();
exit;
