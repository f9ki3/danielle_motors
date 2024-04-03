<div class="offcanvas offcanvas-end" id="add_position" tabindex="-1" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Create User Position</h5><button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="row g-3 mb-4">
        <form id="UPM_form" action="../../PHP - process_files/add_position.php" method="POST">
            <div class="col-lg-12">
                <div class="form-floating mb-3">
                    <input class="form-control" name="position_name" id="floatingInput" type="text" required/>
                    <label for="floatingInput">Position Name</label>
                </div>
            </div>
            <?php
            $permissionz_sql = "SELECT id, permission_name FROM permission ORDER BY permission_name ASC";
            $permissionz_res = $conn->query($permissionz_sql);
            if($permissionz_res->num_rows>0){
              while($row=$permissionz_res->fetch_assoc()){
            ?>
            <div class="col-lg-12">
              <div class="form-check">
                <input class="form-check-input" id="<?php echo "permission_" . $row['id'];?>" type="checkbox" name="permission[]" value="<?php echo $row['permission_name'];?>" />
                <label class="form-check-label" for="<?php echo "permission_" . $row['id'];?>"><?php echo ucwords(strtolower($row['permission_name']));?></label>
              </div>
            </div>
            <?php
              }
            }
            ?>
            <div class="col-lg-12 text-center my-3">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>