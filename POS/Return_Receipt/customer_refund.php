<?php
// Include necessary files and configurations
include '../../config/config.php';

// Retrieve data from POST request
$productIDs = json_decode($_POST['productIDs'], true); // Decode JSON string to array
$reason = $_POST['reason'];
$user_brn_code = $_POST['user_brn_code'];

// Set the user ID based on your application logic
$sessionID = ''; // Set the session ID

// Insert data into returns_customer table for each product
foreach ($productIDs as $product_id) {
    // Set total_refund and total_reflected based on your application logic
    $total_refund = 0; // Set the total refund
    $total_reflected = 0; // Set the total reflected
    
    // Prepare and execute SQL statement to insert data into returns_customer table
    $sqlReturns = "INSERT INTO returns_customer (user_id, product_id, reason, branch_code, return_date, qty, status, total_refund, total_reflected) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, ?, 6, ?, ?)";
    $stmtReturns = mysqli_prepare($conn, $sqlReturns);
    
    mysqli_stmt_bind_param($stmtReturns, "iissidd", $sessionID, $product_id, $reason, $user_brn_code, $qty, $total_refund, $total_reflected); // Bind the parameters to the SQL statement    
    
    // Set the quantity based on your application logic
    $qty = 1; // Set the quantity
    
    // Execute the statement
    if (mysqli_stmt_execute($stmtReturns)) {
        // Success message (optional)
        echo "Data inserted successfully for product ID: " . $product_id . "<br>";
    } else {
        // Error message
        echo "Error: " . mysqli_error($conn) . "<br>";
    }
    
    // Close the statement
    mysqli_stmt_close($stmtReturns);
}

// Close the database connection
mysqli_close($conn);
?>
