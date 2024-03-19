<?php
// Include your database connection or any required files
include '../config/config.php';

$output = array();
$sql = "SELECT p.`id` AS product_id, m.`date`, p.`name` AS product_name, p.`stocks`, 
                pl.`current_price`, pl.`selling_price`, (pl.`selling_price` - pl.`current_price`) AS markup 
        FROM `material_transfer` m 
        JOIN `product` p ON m.`product_id` = p.`id` 
        JOIN `price_list` pl ON p.`id` = pl.`product_id`"; 

$query = mysqli_query($conn, $sql);
$total_all_rows = mysqli_num_rows($query);

$data = array();

while ($row = mysqli_fetch_assoc($query)) {
    $sub_array = array();
    $sub_array[] = $row['product_id'];
    $sub_array[] = $row['date'];
    $sub_array[] = $row['product_name'];
    $sub_array[] = $row['stocks'];
    $sub_array[] = $row['current_price'];
    $sub_array[] = $row['selling_price'];
    $sub_array[] = $row['markup'];

    // Action buttons
    $sub_array[] = '<button class="btn btn-sm border view" id="' . $row['product_id'] . '">View</button>
                    <button class="btn btn-sm border delete" data-id="' . $row['product_id'] . '">Delete</button>';

    $data[] = $sub_array;
}

$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $total_all_rows,
    "recordsFiltered"   => $total_all_rows,
    "data"              => $data
);

echo json_encode($output);

mysqli_close($conn);
?>
