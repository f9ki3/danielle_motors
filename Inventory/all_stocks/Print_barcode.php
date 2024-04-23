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

    // Storing variables in $_SESSION
    $_SESSION['id'] = $id;
    $_SESSION['barcode'] = $barcode;
    $_SESSION['qty'] = $qty;
    $_SESSION['name'] = $name;
    $_SESSION['brand'] = $brand;
    $_SESSION['category'] = $category;
    $_SESSION['unit'] = $unit;
    $_SESSION['model'] = $model;

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
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="d-flex flex-wrap" >
    <?php 
    for($i = 0; $i < $qty; $i++){
    ?>
    <div class="border bg-white m-2" style="max-width: 220px;">
        <div class="row">
            <!-- <div class="col-lg-12 mb-3 p-3">
                <p class="m-0 fs--1">Product Name: <?php //  echo $product_name; ?></p>
                <p class="m-0 fs--1">Brand: <?php  // echo $brand; ?></p>
                <p class="m-0 fs--1">Category: <?php  // echo $category; ?></p>
                <p class="m-0 fs--1">Unit: <?php  // echo $unit; ?></p>
                <p class="m-0 fs--1">Model: <?php  // echo $model; ?></p>
            </div> -->
            <div class="col-lg-12 ps-4 text-center pt-4">
                <img src="../../assets/php-barcode-master/barcode.php?codetype=Code128&size=50&text=<?php echo $barcode;?>&print=true" class="img img-fluid">
            </div>
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