<?php
include "../database/database.php";
// Read the contents of jvt.json
$jsonData = file_get_contents('jvt.json');

// Decode the JSON data into a PHP associative array
$data = json_decode($jsonData, true);

// Check if data was successfully decoded
if ($data === null) {
    echo "Error decoding JSON data.";
    exit;
}
$total_duplicate = 0;
$total_Success = 0;
// Loop through each item in the data
foreach ($data as $item) {
    // Assign each column to a PHP variable
    $partcode = $item['partcode'];
    $item_description = $item['item_description'];
    $item_brand = $item['item_brand'];
    $models = $item['models'];
    $item_wholesale = number_format((float)str_replace(',', '', $item['item_wholesale']), 2, '.', '');
    $item_srp = number_format((float)str_replace(',', '', $item['item_srp']), 2, '.', '');
    
    // Display the data
    echo "Partcode: $partcode<br>";
    echo "Item Description: $item_description<br>";
    echo "Item Brand: $item_brand<br>";
    echo "Models: $models<br>";
    echo "Item Wholesale: $item_wholesale<br>";
    echo "Item SRP: $item_srp<br>";

    $query_Check = "SELECT * FROM product WHERE `name` = '$item_description' AND brand_id = '45' LIMIT 1";
    $result_Check = mysqli_query($conn, $query_Check);
    if($result_Check->num_rows>0){
        $total_duplicate++;
    } else {
        $query_Insert = "INSERT INTO product (`name`, models, brand_id, active, publish_by) VALUES ('$item_description', '$models', 45, 1, 11)";
        if($conn->query($query_Insert) === TRUE){
            $product_id = $conn->insert_id;
            $insert_price = "INSERT INTO price_list (product_id, wholesale, srp) VALUES ('$product_id', '$item_wholesale', '$item_srp')";
            if($conn->query($insert_price) === TRUE ){
                echo "Data inserted successfully<br><br>";
                $total_Success ++;
            }
        }
    }

    
}

echo "total duplicates = " . $total_duplicate;
echo "total success = " . $total_Success;
?>
