<?php
require_once '../admin/session.php';
include "../database/database.php";
// Set the timezone to Philippines
date_default_timezone_set('Asia/Manila');
// Get the current datetime
$currentDateTime = date('Y-m-d H:i:s');

// Validate and sanitize input (e.g., $dr_id)
$dr_id = isset($_GET['id']) ? intval($_GET['id']) : null; // Ensure it's an integer

$supplier_id_Sql = "SELECT supplier_id FROM delivery_receipt WHERE id = '$dr_id' LIMIT 1";
$supplier_id_res = $conn -> query($supplier_id_Sql);
if($supplier_id_res->num_rows>0){
    $row=$supplier_id_res->fetch_assoc();
    $supplier_id = $row['supplier_id'];

    $supplier_name_sql = "SELECT supplier_name FROM supplier WHERE id = '$supplier_id' LIMIT 1";
    $supplier_name_res = $conn->query($supplier_name_sql);
    if($supplier_name_res->num_rows>0){
        $row=$supplier_name_res->fetch_assoc();
        $supplier_name = $row['supplier_name'];
        $supplier_name_code = str_replace([' ', 'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'], '', $supplier_name);

    }
} else {

}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    // Retrieve form data
    // $supplier_code = $_POST['supplier_code'];
    if(!empty($_POST['supplier_code'])){
        $supplier_code = $_POST['supplier_code'];
    } else {
        $characters_0 = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ12345678901234567890";
        $randomized_0 = str_shuffle($characters_0);
        $randomized_0 = substr($randomized_0, 0, 16);
        $supplier_code = $supplier_name_code . "-" . $randomized_0;
    }
    if(isset($_POST['product_id'])){
        $product_id = $_POST["product_id"];
    } else {
        if(isset($_POST['product_name'])){
            // Check if file is uploaded without errors
            if (isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] == 0) {
                $targetDir = "../uploads/";
                $fileName = basename($_FILES["product_image"]["name"]);
                $targetPath = $targetDir . $fileName;
                $fileType = pathinfo($targetPath, PATHINFO_EXTENSION);
            
                // Check if file already exists, if not, upload it
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
            $product_name = $_POST['product_name'];
            $product_code = $_POST['product_code'];
            $category = $_POST['category'];
            $brand = $_POST['brand'];
            $unit = $_POST['unit'];
            // $models = $_POST['models'];
            // Check if models were selected
            if (isset($_POST['models']) && !empty($_POST['models'])) {
                // Concatenate selected models into a comma-separated string
                $models = implode(', ', $_POST['models']);
             
            } else {
                // No models were selected
                echo "No models selected.";
            }
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
            
            
            $insert_to_product = "INSERT INTO product (name, code, supplier_code, barcode, `image`, models, unit_id, brand_id, category_id, active) VALUES ('$product_name', '$product_code', '$supplier_code', '$barcode', '$fileName', '$models', '$unit', '$brand', '$category', '1')";
            if($conn->query($insert_to_product) === TRUE){
                // Get the ID of the inserted data
                $inserted_product_id = $conn->insert_id;
            } else {
                $response = array("error" => "Product cant be inserted" . $conn-> error());
            }
        }   
        $product_id = $inserted_product_id; // For example, you can access them using $_POST['fieldname']
    }
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

    // Check if rack and qty arrays are set in the POST data
    if (isset($_POST['rack']) && isset($_POST['qty'])) {
        // Loop through each selected rack and corresponding quantity
        for ($i = 0; $i < count($_POST['rack']); $i++) {
            // Sanitize input to prevent SQL injection (you should use prepared statements instead)
            $rack_id = $_POST['rack'][$i];
            $qty = $_POST['qty'][$i];

            // Execute query - you should use prepared statements for better security
            $insert_to_stocks = "INSERT INTO stocks (product_id, rack_loc_id, expiration_date, stocks, date_added, publish_by, branch_code) VALUES ('$product_id', '$rack_id', '$expiration_date', '$qty', '$currentDateTime', '$user_id', '$branch_code')";
            if($conn->query($insert_to_stocks) === TRUE ){
                // Send success response
                $response = array("success" => "Data inserted successfully");
            } else {
                $response = array("error" => "Error: " . $conn->error);
            }
        }
    } else {
        echo "Rack or quantity data not received.";
    }


    $check_supplier_product_duplicate_sql = "SELECT id FROM supplier_product WHERE product_id = '$product_id' AND supplier_id = '$supplier_id' LIMIT 1";
    $check_supplier_product_duplicate_res = $conn->query($check_supplier_product_duplicate_sql);
    if($check_supplier_product_duplicate_res->num_rows>0){
        
    } else {
        $insert_to_supplier_products = "INSERT INTO supplier_product (date_added, product_id, supplier_code, orig_price, price, discount, `status`, supplier_id) VALUES ('$currentDateTime', '$product_id', '$supplier_code', '$original_price', '$price', '$discount', '1', '$supplier_id')";
        if($conn->query($insert_to_supplier_products) === TRUE ){

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
