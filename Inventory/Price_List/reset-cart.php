<?php
    require_once '../../database/database.php';

    $query = 'DELETE FROM price_list_cart';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->close();
?>