<?php 
 $dr_id = $_SESSION['dr_id'];

 $select_dr_sql = "SELECT delivery_receipt.*, supplier.*
 FROM delivery_receipt
 INNER JOIN supplier ON delivery_receipt.supplier_id = supplier.id
 WHERE delivery_receipt.id = '$dr_id';
 ";
 $select_dr_res = $conn->query($select_dr_sql);
 if($select_dr_res->num_rows>0){
    $row = $select_dr_res->fetch_assoc();
    $supplier_id = $row['supplier_id'];
    $_SESSION['supplier_id'] = $supplier_id;
    $delivered_to = $row['delivered_to'];
    $status = $row['status'];
    $note = $row['note'];
    $checked_by = $row['checked_by'];
    $approved_by = $row['approved_by'];
    $delivered_by = $row['delivered_by'];
    $received_date = $row['received_date'];
    $publish_by = $row['publish_by'];
    $publish_date = $row['publish_date'];
    $supplier_name = $row['supplier_name'];
    $supplier_logo = $row['supplier_logo'];
    $supplier_email = $row['supplier_email'];
    $supplier_address = $row['supplier_address'];
    $supplier_phone = $row['phone'];
    $prepared_by = $row['prepared_by'];
 }
 ?>
 <div class="row ">
    <!-- <div class="col-lg-2"><img src="../../uploads/<?php//echo $supplier_logo; ?>" class="img-fluid" style="height=150" alt=""></div> -->
    <div class="col-lg-8 p-5">
        <h5><?php echo $supplier_name; ?></h5>
        <p><?php echo $supplier_address; ?></p>
    </div>
    <div class="col-lg-4 p-5 text-end">
        <p class="mb-0">Deliver Receipt</p>
        <p class="mb-0 mt-0"><?php echo str_pad($dr_id, 6, '0', STR_PAD_LEFT);?></p>
        <div class="row">
            <div class="col-lg-4 text-start">
                <p><b>Date: </b></p>
            </div>
            <div class="col-lg-8 text-end">
                <p><?php echo $received_date; ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-12 table-responsive" id="live_product_data" style="min-height: 300px;">
        
    </div>
    <hr class="mt-5 mb-5">
    <div class="col-lg-12 mb-5">
        <div id="dr_footer"></div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xxs-4 mt-9 text-center fs--1">
        <p class="mb-0 mt-0"><u>John Cena</u></p>
        <p class="mb-0 mt-0">Prepared by</p>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xxs-4 mt-9 text-center fs--1">
        <p class="mb-0 mt-0"><u>John Cena</u></p>
        <p class="mb-0 mt-0">Checked by</p>
    </div>
    
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xxs-4 mt-9 text-center fs--1">
        <p class="mb-0 mt-0"><u>John Cena</u></p>
        <p class="mb-0 mt-0">Approved by</p>
    </div>

    <div class="col-lg-6 mt-9 col-md-6 col-sm-6 col-xs-6 col-xxs-6 mb-5 text-center fs--1">
        <p class="mb-0 mt-0"><u>John Cena</u></p>
        <p class="mb-0 mt-0">Delivered by</p>
    </div>

    <div class="col-lg-6 mt-9 col-md-6 col-sm-6 col-xs-6 col-xxs-6 mb-5 text-center fs--1">
        <p class="mb-0 mt-0"><u>John Cena</u></p>
        <p class="mb-0 mt-0">Received by</p>
    </div>

 </div>