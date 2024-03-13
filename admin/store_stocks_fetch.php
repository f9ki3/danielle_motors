<?php
include '../config/config.php';

$output = array();
$sql = "SELECT `id`, `material_invoice`, `material_date`, `material_cashier`, `material_recieved_by`, `material_inspected_by`, `material_verified_by` FROM `material_transfer`";

$query = mysqli_query($conn, $sql);
$total_all_rows = mysqli_num_rows($query);

$columns = array(
	0 => 'id',
	1 => 'material_invoice',
	2 => 'material_date',
	3 => 'material_cashier',
	4 => 'material_recieved_by',
	5 => 'material_inspected_by',
	6 => 'material_verified_by',
);

$data = array();

while ($row = mysqli_fetch_assoc($query)) {
    $sub_array = array();
    $sub_array[] = $row['material_invoice'];
    $sub_array[] = $row['material_date'];
    $sub_array[] = $row['material_cashier'];
    $sub_array[] = $row['material_recieved_by'];
    $sub_array[] = $row['material_inspected_by'];
    $sub_array[] = $row['material_verified_by'];
    $sub_array[] = '<button class="btn btn-sm border view" id="' . $row['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye2" viewBox="0 0 16 16"><path d="M1.195 8A7.5 7.5 0 0 1 8 1.195V.5a.5.5 0 0 1 .5-.5h.5a.5.5 0 0 1 .5.5v.695A7.5 7.5 0 0 1 14.805 8c0 .285-.018.567-.054.844a5.5 5.5 0 0 0-.716-.223A6.5 6.5 0 0 0 8 2.195c-.855 0-1.684.167-2.466.476a5.5 5.5 0 0 0-1.073 1.027A7.497 7.497 0 0 1 1.195 8zM8 14.805a7.497 7.497 0 0 1-6.732-6.732C1.167 9.684 1 8.855 1 8a7.497 7.497 0 0 1 6.732-6.732c.457-.038.92-.038 1.366 0A7.497 7.497 0 0 1 14.805 8c0 .446-.038.909-.11 1.366a7.497 7.497 0 0 1-1.366 2.465c-.457.027-.92.04-1.366.04zM8 4.195a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7zm0 1.5a1.998 1.998 0 1 1 0 4 1.998 1.998 0 0 1 0-4z"/></svg></button>
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