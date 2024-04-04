<?php
    require_once '../database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $brand = $_POST['brand'];

        $query = 'UPDATE brand SET brand_name = ? WHERE id = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $brand, $id);
        $stmt->execute();
        $stmt->close();
        $json = array(
            'redirect' => '/dms_ims/brand.php'
        );
        echo json_encode($json);
    }
?>