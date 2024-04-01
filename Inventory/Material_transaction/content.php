<?php
$invoice_id = $_SESSION['invoice'];
$material_transfer_sql = "SELECT * FROM material_transfer WHERE material_invoice = '$invoice_id' LIMIT 1";
$material_transfer_res = $conn->query($material_transfer_sql);
if($material_transfer_res -> num_rows > 0){
    $row=$material_transfer_res->fetch_assoc();
    $material_date = $row['material_date'];
    $material_cashier = $row['material_cashier'];
    $material_received_by = $row['material_recieved_by'];
    $material_inspected_by = $row['material_inspected_by'];
    $material_verified_by = $row['material_verified_by'];
    $total_selling_price = $row['totalSellingPrice'];

    $check_status_sql = "SELECT status FROM material_transaction WHERE material_invoice_id = '$invoice_id' AND (status = '1' OR status='2')";
    $check_status_res = $conn->query($check_status_sql);
    if($check_status_res->num_rows> 0 ){
        $status = '<span class="text-primary">Pending</span>';
    } else {
        $check_verified_status = "SELECT status FROM material_transaction WHERE material_invoice_id = '$invoice_id' AND status = '3'";
        $check_verified_status_res = $conn->query($check_verified_status);
        if($check_verified_status_res -> num_rows > 0){
            $status = '<span class="text-success">Verified</span>';
        } else {
            $status = '<span class="text-success">Transaction Complete</span>';
        }
    }
}
?>

<div class="row">
    <h1 class="mb-2">Material Transfer : <?php echo $invoice_id; ?></h1>
</div>
<ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
    <li class="nav-item"><a class="nav-link" aria-current="page" href="../Material_transaction-For-Assemble/"><span>For Assemble Sheet Document</a></li>
    <li class="nav-item"><a class="nav-link active" href="../Material_transaction">Material Transfer Document</a></li>
</ul>

<div class="row fs--1 mb">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="../../PHP - process_files/material_transfer_verification.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6 text-start">
                            <h6>Material Invoice : <b><?php echo $invoice_id; ?></b></h6>
                            <input type="text" name="invoice_id" value="<?php echo $invoice_id;?>" hidden>
                        </div>
                        <div class="col-lg-3">
                            <h6>Status : <?php echo $status;?></h6>
                        </div>
                        <div class="col-lg-3 text-end">
                            <button class="btn btn-outline-secondary">Print</button>
                        </div>
                        <div class="col-lg-12">
                            <h6>Date: <b><?php echo $material_date; ?></b></h6>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Cashier</th>
                                            <th>Received by</th>
                                            <th>Inspected by</th>
                                            <th>Verified by</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $material_cashier;?></td>
                                            <td><?php echo $material_received_by;?></td>
                                            <td><input name="inspected_by" type="text" class="form-control" value="1" hidden><?php echo $material_inspected_by; ?></td>
                                            <td><input name="verified_by" type="text" class="form-control" value="1" hidden><?php echo $material_verified_by; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="min-height: 350px;">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="3">Name</th>
                                            <th>Models</th>
                                            <th>Code</th>
                                            <th>SRP</th>
                                            <th>Requested QTY</th>
                                            <th>Status</th></th>
                                            <th>WH Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $mt_sql = "SELECT * FROM material_transaction WHERE material_invoice_id = '$invoice_id'";
                                        $mt_res = $conn->query($mt_sql);
                                        if($mt_res->num_rows > 0){
                                            while($mt_row = $mt_res->fetch_assoc()){
                                                $product_id = $mt_row['product_id'];
                                                $input_srp = $mt_row['input_srp'];
                                                $qty_added = $mt_row['qty_added'];
                                                $item_status = $mt_row['status'];
                                                
                                                $product_sql = "SELECT * from product WHERE id='$product_id' LIMIT 1";
                                                $product_res = $conn->query($product_sql);
                                                if($product_res->num_rows>0){
                                                    $product_row = $product_res -> fetch_assoc();
                                                    $product_name = $product_row['name'];
                                                    $product_image = $product_row['image'];
                                                    $product_code = $product_row['code'];
                                                    $brand_id = $product_row['brand_id'];
                                                    $category_id = $product_row['category_id'];
                                                    $unit_id = $product_row['unit_id'];
                                                    $models = $product_row['models'];

                                                    $category_sql = "SELECT category_name FROM category WHERE id ='$category_id' LIMIT 1";
                                                    $category_res = $conn->query($category_sql);
                                                    if($category_res->num_rows > 0 ){
                                                        $cat_row = $category_res -> fetch_assoc();
                                                        $category_name = $cat_row['category_name'];
                                                    }

                                                    $brandname_sql = "SELECT brand_name FROM brand WHERE id = '$brand_id' LIMIT 1";
                                                    $brandname_res = $conn->query($brandname_sql);
                                                    
                                                }
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td class="p-0">
                                                <div class="form-check mb-0 fs-0">
                                                    <input class="form-check-input ms-3" type="checkbox">
                                                </div>
                                            </td>
                                            <td class="text-center p-0"><img src="../../uploads/" class="img-fluid" style="height: 50px;"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-end"></td>
                                            <td></td>
                                            <td class="text-end"></td>
                                            <td class="text-end"></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <h6 class="mb-1">Total Selling Price:  ₱<span> <?php echo $total_selling_price;?></span></h6>
                        </div>
                        <div class="col-lg-3 text-start <?php echo $class;?>">
                            <div class="row">
                                <div class="form-check">
                                <input class="form-check-input" id="flexCheckDefault" type="checkbox" value="" required/>
                                <label class="form-check-label" for="flexCheckDefault">As I approve this transaction, I hereby confirm that I inspected the items before they left the warehouse.</label>
                                </div>
                                <button type="submit" class="btn btn-primary col-12 mb-2">Approve</button>
                                <button class="btn btn-secondary col-12">Decline</button>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

