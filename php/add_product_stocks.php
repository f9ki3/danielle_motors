<?php
include '../config/config.php';

// Check if the necessary POST data is set
if(isset($_POST['productId'], $_POST['stocksToAdd'])) {
    // Retrieve data from the AJAX request
    $productId = $_POST['productId'];
    $quantity = $_POST['stocksToAdd'];

    // Prepare the SQL statement
    $sql = "UPDATE product SET stocks = stocks + ? WHERE id = ?";

    // Prepare and bind parameters to the statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $quantity, $productId);

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
