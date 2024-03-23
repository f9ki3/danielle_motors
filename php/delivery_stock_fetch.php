<?php
// Include your database connection file here
include '../config/config.php';

$output = array();
$sql = "SELECT p.`id` AS product_id, p.`name` AS product_name, p.`code`, p.`supplier_code`, p.`image`, p.`models`, p.`stocks`, p.`srp`, p.`unit_id`, p.`brand_id`, p.`category_id`, b.`brand_name`,
               m.`id` AS material_id, m.`material_invoice`, m.`material_date`, m.`material_cashier`, m.`material_received_by`, m.`material_inspected_by`, m.`material_verified_by`
        FROM `product` p
        INNER JOIN `brand` b ON p.`brand_id` = b.`id`
        INNER JOIN `material_transfer` m ON p.`id` = m.`product_id`";

$query = mysqli_query($conn, $sql);
$total_all_rows = mysqli_num_rows($query);

$data = array();

while ($row = mysqli_fetch_assoc($query)) {
    $sub_array = array();
    $sub_array[] = $row['product_id'];
    $sub_array[] = $row['product_name'];
    $sub_array[] = $row['code'];
    $sub_array[] = $row['supplier_code'];
    $sub_array[] = $row['image'];
    $sub_array[] = $row['models'];
    $sub_array[] = $row['stocks'];
    $sub_array[] = $row['srp'];
    $sub_array[] = $row['unit_id'];
    $sub_array[] = $row['brand_id'];
    $sub_array[] = $row['category_id'];
    $sub_array[] = $row['brand_name'];
    $sub_array[] = $row['material_id'];

    // Action buttons
    $sub_array[] = '<button class="btn btn-sm border view" id="' . $row['product_id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/></svg></button>
                    <button class="btn btn-sm border delete" data-id="' . $row['product_id'] . '">Delete</button>';

    $data[] = $sub_array;
}

// Return the fetched data
echo json_encode($data);

// Close the connection
mysqli_close($conn);

?>
