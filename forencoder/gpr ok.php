<?php
include "../database/database_encode.php";

// Query to get all records from the table
$query = "SELECT * FROM `gpr`";
$result = mysqli_query($conn, $query);

// Initialize an array to store the JSON data
$dataArray = [];

// Loop through each row in the result set
while($row = $result->fetch_assoc()){
    $partcode = $row['code'];
    $description = $row['model'] . " YM:" . $row['yearmodel'] . "|" . $row['yearmodel2'] . " " . $row['description'] . " " . $row['design'];
    if(!empty($row['srp'])){
        $srp = $row['srp'];
    } else {
        $srp = 0;
    }
    $model = $row['model'];
    $item_wholesale = $srp - ($srp * .3);
    // $item_wholesale = $row['Wholesale'];

    // Prepare the array to be encoded into JSON
    $item = [
        "partcode" => $partcode,
        "item_description" => $description,
        "item_brand" => "GPR",
        "models" => $model,
        "item_wholesale" => $item_wholesale,
        "item_srp" => $srp
    ];

    // Append the item to the dataArray
    $dataArray[] = $item;
}

// Define the path to the JSON file
$jsonFilePath = 'encoded.json';

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

// Close the database connection
$conn->close();
exit;
