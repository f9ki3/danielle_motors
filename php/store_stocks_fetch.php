<?php
include '../config/config.php';

$output = array();
$columns = array(
    0 => 'id',
    1 => 'material_invoice',
    2 => 'material_date',
    3 => 'material_cashier',
    4 => 'material_recieved_by',
    5 => 'material_inspected_by',
    6 => 'material_verified_by'
);

$sql = "SELECT `id`, `material_invoice`, `material_date`, `material_cashier`, `material_recieved_by`, `material_inspected_by`, `material_verified_by`, `active` FROM `material_transfer` WHERE `active` = 1";

// Filter by search value
if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " AND (";
    foreach ($columns as $index => $column) {
        $sql .= "`$column` LIKE '%$search_value%' OR ";
    }
    $sql = rtrim($sql, "OR "); // Remove the last 'OR'
    $sql .= ")";
}

// Order by specific column
if (isset($_POST['order'])) {
    $column_index = $_POST['order'][0]['column'];
    $column_name = $columns[$column_index];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY `$column_name` $order";
}

$query = mysqli_query($conn, $sql);
$total_all_rows = mysqli_num_rows($query);

$data = array();

while ($row = mysqli_fetch_assoc($query)) {
    $sub_array = array();
    $sub_array[] = $row['material_invoice'];
    $sub_array[] = $row['material_date'];
    $sub_array[] = $row['material_cashier'];
    $sub_array[] = $row['material_recieved_by'];
    $sub_array[] = $row['material_inspected_by'];
    $sub_array[] = $row['material_verified_by'];
    $sub_array[] = '<button class="btn btn-sm border view" id="' . $row['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/></svg></button>
                    <button class="btn btn-sm border edit" id="' . $row['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/></svg></button>
                    <button class="btn btn-sm border delete" id="' . $row['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/></svg></button>';

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $total_all_rows,
    "recordsFiltered"   => $total_all_rows,
    "data"              => $data
);

echo json_encode($output);
?>