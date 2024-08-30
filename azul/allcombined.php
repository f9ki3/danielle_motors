<?php
include "../database/database.php";

// Read the JSON file
$json = file_get_contents('../allcombined.json');

// Decode the JSON data into a PHP array
$data = json_decode($json, true);

// Check if the decoding was successful
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON');
}

// Loop through each item and assign the values to variables
foreach ($data as $item) {
    $partcode = $item['partcode'];
    $item_description = $item['item_description'];
    $item_brand = $item['item_brand'];
    $models = $item['models'];
    $unit = $item['unit'];
    $dealer = $item['Dealer'];
    $item_wholesale = $item['item_wholesale'];
    $item_srp = $item['item_srp'];

    if($models === "UNIVERSAL EASTWAY"){
        $models = "included in the produce code";
    }



    // Check if the brand exists and insert if not
    $check_brand = "SELECT * FROM brand WHERE brand_name = '$item_brand'";
    $check_brand_query = mysqli_query($conn, $check_brand);
    if($check_brand_query->num_rows > 0){
        $row = $check_brand_query->fetch_assoc();
        $brand_id = $row['id'];
    } else {
        $insert_brand = "INSERT INTO brand (brand_name) VALUES ('$item_brand')";
        if($conn->query($insert_brand) === TRUE) {
            $brand_id = $conn->insert_id;
        }
    }

    // Check if the unit exists and insert if not
    $check_unit = "SELECT * FROM unit WHERE name = '$unit'";
    $check_unit_query = mysqli_query($conn, $check_unit);
    if($check_unit_query->num_rows > 0){
        $row = $check_unit_query->fetch_assoc();
        $unit_id = $row['id'];
    } else {
        $insert_unit = "INSERT INTO unit (name) VALUES ('$unit')";
        if($conn->query($insert_unit) === TRUE) {
            $unit_id = $conn->insert_id;
        }
    }

   
        // Insert the new product
        $insert_product = "INSERT INTO product (name, brand_id, code, models, unit_id, publish_by) VALUES ('$item_description', '$brand_id', '$partcode', '$models', '$unit_id', 11)";
        if($conn->query($insert_product) === TRUE){
            $product_id = $conn->insert_id;
            $insert_price = "INSERT INTO price_list (product_id, dealer, wholesale, srp) VALUES ('$product_id', '$dealer', '$item_wholesale', '$item_srp')";
            if($conn->query($insert_price) === TRUE){
                
                    echo "successfully inserted";
                

            }
        }

    // Display the contents
    echo "Partcode: " . $partcode . "<br>";
    echo "Item Description: " . $item_description . "<br>";
    echo "Item Brand: " . $item_brand . "<br>";
    echo "Models: " . $models . "<br>";
    echo "Unit: " . $unit . "<br>";
    echo "Dealer: " . $dealer . "<br>";
    echo "Item Wholesale: " . $item_wholesale . "<br>";
    echo "Item SRP: " . $item_srp . "<br><br>";

    // Prepare the array to be encoded into JSON
    $item = [
        "partcode" => $partcode,
        "item_description" => $item_description,
        "item_brand" => $item_brand,
        "models" => $models,
        "unit" => $unit,
        "dealer" => $dealer,
        "item_wholesale" => $item_wholesale,
        "item_srp" => $item_srp
    ];

    // Append the item to the dataArray
    $dataArray[] = $item;
}


$conn->close();
exit;
?>
