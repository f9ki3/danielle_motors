<?php
include "../database/database.php";

// Check if the connection is established
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert brand record
$brand_insert = "INSERT INTO brand SET brand_name = 'TAKASAGO - EASTWAY'";
if ($conn->query($brand_insert) === TRUE) {
    echo "TAKASAGO - EASTWAY record created successfully";
    $brand = $conn->insert_id; // Get the last inserted ID
} else {
    echo "Error: " . $conn->error;
    $conn->close();
    exit;
}

// Query products
$query = "SELECT * FROM product WHERE models = 'Included in the product code'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product_id = $row['id'];
        $product_name = strtoupper($row['name']);
        $brand_id = $row['brand_id'];



        // Check if product name contains "TGO"
        if (strpos($product_name, " TGO") !== false || strpos($product_name, "TGO ") !== false) {
            // Update brand_id for matching products
            $update = "UPDATE product SET brand_id = '$brand' WHERE id = '$product_id'";
            if ($conn->query($update) === TRUE) {
                echo "Brand updated successfully for product $product_name";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
} else {
    echo "No products found with the specified criteria.";
}

$conn->close();
exit;
?>
