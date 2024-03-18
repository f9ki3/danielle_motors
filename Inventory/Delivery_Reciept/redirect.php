<?php
session_start();

if (isset($_GET['id'])) {
    $_SESSION['dr_id'] = $_GET['id'];
    header("Location: ../Delivery_Receipt_infos/");
    exit();
}
?>
