<?php
// Include your database connection or any required files
include '../config/config.php';

$sql = "SELECT p.`id`, p.`name`, p.`code`, p.`supplier_code`, p.`image`, p.`models`, p.`stocks`, p.`srp`, p.`unit_id`, p.`brand_id`, p.`category_id`, b.`brand_name` 
        FROM `product` p 
        INNER JOIN `brand` b ON p.`brand_id` = b.`id`";
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
