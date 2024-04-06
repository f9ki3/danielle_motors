<?php
// Include the session file
include '../admin/session.php';
include '../config/config.php'; // Assuming this includes your database connection

// Now you can use $branch_code in your SQL query
$sql = "SELECT p.id, p.name, p.code, p.supplier_code, p.image, p.models, pl.srp, s.stocks, s.branch_code, p.unit_id, p.brand_id, p.category_id, b.brand_name 
        FROM product p 
        INNER JOIN brand b ON p.brand_id = b.id 
        INNER JOIN price_list pl ON p.id = pl.product_id 
        INNER JOIN stocks s ON p.id = s.product_id 
        WHERE p.active = 1 AND s.branch_code = ?";

// Prepare statement
$stmt = mysqli_prepare($conn, $sql);

// Bind branch_code parameter
mysqli_stmt_bind_param($stmt, "s", $branch_code);

// Execute the query
mysqli_stmt_execute($stmt);

// Get result set
$result = mysqli_stmt_get_result($stmt);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
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

    // Add buttons or actions here (if needed)
    $sub_array[] = '<button class="btn btn-sm border view" id="' . $row['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/></svg></button>
                    <button class="btn btn-sm border delete" data-id="' . $row['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/></svg></button>';

    $data[] = $sub_array;
}

// Close statement
mysqli_stmt_close($stmt);

// Output JSON response
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => count($data), // Total records (considering current fetched data)
    "recordsFiltered"   => count($data), // Total records after filtering (same as total for now)
    "data"              => $data
);

echo json_encode($output);

// Close database connection (if needed)
mysqli_close($conn);
?>
