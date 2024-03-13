<?php
    require_once '../database/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $query = 'INSERT INTO price_list
                (product_id, dealer, wholesale, srp)
                VALUES (?,?,?,?)';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iiii', $_POST['product_id'], $_POST['dealer'], $_POST['wholesale'], $_POST['srp']);
        $stmt->execute();
        $stmt->close();

        header('Location: ../Inventory/Price_List/');
    }
?>