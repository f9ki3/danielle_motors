<?php
include_once "../../database/database.php";

$sql = "SELECT COUNT(*) FROM product WHERE active = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<span class="text-700 fw-semi-bold">(' . $row['COUNT(*)'] . ')</span>';
} else {
    echo '<span class="text-700 fw-semi-bold">(05)</span>';
}
?>

