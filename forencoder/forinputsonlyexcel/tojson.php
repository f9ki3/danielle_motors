<?php
include "../../database/database.php";
// Define the path to the JSON file
$jsonFilePath = 'encoded.json';

// Check if the JSON file exists, if not, create it with an empty array
if (!file_exists($jsonFilePath)) {
    file_put_contents($jsonFilePath, json_encode([]));
}

// Initialize an array to store the JSON data
$dataArray = [];


// Query to fetch products with necessary details
$query = 'SELECT 
                product.id, 
                product.name, 
                product.code,
                product.supplier_code,
                product.image,
                product.models,
                product.barcode,
                category.category_name,
                brand.brand_name,
                unit.name AS unit_name,
                product.active,
                user.user_fname,
                user.user_lname,
                price_list.dealer,
                price_list.wholesale,
                price_list.srp
            FROM product
            LEFT JOIN category ON category.id = product.category_id
            LEFT JOIN brand ON brand.id = product.brand_id
            LEFT JOIN unit ON unit.id = product.unit_id
            LEFT JOIN user ON user.id = product.publish_by
            LEFT JOIN price_list ON price_list.product_id = product.id
            ORDER BY product.id DESC LIMIT 14545';

// Execute the query
$result = mysqli_query($conn, $query);

// Check if there are any records
if(mysqli_num_rows($result) > 0) {
    // Loop through each row of the result
    while($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['id'];
        $product_name = $row['name'];

        // Set default value for product code if empty
        $product_code = !empty($row['code']) ? $row['code'] : "not available on the excel file";

        $supplier_code = $row['supplier_code'];
        $product_image = $row['image'];
        $product_models = !empty($row['models']) ? $row['models'] : "Check the item description or product code. If neither is available, use Universal.";

        // Set default value for product barcode if empty
        $product_barcode = !empty($row['barcode']) ? $row['barcode'] : "not available on the excel file";

        $category_name = $row['category_name'];
        $brand_name = !empty($row['brand_name']) ? $row['brand_name'] : "check item description/ from eastway";
        $unit_name = $row['unit_name'];
        $product_active = $row['active'];
        $user_fname = $row['user_fname'];
        $user_lname = $row['user_lname'];
        $dealer = $row['dealer'];
        $wholesale_price = $row['wholesale'];
        $srp_price = $row['srp'];

        // Prepare the array to be encoded into JSON
        $item = [
            "partcode" => $product_code,
            "item_description" => $product_name,
            "item_brand" => $brand_name,
            "models" => $product_models,
            "dealer" => $dealer,
            "item_wholesale" => $wholesale_price,
            "item_srp" => $srp_price
        ];

        // Append the item to the dataArray
        $dataArray[] = $item;
        
        
    }
} else {
    echo "No products found.";
}

// Check if the JSON file already exists and update it
if (file_exists($jsonFilePath)) {
    // Decode the existing data into an array
    $existingData = json_decode(file_get_contents($jsonFilePath), true);

    // Ensure existingData is an array
    if (!is_array($existingData)) {
        $existingData = [];
    }

    // Merge the new data with the existing data
    $mergedData = array_merge($existingData, $dataArray);

    // Encode the merged data back to JSON
    file_put_contents($jsonFilePath, json_encode($mergedData, JSON_PRETTY_PRINT));
} else {
    // If the file doesn't exist (this condition should not happen now), create a new file and encode the data
    file_put_contents($jsonFilePath, json_encode($dataArray, JSON_PRETTY_PRINT));
}


// Close the database connection
mysqli_close($conn);
?>
