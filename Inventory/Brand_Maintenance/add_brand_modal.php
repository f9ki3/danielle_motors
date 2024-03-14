<div class="modal fade" id="add_brand" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-sm-down">
    <form id="add_brand_form" action="../../PHP - process_files/addBrand.php" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ENTER NEW BRAND</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fas fa-times fs--1"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-floating mb-3">
                    <input class="form-control" type="text" id="brand_name" name="brand_name">
                        <label for="brandName">Brand name</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
  </div>
</div>

