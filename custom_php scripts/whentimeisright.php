<?php
include "../database/database.php";
// Path to the JSON file
$output_file = '../jsons/final.json';

// Check if the JSON file exists
if (!file_exists($output_file)) {
    die('JSON file not found.');
}

// Read the JSON file
$json_data = file_get_contents($output_file);

// Decode the JSON data
$items = json_decode($json_data, true);

// Check if the JSON data was properly decoded
if (!is_array($items)) {
    die('Error decoding JSON data.');
}

echo "<table border='1'>
<tr>
    <th>#</th>
    <th>Description</th>
    <th>SRP</th>
    <th>Discounted Price</th>
</tr>";

// Initialize row number
$row_number = 1;

// Loop through each item and display the required fields
foreach ($items as $item) {
    echo "<tr>";
    echo "<td>" . $row_number . "</td>";
    echo "<td>" . htmlspecialchars($item['description']) . "</td>";
    echo "<td>" . number_format($item['SRP'], 2) . "</td>";
    echo "<td>" . number_format($item['discounted_price'], 2) . "</td>";
    echo "</tr>";

    $item_description = $item['description'];
    $item_srp = $item['SRP'];
    $item_price = $item['discounted_price'];
    $item_wholesale = $item_srp - ($item_srp * 0.3);
    $check_if_product_exist = "SELECT * FROM product WHERE `name` = '$item_description' AND brand_id = '23' LIMIT 1";
    $first_res = $conn->query($check_if_product_exist);
    if($first_res->num_rows>0){
        $row=$first_res ->fetch_assoc();
        $product_id = $row['id'];
        $update_product = "UPDATE product SET brand_id = '23' WHERE id = '$product_id'";
        if($conn->query($update_product) === TRUE){
        $update_price_list = "UPDATE price_list SET dealer = '$item_price', wholesale = '$item_wholesale', srp = '$item_srp' WHERE product_id = '$product_id'";
        if($conn->query($update_price_list) === TRUE ){
            echo "<tr><td colspan='4'>updated</td></tr>";
        }}
    } else {
        $publish_by = rand(0, 1) ? 2 : 11;
        $insert_to_product = "INSERT INTO product SET `name` = '$item_description', active = 1, publish_by = '$publish_by', brand_id = '23'";
        if($conn->query($insert_to_product) === TRUE){
            $product_id = $conn->insert_id;

            $insert_to_pricelist = "INSERT INTO price_list SET product_id = '$product_id', dealer = '$item_price', wholesale = '$item_wholesale', srp = '$item_srp'";
            if($conn->query($insert_to_pricelist) === TRUE){
                echo "<tr><td colspan='4'>Success</td></tr>";
            }
        }
    }
    
    // Increment row number
    $row_number++;
}

echo "</table>";
?>
