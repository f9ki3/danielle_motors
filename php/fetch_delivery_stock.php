<?php
// Include your database connection or any required files
include '../config/config.php';

// Check if the material_id is provided in the URL
if (isset($_GET['material_id'])) {
    // Sanitize the material_id to prevent SQL injection
    $materialId = intval($_GET['material_id']);

    // Prepare and execute the SQL query to fetch the data based on the material_id
    $sql = "SELECT p.`id`, p.`name`, p.`code`, p.`supplier_code`, p.`image`, p.`models`, p.`stocks`, p.`srp`, p.`unit_id`, p.`brand_id`, p.`category_id`, b.`brand_name`, p.`material_id` 
            FROM `product` p 
            INNER JOIN `brand` b ON p.`brand_id` = b.`id`
            WHERE p.`material_id` = ?";
            
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $materialId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Output JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // Handle case where material_id is not provided
    echo json_encode(array('error' => 'Material ID not provided'));
}
?>
