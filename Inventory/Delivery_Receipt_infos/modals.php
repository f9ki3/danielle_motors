<?php
// session_start();
include_once "../../database/database.php";
// $dr_id = $_SESSION['dr_id'];
$dr_id = $_GET['id'];
// $servername = "sql.freedb.tech";
// $username = "freedb_dmp_master";
//  $password = "8@YASU8ypbA2uA%";
//   $dbname = "freedb_dmp_db";

// $servername = "156.67.222.117";
// $username = "u450836125_dmp_intern"; 
// $password = "DMPInterns123!"; 
// $dbname = "u450836125_dmp_office";
// =======
// $servername = "localhost";
// $username = "root"; 
// $password = ""; 
// $dbname = "updatd";

// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

$dr_content_sql = "SELECT dc.*, p.name AS product_name, p.models AS product_model, p.unit_id, p.brand_id, p.category_id, p.image AS product_image, b.brand_name, c.category_name, u.name AS unit_name
                    FROM delivery_receipt_content AS dc
                    LEFT JOIN product AS p ON dc.product_id = p.id
                    LEFT JOIN brand AS b ON b.id = p.brand_id
                    LEFT JOIN category AS c ON c.id = p.category_id
                    LEFT JOIN unit AS u ON u.id = p.unit_id
                    WHERE dc.delivery_receipt_id = '$dr_id'";
$dr_content_res = $conn->query($dr_content_sql);

if($dr_content_res->num_rows > 0){
    while($row = $dr_content_res->fetch_assoc()){
        // Access data from the result set
        $drc_id = $row['id'];
        $drc_dr_id = $row['delivery_receipt_id'];
        $product_id = $row['product_id'];
        $product_code = $row['product_code'];
        $orig_price = $row['orig_price'];
        $price = $row['price'];
        $discount = $row['discount'];
        $qty = $row['quantity'];
        $total = $price * $qty;
        $product_name = $row['product_name'];
        $product_model = $row['product_model'];
        $unit_id1 = $row['unit_id'];
        $unit_name1 = $row['unit_name'];
        $brand_name = $row['brand_name'];
        $brand_id = $row['brand_id'];
        $category_name = $row['category_name'];
        $category_id = $row['category_id'];
        $product_image= $row['product_image'];
            ?>
            <div class="modal fade" id="product_<?php echo $product_id;?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="../../PHP - process_files/update_dr_product_info.php" method = "POST">    
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update!</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" name="product_id" value="<?php echo $product_id;?>" hidden> 
                                    <input type="text" name="drc_id" value="<?php echo $drc_id;?>" hidden>
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" name="product_name" value="<?php echo $product_name;?>" required>
                                        <label for="floatingInput">Product Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="brand_id" value="<?php echo $brand_id;?>" hidden>
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" name="brand_name" value="<?php echo $brand_name?>" required>
                                        <label for="floatingInput">Product brand</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <input type="text" name="category_id" value="<?php echo $category_id;?>" hidden>
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" name="category_name" value="<?php echo $category_name;?>" required>
                                        <label for="floatingInput">Category Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <select name="unit" class="form-select mb-2" required>
                                        <option value="">Select unit</option>
                                        <?php 
                                        $unit_sql = "SELECT * FROM unit";
                                        $unit_result = $conn->query($unit_sql);
                                        while($unit = $unit_result->fetch_assoc()){
                                            $unit_id = $unit['id'];
                                            $unit_name = $unit['name'];
                                            if($unit_name === $unit_name1){
                                                echo "<option value='" . $unit_id . "' selected>" . $unit_name . "</option>";
                                            } else {
                                                echo "<option value='" . $unit_id . "'>" . $unit_name . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" name="product_model" value="<?php echo $product_model;?>" required>
                                        <label for="floatingInput">Model</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-2">
                                        <input class="form-control" type="number" name="qty" value="<?php echo $qty;?>" required>
                                        <label for="floatingInput">qty</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-2">
                                        <input class="form-control" type="text" name="original_price" value="<?php echo $orig_price;?>" required>
                                        <label for="floatingInput">Original Price</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-2">
                                        <input class="form-control" type="text" name="price" value="<?php echo $price;?>" required>
                                        <label for="floatingInput">Price</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-2">
                                        <input class="form-control" type="number" name="discount" value="<?php echo $discount;?>" required>
                                        <label for="floatingInput">discount</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-primary" type="submit">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                    </form>
                    </div>
                </div>
            </div>
            <?php

    }

    $conn->close();
    exit();
}
?>
   