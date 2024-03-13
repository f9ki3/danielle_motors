<?php
$images_sql = "SELECT * FROM logo ORDER BY id DESC";
$image_res = $conn->query($images_sql);
if($image_res->num_rows>0){
    while($row = $image_res -> fetch_assoc()){
        if($row['status'] === 1){
            $status = "ACTIVE";
        } else {
            $status = "DISABLED";
        }
?>
<tr class="position-static">
    <td class=" align-middle">
    <div class="form-check mb-0"><input class="form-check-input" type="checkbox" name="product_id" value="<?php echo $row['id']; ?>" id="product_id"/></div>
    </td>
    <td class="product align-middle text-center ps-4"><img src="../../uploads/<?php echo $row['logo_name']; ?>" class="img-fluid" alt=""></td>
    <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4"><?php echo $status;?></td>
    <td class="category align-end text-end white-space-nowrap text-600 ps-4 fw-semi-bold"><?php echo $row['publish_by']; ?></td><td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
    <div class="font-sans-serif btn-reveal-trigger position-static">
        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
        <div class="dropdown-menu dropdown-menu-end py-2">
            <?php include "actions.php"; ?>
            </div>
        </div>
    </td>
</tr>
<?php
    }
}
?>
