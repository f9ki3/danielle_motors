<?php
include '../config/config.php';

$output = array();
// Define columns mapping
$columns = array(
    0 => 'id', // Product ID
    1 => 'image',
    2 => 'name',
    3 => 'models',
    4 => 'brand_name',
    5 => 'qty_added',
    6 => 'created_at', // Assuming 'created_at' holds the date
    7 => 'input_srp',
    8 => 'input_selling_price',
    9 => 'markup_peso',
    10 => 'material_invoice_id'
);

// SQL query to fetch data from product and material_transaction tables
$sql = "SELECT p.`id`, p.`image`, p.`name`, p.`models`, b.`brand_name`, mt.`qty_added`, mt.`created_at`, mt.`input_srp`, mt.`input_selling_price`, mt.`markup_peso`, mt.`material_invoice_id`
        FROM `product` p
        INNER JOIN `material_transaction` mt ON p.`id` = mt.`product_id`
        INNER JOIN `brand` b ON p.`brand_id` = b.`id`";

// Execute the query
$result = mysqli_query($conn, $sql);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $sub_array = array();

    $sub_array[] = $row['image'];
    $sub_array[] = $row['name'];
    $sub_array[] = $row['models'];
    $sub_array[] = $row['brand_name'];
    $sub_array[] = $row['qty_added'];
    $sub_array[] = $row['created_at'];
    $sub_array[] = $row['input_srp'];
    $sub_array[] = $row['input_selling_price'];
    $sub_array[] = $row['markup_peso'];
    // $sub_array[] = '<button class="btn btn-sm border delete" id="' . $row['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/></svg></button>';
    
    $data[] = $sub_array;
}

$output = array(
    "draw" => 1, // Assuming this is the draw number
    "recordsTotal" => count($data),
    "recordsFiltered" => count($data),
    "data" => $data
);

echo json_encode($output);
?>
