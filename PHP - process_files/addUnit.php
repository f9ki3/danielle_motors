<?php
    require_once '../database/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['unit_name'])) {
            $unit_name = $_POST['unit_name'];

            $query = 'SELECT name FROM unit WHERE name = ?';
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $unit_name);
            $stmt->execute();
            $stmt->store_result();
            $row = $stmt->num_rows;
            $stmt->close();
            if ($row > 0) {
                header('Location: ../Inventory/Unit_Maintenance/');
                exit;
            }


            $query = 'INSERT INTO unit
                        (name, active)
                    VALUES (?,?)';
            $status = 1;
            $stmt = $conn->prepare( $query);
            $stmt->bind_param('si', $unit_name, $status);
            $stmt->execute();
            $stmt->close();
            header('Location: ../Inventory/Unit_Maintenance/');
            exit;
        }
    }
?>