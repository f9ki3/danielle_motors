<div class="row">
    <h1 class="mb-5">Delivery Receipt Details</h1>
    <hr class="mb-5">
    <div class="col-lg-8">
        <div class="form-floating">
            <select class="form-select" id="supplier_id" name="supplier_id" aria-label="Floating label select example">
                <option selected="">Select Supplier</option>
                <?php include "supplier_option.php"; ?>
            </select>
            <label for="floatingSelect">Works with selects</label>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-floating mb-3">
            <input class="form-control" id="floatingInput" type="email" placeholder="name@example.com" />
            <label for="floatingInput">Checked by</label>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-floating mb-3">
            <input class="form-control" id="floatingInput" type="email" placeholder="name@example.com" />
            <label for="floatingInput">Approved by</label>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-floating mb-3">
            <input class="form-control" id="floatingInput" type="email" placeholder="name@example.com" />
            <label for="floatingInput">Delivered by</label>
        </div>
    </div>
    <div class="col-lg-4">
    <label class="form-label" for="datepicker">Start Date</label>
        <input class="form-control datetimepicker" id="datepicker" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true,"dateFormat":"d/m/Y"}' />
    </div>
</div>