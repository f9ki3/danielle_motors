<div class="modal fade" id="add_supplier" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <form id="add_supplier_form" action="../../PHP - process_files/add_supplier.php" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SUPPLIER</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fas fa-times fs--1"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <input class="form-control" type="file" name="supplier_logo" id="supplier_logo" accept="image/*" required>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="supplier_name" name="supplier_name" type="text" placeholder="Supplier Name" required/>
                            <label for="supplier_name">Supplier Name</label>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-floating">
                            <textarea class="form-control" id="address" name="address" placeholder="Leave a comment here" style="height: 100px" required></textarea>
                            <label for="address">Address</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="supplier_email" name="supplier_email" type="email" placeholder="name@example.com"/>
                                    <label for="supplier_email">Email address</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="phone" name="phone" type="number" placeholder="Phone"/>
                                    <label for="phone">Phone</label>
                                </div>
                            </div>
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

