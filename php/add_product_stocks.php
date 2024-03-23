<?php
include '../config/config.php';

// Check if the necessary POST data is set
if(isset($_POST['productId'], $_POST['stocksToAdd'], $_POST['srp'])) {
    // Sanitize and validate input data
    $productId = intval($_POST['productId']); // Convert to integer
    $quantity = intval($_POST['stocksToAdd']); // Convert to integer
    $srp = floatval($_POST['srp']); // Convert to float

    if($productId <= 0 || $quantity <= 0 || $srp <= 0) {
        echo "Error: Invalid product ID, quantity, or SRP";
        exit; // Stop execution if input data is invalid
    }

    // Prepare the SQL statement
    $sql = "UPDATE product SET stocks = stocks + ?, srp = ? WHERE id = ?";

    // Prepare and bind parameters to the statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "idi", $quantity, $srp, $productId);

    // Execute the statement
    if(mysqli_stmt_execute($stmt)) {
        echo "Product stocks updated successfully!";
    } else {
        echo "Error updating product stocks: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle case where required POST data is not set
    echo "Error: Required data not provided";
}

// Close the database connection
mysqli_close($conn);
?>
