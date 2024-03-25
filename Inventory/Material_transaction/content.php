
<div class="row">
    <div class="col-auto">
        <h1>TEST</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 text-start">
                        <h6>Material Invoice : <b><?php echo $_SESSION['invoice']; ?></b></h6>
                    </div>
                    <div class="col-lg-6 text-end">
                        <button class="btn btn-outline-secondary">Print</button>
                    </div>
                    <div class="col-lg-12">
                        <h6>Date: <b>2024-02-24</b></h6>
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
                                        <td>John Cena</td>
                                        <td>Fyke Lleva</td>
                                        <td>Loerm</td>
                                        <td>asdasd</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Product Name</th>
                                        <th>Model</th>
                                        <th>Brand</th>
                                        <th>Qty Added</th>
                                        <th>Date</th>
                                        <th>SRP</th>
                                        <th>Selling Price</th>
                                        <th>Markup</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include "material_transaction_tr.php"; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>