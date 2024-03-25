<?php
$purchased_orders_sql = "SELECT po.id, po.supplier_id, po.status, po.po_id, po.requested_by, po.publish_on, s.supplier_name, s.supplier_logo
FROM purchased_order po 
LEFT JOIN supplier s ON po.supplier_id = s.id 
ORDER BY po.id DESC";

$purchased_orders_res = $conn->query($purchased_orders_sql);

if ($purchased_orders_res->num_rows > 0) {
    while ($row = $purchased_orders_res->fetch_assoc()) {
    $id = $row['id'];
    $supplier_id = $row['supplier_id'];
    $status = $row['status'];
    $po_id = $row['po_id'];
    $requested_by = $row['requested_by'];
    $publish_on = $row['publish_on'];
    $supplier_name = $row['supplier_name'];
    $supplier_logo = $row['supplier_logo'];

    echo '<tr class="position-static">
    <td class="fs--1 align-middle">
        <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"/></div>
    </td>
    <td class="align-middle white-space-nowrap py-0"><a class="d-block border rounded-2" href="../landing/product-details.html"><img src="../../uploads/' . $supplier_logo  . '" alt="" width="53" /></a></td>
    <td class="supplier text-start"><a class="fw-semi-bold line-clamp-3 mb-0" href="../landing/product-details.html">' . $supplier_name . '</a></td>
    <td class="po text-start">' . $po_id . '</td>
    <td class="status text-start">' . $status . '</td>
    <td class="requestedby text-start">' . $requested_by . '</td>
    <td class="publishon text-start">' . $publish_on . '</td>
    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
        <div class="font-sans-serif btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
            <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
            </div>
        </div>
    </td>
</tr>';
    }
} else {
    echo '<tr>
    <td class="text-center py-9" colspan="7"><h1 class="fs-6"><span class="far fa-file-excel text-secondary"></span></h1><br><p class="fs-6">No data!</p></td>
    </tr>';
}
