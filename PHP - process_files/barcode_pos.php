<?php
include "../admin/session.php";
include "../database/database.php";
$transaction_id = $_SESSION['invoice'];
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the inputs
    $product_barOrQRcode = isset($_POST['barcode_value']) ? htmlspecialchars($_POST['barcode_value']) : '';
    $product_qty = isset($_POST['qty']) ? intval($_POST['qty']) : 0;

    
    
    $product_id_query = "SELECT 
                            product.id, 
                            product.name, 
                            product.code AS product_sku,
                            product.supplier_code AS product_upc,
                            product.image AS product_image,
                            product.models,
                            product.barcode,
                            category.category_name AS category,
                            brand.brand_name AS brand,
                            unit.name AS unit,
                            product.active,
                            user.user_fname AS user_fname,
                            user.user_lname AS user_lname,
                            price_list.wholesale,
                            price_list.srp
                        FROM product
                        LEFT JOIN category ON category.id = product.category_id
                        LEFT JOIN brand ON brand.id = product.brand_id
                        LEFT JOIN unit ON unit.id = product.unit_id
                        LEFT JOIN user ON user.id = product.publish_by
                        LEFT JOIN price_list ON price_list.product_id = product.id
                        WHERE product.barcode = '$product_barOrQRcode'
                        ORDER BY product.id DESC LIMIT 1";
    $product_check_res = $conn->query($product_id_query);
    if($product_check_res->num_rows > 0){
        $row = $product_check_res->fetch_assoc();
        // Assigning fetched values to variables
        $product_id = $row['id'];
        $product_name = $row['name'];
        $product_sku = $row['product_sku'];
        $product_upc = $row['product_upc'];
        $product_image = $row['product_image'];
        $models = $row['models'];
        $barcode = $row['barcode'];
        $category = $row['category'];
        $brand = $row['brand'];
        $unit = $row['unit'];
        $active = $row['active'];
        $user_fname = $row['user_fname'];
        $user_lname = $row['user_lname'];
        $wholesale = $row['wholesale'];
        $srp = $row['srp'];

        $check_purchase_cart = "SELECT ProductID, Quantity FROM purchase_cart WHERE TransactionID = '$transaction_id' AND ProductID = '$product_id' LIMIT 1";
        $check_purchase_cart_res = $conn->query($check_purchase_cart);
        if($check_purchase_cart_res->num_rows > 0){
            $row = $check_purchase_cart_res->fetch_assoc();
            $current_qty = $row['Quantity'];

            $update_qty = $current_qty + $product_qty;
            
            $update_cart = "UPDATE purchase_cart SET Quantity = '$update_qty' WHERE ProductID = '$product_id' AND TransactionID = '$transaction_id'";
            if($conn->query($update_cart) === TRUE ){
                echo "Successfully added!";
                $conn->close();
                exit;
            }

        } else {
            $insert_cart = "INSERT INTO purchase_cart (ProductID, ProductName, Brand, Model, Unit, SRP, Quantity, TransactionID) VALUES ('$product_id', '$product_name', '$brand', '$models', '$unit', '$srp', '$product_qty', '$transaction_id')";
            if($conn->query($insert_cart) === TRUE ){
                echo "Successfully added!";
                $conn->close();
                exit;
            } else {
                echo "Error: " . $conn->error;
            }
        }
    } else {
        echo "Product doesn't exist in our system!";
        $conn->close();
        exit;
    }

} else {
    echo "Form submission required.";
}
?>
