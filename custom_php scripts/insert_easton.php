<?php
include "../database/database.php";

// Read the JSON file contents
$jsonData = file_get_contents('easton.json');

// Decode the JSON data into PHP associative array
$data = json_decode($jsonData, true);

// Check if decoding was successful
if ($data === null) {
    echo "Error decoding JSON";
} else {
    // Loop through each item and display its contents
    foreach ($data as $item) {
        $product = $conn->real_escape_string($item['name']); // Escape special characters for security
        $item_code =  $conn->real_escape_string($item['code']); // Escape special characters for security
        $price = floatval($item['price']); // Convert to float for security

        $insert_product = "INSERT INTO product SET name = '$product', code = '$item_code', publish_by = 11";
        if($conn->query($insert_product) === TRUE ){
            $inserted_product_id = $conn->insert_id;
            echo "Successfully inserted product: $product<br>";
            $insert_price = "INSERT INTO price_list SET product_id = '$inserted_product_id', dealer = '$price', srp = '$price', publish_by = 11";
            if($conn->query($insert_price) === TRUE ){
                echo "Successfully inserted price: $price<br>";
            } else {
                echo "Error inserting price: " . $conn->error;
            }
        } else {
            echo "Error inserting product: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
exit();
?>
