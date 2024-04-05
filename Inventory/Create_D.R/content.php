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
            <select class="form-select" id="supplier_id" name="supplier_id" aria-label="Floating label select examplerequired"  data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                <option selected="" value="">Select Supplier</option>
                <?php include "supplier_option.php"; ?>
            </select>
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
        <div class="col-lg-12 text-end">
            <button class="btn btn-primary" type="submit">Next</button>
        </div>

    </div>
</form>
</div>