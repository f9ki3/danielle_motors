<div class="modal fade" id="add_product" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="uploadForm" action="../../PHP - process_files/set_as_logo.php" method="POST" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">LOGO</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 mb-2">
              <input class="form-control" type="file" id="logoInput" name="logo" accept="image/*" onchange="checkImageSize()" required>
            </div>
            <div class="col-lg-12 d-flex justify-content-center mt-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="setaslogo" id="setaslogo"/>
                <label class="form-check-label" for="flexCheckChecked">Set as logo</label>
              </div>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit" onclick="submitForm()">Okay</button>
          <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
      </div>
    </form>
  </div>
</div>
