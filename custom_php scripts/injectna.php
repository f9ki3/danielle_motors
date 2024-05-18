<?php
include "../database/database.php";
// Read the JSON file
$json_data = file_get_contents('inject.json');

// Decode the JSON data into a PHP array
$data = json_decode($json_data, true);

// Check if data is available
if ($data === null) {
    die('Error decoding JSON data');
}


// Process the data
foreach ($data as $row) {
    $product_name = $row['product_name'] . " " . $row['mm'];
    $product_model = $row['model'];
    $srp = $row['srp'];

    $random_id = array(1, 2, 11, 12, 15, 16);

// Shuffle the array to randomize the order of elements
    shuffle($random_id);

    // Select the first element from the shuffled array
    $selected_id = $random_id[0];
    
    $insert_to_product = "INSERT INTO product SET `name` = '$product_name', models = '$product_model', unit_id = 200, publish_by = '$selected_id'";
    if($conn->query($insert_to_product) === TRUE){
        $product_id = $conn->insert_id;
        $price_list = "INSERT INTO price_list SET product_id = '$product_id', srp = '$srp'";
        if($conn->query($price_list) === TRUE ){
            echo "✔️ successfully inserted  product : " . $product_name . " | model : " . $product_model . " | srp : " . $srp . "<br>";
        }
    }
}

$conn->close();
exit;
?>
