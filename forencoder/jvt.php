<?php
include "../database/database_encode.php";

// Define the path to the JSON file
$jsonFilePath = 'jvt.json';

// Check if the JSON file exists, if not, create it with an empty array
if (!file_exists($jsonFilePath)) {
    file_put_contents($jsonFilePath, json_encode([]));
}

// Query to get all records from the table
$query = "SELECT * FROM `jvt`";
$result = mysqli_query($conn, $query);

// Initialize an array to store the JSON data
$dataArray = [];

// Loop through each row in the result set
while($row = $result->fetch_assoc()) {

    $partcode = "";
    $description = $row['description'];
    $model = $row['model'];
    $item_wholesale = $row['Wholesale'];
    $srp = $row['SRP'];

    if(!empty($model) && !empty($item_wholesale) && !empty($srp)){
        // Prepare the array to be encoded into JSON
        $item = [
            "partcode" => $partcode,
            "item_description" => $description,
            "item_brand" => "JVT",
            "models" => $model,
            "item_wholesale" => $item_wholesale,
            "item_srp" => $srp
        ];

        // Append the item to the dataArray
        $dataArray[] = $item;
    }
     
}

// Now handle the JSON file writing part

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
$conn->close();
exit;
?>
