<?php
// Get the posted data
$postData = file_get_contents("php://input");

// If data is JSON, decode it
$data = json_decode($postData, true);

// If JSON decoding failed, exit with error
if ($data === null) {
    http_response_code(400); // Bad request
    echo json_encode(array("error" => "Invalid JSON data"));
    exit();
}

// Append the data to chats.json file
$file = 'chats.json';
$currentData = file_get_contents($file);
$currentDataArray = json_decode($currentData, true);
if ($currentDataArray === null) {
    $currentDataArray = array(); // If JSON decoding failed or file is empty, initialize as empty array
}
$currentDataArray[] = $data;
file_put_contents($file, json_encode($currentDataArray));

// Send response
echo json_encode(array("success" => true));
?>
