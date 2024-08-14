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

// Loop through each item in the array and display the data
foreach ($dataArray as $item) {
    echo "Part Code: " . $item['partcode'] . "<br>";
    echo "Item Description: " . $item['item_description'] . "<br>";
    echo "Item Brand: " . $item['item_brand'] . "<br>";
    echo "Models: " . $item['models'] . "<br>";
    echo "Dealer: " . $item['dealer'] . "<br>";
    echo "Item Wholesale: " . $item['item_wholesale'] . "<br>";
    echo "Item SRP: " . $item['item_srp'] . "<br>";
    echo "<hr>"; // Add a horizontal line between items for better readability
}
?>
