<?php
    require_once '../../database/database.php';

    $id = $_POST['id'];
    $qty = $_POST['qty'];

    if ($qty <= 1) {
        exit;
    }

    $newQty = $qty - 1;
    $query = 'UPDATE price_list_cart SET qty = ? WHERE product_id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $newQty, $id);
    $stmt->execute();
    $stmt->close();

    include_once 'cart-body.php';
?>