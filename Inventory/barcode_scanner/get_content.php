<?php
include "../../database/database.php";

// Check if product_id is set and not empty
if (isset($_POST['barcodeInput']) && !empty($_POST['barcodeInput'])) {
    $sql = "SELECT id FROM product WHERE barcode = ? LIMIT 1";
    $result = $conn->query($sql);

    // Check if a row is found
    if ($row=$result->fetch_assoc()) {
        
        $product_id = $row['id'];
        // Output the product name and model
        echo json_encode(array("product_id" => $product_id));
    } else {
        // Output if product not found
        echo json_encode(array("error" => "Product not found"));
    }
} else {
    // Output if product_id is not set or empty
    echo json_encode(array("error" => "Product ID is required"));
}
