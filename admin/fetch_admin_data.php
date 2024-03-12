<?php
include '../config/config.php';

$sql = "SELECT id, fname, lname FROM admin";
$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Close the connection
mysqli_close($conn);

// Output JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
