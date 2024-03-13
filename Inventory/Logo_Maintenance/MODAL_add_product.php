<div class="modal fade" id="add_product" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="add_product_form" action="" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">LOGO</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 mb-2">
              <input class="form-control" type="file" name="logo" id="logo_input" accept="image/png" required>
            </div>
            <div class="col-lg-12 d-flex justify-content-center mt-2">
              <div class="form-check">
                <input class="form-check-input" id="flexCheckChecked" type="checkbox" value="" checked="" />
                <label class="form-check-label" for="flexCheckChecked">Set as logo</label>
              </div>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Okay</button>
          <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
      </div>
    </form>
  </div>
</div>

<script>
    function checkImageSize() {
        const input = document.getElementById('logoInput');
        const file = input.files[0];
        
        if (file) {
            const img = new Image();
            
            img.onload = function() {
                if (img.width === img.height) {
                    alert('Image is a square.');
                } else {
                    alert('Please select a square image.');
                    input.value = ''; // Clear the file input
                }
            };
            
            img.src = URL.createObjectURL(file);
        }
    }

    function submitForm() {
        // You can add any additional checks here if needed
        document.getElementById('uploadForm').submit();
    }
</script>