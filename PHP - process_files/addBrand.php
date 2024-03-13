<?php
    require_once '../database/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['brand_name'])) {
            $brand_name = $_POST['brand_name'];

            $query = 'SELECT brand_name FROM brand WHERE brand_name = ?';
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $brand_name);
            $stmt->execute();
            $stmt->store_result();
            $row = $stmt->num_rows;
            $stmt->close();
            if ($row > 0) {
                header('Location: /dms_ims/brand.php');
                exit;
            }


            $query = 'INSERT INTO brand
                        (brand_name, publish_by, status)
                    VALUES (?,?,?)';
            $author = 'admin';
            $status = 1;
            $stmt = $conn->prepare( $query);
            $stmt->bind_param('ssi', $brand_name, $author, $status);
            $stmt->execute();
            $stmt->close();
            header('Location: ../Inventory/Brand_Maintenance/');
            exit;
        }
    }
?>