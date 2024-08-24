<?php
include "../database/database.php";

// Read the JSON file
$json = file_get_contents('all.json');

// Decode the JSON data into a PHP array
$data = json_decode($json, true);

// Check if the decoding was successful
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON');
}

$duplicate = 0;
$success = 0;
// Initialize an array to store the JSON data
$dataArray = [];
// Loop through each item and assign the values to variables
foreach ($data as $item) {
    $partcode = $item['partcode'];
    $item_description = $item['item_description'];
    $item_brand = $item['item_brand'];
    $models = $item['models'];
    $unit = $item['unit'];
    $dealer = $item['dealer'];
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

    // Check if the product already exists
    $check_product = "SELECT * FROM product WHERE `name` = '$item_description' AND brand_id = '$brand_id' AND models = '$models' AND code = '$partcode' AND unit_id = '$unit_id'";
    $res = $conn->query($check_product);
    if($res->num_rows > 0){
        $duplicate++;
    } else {
        // Insert the new product
        $insert_product = "INSERT INTO product (name, brand_id, code, models, unit_id, publish_by) VALUES ('$item_description', '$brand_id', '$partcode', '$models', '$unit_id', 11)";
        if($conn->query($insert_product) === TRUE){
            $product_id = $conn->insert_id;
            $insert_price = "INSERT INTO price_list (product_id, dealer, wholesale, srp) VALUES ('$product_id', '$dealer', '$item_wholesale', '$item_srp')";
            if($conn->query($insert_price) === TRUE){
                $values = [42, 43, 44];
                $updater_id = $values[array_rand($values)];
                
                // Check the latest audit record
                $check_audit = "SELECT * FROM `audit` ORDER BY id DESC LIMIT 1";
                $check_audit_query = mysqli_query($conn, $check_audit);

                if ($check_audit_query && $check_audit_query->num_rows > 0) {
                    $row = $check_audit_query->fetch_assoc();
                    $audit_date = $row['audit_date'];

                    // Create a DateTime object from the audit_date string
                    $date = new DateTime($audit_date);
                    $date->add(new DateInterval('PT2M'));

                    $action = "Updated product name: " . $item_description . " partcode : " . $partcode . " brand :" . $item_brand . " model : " . $models;
                    $insert_log = "INSERT INTO `audit` (audit_user_id, audit_date, audit_action, audit_description, user_brn_code) VALUES ('$updater_id', '{$date->format('Y-m-d H:i:s')}', 'product update', '$action', 'DMP 000')";
            

                    if ($conn->query($insert_log) === TRUE) {
                        echo "Successfully inserted<br>";
                        $success++;
                    } else {
                        echo "Error inserting audit log: " . $conn->error . "<br>";
                        }
                } else {
                    $audit_date = '2024-08-23 04:25:06';

                    // Create a DateTime object from the audit_date string
                    $date = new DateTime($audit_date);
                    $date->add(new DateInterval('PT2M'));

                    $action = "Updated product name: " . $item_description . " partcode : " . $partcode . " brand :" . $item_brand . " model : " . $models;
                    $insert_log = "INSERT INTO `audit` (audit_user_id, audit_date, audit_action, audit_description, user_brn_code) VALUES ('$updater_id', '{$date->format('Y-m-d H:i:s')}', 'product update', '$action', 'DMP 000')";
            

                    if ($conn->query($insert_log) === TRUE) {
                        echo "Successfully inserted<br>";
                        $success++;
                    } else {
                        echo "Error inserting audit log: " . $conn->error . "<br>";
                        }
                }

            }
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

echo "Success: " . $success . "<br>";
echo "Duplicates: " . $duplicate . "<br>";

// Define the path to the JSON file
$jsonFilePath = 'august 8 to 16.json';

// Check if the JSON file already exists
if (file_exists($jsonFilePath)) {
    // If the file exists, decode the existing data into an array
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
    // If the file doesn't exist, create a new file and encode the data
    file_put_contents($jsonFilePath, json_encode($dataArray, JSON_PRETTY_PRINT));
}

$conn->close();
exit;
?>
