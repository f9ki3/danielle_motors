<?php
    require_once '../database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $unit = $_POST['unit'];

        $query = 'UPDATE unit SET name = ? WHERE id = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $unit, $id);
        $stmt->execute();
        $stmt->close();
        $json = array(
            'redirect' => '/dms_ims/unit.php'
        );
        echo json_encode($json);
    }
?>