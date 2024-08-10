<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eastway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// File path
$file_path = 'encoded.json';

// Check if the file exists
if (!file_exists($file_path)) {
    // Create the file with an empty JSON array if it does not exist
    file_put_contents($file_path, json_encode([], JSON_PRETTY_PRINT));
}

// SQL query
$table_query = "SELECT * FROM `sun racing table1`";

// Execute query
$result = $conn->query($table_query);

// Check if the query was successful
if ($result) {
    // Initialize array to collect data
    $rows = [];
    
    // Fetch rows
    while ($row = $result->fetch_assoc()) {
        // Check if required fields are not empty
        if (!empty($row['code']) && !empty($row['price'])) {
            $part_code = htmlspecialchars($row['code']);
            $part_name = htmlspecialchars($row['item description'] . " " . $row['model or size or color'] . " " . $row['package details'] . " " . $row['unit']);
            $model = htmlspecialchars($row['model or size or color']);
            $srp = isset($row['price']) ? $row['price'] : 0;

            
            // Calculate wholesale price (30% less than SRP)
            $item_wholesale = $srp - ($srp * 0.30);

            // Add formatted data to array
            $rows[] = array(
                "partcode" => $part_code,
                "item_description" => $part_name,
                "item_brand" => "SUN RACING",
                "models" => $model,
                "item_wholesale" => $item_wholesale,
                "item_srp" => $srp
            );
        }
    }

    // Write the collected data to the JSON file
    if (count($rows) > 0) {
        file_put_contents($file_path, json_encode($rows, JSON_PRETTY_PRINT));
    }
} else {
    echo "Error: " . $conn->error;
}

// Close connection
$conn->close();
?>
