<?php
// Include necessary files
require_once '../admin/session.php'; // Ensures user is logged in
include "../database/database.php"; // Includes database connection

// Set the timezone to Philippines
date_default_timezone_set('Asia/Manila');
// Get the current datetime
$currentDateTime = date('Y-m-d H:i:s');

// Validate and sanitize input (e.g., $dr_id)
$dr_id = isset($_GET['id']) ? intval($_GET['id']) : null; // Ensure it's an integer

// Retrieve supplier ID from delivery receipt
$supplier_id_Sql = "SELECT supplier_id FROM delivery_receipt WHERE id = '$dr_id' LIMIT 1";
$supplier_id_res = $conn -> query($supplier_id_Sql);
if($supplier_id_res->num_rows>0){
    $row=$supplier_id_res->fetch_assoc();
    $supplier_id = $row['supplier_id'];

    // Retrieve supplier name
    $supplier_name_sql = "SELECT supplier_name FROM supplier WHERE id = '$supplier_id' LIMIT 1";
    $supplier_name_res = $conn->query($supplier_name_sql);
    if($supplier_name_res->num_rows>0){
        $row=$supplier_name_res->fetch_assoc();
        $supplier_name = $row['supplier_name'];
        // Remove vowels and spaces from supplier name
        $supplier_name_code = str_replace([' ', 'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'], '', $supplier_name);
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    if(!empty($_POST['supplier_code'])){
        $supplier_code = $_POST['supplier_code'];
    } else {
        // Generate a random supplier code if not provided
        $characters_0 = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ12345678901234567890";
        $randomized_0 = str_shuffle($characters_0);
        $randomized_0 = substr($randomized_0, 0, 16);
        $supplier_code = $supplier_name_code . "-" . $randomized_0;
    }

    // Check if product ID is provided
    if(isset($_POST['product_id'])){
        $product_id = $_POST["product_id"];
    } else {
        // Process product details if product ID is not provided
        if(isset($_POST['product_name'])){
            // Check if an image file is uploaded
            if (isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] == 0) {
                // Upload the image file
                $targetDir = "../uploads/";
                $fileName = basename($_FILES["product_image"]["name"]);
                $targetPath = $targetDir . $fileName;
                $fileType = pathinfo($targetPath, PATHINFO_EXTENSION);
                if (!file_exists($targetPath)) {
                    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetPath)) {
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "File already exists. Please rename your file and try again.";
                }
            } else {
                $fileName = "";
            }
            // Retrieve other product details
            $product_name = $_POST['product_name'];
            $product_code = $_POST['product_code'];
            $category = $_POST['category'];
            $brand = $_POST['brand'];
            $unit = $_POST['unit'];
            // Retrieve selected models
            if (isset($_POST['models']) && !empty($_POST['models'])) {
                $models = implode(', ', $_POST['models']);
            } else {
                echo "No models selected.";
            }
            // Check for duplicate product entry
            $check_product_Table_duplicate_sql = "SELECT id FROM product WHERE name = '$product_name' AND brand_id = '$brand'  AND category_id = '$category' AND unit_id = '$unit'  AND models = '$models' LIMIT 1";
            $check_product_Table_duplicate_res = $conn -> query($check_product_Table_duplicate_sql);
            if($check_product_Table_duplicate_res->num_rows>0){
                $product_table_row = $check_product_Table_duplicate_res->fetch_assoc();
                $product_table_id = $product_table_row['id'];
            } else {
                // Generate a random barcode if not provided
                if(!empty($_POST['barcode'])){
                    $barcode = $_POST['barcode'];
                } else {
                    $characters = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ12345678901234567890";
                    $randomized = str_shuffle($characters);
                    $randomized = substr($randomized, 0, 16);
                    $check_barcode_duplicate = "SELECT barcode FROM product WHERE barcode = '$randomized'";
                    $check_barcode_duplicate_res = $conn->query($check_barcode_duplicate);
                    if($check_barcode_duplicate_res->num_rows>0){
                        $randomizedagain = str_shuffle($characters);
                        $randomizedagain = substr($randomizedagain, 0, 15);
                        $barcode = $randomizedagain;
                    } else {
                        $barcode = $randomized;
                    }
                }
                // Insert product details into the database
                $insert_to_product = "INSERT INTO product (name, code, supplier_code, barcode, `image`, models, unit_id, brand_id, category_id, active, publish_by) VALUES ('$product_name', '$product_code', '$supplier_code', '$barcode', '$fileName', '$models', '$unit', '$brand', '$category', '1', '$user_id')";
                if($conn->query($insert_to_product) === TRUE){
                    $product_table_id = $conn->insert_id;
                } else {
                    $response = array("error" => "Product cant be inserted" . $conn-> error());
                }
            }
        }
        // Set product ID for further processing
        $product_id = $product_table_id;
    }
    // Retrieve other form data
    $original_price = $_POST["original_price"];
    $price = $_POST["price"];
    $discount = $_POST["discount"];
    $total_qty = $_POST["total_qty"];
    $total = $price * $total_qty;
    if(isset($_POST['expiration_date'])){
        $expiration_date = $_POST['expiration_date'];
    } else {
        $expiration_date = "";
    }

    // Check for duplicate product entry in delivery receipt content
    $check_product_duplicate_sql = "SELECT product_id FROM delivery_receipt_content WHERE product_id = '$product_id' AND delivery_receipt_id = '$dr_id'";
    $check_product_duplicate_res = $conn->query($check_product_duplicate_sql);
    if($check_product_duplicate_res->num_rows>0){
        $response = array("error" => "Duplicate Entry");
        $conn->close();
        exit;
    } elseif ($dr_id === null) {
        // If $dr_id is not valid, return an error response
        $response = array("error" => "Invalid or missing delivery receipt ID");
    } else {
        // Insert data into delivery receipt content
        $insert_sql = "INSERT INTO delivery_receipt_content (delivery_receipt_id, product_id, orig_price, price, discount, quantity, total) VALUES ('$dr_id', '$product_id', '$original_price', '$price', '$discount', '$total_qty', '$total')";
        if ($conn->query($insert_sql) === TRUE) {
            $response = array("success" => "Data inserted successfully");
        } else {
            $response = array("error" => "Error: " . $conn->error);
        }
    }

    // Check for existing pricelist entry
    $check_pricelist_sql = "SELECT id, dealer FROM price_list WHERE product_id = '$product_id' LIMIT 1";
    $check_pricelist_res = $conn->query($check_pricelist_sql);
    if($check_pricelist_res->num_rows>0){
        $pl_row = $check_pricelist_res->fetch_assoc();
        $pricelist_id = $pl_row['id'];
        $srp = $pl_row['dealer'];
        if($srp<=$original_price){
            // Update pricelist if original price is greater
            $update_pricelist = "UPDATE price_list SET dealer = '$original_price', srp = '$original_price' WHERE id = '$pricelist_id'";
            if($conn->query($update_pricelist)=== TRUE){
                $response = array("success" => "Data inserted successfully");
            } else {
                $response = array("error" => "Error: " . $conn->error);
            }
        } 
    } else {
        // Insert new pricelist entry
        $insert_to_pricelist_sql = "INSERT INTO price_list SET product_id = '$product_id', dealer = '$original_price', srp='$original_price', publish_by = '$user_id'";
        if($conn->query($insert_to_pricelist_sql) === TRUE){
            $response = array("success" => "Data inserted successfully");
        } else {
            $response = array("error" => "Error: " . $conn->error);
        }
    }

    

    // Check for duplicate entry in supplier product table
    $check_supplier_product_duplicate_sql = "SELECT id FROM supplier_product WHERE product_id = '$product_id' AND supplier_id = '$supplier_id' LIMIT 1";
    $check_supplier_product_duplicate_res = $conn->query($check_supplier_product_duplicate_sql);
    if($check_supplier_product_duplicate_res->num_rows>0){
        
    } else {
        // Insert data into supplier product table
        $insert_to_supplier_products = "INSERT INTO supplier_product (date_added, product_id, supplier_code, orig_price, price, discount, `status`, supplier_id) VALUES ('$currentDateTime', '$product_id', '$supplier_code', '$original_price', '$price', '$discount', '1', '$supplier_id')";
        if($conn->query($insert_to_supplier_products) === TRUE ){
            $response = array("success" => "Data inserted successfully");
        } else {
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
$conn->close();
exit();
?>
