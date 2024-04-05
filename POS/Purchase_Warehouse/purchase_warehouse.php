<?php
$query = 'SELECT price_list.dealer,
                    price_list.wholesale,
                    price_list.srp,
                    product.image,
                    product.name,
                    product.supplier_code,
                    product.models,
                    product.id
            FROM price_list
            INNER JOIN product ON price_list.product_id = product.id';
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->bind_result($dealer, $wholesale, $srp, $image, $name, $supplier_code, $models, $id);
while ($stmt->fetch()) {
    echo '
    <tr>
    <td class="fs--1 align-middle">
        <div class="form-check mb-0 fs-0">
            <input class="form-check-input" type="checkbox">
        </div>
    </td>
    <td class="align-middle white-space-nowrap py-0">
        <div style="height: 50px; width: 50px">
            <img style="width: 100%; height: 100%; object-fit: cover" src="../../uploads/'. basename($image) .'" alt="" width="53">
        </div>
    </td>
    <td class="product align-middle ps-4">' . $name . '</td>
    <td class="price align-middle white-space-nowrap text-start ps-4"><span class="badge badge-phoenix badge-phoenix-primary">' . $supplier_code . '</span></td>
    <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">Pulley Set</td>
    <td class="vendor align-middle text-start fw-semi-bold ps-4">HIRC</td>
    <td class="unit align-middle white-space-nowrap text-600 ps-4">11gg</td>
    <td class="model align-middle white-space-nowrap text-600 ps-4">' . $models . '</td>
    <td class="status align-middle white-space-nowrap text-600 ps-4"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">active</span><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check ms-1" style="height:12.8px;width:12.8px;"><polyline points="20 6 9 17 4 12"></polyline></svg></span></td>
    <td class="text-center align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
        <button class="btn me-3 btn-primary rounded rounded rounded-5 m-0 p-2"><span class="fas fa-cart-plus "></span></button>
    </td>
    </tr>';
}
?>
