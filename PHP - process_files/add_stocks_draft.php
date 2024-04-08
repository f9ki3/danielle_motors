<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'] . " tangina";
        echo $product_id;
    } elseif (isset($_POST['product_name'])) {
        $product_name =  $_POST['product_name'];
        echo $product_name . " tangina";
    } else {
        echo "No product ID or product name provided";
    }
}
?>
