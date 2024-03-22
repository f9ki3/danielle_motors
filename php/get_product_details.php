<?php
// Assuming you have a database connection established

// Check if productId is provided in the query string
if(isset($_GET['productId'])) {
    // Sanitize the productId to prevent SQL injection
    $productId = $_GET['productId'];

    // Your SQL query to fetch product details based on the productId
    $sql = "SELECT ProductName, Model, Brand, BasedPrice, SRP, Markup, Stocks, Amount FROM YourTableName WHERE ProductId = :productId";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind the parameter
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);

    // Execute the query
    if($stmt->execute()) {
        // Fetch the product details
        $productDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if product details were found
        if($productDetails) {
            // Return product details as JSON
            echo json_encode($productDetails);
        } else {
            // Product not found
            echo json_encode(['error' => 'Product not found']);
        }
    } else {
        // Error executing the query
        echo json_encode(['error' => 'Failed to fetch product details']);
    }
} else {
    // No productId provided
    echo json_encode(['error' => 'No productId provided']);
}
?>
