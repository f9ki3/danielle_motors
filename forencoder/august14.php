<?php
include "../database/database.php";

// Read the JSON file
$jsonFile = 'final.json';
$jsonData = file_get_contents($jsonFile);

// Decode the JSON data into a PHP array
$dataArray = json_decode($jsonData, true);

// Check if the JSON was decoded properly
if ($dataArray === null) {
    die("Error decoding JSON");
}

$total = 0;

// Loop through each item in the array
foreach ($dataArray as $item) {
    // Assign each property to a variable
    $partCode = isset($item['partcode']) ? $item['partcode'] : 'N/A';
    $itemDescription = isset($item['item_description']) ? $item['item_description'] : 'N/A';
    $itemBrand = strtoupper(isset($item['item_brand']) ? $item['item_brand'] : '');
    $models = isset($item['models']) ? $item['models'] : 'N/A';
    $dealer = isset($item['dealer']) ? $item['dealer'] : 'N/A';
    $itemWholesale = isset($item['item_wholesale']) ? $item['item_wholesale'] : 'N/A';
    $itemSRP = isset($item['item_srp']) ? $item['item_srp'] : 'N/A';

    // Get brand_id
    $brand_id = 0; // Default value if no match
    $brandQuery = "SELECT id FROM BRAND WHERE UPPER(brand_name) = '$itemBrand'";
    $brandResult = $conn->query($brandQuery);
    if ($brandResult && $brandResult->num_rows > 0) {
        $brandRow = $brandResult->fetch_assoc();
        $brand_id = $brandRow['id'];
    }

    // Insert into product
    $productQuery = "INSERT INTO product (name, code, brand_id, models, active, publish_by) 
                     VALUES ('$itemDescription', '$partCode', $brand_id, '$models', 1, 11)";
    if ($conn->query($productQuery) === TRUE) {
        $product_id = $conn->insert_id;

        // Insert into price_list
        $priceListQuery = "INSERT INTO price_list (product_id, dealer, wholesale, srp) 
                           VALUES ($product_id, '$dealer', '$itemWholesale', '$itemSRP')";
        if ($conn->query($priceListQuery) === TRUE) {
            $total++;
        }
    }
}

echo "Total successful inputs: " . $total;

// Close the database connection
$conn->close();
?>
