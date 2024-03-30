<?php
include '../config/config.php';

$sql = "SELECT id, user_fname, user_lname, user_position FROM user";
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
