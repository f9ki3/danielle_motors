<?php 
$supplier_sql = "SELECT * FROM supplier ORDER BY id DESC";
$supplier_res = $conn -> query($supplier_sql);
if($supplier_res -> num_rows > 0){
    while($row = $supplier_res -> fetch_assoc()){
        if($row['status'] === '1'){
            $status = '<span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">ACTIVE</span><span class="ms-1" data-feather="check" style="height:12.8px;width:12.8px;"></span></span>';
        } else {
            $status = '<span class="badge badge-phoenix fs--2 badge-phoenix-danger"><span class="badge-label">DISABLED</span><span class="ms-1" data-feather="x " style="height:12.8px;width:12.8px;"></span></span>';
        }
        if(!isset($row['supplier_logo']) || empty($row['supplier_logo'])){
            $supplier_logo = "defaultproduct.png";
        } else {
            $supplier_logo = $row['supplier_logo'];
        }
        echo '
        <tr class="position-static">
            <!--<td class="align-middle">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="' . $row['id'] . '" /></div>
            </td>-->
            <td class="align-middle white-space-nowrap py-0"><a class="d-block border rounded-2" href="../../uploads/' . basename($supplier_logo) . '"><img src="../../uploads/' . basename($supplier_logo) . '" alt="" width="53" /></a></td>
            <td class="product align-middle ps-4"><a class="fw-semi-bold line-clamp-3 mb-0" href="#">' . $row['supplier_name'] . '</a></td>
            <td class="price white-space-nowrap text-start fw-bold text-700 ps-4">' . $row['supplier_email'] . '</td>
            <td class="category align-middle white-space-nowrap text-600 ps-4 fw-semi-bold">' . $row['supplier_address']  . '</td>
            <td class="tags align-middle text-center review pb-2 ps-3">' . $status . '</td>
            <td class="vendor align-middle text-start fw-semi-bold ps-4">' . $row['phone'] . '</td>
            <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
            <div class="font-sans-serif btn-reveal-trigger position-static">
                <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                <div class="dropdown-menu dropdown-menu-end py-2">
                    <a class="dropdown-item" href="#!">View</a>
                    <a class="dropdown-item" href="#!">Export</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#!">Remove</a>
                </div>
            </div>
            </td>
        </tr>
        ';
        
    }
} else {
    echo   '<tr>
                <td class="text-center text-danger" colspan="9"><b>*-*-*-*-*-*-*-*-> EMPTY DATA <-*-*-*-*-*-*-*-* </b></td>
            </tr>';
}
?>