<div class="modal fade" id="add_permission" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="../../PHP - process_files/add_permission.php" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="verticallyCenteredModalLabel">Permission</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" type="text" name="permission_name" placeholder="name@example.com" />
                <label for="floatingInput">Permission Name</label>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer"><button class="btn btn-primary" type="submit">Okay</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
    </div>
    </form>
  </div>
</div>