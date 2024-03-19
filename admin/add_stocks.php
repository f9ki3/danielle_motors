<?php include 'session.php'?>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="datatable.css">
    <?php include 'header.php'?>
    </head>
<body>
<div style="display: flex; flex-direction: row">
<?php
include 'navigation_bar.php';
include '../config/config.php';

?>

<datalist id="suggestions">
            <?php foreach ($products as $product): ?>
                <option><?php echo $product['id']; echo "-"?><?php echo $product['name']; ?><?php echo " - "?><?php echo $product['models']; ?></option>
            <?php endforeach; ?>
        </datalist>

        

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">Select Product </span>
            <input type="text" id="select_product" class="form-control" list="suggestions" placeholder="Search Here">
        </div>

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">Net Price</span>
            <input type="text" class="form-control" id="price" value="100">
        </div>

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">Net Price</span>
            <input type="text" class="form-control" >
        </div>

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">QTY</span>
            <input type="text" class="form-control" >


            <?php include 'footer.php'?>
</body>
</html>