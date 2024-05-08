<?php
if(isset($_GET['DR'])){
    $supplier_name = $_SESSION['po_supplier_name'];
}
?>
<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
<form action="../../PHP - process_files/create_dr.php" method="POST">
    <div class="row">
    
        <h1 class="mb-5">Delivery Receipt Details</h1>
        <hr class="mb-5">
        <div class="col-lg-8">
            <?php 
            if(isset($_GET['s'])){
                $supplier_id = preg_replace('/[^0-9]/', '', $_GET['s']);
                $supplier_name = $_GET['name'];
                $supplier_address = $_GET['add'];
            ?>
            <input type="text" name="supplier_id" class="form-control" id="supplier_id" value="<?php echo $supplier_id;?>" hidden>
            <input type="text" class="form-control" value="<?php echo $supplier_name . " - " . $supplier_address;?>" readonly>
            <?php
            } else {
            ?>
            <select class="form-select" id="supplier_id" name="supplier_id" aria-label="Floating label select examplerequired"  data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                <option selected="" value="">Select Supplier</option>
                <?php include "supplier_option.php"; ?>
            </select>
            <?php  
            } 
            ?>
        </div>
        <div class="col-lg-4">
            <div class="form-floating mb-3">
                <input class="form-control" id="checked_by" name="checked_by" type="text" placeholder="Enter full name" required/>
                <label for="floatingInput">Checked by</label>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-floating mb-3">
                <input class="form-control" id="approved_by" name="approved_by" type="text" placeholder="Enter full name" required/>
                <label for="floatingInput">Approved by</label>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-floating mb-3">
                <input class="form-control" id="delivered_by" name="delivered_by" type="text" placeholder="Enter full name" required/>
                <label for="floatingInput">Delivered by</label>
            </div>
        </div>
        <div class="col-lg-4">
            <label class="form-label" for="datepicker">Recieved Date</label>
            <input class="form-control datetimepicker" name="received_date" id="received_date" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true,"dateFormat":"d/m/Y"}' required/>
        </div>
        <?php 
        if(isset($_GET['DR'])){
            $po_id = preg_replace('/[^0-9]/', '', $_GET['DR']);
        ?>
        <div class="col-lg-12" hidden>

            <?php 
            $po_sql = "SELECT * FROM purchased_order_content_wh WHERE po_id = '$po_id'";
            $po_res = $conn->query($po_sql);
            while($po = $po_res -> fetch_assoc()){
                $product_id = $po['product_id'];
                $order = $po['order_qty'];
                $amount = $po['est_amount']/$order;
            ?>
            <input type="text" name="product_id[]" value="<?php echo $product_id;?>"><br>
            <input type="text" name="qty[]" id="" value="<?php echo $order; ?>"><br>
            <input type="text" name="amount[]" value="<?php echo $amount;?>"><br>
            <p>---------------------------------------------</p>
            <?php
            }
            ?>
        </div>
        <?php 
        }
        ?>
        <div class="col-lg-12 text-end">
            <button class="btn btn-primary mt-4" type="submit">Next</button>
        </div>

    </div>
</form>
</div>