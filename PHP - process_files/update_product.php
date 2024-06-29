<?php
include "../database/database.php";
// Check if edit action is set
if (isset($_GET['edit'])) {
    $edit_action = $_GET['edit'];
    $product_id = $_POST['product_id']; // Assuming this is passed via form

    switch ($edit_action) {
        case 'image':
            // Handle image update
            if ($_FILES['product_img']['error'] == UPLOAD_ERR_OK) {
                $file_name = $_FILES['product_img']['name'];
                $file_tmp = $_FILES['product_img']['tmp_name'];
                $upload_path = '../uploads/' . $file_name;
                move_uploaded_file($file_tmp, $upload_path);

                // Update database with new image path
                $update_query = "UPDATE product SET image = '$file_name' WHERE id = '$product_id'";
                $conn->query($update_query);
            }
            break;

        case 'product_name':
            // Handle product name update
            $new_product_name = $_POST['product_name'];
            $update_query = "UPDATE product SET name = '$new_product_name' WHERE id = '$product_id'";
            $conn->query($update_query);
            break;

        case 'product_code':
            // Handle product code update
            $new_product_code = $_POST['product_code'];
            $update_query = "UPDATE product SET code = '$new_product_code' WHERE id = '$product_id'";
            $conn->query($update_query);
            break;

        case 'barcode':
            // Handle barcode update
            $new_barcode = $_POST['barcode'];
            $update_query = "UPDATE product SET barcode = '$new_barcode' WHERE id = '$product_id'";
            $conn->query($update_query);
            break;

        case 'category':
            // Handle category update
            $new_category_id = $_POST['category_id'];
            $update_query = "UPDATE product SET category_id = '$new_category_id' WHERE id = '$product_id'";
            $conn->query($update_query);
            break;

        case 'brand':
            // Handle brand update
            $new_brand_id = $_POST['brand_id'];
            $update_query = "UPDATE product SET brand_id = '$new_brand_id' WHERE id = '$product_id'";
            $conn->query($update_query);
            break;

        case 'models':
            // Handle models update
            $new_models = $_POST['model'];
            $update_query = "UPDATE product SET models = '$new_models' WHERE id = '$product_id'";
            $conn->query($update_query);
            break;

        case 'unit':
            // Handle unit update
            $new_unit_id = $_POST['unit_id'];
            $update_query = "UPDATE product SET unit_id = '$new_unit_id' WHERE id = '$product_id'";
            $conn->query($update_query);
            break;

        case 'wholesale':
            // Handle wholesale price update
            $new_wholesale_price = $_POST['wholesale'];
            $update_query = "UPDATE price_list SET wholesale = '$new_wholesale_price' WHERE product_id = '$product_id'";
            $conn->query($update_query);
            break;

        case 'srp':
            // Handle SRP update
            $new_srp_price = $_POST['srp'];
            $update_query = "UPDATE price_list SET srp = '$new_srp_price' WHERE product_id = '$product_id'";
            $conn->query($update_query);
            break;

        default:
            // Handle any unsupported action
            break;
    }

    // Redirect back to the referring page after update
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
