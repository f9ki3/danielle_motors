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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printable Barcode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @media print {
            @page {
                margin: 0; /* Remove default margin */
                size: 100mm 50mm; /* Set page size to match Xprinter label */
            }
            body {
                margin: 0; /* Remove any additional body margin */
            }
            .barcode-container {
                width: 100vh; /* Set width to fill the page width */
            }
            .barcode-image {
                max-width: 100%; /* Set max width to ensure the image fits within the container */
            }
        }
    </style>
</head>
<body>
    <div class="d-flex align-content-end flex-wrap barcode-container">
        <?php 
        for($i = 0; $i < $qty; $i++){
        ?>
        <div class="col-lg-12 p-3 border bbg m-1">
            <div class="row">
                <div class="col-lg-12 p-1 text-center">
                    <p class="m-0" style="font-size: 8;"><?php echo $product_name . ' ' . $brand . ' ' . $category . ' ' . $unit ; ?></p>
                    <p class="m-0" style="font-size: 8;"><?php echo $model; ?></p>
                </div>
                <div class="col-lg-12 ps-4 text-center pt-2 mb-2">
                    <img src="../../assets/php-barcode-master/barcode.php?codetype=Code128&size=30&text=<?php echo $barcode;?>&print=true" class="img img-fluid barcode-image">
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
</body>
</html>
