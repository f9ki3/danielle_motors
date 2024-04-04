<?php
    require_once '../database/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['model_name'])) {
            $model_name = $_POST['model_name'];

            $query = 'SELECT model_name FROM model WHERE model_name = ?';
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $model_name);
            $stmt->execute();
            $stmt->store_result();
            $row = $stmt->num_rows;
            $stmt->close();
            if ($row > 0) {
                header('Location: ../Inventory/Model_Maintenance/');
                exit;
            }


            $query = 'INSERT INTO model
                        (model_name, status)
                    VALUES (?,?)';
            $author = 'admin';
            $status = 1;
            $stmt = $conn->prepare( $query);
            $stmt->bind_param('si', $model_name, $status);
            $stmt->execute();
            $stmt->close();
            header('Location: ../Inventory/Model_Maintenance/');
            exit;
        }
    }
?>