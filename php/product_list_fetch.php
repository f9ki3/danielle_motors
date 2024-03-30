<?php
include '../admin/session.php';
include '../config/config.php';

$output = array();
$sql = "SELECT p.id, p.name, p.code, p.supplier_code, p.image, p.models, pl.srp, s.stocks, s.branch_code, p.unit_id, p.brand_id, p.category_id, b.brand_name 
        FROM product p 
        INNER JOIN brand b ON p.brand_id = b.id 
        INNER JOIN price_list pl ON p.id = pl.product_id 
        INNER JOIN stocks s ON p.id = s.product_id 
        WHERE p.active = 1 AND s.branch_code = '$branch_code'";

// Array to map column indexes to column names for searching and filtering
$columns = array(
    1 => 'name',
    2 => 'models',
    3 => 'brand_name',
    4 => 'supplier_code',
    5 => 'unit_id',
    6 => 'stocks',
    7 => 'code'
);

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
} else {
    $sql .= " ORDER BY name ASC"; // Default sorting if no specific order is requested
}

// Pagination
if ($_POST['length'] != -1) {
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT $start, $length";
}

$query = mysqli_query($conn, $sql);
$total_all_rows = mysqli_num_rows($query);

$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $sub_array = array();
    $sub_array[] = '<img src="' . $row['image'] . '" alt="Product Image" style="max-width: 50px; max-height: 50px;">';
    $sub_array[] = $row['name'];
    $sub_array[] = $row['models'];
    $sub_array[] = $row['brand_name'];
    $sub_array[] = $row['supplier_code'];
    $sub_array[] = $row['unit_id'];
    $sub_array[] = $row['stocks'];
    $sub_array[] = $row['code'];

    // Determine availability based on stocks
    $availability = ($row['stocks'] > 0) ? 'Available' : 'Unavailable';
    $sub_array[] = $availability;

    $sub_array[] = '<button class="btn btn-sm border view" id="' . $row['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/></svg></button>
                    <button class="btn btn-sm border delete" data-id="' . $row['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/></svg></button>';

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
