<?php
include '../config/config.php';

// Check if product_id is set in the AJAX request
if(isset($_POST['product_id'])) {
    // Sanitize the input
    $productId = mysqli_real_escape_string($conn, $_POST['product_id']);

    // Prepare and execute the SQL query to fetch SRP based on product_id
    $sql = "SELECT srp FROM price_list WHERE product_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $productId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $srp);

    // Fetch the result
    mysqli_stmt_fetch($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Return SRP as JSON response
    echo json_encode(['srp' => $srp]);
} else {
    // Return an error response if product_id is not set
    echo json_encode(['error' => 'Product ID is not set']);
}
?>
