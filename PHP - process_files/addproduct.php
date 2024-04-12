<?php
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

    if (empty($sku) && empty($upc)) {
        $upc = random_int(100000000, 999999999);
    } else {
        echo "error on sku " . $conn->error;  
        
    }

    $query = 'INSERT INTO product
                (name, code, supplier_code, image, models, unit_id, brand_id, category_id, active)
            VALUES (?,?,?,?,?,?,?,?,?)';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssssiiii', $product_name, $code, $supplier_code, $image, $models, $unit, $brand, $category, $active);
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