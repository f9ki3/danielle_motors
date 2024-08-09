<?php
include "../database/database.php";

// Step 1: Read the JSON file
$jsonFile = 'Azul YAKIMOTO-last.json';
$jsonData = file_get_contents($jsonFile);

// Step 2: Decode the JSON data into a PHP array
$dataArray = json_decode($jsonData, true);

// Check if decoding was successful
if ($dataArray === null) {
    echo "Failed to decode JSON.";
    exit;
}

// Initialize the update counter and array for part numbers
$updateCount = 0;
$updatedPartNumbers = [];

// Step 3: Display the content
foreach ($dataArray as $item) {
    echo "Part Number: " . $item['Part Number'] . "<br>";
    echo "Description: " . $item['Description'] . "<br>";
    echo "Model: " . $item['Model'] . "<br>";
    echo "Price: $" . $item['Price'] . "<br>";
    echo "Code: " . $item['Code'] . "<br>";
    echo "<hr>"; // Separator for each item
    $partcode = $item['Part Number'];
    $partname = $item['Description'] . " " . $item['Model'];
    $models = $item['Model'];
    if($item['Price'] !== ""){
        $srp = $item['Price'];
    } else {
        $srp = "0";
    }
    $barcode = $item['Code'];
    
    $item_wholesale = $srp - ($srp * 0.3);

    $checkdescription = "SELECT * FROM product WHERE `name` = '$partname' AND code = '$partcode' AND barcode = '$barcode' AND models = '$models' AND brand_id = '23' LIMIT 1";
    $checkdescriptionquery = mysqli_query($conn, $checkdescription);
    if($checkdescriptionquery -> num_rows > 0){
        $row = $checkdescriptionquery -> fetch_assoc();
        $product_id = $row['id'];
        $update_price_list = "UPDATE price_list SET wholesale = '$item_wholesale', srp = '$srp' WHERE product_id = '$product_id'";
        if($conn->query($update_price_list) === TRUE){
            echo "updated<br><hr>";
            $updateCount++; // Increment the update counter
            $updatedPartNumbers[] = $partcode; // Store the part number of updated product
        } else {
            echo "error updating<br><hr>";
        }
    } else {
        $publish_by = 11;
        $insert_to_product = "INSERT INTO product SET `name` = '$partname', active = 1, publish_by = '$publish_by', code = '$partcode', barcode = '$barcode', models = '$models', brand_id = '23' ";
        if($conn->query($insert_to_product) === TRUE){
            $product_id = $conn->insert_id;

            $insert_to_pricelist = "INSERT INTO price_list SET product_id = '$product_id', wholesale = '$item_wholesale', srp = '$srp'";
            if($conn->query($insert_to_pricelist) === TRUE){
                echo "<tr><td colspan='4'>Success</td></tr><hr>";
            }
        }
    }

}

// Display the number of products updated and their part numbers
echo "<h3>Total products updated: $updateCount</h3>";
if ($updateCount > 0) {
    echo "<h4>Updated Part Numbers:</h4>";
    echo "<ul>";
    foreach ($updatedPartNumbers as $partNumber) {
        echo "<li>" . htmlspecialchars($partNumber) . "</li>";
    }
    echo "</ul>";
}

exit;
?>
