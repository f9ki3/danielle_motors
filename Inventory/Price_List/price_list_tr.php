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
        echo '<tr class="position-static">
                <td class="align-middle white-space-nowrap py-0"><img src="../../uploads/' . basename($image) .'" alt="" width="53" /></td>
                <td class="product align-middle ">' . $name . '</td>
                <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ">' . $supplier_code . '</td>
                <td class="category align-middle white-space-nowrap text-600 fw-semi-bold">' . $models . '</td>
                <td class="tags align-middle review pb-2 ps-3">₱'.number_format($dealer).'</td>
                <td class="vendor align-middle text-start fw-semi-bold ">₱'.number_format($wholesale).'</td>
                <td class="time align-middle white-space-nowrap text-600 ">₱'.number_format($srp).'</td>
                <td class="align-middle white-space-nowrap text-end pe-0  btn-reveal-trigger">
                    <button class="btn btn-primary cart-button" 
                        data-product-id="'.$id.'"
                        data-product-srp="'.$srp.'"
                    >
                    <i class="fas fa-cart-plus"></i>
                    </button>
                </td>
            </tr>';
    }
?>