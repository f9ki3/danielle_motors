<?php
    require_once '../database.php';

    $id  = $_POST['id'];
    $category = $_POST['category'];

    $query = 'UPDATE category SET category_name = ? WHERE id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('si', $category, $id);
    $stmt->execute();
    $stmt->close();
    $json = array(
        'redirect' => '/dms_ims/category.php'
    );
    echo json_encode($json);
?>