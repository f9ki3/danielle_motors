<?php
    require_once '../database/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = array();

        // $query = 'SELECT COUNT(*) FROM product';
        // $stmt = $conn->prepare($query);
        // $stmt->execute();
        // $stmt->bind_result($products);
        // $stmt->fetch();
        // $stmt->close();

        // $json['products'] = $products;

        $query = 'SELECT COUNT(*) FROM purchase_transactions';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->bind_result($transactions);
        $stmt->fetch();
        $stmt->close();

        $json['transactions'] = $transactions;

        $query = 'SELECT COUNT(*) FROM material_transaction';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->bind_result($materials);
        $stmt->fetch();
        $stmt->close();

        $json['materials'] = $materials;

        $query = 'SELECT COUNT(*) FROM user';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->bind_result($users);
        $stmt->fetch();
        $stmt->close();

        $json['users'] = $users;

        $query = 'SELECT COUNT(*) FROM delivery_receipt';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->bind_result($delivery);
        $stmt->fetch();
        $stmt->close();

        $json['delivery'] = $delivery;

        $query = 'SELECT COUNT(*) FROM supplier';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->bind_result($suppliers);
        $stmt->fetch();
        $stmt->close();

        $json['suppliers'] = $suppliers;

        $conn->close();
        echo json_encode($json);
    }
?>