<?php
include "../database/database.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST["product_id"];
    $original_price = $_POST["original_price"];
    $price = $_POST["price"];
    $discount = $_POST["discount"];
    $total_qty = $_POST["total_qty"];
    $total = $price * $total_qty;

    // Validate and sanitize input (e.g., $dr_id)
    $dr_id = isset($_GET['id']) ? intval($_GET['id']) : null; // Ensure it's an integer
    
    $check_product_duplicate_sql = "SELECT product_id FROM delivery_receipt_content WHERE product_id = '$product_id'";
    $check_product_duplicate_res = $conn->query($check_product_duplicate_sql);
    if($check_product_duplicate_res->num_rows>0){
        $response = array("error" => "Duplicate Entry");
    } elseif ($dr_id === null) {
        // If $dr_id is not valid, return an error response
        $response = array("error" => "Invalid or missing delivery receipt ID");
    } else {
        // Perform database operation
        $insert_sql = "INSERT INTO delivery_receipt_content (delivery_receipt_id, product_id, orig_price, price, discount, quantity, total) VALUES ('$dr_id', '$product_id', '$original_price', '$price', '$discount', '$total_qty', '$total')";
        
        if ($conn->query($insert_sql) === TRUE) {
            // Send success response
            $response = array("success" => "Data inserted successfully");
        } else {
            // Handle database errors
            $response = array("error" => "Error: " . $conn->error);
        }
    }
} else {
    // If the form is not submitted, return an error response
    $response = array("error" => "Form not submitted");
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
