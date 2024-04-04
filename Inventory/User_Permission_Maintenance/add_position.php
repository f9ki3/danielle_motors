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
            <div class="col-lg-12">
              <div class="form-floating mb-3">
                <select class="form-select" name="permission_group" id="permission_group_select">
                  <option value="" selected></option>
                  <option value="others">others</option>
                  <?php 
                  $permission_group_sql = "SELECT permission_group FROM permission GROUP BY permission_group ORDER BY id DESC";
                  $permission_group_res = $conn->query($permission_group_sql);
                  if($permission_group_res->num_rows>0){
                    while($permission_row = $permission_group_res -> fetch_assoc()){
                      echo '<option value="' . $permission_row['permission_group'] . '">' . ucwords(strtolower($permission_row['permission_group'])) . '</option>';
                    }
                  }
                  ?>
                </select>
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