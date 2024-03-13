<?php
    require_once '../database/database.php';

    $id = $_POST['id'];

    $query = 'DELETE FROM price_list_cart WHERE product_id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();

    include_once '../Inventory/Price_List/cart-body.php';
?>