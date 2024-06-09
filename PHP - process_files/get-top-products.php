<?php
    require_once '../database/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $query = 'SELECT purchase_cart.ProductID, COUNT(*) as count, product.name
                FROM purchase_cart
                INNER JOIN product ON product.id = purchase_cart.ProductID
                GROUP BY purchase_cart.ProductID
                ORDER BY count DESC
                LIMIT 100';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->bind_result($product, $count, $name);
        $json = array();
        $json['product'] = array();
        $json['count'] = array();
        while ($stmt->fetch()) {
            $json['product'][] = $name;
            $json['count'][] = $count;
        }
        $stmt->close();
        $conn->close();
        echo json_encode($json);
    }
?>