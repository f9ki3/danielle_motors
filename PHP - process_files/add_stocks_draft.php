<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'] . " tangina";
        echo $_POST['rack_id'] . " " . $_POST['qty'];
        // $conn->close();
        exit();
    } elseif (isset($_POST['product_name'])) {
        $product_name =  $_POST['product_name'];
        echo $product_name . " tangina";
        // $conn->close();
        exit();
    } else {
        echo "No product ID or product name provided";
        // $conn->close();
        exit();
    }
}
?>
