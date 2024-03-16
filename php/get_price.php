<?php
// Configuration for your MySQL database
include '../config/config.php';

// Check if the product_id is sent via POST
if(isset($_POST['product_id'])) {
    // Retrieve the product_id from the POST data
    $product_id = $_POST['product_id'];
    
    // Prepare SQL statement to fetch price based on product ID
    $stmt = $conn->prepare("SELECT srp FROM price_list WHERE product_id = ?");
    $stmt->bind_param("i", $product_id); // Bind product_id parameter
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Bind result variables
    $stmt->bind_result($price);
    
    // Fetch result
    if ($stmt->fetch()) {
        // Price fetched successfully, return it
        echo $price;
    } else {
        // If product_id is not found, return an error message
        // echo "Price not found for product ID $product_id";
    }
    
    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If product_id is not provided, return an error message
    // echo "Error: Product ID not provided.";
}
?>
