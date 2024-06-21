<?php
$user_position_sql = "SELECT * FROM `groups` ORDER BY id DESC";
$user_position_res = $conn->query($user_position_sql);
if($user_position_res->num_rows>0){
    while($row=$user_position_res->fetch_assoc()){
        if($row['status'] == 1){
            $status = '<span class="badge badge-phoenix badge-phoenix-success">Active</span>';
        } else {
            $status = '<span class="badge badge-phoenix badge-phoenix-danger">Disabled</span>';
        }
        if($row['position_name'] !== 'System Developer'){
?>
<tr>
    <td class="white-space-nowrap fs--1 align-middle ps-0" style="max-widtd:20px; widtd:18px;">
    <div class="form-check mb-0 fs-0">
        <input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' />
    </div>
    </td>
    <td class="branch_name"><?php echo $row['position_name']; ?></td>
    <td class="status text-start"><?php echo $status;?></td>
    <td class="address text-center">
        <button class="btn btn-outline-secondary mb-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#inventory_offcanvas_<?php echo $row['id'];?>" aria-controls="offcanvasRight">View Permissions</button>
    </td>
</tr>
<?php
    }
}
} else {
?>
<tr>
    <td class="text-center py-10" colspan="5"><h1 class="text-400"><span class="far fa-clipboard"></span> Empty!!</h1></td>
</tr>
<?php
}
?>
