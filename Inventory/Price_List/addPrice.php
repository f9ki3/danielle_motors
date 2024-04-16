<?php
    require_once '../../admin/session.php';
    require_once '../../database/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $query = 'INSERT INTO price_list
                (product_id, dealer, wholesale, srp, publish_by)
                VALUES (?,?,?,?,?)';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iiiii', $_POST['product_id'], $_POST['dealer'], $_POST['wholesale'], $_POST['srp'], $user_id);
        $stmt->execute();
        $stmt->close();

        header('Location: ../Price_List/?success=true');
        exit;
    }
?>