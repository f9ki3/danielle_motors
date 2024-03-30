<?php
// Include the database configuration file
include '../config/config.php';

// Check if product_id is set in the AJAX request
if(isset($_POST['product_id'])) {
    // Sanitize the input
    $productId = mysqli_real_escape_string($conn, $_POST['product_id']);

    // Prepare and execute the SQL query to fetch the maximum quantity
    $query = "SELECT MAX(total_stocks) AS max_stocks
    FROM (
        SELECT SUM(stocks) AS total_stocks
        FROM stocks
        WHERE product_id = ? AND branch_code = 'WAREHOUSE'
        GROUP BY product_id, branch_code
    ) AS max_stocks_query";
    $stmt = mysqli_prepare($conn, $query);
    
    // Bind the product_id parameter
    mysqli_stmt_bind_param($stmt, "i", $productId);
    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $max_inventory = $row['max_stocks'];
    
    // Close the statement
    mysqli_stmt_close($stmt);
    
    // Return the maximum quantity as JSON response
    echo json_encode(['max_qty' => $max_inventory]);
} else {
    // Return an error response if product_id is not set
    echo json_encode(['error' => 'Product ID is not set']);
}
?>
