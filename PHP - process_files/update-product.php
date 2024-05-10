<?php
    require_once '../database/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK && !empty($_FILES['image']['tmp_name'])) {
            $uploadDir = '../uploads/';
            $uploadFile = basename($_FILES['image']['name']);
            $path = $uploadDir . $uploadFile;
            move_uploaded_file($_FILES['image']['tmp_name'], $path);
            $image = $uploadFile;
        } else {
            $image = $_POST['old_image'];
        }

        if (!is_numeric($_POST['category'])) {
            $query = 'INSERT INTO category 
                            (date_added, category_name, publish_by, status)
                        VALUES (?,?,?,?)';
            $date = date('Y-m-d');
            $author = 'admin';
            $status = 1;
            $stmt = $conn->prepare($query);
            $stmt->bind_param('sssi', $date, $_POST['category'], $author, $status);
            $stmt->execute();
            $category_id = $stmt->insert_id;
            $stmt->close();
        } else {
            $category_id = $_POST['category'];
        }
    
        if (!is_numeric($_POST['brand'])) {
            $query = 'INSERT INTO brand
            (brand_name, publish_by, status)
                VALUES (?,?,?)';
            $author = 'admin';
            $status = 1;
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssi', $_POST['brand'], $author, $status);
            $stmt->execute();
            $brand_id = $stmt->insert_id;
            $stmt->close();
        } else {
            $brand_id = $_POST['brand'];
        }
    
        if (!is_numeric($_POST['unit'])) {
            $query = 'INSERT INTO unit
                        (name, active)
                    VALUES (?,?)';
            $status = 1;
            $stmt = $conn->prepare($query);
            $stmt->bind_param('si', $_POST['unit'], $status);
            $stmt->execute();
            $unit_id = $stmt->insert_id;
            $stmt->close();
        } else {
            $unit_id = $_POST['unit'];
        }

        $models = implode(', ', $_POST['models']);
        $model_names = explode(', ', $models);
        foreach ($model_names as $model_name) {
            $query = "SELECT COUNT(*) FROM model WHERE model_name = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $model_name);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();

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

        $query = 'UPDATE product SET name = ?,
                                    image = ?,
                                    models = ?,
                                    code = ?,
                                    supplier_code = ?,
                                    barcode = ?,
                                    unit_id = ?,
                                    brand_id = ?,
                                    category_id = ?
                WHERE id = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssssiiii', $_POST['product_name'],
                                    $image,
                                    $models, 
                                    $_POST['item_code'], 
                                    $_POST['supplier_code'],
                                    $_POST['barcode'],
                                    $unit_id,
                                    $brand_id,
                                    $category_id,
                                    $_POST['product_id']);
        $stmt->execute();
        $stmt->close();
        
        $query = 'UPDATE price_list SET dealer = ?, wholesale = ?, srp = ? WHERE product_id = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iiii', $_POST['dealer'], $_POST['wholesale'], $_POST['srp'], $_POST['product_id']);
        $stmt->execute();
        $stmt->close();

        header('Location: /danielle_motors/Inventory/Product_List');
    }
?>