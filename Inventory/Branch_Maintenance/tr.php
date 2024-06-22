<?php 
$branch_sql = "SELECT * FROM branch WHERE brn_status != 0";
$branch_res = $conn->query($branch_sql);
if($branch_res->num_rows>0){
    while($row=$branch_res->fetch_assoc()){
        $full_address = $row['brn_address'] . ", " . $row['brn_brgy'] . ", " . $row['brn_municipality'] . ", " . $row['brn_province'];
        if($row['brn_status'] == 1){
            $status = '<span class="badge badge-phoenix badge-phoenix-success">Active</span>';
        } else {
            $status = '<span class="badge badge-phoenix badge-phoenix-danger">Disabled</span>';
        }
?>
<tr class="position-static">
    <td class="fs--1 align-middle">
    <div class="form-check mb-0 fs-0">
        <input class="form-check-input" type="checkbox" />
    </div>
    </td>
    <td class="branch_name"><?php echo $row['brn_name'];?></td>
    <td class="status"><?php echo $status;?></td>
    <td class="address"><?php echo ucwords(strtolower($full_address));?></td>
    <td class="telephone"><?php echo $row['brn_telnum'];?></td>
    <!-- <td class="phone"><?php //echo $row['brn_contact'];?></td> -->
    <td class="email"><?php echo $row['brn_email'];?></td>
    <!-- <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
    <div class="font-sans-serif btn-reveal-trigger position-static">
        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
        <span class="fas fa-ellipsis-h fs--2"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-end py-2">
        <a class="dropdown-item" href="#!">View</a>
        <a class="dropdown-item" href="#!">Export</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" href="#!">Remove</a>
        </div>
    </div>
    </td> -->
</tr>
<?php 
    }
} else {
?>
<tr class="position-static">
    <td class="text-center p-9" colspan="8">
        <h1 class=" text-400"><span class="far fa-eye-slash"></span> EMPTY!!</h1>
    </td>
</tr>
<?php
}
?>
<!-- <tr class="position-static">
    <td class="fs--1 align-middle">
    <div class="form-check mb-0 fs-0">
        <input class="form-check-input" type="checkbox" />
    </div>
    </td>
    <td class="branch_name"></td>
    <td class="status"></td>
    <td class="address"></td>
    <td class="telephone"></td>
    <td class="phone"></td>
    <td class="email"></td>
    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
    <div class="font-sans-serif btn-reveal-trigger position-static">
        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
        <span class="fas fa-ellipsis-h fs--2"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-end py-2">
        <a class="dropdown-item" href="#!">View</a>
        <a class="dropdown-item" href="#!">Export</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" href="#!">Remove</a>
        </div>
    </div>
    </td>
</tr> -->