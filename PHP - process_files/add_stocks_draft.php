<?php
include "../admin/session.php";
include "../database/database.php";
require_once "../assets/phpqrcode/qrlib.php";
date_default_timezone_set('Asia/Manila');
$currentDateTime = date('Y-m-d H:i:s');




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Open database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    // $barcodeInput = isset($_POST["barcodeInput"]) ? $_POST["barcodeInput"] : "";
    // Generate a random barcode if not provided
    if(!empty($_POST['barcodeInput'])){
        $barcodeInput = $_POST['barcodeInput'];
    } else {
        $characters = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ12345678901234567890";
        $randomized = str_shuffle($characters);
        $randomized = substr($randomized, 0, 16);
        $check_barcode_duplicate = "SELECT barcode FROM product WHERE barcode = '$randomized'";
        $check_barcode_duplicate_res = $conn->query($check_barcode_duplicate);
        if($check_barcode_duplicate_res->num_rows>0){
            $randomizedagain = str_shuffle($characters);
            $randomizedagain = substr($randomizedagain, 0, 15);
            $barcodeInput = $randomizedagain;
        } else {
            $barcodeInput = $randomized;
        }
    }

    // check if barcode already exist
    // $check_barcode_duplication = "SELECT id FROM product WHERE barcode = '$barcodeInput' LIMIT 1";
    // $check_barcode_duplication_result = $conn->query($check_barcode_duplication);
    // if($check_barcode_duplication_result -> num_rows >0){
    //     if(isset($_POST['product_id'])){
    //         echo "barcode already exist";
    //     } else {
    //         header("Location: ../Inventory/barcode_scanner copy/?successful=false&duplicate_barcode=true");
    //     }
    //     $conn->close();
    //     exit();
    // } 
    // check if product already exist in product table
    if (isset($_POST['product_id'])) {
        $last_inserted_id = $_POST['product_id'];

        $bc_product_code_sql = "SELECT barcode FROM product WHERE id = '$last_inserted_id' LIMIT 1";
        $bc_product_code_result = $conn->query($bc_product_code_sql);
        if($bc_product_code_result->num_rows>0){
            $bc = $bc_product_code_result->fetch_assoc();
            $current_barcode = $bc['barcode'];
            if($barcodeInput !== $current_barcode){
                $update_product_barcode = "UPDATE product SET barcode = '$barcodeInput' WHERE id = '$last_inserted_id'";
                $conn->query($update_product_barcode);
            }
        } else {
            
        }
        

        
    } else {
        // if product dont exist yet, create it
        $productName = isset($_POST["product_name"]) ? $_POST["product_name"] : "";
        $brandName = isset($_POST["brand_name"]) ? $_POST["brand_name"] : "";
        $categoryName = isset($_POST["category_name"]) ? $_POST["category_name"] : "";
        $unitName = isset($_POST["unit_name"]) ? $_POST["unit_name"] : "";

        // implode the model
        $models = isset($_POST["models"]) ? $_POST["models"] : [];
        if (!empty($models)) {
            if (is_array($models)) {
                $modelString = implode(", ", $models);
                $modelOutput = $modelString;
            } else {
                $modelOutput = $models;
            }
        } else {
            $modelOutput = "";
        }
        //check if product that the user want to insert already exist
        $check_product_duplication_sql = "SELECT id, barcode FROM product WHERE `name` = '$productName' AND brand_id = '$brandName' AND category_id = '$categoryName' AND unit_id = '$unitName' AND models = '$modelOutput'";
        $check_product_duplication_result = $conn->query($check_product_duplication_sql);
        // if product already exist perform this
        if($check_product_duplication_result->num_rows>0){
            $bc = $check_product_duplication_result->fetch_assoc();
            $current_barcode = $bc['barcode'];
            $last_inserted_id = $bc['id'];
            if($barcodeInput !== $current_barcode){
                $update_product_barcode = "UPDATE product SET barcode = '$barcodeInput' WHERE id = '$last_inserted_id'";
                $conn->query($update_product_barcode);
            }
        } else {
            // if product not exist
            // Check if file was uploaded without errors
            if (isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] == 0) {
                $targetDir = "../uploads/";

                // Get the original file extension
                $fileExtension = pathinfo($_FILES["product_image"]["name"], PATHINFO_EXTENSION);

                // Generate a random filename
                $randomFilename = uniqid() . mt_rand(100000, 999999) . '.' . $fileExtension;
                $targetFile = $targetDir . $randomFilename;

                // Check if file already exists
                if (file_exists($targetFile)) {
                    echo "Sorry, the file already exists.";
                } else {
                    // Attempt to move the uploaded file to the destination directory
                    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
                        echo "The file ". htmlspecialchars($randomFilename). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                $randomFilename = '';
            }

            $insert_data_to_product_sql = "INSERT INTO product SET name = '$productName', category_id = '$categoryName', brand_id = '$brandName', unit_id = '$unitName', models = '$modelOutput', publish_by = '$user_id', barcode = '$barcodeInput', `image` = '$randomFilename'";
            if($conn->query($insert_data_to_product_sql)===TRUE){
                $last_inserted_id = $conn->insert_id; // Corrected property name
            }
        }

        

    }
    $product_id = $last_inserted_id;
    $rack_id = $_POST['rack_id'];
    $rack_qty = $_POST['qty'];
    //update barcode
    $check_qrcode = "SELECT id FROM product WHERE id = '$product_id' LIMIT 1";
    $check_qrcode_result = $conn->query($check_qrcode);
    if($check_qrcode_result->num_rows>0){
        $qrcode = $check_qrcode_result ->fetch_assoc();
        $qrcode_product = $qrcode['qr_code'];
        if(empty($qrcode_product) || !isset($qrcode_product)){
            // Generate unique QR code filename
            $qrFilename = $barcodeInput . "_" . uniqid() . ".png";
            $qrImagePath = "../uploads/" . $qrFilename;

            // Define the desired size of the QR code (in pixels)
            $qrCodeSize = 600; // Adjust this value as needed

            // Generate QR code with the specified size
            QRcode::png($barcodeInput, $qrImagePath, QR_ECLEVEL_H, $qrCodeSize);

            // Update qrimage column with the image file name
            $updateQuery = "UPDATE product SET qr_code = '$qrFilename' WHERE id = '$product_id'";
            if (mysqli_query($conn, $updateQuery)) {
                // Check if files were uploaded
                // header("Location: ../TruckInventory/");
                
            } else {
                echo "Error updating QR code image: " . mysqli_error($conn);
            }
        }
    }

    if(isset($_POST['dealer'])){
        $dealer = $_POST['dealer'];
        $wholesale = $_POST['whole_sale'];
        $srp = $_POST['srp'];

        $check_product_id_in_pricelist_sql = "SELECT * FROM price_list WHERE product_id = '$product_id' LIMIT 1";
        $check_product_id_in_pricelist_res = $conn->query($check_product_id_in_pricelist_sql);
        if($check_product_id_in_pricelist_res->num_rows>0){
            $update_pricelist = "UPDATE price_list SET dealer='$dealer', wholesale = '$wholesale', srp='$srp' WHERE product_id = '$product_id'";
            $conn->query($update_pricelist);
        } else {
            $insert_to_pricelist = "INSERT INTO price_list SET product_id = '$product_id', wholesale = '$wholesale', dealer='$dealer', srp='$srp', publish_by = '$user_id'";
            $conn->query($insert_to_pricelist);
        }
    }

    // Use prepared statement to prevent SQL injection
    $check_product_id_sql = "SELECT * FROM stocks_draft WHERE product_id = ? AND ware_loc_id = ? AND branch_code = ?";
    $stmt = $conn->prepare($check_product_id_sql);
    $stmt->bind_param("sss", $product_id, $rack_id, $branch_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        echo "duplicate entry";
    } else {
        // Insert new product
        $insert_data = "INSERT INTO stocks_draft (product_id, ware_loc_id, product_qty, user_id, date_added, branch_code) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_data);
        $stmt->bind_param("ssssss", $product_id, $rack_id, $rack_qty, $user_id, $currentDateTime, $branch_code);
        if($stmt->execute()) {
            echo "Product added successfully";
        } else {
            echo "Error adding product: " . $conn->error;
        }
    }
    if(isset($_POST['product_name'])){
        header("Location: ../Inventory/barcode_scanner copy/?successful=true");
    }
    // Close prepared statement
    $stmt->close();
    exit();
} else {
    
}


?>
