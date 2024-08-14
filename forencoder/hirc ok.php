<?php
include "../database/database_encode.php";

// Define the path to the JSON file
$jsonFilePath = 'encoded.json';

// Check if the JSON file exists, if not, create it with an empty array
if (!file_exists($jsonFilePath)) {
    file_put_contents($jsonFilePath, json_encode([]));
}

// Query to get all records from the table
$query = "SELECT * FROM `hirc`";
$result = mysqli_query($conn, $query);

// Initialize an array to store the JSON data
$dataArray = [];

// Loop through each row in the result set
while($row = $result->fetch_assoc()) {

    $partcode = $row['code'];
    $description = $row['description'];
    $model = $row['model'];
    $item_wholesale = $row['wholesale'];
    $srp = $row['srp'];

    if (!empty($description) && empty($partcode) && empty($model) && empty($item_wholesale) && empty($srp)) {
        unset($_SESSION['description']);
        $_SESSION['description'] = $description;
    } elseif (empty($description) && !empty($partcode) && !empty($item_wholesale) && !empty($srp)) {
        if (isset($_SESSION['description'])) {
            $description = $_SESSION['description'];
            echo $description . " code:" . $partcode . " model: " . $model . " ws: " . $item_wholesale . " srp: " . $srp . "<br>";
            $_SESSION['code'] = $partcode;

            // Prepare the array to be encoded into JSON
            $item = [
                "partcode" => $partcode,
                "item_description" => $description,
                "item_brand" => "HIRC",
                "models" => $model,
                "item_wholesale" => $item_wholesale,
                "item_srp" => $srp
            ];

            // Append the item to the dataArray
            $dataArray[] = $item;
        }
    } elseif (empty($description) && empty($partcode) && !empty($model) && empty($item_wholesale) && empty($srp)) {
        // Update only the last model in the $dataArray
        if (!empty($dataArray)) {
            // Get the last item in the $dataArray
            $lastEntryIndex = count($dataArray) - 1;

            // Concatenate the new model with the existing one
            $dataArray[$lastEntryIndex]['models'] .= ' ' . $model;

            echo "Updated 'models' in the last item of dataArray: " . $dataArray[$lastEntryIndex]['models'] . "<br>";
        } else {
            echo "No previous data found in the dataArray to update.<br>";
        }
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
