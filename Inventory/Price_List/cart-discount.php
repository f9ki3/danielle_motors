<?php
    require_once '../../database/database.php';

    $id = $_POST['id'];
    $discount = $_POST['discount'];

    $query = 'UPDATE price_list_cart SET discount = ? WHERE product_id =?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $discount, $id);
    $stmt->execute();
    $stmt->close();

    include_once 'cart-body.php';
?>