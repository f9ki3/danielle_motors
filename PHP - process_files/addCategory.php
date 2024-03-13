<?php
    require_once '../database/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['category_name'])) {
            $category_name = $_POST['category_name'];
            $query = 'INSERT INTO category 
                        (category_name, publish_by, status)
                    VALUES (?,?,?)';
            $author = 'admin';
            $status = 1;
            $stmt = $conn->prepare( $query);
            $stmt->bind_param('ssi', $category_name, $author, $status);
            $stmt->execute();
            $stmt->close();
            header('Location: ../Inventory/Category_Maintenance/');
            exit;
        }
    }
?>