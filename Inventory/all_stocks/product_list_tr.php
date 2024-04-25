<?php
    $query = 'SELECT
                    stocks.id,
                    stocks.stocks,
                    stocks.rack_loc_id, 
                    product.id, 
                    product.name, 
                    product.barcode,
                    product.supplier_code,
                    product.image,
                    product.models,
                    category.category_name,
                    brand.brand_name,
                    unit.name,
                    product.active,
                    user.user_fname,
                    user.user_lname,
                    branch.brn_name
                FROM stocks 
                INNER JOIN product ON product.id = stocks.product_id
                INNER JOIN category ON category.id = product.category_id
                INNER JOIN brand ON brand.id = product.brand_id
                INNER JOIN unit ON unit.id = product.unit_id
                LEFT JOIN user ON user.id = stocks.publish_by
                LEFT JOIN branch ON branch.brn_code = stocks.branch_code
                ORDER BY product.id DESC';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->bind_result($stock_id, $stock_qty, $location, $product_id, $product_name, $product_barcode, $product_upc, $product_image, $models, $category, $brand, $unit, $active, $user_fname, $user_lname, $branch_name);
    while ($stmt->fetch()) {
        if ($active == 1) {
            $status = 'active';
        } else {
            $status = 'inactive';
        }

        echo '<tr>
                <!--<td class="fs--1 align-middle">
                    <div class="form-check mb-0 fs-0">
                        <input class="form-check-input" type="checkbox"/>
                    </div>
                </td>-->
                <td class="align-middle white-space-nowrap py-0"><img src="../../uploads/'.basename($product_image).'" alt="" width="53" ></td>
                <td class="product align-middle ps-4">'.$product_name.'</td>
                <td class="itemcode align-middle white-space-nowrap text-start ps-4"><img src="../../assets/php-barcode-master/barcode.php?codetype=Code128&size=50&text='.$product_barcode.'&print=true" class="img img-fluid"></td>
                <td class="location align-middle white-space-nowrap ps-4 text-start"><span class="badge badge-phoenix badge-phoenix-secondary">'.$location.'</span></td>
                <td class="category align-middle review pb-2 ps-3" style="min-width:225px;">'.$category.'</td>
                <td class="brand align-middle text-start fw-semi-bold ps-4">'.$brand.'</td>
                <td class="unit align-middle white-space-nowrap text-600 ps-4">'.$unit.'</td>
                <td class="model align-middle white-space-nowrap text-600 ps-4">'.$models.'</td>
                <td class="qty align-middle white-space-nowrap text-600 ps-4">'.$stock_qty.'</td>
                <td class="status align-middle white-space-nowrap text-600 ps-4"></td>
                <td class="publishby align-middle white-space-nowrap text-600 ps-4">' . $user_fname . ' ' . $user_lname . '</td>
                <td class="branch align-middle white-space-nowrap text-1000 ps-4"><b>' . $branch_name . '</b></td>
                <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                    <div class="font-sans-serif btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="Print_barcode.php?id=' . $product_id . '&barcode=' . $product_barcode . '&qty=' . $stock_qty . '&name=' . $product_name . '&brand=' . $brand . '&category=' . $category . '&unit=' . $unit . '&model=' . $models . '"  target="_blank">Print Barcodes</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                    </div>
                </td>
            </tr>';
    }

    $stmt->close();
?>