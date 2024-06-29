<?php
include "../../database/database.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT COUNT(*) AS total FROM product";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalCount = $row['total'];
    $pageCount = ceil($totalCount / 10); // Assuming 10 posts per page
    echo json_encode(array('pageCount' => $pageCount));
} else {
    echo json_encode(array('error' => 'No posts found.'));
}

$conn->close();
?>
