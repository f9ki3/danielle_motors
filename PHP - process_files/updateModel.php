<?php
    require_once '../database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $model = $_POST['model'];

        $query = 'UPDATE model SET model_name = ? WHERE id = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $model, $id);
        $stmt->execute();
        $stmt->close();
        $json = array(
            'redirect' => '/dms_ims/model.php'
        );
        echo json_encode($json);
    }
?>