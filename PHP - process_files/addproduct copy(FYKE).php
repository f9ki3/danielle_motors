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
    $srp = $_POST['srp'];
    $dealer = $_POST['dealer'];
    $wholesale = $_POST['wholesale'];

    if (!is_numeric($category)) {
        $query = 'INSERT INTO category 
                        (date_added, category_name, publish_by, status)
                    VALUES (?,?,?,?)';
        $date = date('Y-m-d');
        $author = 'admin';
        $status = 1;
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssi', $date, $category, $author, $status);
        $stmt->execute();
        $category_id = $stmt->insert_id;
        $stmt->close();
    } else {
        $category_id = $category;
    }

    if (!is_numeric($brand)) {
        $query = 'INSERT INTO brand
        (brand_name, publish_by, status)
            VALUES (?,?,?)';
        $author = 'admin';
        $status = 1;
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssi', $brand, $author, $status);
        $stmt->execute();
        $brand_id = $stmt->insert_id;
        $stmt->close();
    } else {
        $brand_id = $brand;
    }

    if (!is_numeric($unit)) {
        $query = 'INSERT INTO unit
                    (name, active)
                VALUES (?,?)';
        $status = 1;
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $unit, $status);
        $stmt->execute();
        $unit_id = $stmt->insert_id;
        $stmt->close();
    } else {
        $unit_id = $unit;
    }

    $model_names = explode(', ', $models);
    foreach ($model_names as $model_name) {
        $pattern = '/[[:<:]]'.$model_name.'[[:>:]]/';
        $query = "SELECT COUNT(*) FROM model WHERE model_name REGEXP '$pattern'";
        $result = $conn->query($query);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        $row = $result->fetch_assoc();
        $count = $row['COUNT(*)'];

        if ($count > 0) {
            continue;
        }

        $status = 1;
        $insertQuery = "INSERT INTO model (model_name, status) VALUES (?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param('si', $model_name, $status);
        $stmt->execute();
        $stmt->close();
    }

    // Prepare a parameterized SQL statement
    $check_duplicate_sql = "SELECT id FROM product WHERE name = ? AND models = ? AND unit_id = ? AND category_id = ? AND brand_id = ? AND active = 1 LIMIT 1";

    // Prepare the statement
    $stmt_check = $conn->prepare($check_duplicate_sql);

    // Bind parameters with values
    $stmt_check->bind_param("ssiii", $product_name, $models, $unit_id, $category_id, $brand_id);
    // Binago ko yung unit, category, and brand sa bind_param para naka align siya dun sa code ko
    // na pwede mag-add ng brand, unit, category sa add product na

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
        header("Location: ../Inventory/Purchase_Warehouse/?duplicate=true");
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
    $stmt->bind_param('sssssiiiii', $product_name, $code, $supplier_code, $image, $models, $unit_id, $brand_id, $category_id, $active, $user_id);
    if ($stmt) {
        if ($stmt->execute()) {
            $product_id = $stmt->insert_id;
            $stmt->close();

            $query = 'INSERT INTO price_list (product_id, dealer, wholesale, srp) VALUES (?,?,?,?)';
            $stmt = $conn->prepare($query);
            $stmt->bind_param('iiii', $product_id, $dealer, $wholesale, $srp);
            if ($stmt->execute()) {
                $stmt->close();
                header('Location: ../Inventory/Purchase_Warehouse/?successful=true');
            }
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