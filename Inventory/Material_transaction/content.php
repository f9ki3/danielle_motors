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
    <div class="col-lg-12 text-end mb-2">
        <a class="btn btn-secondary" id="print">Print</a>
    </div>
    <div class="col-lg-12">
        <div class="card" id="printContent">
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
                                            <td class="ps-2 pt-3">
                                                <?php 
                                                echo 
                                                '<div class="form-floating" style="width: 75%;">
                                                <input class="form-control" value="' . $material_cashier . '" readonly>
                                                <label for="transaction_receive">Cashier Name</label></div>
                                                ';?>
                                            </td>
                                            <td>
                                                <?php 
                                                echo '<div class="form-floating" style="width: 75%;">
                                                <input class="form-control" value="' . $material_received_by . '" readonly>
                                                <label for="transaction_receive">Receive By</label></div>
                                                ';?>
                                            </td>
                                            <td>
                                                <?php 
                                                if(empty($material_inspected_by)){
                                                    echo '<div class="form-floating" style="width: 75%;">
                                                    <select class="form-select mb-2" aria-label="Default select example" style="width: 100%" name="inspected_by" id="inspectedBy" onchange="enableCheckbox()" required>
            
                                                    </select>
                                                    <label for="transaction_inspected">Inspected by</label>
                                                </div>';
                                                } else {
                                                    echo '<div class="form-floating" style="width: 75%;">
                                                    <input class="form-control" value="' . $material_inspected_by . '" readonly>
                                                    <label for="transaction_receive">Inspected By</label></div>
                                                    ';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if(empty($material_verified_by)){
                                                    echo '
                                                    <div class="form-floating" style="width: 75%;">
                                                        <input name="verified_by" type="text" class="form-control" value="' . $id . '" hidden><input name="full_name" type="text" class="form-control" value="' . $fname . ' ' . $lname . '" readonly>
                                                        <label for="transaction_inspected">Verified by</label>
                                                        </div>';
                                                    } else {
                                                        echo '<div class="form-floating" style="width: 75%;">
                                                    <input class="form-control" value="' . $material_verified_by . '" readonly>
                                                    <label for="transaction_receive">Verified By</label></div>
                                                    ';
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
                                            <th>Status</th>
                                            <th>Return Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $mt_sql = "SELECT mt.id, mt.rack_loc_id, mt.product_id, mt.input_srp, mt.qty_added, mt.status, p.name AS product_name, p.image AS product_image, p.code AS product_code, p.brand_id, p.category_id, p.unit_id, p.models, c.category_name, b.brand_name, mt.return_status, mt.qty_warehouse
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

                                                    if($mt_row['return_status'] == 0){
                                                        $return_status = "Pending Return";
                                                    } elseif($mt_row['return_status'] == 1) {
                                                        $return_status = "Accepted";
                                                    } else {
                                                        $return_status = "Failed to accept";
                                                    }
                                                    $returned_qty = $mt_row['qty_warehouse'];

                                        ?>
                                        <tr>
                                            <td class="text-center p-0"><img src="../../uploads/<?php echo basename($product_image);?>" class="img-fluid" style="height: 50px;"></td>
                                            <td><?php echo $product_name;?></td>
                                            <td><?php echo $models;?></td>
                                            <td><?php echo $product_code;?></td>
                                            <td class="text-end"><?php echo number_format($input_srp, 2);?></td>
                                            <td class="text-end"><?php echo $qty_added;?></td>
                                            <td class="text-start ps-2 status_refresh"><?php echo $product_status;?></td>
                                            <td class="text-start ps-2">
                                                <?php 
                                                    if($item_status == 6){
                                                        if($return_status === "Pending Return"){
                                                ?>
                                                <a class="btn btn-sm btn-success m-1" type="button" data-bs-toggle="modal" data-bs-target="#acceptreturn_<?php echo $transaction_id;?>"><i class="fa fa-check"></i> Accept</a>
                                                
                                                <a href="../../PHP - process_files/material_return.php?angtabanidanegrabe=<?php echo  $transaction_id;?>" class="btn btn-sm btn-danger m-1"><i class="fas fa-skull-crossbones"></i> Failed to accept</a>
                                                
                                                <?php
                                                // echo $return_status;
                                                        } elseif($return_status === "Accepted"){
                                                            echo '<span class="text-success">' . $return_status . ' </span>';
                                                        } else {
                                                            echo '<span class="text-danger">' . $return_status . ' </span>';

                                                        }
                                                    } elseif($item_status == 4){
                                                        echo '<span class="text-success">No action needed</span>';
                                                    }
                                                ?>
                                            </td>
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
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
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

<?php 
$modal_mt_sql = "SELECT mt.id, mt.rack_loc_id, mt.product_id, mt.input_srp, mt.qty_added, mt.status, p.name AS product_name, p.image AS product_image, p.code AS product_code, p.brand_id, p.category_id, p.unit_id, p.models, c.category_name, b.brand_name, mt.return_status, mt.qty_warehouse
                FROM material_transaction AS mt
                INNER JOIN product AS p ON mt.product_id = p.id
                LEFT JOIN category AS c ON p.category_id = c.id
                LEFT JOIN brand AS b ON p.brand_id = b.id
                WHERE mt.material_invoice_id = '$invoice_id'";
$modal_mt_res = $conn->query($modal_mt_sql);

if($modal_mt_res->num_rows > 0){
    while($mt_row = $modal_mt_res->fetch_assoc()){
        $modal_transaction_id = $mt_row['id'];
        $modal_product_id = $mt_row['product_id'];
        $modal_input_srp = $mt_row['input_srp'];
        $modal_qty_added = $mt_row['qty_added'];
        $modal_item_status = $mt_row['status'];
        $modal_product_name = $mt_row['product_name'];
        $modal_product_image = $mt_row['product_image'];
        $modal_product_code = $mt_row['product_code'];
        $modal_brand_id = $mt_row['brand_id'];
        $modal_category_id = $mt_row['category_id'];
        $modal_unit_id = $mt_row['unit_id'];
        $modal_models = $mt_row['models'];
        $modal_category_name = $mt_row['category_name'];
        $modal_brand_name = $mt_row['brand_name'];
        $modal_wh_location = $mt_row['rack_loc_id'];

        if($modal_item_status == 1 || $modal_item_status == 2){
            $modal_product_status = '<span class="text-warning">Pending</span>';
        } elseif($modal_item_status == 3){
            $modal_product_status = '<span class="text-success">Verified</span>';
        } elseif($modal_item_status == 4){
            $modal_product_status = '<span class="text-success">Accepted</span>';
        } else {
            $modal_product_status = '<span class="text-danger">Declined</span>';
        }

        if($mt_row['return_status'] == 0){
            $modal_return_status = "Pending Return";
        } elseif($mt_row['return_status'] == 1) {
            $modal_return_status = "Accepted";
        } else {
            $modal_return_status = "Failed to accept";
        }
        $modal_returned_qty = $mt_row['qty_warehouse'];
?>
<div class="modal fade" id="acceptreturn_<?php echo $modal_transaction_id;?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="../../PHP - process_files/material_return.php?angtabanidane=<?php echo  $modal_transaction_id;?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Accept Return</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="text" name="product_id" value="<?php echo $modal_product_id; ?>" readonly hidden>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="qty" value="<?php echo $modal_returned_qty;?>" readonly >
                                <label for="">Returned Qty</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <select name="rack_id" class="form-select" id="">
                                    <option value=""></option>
                                    <?php 
                                    $rack_zql = "SELECT * FROM ware_location WHERE branch_code = '$branch_code'";
                                    $rack_res = $conn->query($rack_zql);
                                    if($rack_res->num_rows>0){
                                        while($row=$rack_res -> fetch_assoc()){
                                            $rack_id = $row['id'];
                                            $rack_name = $row['location_name'];
                                            echo '<option value="' . $rack_name . '">' . $rack_name . '</option>';
                                        }
                                    } else {
                                    ?>
                                    <option value="">No Location Data</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <label for="">Select Where to Store</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Okay</button>
                    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    }
}
?>


<script>
    // Function to enable the checkbox
    function enableCheckbox() {
        document.getElementById('flexCheckDefault').disabled = false;
    }
</script>
