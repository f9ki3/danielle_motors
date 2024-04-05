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
        $footer = "pending";
    } else {
        $check_verified_status = "SELECT status FROM material_transaction WHERE material_invoice_id = '$invoice_id' AND status = '3'";
        $check_verified_status_res = $conn->query($check_verified_status);
        if($check_verified_status_res -> num_rows > 0){
            $status = '<span class="text-success">Verified</span>';
            $footer = "verified";
        } else {
            $status = '<span class="text-success">Transaction Complete</span>';
            $footer="complete";
        }
    }
}
?>
<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
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
            <div class="card-body" id="to_refresh">
                <form id="material_transaction_form" action="../../PHP - process_files/material_transfer_verification.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6 text-start">
                            <h6>Material Invoice : <b><?php echo $invoice_id; ?></b></h6>
                            <input type="text" name="invoice_id" value="<?php echo $invoice_id;?>" hidden>
                        </div>
                        <div class="col-lg-3" id="status_refresh">
                            <div class="row">
                                <?php echo $status;?>
                            </div>
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
                                            <td>
                                                <?php 
                                                if(empty($material_inspected_by)){
                                                    echo '<select class="form-select mb-2" aria-label="Default select example" style="width: 33%" name="inspected_by" id="inspectedBy">
                                                    </select>';
                                                } else {
                                                    $inspector_sql = "SELECT user_fname, user_lname FROM user WHERE id='$material_inspected_by' LIMIT 1";
                                                    $inspector_res = $conn->query($inspector_sql);
                                                    if($inspector_res->num_rows>0){
                                                        $row=$inspector_res->fetch_assoc();
                                                        echo $row['user_fname'] . " " . $row['user_lname'];
                                                    }
                                                }
                                                ?>
                                                
                                            </td>
                                            <td>
                                                <?php 
                                                if(empty($material_verified_by)){
                                                    echo '<input name="verified_by" type="text" class="form-control" value="' . $id . '" hidden>';
                                                } else {
                                                    $verifier_sql = "SELECT user_fname, user_lname FROM user WHERE id='$material_verified_by' LIMIT 1";
                                                    $verifier_res = $conn->query($verifier_sql);
                                                    if($verifier_res->num_rows>0){
                                                        $row=$verifier_res->fetch_assoc();
                                                        echo $row['user_fname'] . " " . $row['user_lname'];
                                                    }
                                                }
                                                ?>
                                            </td>
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
                                            <th colspan="2">Name</th>
                                            <th>Models</th>
                                            <th>Code</th>
                                            <th>SRP</th>
                                            <th>Requested QTY</th>
                                            <th>Status</th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $mt_sql = "SELECT mt.id, mt.rack_loc_id, mt.product_id, mt.input_srp, mt.qty_added, mt.status, p.name AS product_name, p.image AS product_image, p.code AS product_code, p.brand_id, p.category_id, p.unit_id, p.models, c.category_name, b.brand_name
                                                    FROM material_transaction AS mt
                                                    INNER JOIN product AS p ON mt.product_id = p.id
                                                    LEFT JOIN category AS c ON p.category_id = c.id
                                                    LEFT JOIN brand AS b ON p.brand_id = b.id
                                                    WHERE mt.material_invoice_id = '$invoice_id'";
                                            $mt_res = $conn->query($mt_sql);

                                            if($mt_res->num_rows > 0){
                                                while($mt_row = $mt_res->fetch_assoc()){
                                                    $transaction_id = $mt_row['id'];
                                                    $product_id = $mt_row['product_id'];
                                                    $input_srp = $mt_row['input_srp'];
                                                    $qty_added = $mt_row['qty_added'];
                                                    $item_status = $mt_row['status'];
                                                    $product_name = $mt_row['product_name'];
                                                    $product_image = $mt_row['product_image'];
                                                    $product_code = $mt_row['product_code'];
                                                    $brand_id = $mt_row['brand_id'];
                                                    $category_id = $mt_row['category_id'];
                                                    $unit_id = $mt_row['unit_id'];
                                                    $models = $mt_row['models'];
                                                    $category_name = $mt_row['category_name'];
                                                    $brand_name = $mt_row['brand_name'];
                                                    $wh_location = $mt_row['rack_loc_id'];
                                                    if($item_status == 1 || $item_status == 2){
                                                        $product_status = '<span class="text-warning">Pending</span>';
                                                    } elseif($item_status == 3){
                                                        $product_status = '<span class="text-success">Verified</span>';
                                                    } elseif($item_status == 4){
                                                        $product_status = '<span class="text-success">Accepted</span>';
                                                    } else {
                                                        $product_status = '<span class="text-danger">Declined</span>';
                                                    }
                                        ?>
                                        <tr>
                                            <td class="text-center p-0"><img src="../../uploads/<?php echo basename($product_image);?>" class="img-fluid" style="height: 50px;"></td>
                                            <td><?php echo $product_name;?></td>
                                            <td><?php echo $models;?></td>
                                            <td><?php echo $product_code;?></td>
                                            <td class="text-end"><?php echo number_format($input_srp, 2);?></td>
                                            <td class="text-end"><?php echo $qty_added;?></td>
                                            <td class="text-start ps-2 status_refresh"><?php echo $product_status;?></td>
                                            <input type="text" name="qty_sent[]" value="<?php echo $qty_added; ?>" hidden>
                                            <input type="text" name="transaction_id[]" value="<?php echo $transaction_id;?>" hidden>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <h6 class="mb-1">Total Selling Price:  ₱<span> <?php echo number_format($total_selling_price, 2);?></span></h6>
                        </div>
                        <?php 
                        if($footer === "pending"){
                        ?>
                        <div class="col-lg-3 text-start <?php echo $class;?>">
                            <div class="row">
                                <div class="form-check">
                                <input class="form-check-input" id="flexCheckDefault" type="checkbox" value="" required/>
                                <label class="form-check-label" for="flexCheckDefault">As I approve this transaction, I hereby confirm that I inspected the items before they left the warehouse.</label>
                                </div>
                                <button type="submit" id="material_transaction_form_button" class="btn btn-primary col-12 mb-2">Verify</button>
                                <!-- <button class="btn btn-secondary col-12">Decline</button> -->
                            </div>
                            
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="verticallyCentered" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content bg-transparent">
        <div class="modal-body text-center">
            <div class="spinner-border" role="status" ><span class="visually-hidden">Loading...</span></div>
        </div>
    </div>
  </div>
</div>