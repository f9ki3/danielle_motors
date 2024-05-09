<?php
    session_start();
    require_once '../admin/session.php';
    require_once '../database/database.php';
    $supplier_id = $_SESSION['supplier_id'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if all required fields are present
    if (isset($_POST['product_name']) && isset($_POST['brand_id']) && isset($_POST['brand_name']) && isset($_POST['category_id']) && isset($_POST['category_name']) && isset($_POST['unit']) && isset($_POST['product_model']) && isset($_POST['qty']) && isset($_POST['original_price']) && isset($_POST['price']) && isset($_POST['discount'])) {
        
        // Retrieve the form data
        $drc_id = $_POST['drc_id'];
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $brand_id = $_POST['brand_id'];
        $brand_name = $_POST['brand_name'];
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $unit = $_POST['unit'];
        $product_model = $_POST['product_model'];
        $qty = $_POST['qty'];
        $original_price = $_POST['original_price'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];

        $check_product_duplicate = "SELECT id FROM product WHERE name = '$product_name' AND id != '$product_id'";
        $check_product_duplicate_result = $conn->query($check_product_duplicate);
        if($check_product_duplicate_result->num_rows>0){
            header("Location: ../Inventory/Delivery_Receipt_infos/?duplicate_product=true");
        }

        $check_product_name_change = "SELECT id, name FROM product WHERE id = '$product_id'";
        $check_product_name_change_res = $conn->query($check_product_name_change);
        if($check_product_name_change_res->num_rows>0){
            $check_name = $check_product_name_change_res -> fetch_assoc();
            $current_product_name = $check_name['name'];
            if($product_name != $current_product_name){
                $update_product_name = "UPDATE product SET name = '$product_name', unit_id = '$unit', models = '$product_model' WHERE id = '$product_id'";
                if($conn->query($update_product_name)===TRUE){
                    echo "product update successful!";
                }
            } else {
                echo "no changes on product name";
            }
        }
        $default_brand = 0;
        $check_brand_duplication = "SELECT * FROM brand";
        $check_brand_res = $conn->query($check_brand_duplication);
        if($check_brand_res -> num_rows>0){
            while($brand = $check_brand_res -> fetch_assoc()){
                $brand__id = $brand['id'];
                $brand__name = $brand['brand_name'];
                $brand__name = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $brand__name));
                $converted_brand_name = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $brand_name));
                if($converted_brand_name === $brand__name){
                    $default_brand += 1;
                }
                if($default_brand == 2){
                    break;
                    $last_brand_id = $brand__id;
                }

                
            }
        }

        $updated_brand_sum = $default_brand;
        if($default_brand>=2){
            $update_product_brand = "UPDATE product SET brand_id = '$last_brand_id' WHERE id = '$product_id'";
            if($conn->query($update_product_brand)===TRUE){
                echo "product brand update successful!";
            }
        } else {
            $check_brand_change = "SELECT id, brand_name FROM brand WHERE id = '$brand_id' AND brand_name = '$brand_name'";
            $check_brand_change_res = $conn->query($check_brand_change);
            if($check_brand_change_res->num_rows>0){
                echo "no update on brand";
            } else {
                $update_brand = "UPDATE brand SET brand_name = '$brand_name' WHERE id = '$brand_id'";
                if($conn->query($update_brand)===TRUE){
                    echo "brand successfully updated<br>";
                    echo $default_brand;
                }
            }
        }

        $default_category = 0;
        $check_category_duplication = "SELECT * FROM category";
        $check_category_res = $conn->query($check_category_duplication);
        if($check_category_res -> num_rows>0){
            while($category = $check_category_res -> fetch_assoc()){
                $category__id = $category['id'];
                $category__name = $category['category_name'];
                $category__name = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $category__name));
                $converted_category_name = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $category_name));
                if($converted_category_name === $category__name){
                    $default_category += 1;
                }
                if($default_category == 2){
                    break;
                    $last_category_id = $category__id;
                }

                
            }
        }

        $updated_category_sum = $default_category;
        if($default_category>1){
            $update_product_category = "UPDATE product SET category_id = '$last_category_id' WHERE id = '$product_id'";
            if($conn->query($update_product_category)===TRUE){
                echo "product category update successful!";
            }
        } else {
            $check_category_change = "SELECT id, category_name FROM category WHERE id = '$category_id' AND category_name = '$category_name'";
            $check_category_change_res = $conn->query($check_category_change);
            if($check_category_change_res->num_rows>0){
                echo "no update on category!";
            } else {
                $update_category = "UPDATE category SET category_name = '$category_name' WHERE id = '$category_id'";
                if($conn->query($update_category)===TRUE){
                    echo "category update successful!";
                }
            }
        }

        $update_drc = "UPDATE delivery_receipt_content SET orig_price = '$original_price', price = '$price', discount = '$discount', quantity = '$qty' WHERE id = '$drc_id'";
        if($conn->query($update_drc) === TRUE ){
            echo "update drc successful!";
        } else {
            echo "error updating drc!";
        }

        $update_pricelist = "UPDATE price_list SET dealer = '$original_price', srp = '$original_price' WHERE product_id = '$product_id'";
        if($conn->query($update_pricelist)===TRUE){
            echo "update pricelist successful!";
        } else {
            echo "error updating pricelist";
        }

        $update_supplier_product_list = "UPDATE supplier_product SET orig_price ='$original_price', price = '$price', discount = '$discount' WHERE supplier_id = '$supplier_id' AND product_id = '$product_id'";
        if($conn->query($update_supplier_product_list) === TRUE){
            echo "supplier product updated successfully!";
        } else {
            echo "error updating supplier_product";
        }

        

        header("Location: ../Inventory/Delivery_Receipt_infos/?update=successful!");
        
        
        // Close the database connection
        // Assuming $conn is your database connection object
        $conn->close();
        exit;
    } else {
        // If required fields are missing, you can redirect the user or display an error message
        echo "All required fields are not provided!";
    }
    
} else {
    // If the form is not submitted via POST method, you can redirect the user or display an error message
    echo "Form is not submitted!";
    // Close the database connection
    // Assuming $conn is your database connection object
    $conn->close();
    exit;
}

// Close the database connection
// Assuming $conn is your database connection object
$conn->close();
exit;
?>
