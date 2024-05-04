<?php

session_start(); // Start the session

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $barcode = $_GET['barcode'];
    $qty = $_GET['qty'];
    $name = $_GET['name'];
    $brand = $_GET['brand'];
    $category = $_GET['category'];
    $unit = $_GET['unit'];
    $model = $_GET['model'];
    $qrcode = $_GET['qrcode'];

    // Storing variables in $_SESSION
    $_SESSION['id'] = $id;
    $_SESSION['barcode'] = $barcode;
    $_SESSION['qty'] = $qty;
    $_SESSION['name'] = $name;
    $_SESSION['brand'] = $brand;
    $_SESSION['category'] = $category;
    $_SESSION['unit'] = $unit;
    $_SESSION['model'] = $model;
    $_SESSION['qrcode'] = $qrcode;

    header("Location: Print_barcode.php");
} 

$id = $_SESSION['id'];
$barcode = $_SESSION['barcode'];
$qty = $_SESSION['qty'];
$product_name = $_SESSION['name'];
$brand = $_SESSION['brand'];
$category = $_SESSION['category'];
$unit = $_SESSION['unit'];
$model = $_SESSION['model'];
$qrcode = $_SESSION['qrcode'];
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="d-flex align-content-end flex-wrap" >
    
    <?php 
    // for($i = 0; $i < $qty; $i++){
        for($i = 0; $i < 1; $i++){
    ?>
    <div class="col-lg-6 p-3 border bbg m-1" style="width: 70mm; height: 50mm;">
        <div class="row">
            <div class="col-lg-12 p-1 mb-0">
                <p class="m-0" style="font-size: 10;"><b>Name: <?php echo $product_name . ' ' . $brand . ' ' . $category . ' ' . $unit ; ?></b></p>
                <!-- <p class="m-0 fs--1">Brand: <?php  // echo $brand; ?></p>
                <p class="m-0 fs--1">Category: <?php  // echo $category; ?></p>
                <p class="m-0 fs--1">Unit: <?php  // echo $unit; ?></p> -->
                <p class="m-0" style="font-size: 8;"><b>Model: <?php  echo $model; ?></b></p>
            </div>
            <div class="col-lg-12 text-center">
                <img src="../../uploads/<?php echo basename($qrcode);?>" class="img-fluid m-0" style="width:25mm; height: 25mm;" alt="">
                <p class="m-0" style="font-size: 8;"><?php echo $barcode;?></p>
            </div>
            <!-- <div class="col-lg-6 ps-4 text-center pt-2 mb-2">
                <img src="../../assets/php-barcode-master/barcode.php?codetype=Code128&size=45&text=<?php // echo $barcode;?>&print=true" class="img img-fluid">
            </div> -->
        </div>
    </div>
    <?php
    }
    ?>
</div>
<script>
    window.onload = function () {
        // Set the scale to 85%, paper size to A4, and orientation to landscape
        var style = document.createElement('style');
        style.innerHTML = '@page { size: A4 portrait; }';
        document.head.appendChild(style);

        // Trigger Ctrl+P shortcut for printing
        window.print();
    };
</script>