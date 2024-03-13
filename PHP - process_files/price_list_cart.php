<?php
    require_once '../database/database.php';

    $id = $_POST['id'];
    $srp = $_POST['srp'];
    $qty = 1;
    
    $query = 'SELECT COUNT(*) FROM price_list_cart WHERE product_id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    if ($count == 0) {
        $query = 'INSERT INTO price_list_cart
                (product_id, qty, srp)
            VALUES (?,?,?)';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iii', $id, $qty, $srp);
        $stmt->execute();
        $stmt->close();
    }

   include_once '../Inventory/Price_List/cart-body.php';
?>