<?php
    require_once '../admin/session.php';
    require_once '../database/database.php';

    //azul ni remove ko lng un back slash para pumasok sa uploads directory "/" 
    $uploadDir = '../uploads/';
    $uploadFile = basename($_FILES['image']['name']);
    $path = $uploadDir . $uploadFile;
    move_uploaded_file($_FILES['image']['tmp_name'], $path);

    
    $image = $uploadFile;
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $unit = $_POST['unit'];
    $models = implode(', ', $_POST['models']);
    $code = $_POST['code'];
    $supplier_code = $_POST['supplier_code'];
    $active = 1;

    // Prepare a parameterized SQL statement
    $check_duplicate_sql = "SELECT id FROM product WHERE name = ? AND models = ? AND unit_id = ? AND category_id = ? AND brand_id = ? AND active = 1 LIMIT 1";

    // Prepare the statement
    $stmt_check = $conn->prepare($check_duplicate_sql);

    // Bind parameters with values
    $stmt_check->bind_param("ssiii", $product_name, $models, $unit, $category, $brand);

    // Set parameter values
    $product_name = $product_name;
    $models = $models;
    $unit = $unit;
    $category = $category;
    $brand = $brand;

    // Execute the query
    $stmt_check->execute();

    // Get the result
    $result_check = $stmt_check->get_result();

    // Check if a duplicate exists
    if ($result_check->num_rows > 0) {
        $conn->close();
        header("Location: ../Inventory/Product_List/?duplicate=true");
        exit;
    }




    if (empty($sku) && empty($upc)) {
        $upc = random_int(100000000, 999999999);
    } else {
        echo "error on sku " . $conn->error;  
        
    }

    $query = 'INSERT INTO product
                (name, code, supplier_code, image, models, unit_id, brand_id, category_id, active, publish_by)
            VALUES (?,?,?,?,?,?,?,?,?,?)';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssssiiiii', $product_name, $code, $supplier_code, $image, $models, $unit, $brand, $category, $active, $user_id);
    if ($stmt) {
        if ($stmt->execute()) {
            $stmt->close();
            header('Location: ../Inventory/Product_List/?successful=true');
        } else {
            die("Error in executing statement: " . $stmt->error);
            $stmt->close();
        }
    } else {
        die("Error in preparing statement: " . $conn->error);
    }

    $conn->close();
    exit();
?>