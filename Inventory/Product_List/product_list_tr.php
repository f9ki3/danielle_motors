<?php
    $query = 'SELECT 
                    product.id, 
                    product.name, 
                    product.code,
                    product.supplier_code,
                    product.image,
                    product.models,
                    product.barcode,
                    category.category_name,
                    brand.brand_name,
                    unit.name,
                    product.active,
                    user.user_fname,
                    user.user_lname
                FROM product
                LEFT JOIN category ON category.id = product.category_id
                LEFT JOIN brand ON brand.id = product.brand_id
                LEFT JOIN unit ON unit.id = product.unit_id
                LEFT JOIN user ON user.id = product.publish_by
                ORDER BY product.id DESC';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->bind_result($product_id, $product_name, $product_sku, $product_upc, $product_image, $models, $barcode, $category, $brand, $unit, $active, $user_fname, $user_lname);
    while ($stmt->fetch()) {
        if ($active == 1) {
            $status = 'active';
        } else {
            $status = 'inactive';
        }

        echo '<tr>
                <td class="fs--1 align-middle">
                    <div class="form-check mb-0 fs-0">
                        <input class="form-check-input" type="checkbox"/>
                    </div>
                </td>
                <td class="align-middle white-space-nowrap py-0"><img src="../../uploads/'.basename($product_image).'" alt="" width="53" ></td>
                <td class="product align-middle ps-4">'.$product_name.'</td>
                <td class="price align-middle white-space-nowrap text-start ps-4"><span class="badge badge-phoenix badge-phoenix-primary">'.$product_sku.'</span></td>
                <td class="category align-middle white-space-nowrap ps-4 text-start"><span class="badge badge-phoenix badge-phoenix-secondary">'.$product_upc.'</span></td>
                <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">'.$category.'</td>
                <td class="vendor align-middle text-start fw-semi-bold ps-4">'.$brand.'</td>
                <td class="time align-middle white-space-nowrap text-600 ps-4">'.$unit.'</td>
                <td class="time align-middle white-space-nowrap text-600 ps-4">'.$models.'</td>
                <td class="time align-middle white-space-nowrap text-600 ps-4"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">'.$status.'</span><span class="ms-1" data-feather="check" style="height:12.8px;width:12.8px;"></span></span></td>
                <td class="publish align-middle white-space-nowrap text-600 ps-4">' . $user_fname . ' ' . $user_lname . '</td>
                <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                    <div class="font-sans-serif btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="print_barcode.php?barcode=' . $barcode . '">Export</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                    </div>
                </td>
            </tr>';
    }

    $stmt->close();
?>