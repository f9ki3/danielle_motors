<?php
$permissions_sql = "SELECT id, permission_name FROM `groups`";
$permissions_res = $conn->query($permissions_sql);

if($permissions_res->num_rows > 0) {
    while($perm_row = $permissions_res->fetch_assoc()) {
        $permission = $perm_row['permission_name'];
        $permission_id = $perm_row['id'];
?>
        <div class="offcanvas offcanvas-end" id="inventory_offcanvas_<?php echo $permission_id; ?>" tabindex="-1" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Permissions</h5>
                <button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="row">
                    <form action="../../PHP - process_files/update_position_permission.php" method="post">
                        <input type="text" name="permission_id" value="<?php echo $permission_id; ?>" hidden>
                        <?php 
                        // Retrieve permission group
                        $_permission_group_sql = "SELECT DISTINCT permission_group FROM permission";
                        $_permission_group_res = $conn->query($_permission_group_sql);
                        if($_permission_group_res->num_rows > 0) {
                            while($_group_row = $_permission_group_res->fetch_assoc()) {
                                $_permission_group = $_group_row['permission_group'];
                        ?>
                                <hr class="mt-3">
                                <p class="fs--1 mt-1 mb-2"><?php echo $_permission_group; ?></p>
                                <?php 
                                $_permission_checking_sql = "SELECT id, permission_name, permission_group FROM permission WHERE permission_group = '$_permission_group' ORDER BY permission_name ASC";
                                $_permission_checking_res = $conn->query($_permission_checking_sql);
                                if($_permission_checking_res->num_rows > 0) {
                                    while($p_row = $_permission_checking_res->fetch_assoc()) {
                                        $_permission_id = $p_row['id'];
                                        $_permission_name = $p_row['permission_name'];
                                        if(strpos($permission, $_permission_name) !== false) {
                                            $checked = "checked";
                                        } else {
                                            $checked = "";
                                        }
                                ?>
                                        <div class="form-check">
                                            <input class="form-check-input" id="permiso_<?php echo $_permission_id . "_" . $permission_id; ?>" type="checkbox" name="permission[]" value="<?php echo $_permission_name; ?>" <?php echo $checked; ?>/>
                                            <label class="form-check-label" for="permiso_<?php echo $_permission_id . "_" . $permission_id; ?>"><?php echo ucwords(str_replace("_", " ", $_permission_name)); ?></label>
                                        </div>
                                <?php
                                    }
                                }
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
<?php
    }
}
?>
