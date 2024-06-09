<?php
include "../admin/session.php";
include "../database/database.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the inputs
    $product_barOrQRcode = isset($_POST['barcode_value']) ? htmlspecialchars($_POST['barcode_value']) : '';
    $product_qty = isset($_POST['qty']) ? intval($_POST['qty']) : 0;

    // Check if the transaction file exists
    $transaction_file = "../jsons/" . $user_id . "-Transaction.json";
    if (!file_exists($transaction_file)) {
        // Create the transaction file if it doesn't exist
        $transaction_data = [];
    } else {
        // Load existing transaction data
        $transaction_data = json_decode(file_get_contents($transaction_file), true);
    }

    // Check if the barcode already exists in the transaction data
    $barcode_exists = false;
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
    } else {
        echo "Product doesn't exist in our system!";
        $conn->close();
        exit;
    }

    $existing_qty = 0; // Initialize existing quantity
    foreach ($transaction_data as $key => $transaction) {
        if ($transaction['barcode'] === $product_barOrQRcode) {
            $barcode_exists = true;
            $existing_qty = $transaction['qty']; // Get existing quantity
            // Update product_qty by adding existing_qty
            $product_qty += $existing_qty;
            // Update the quantity in the transaction data
            $transaction_data[$key]['qty'] = $product_qty;
            break;
        }
    }

    if ($barcode_exists) {
        // Save the updated transaction data to the file with pretty print format
        file_put_contents($transaction_file, json_encode($transaction_data, JSON_PRETTY_PRINT));
        echo "Quantity updated successfully. New Quantity: $product_qty";
    } else {
        // Add new transaction data
        $transaction_data[] = array(
            "barcode" = $product_barOrQRcode,
            "product_id" = $product_id,
            "product_name" = $product_name,
            "brand" = $brand,
            "model" = $models,
            "unit" = $unit,
            "srp" = $srp,
            "qty" = $product_qty,
            "transaction_id" = $_SESSION['invoice'];
        );

        // Save the transaction data to the file with pretty print format
        file_put_contents($transaction_file, json_encode($transaction_data, JSON_PRETTY_PRINT));
        echo "Transaction added successfully.";
    }

} else {
    echo "Form submission required.";
}
?>
