<?php
include "../admin/session.php";
include "../database/database.php";
$transaction_id = $_SESSION['invoice'];
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the inputs
    $product_id = isset($_POST['product_id']) ? htmlspecialchars($_POST['product_id']) : '';
    $product_discount = isset($_POST['discount']) ? htmlspecialchars($_POST['discount']) : '';
    $discount_type = isset($_POST['discount_type']) ? htmlspecialchars($_POST['discount_type']) : '';
    $solution = isset($_POST['solution']) ? htmlspecialchars($_POST['solution']) : '';
    
    $update_cart = "UPDATE purchase_cart SET Discount = '$product_discount', DiscountType = '$discount_type', Solution = '$solution' WHERE ProductID = '$product_id' AND TransactionID = '$transaction_id'";
    if($conn->query($update_cart) === TRUE){
        echo "Discount successfully updated!";
        $conn->close();
        exit;
    }
    // $product_query = "SELECT * FROM purchase_cart WHERE ProductID = '$product_id' AND TransactionID = '$transaction_id' LIMIT 1";
    // $query_resulta = $conn->query($product_query);
    // if($query_resulta->num_rows>0){
    //     $row=$query_resulta->fetch_assoc();
    //     $srp = $row['SRP'];
    //     $quantity = $row['Quantity'];
    // }
} else {
    echo "Form submission required.";
}
?>
