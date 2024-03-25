<?php
    require_once '../../database/database.php';

    $query = 'SELECT price_list_cart.product_id,
                    price_list_cart.qty,
                    price_list_cart.srp,
                    price_list_cart.discount,
                    product.image,
                    product.name,
                    product.models
                FROM price_list_cart
                INNER JOIN product ON price_list_cart.product_id = product.id';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->bind_result($id, $qty, $srp, $discount, $image, $name, $models);
    $tbody = '';
    $cart_total = array();
    while ($stmt->fetch()){
        $total_srp = $srp * $qty;
        if ($discount != 0) {
            $discount_value = $total_srp * ($discount/100);
            $total_srp -= $discount_value;
        }
        $tbody .= '<tr>
                    <td>'.$name.'</td>
                    <td>'.$models.'</td>
                    <td>999</td>
                    <td>₱'.number_format($srp).'</td>
                    <td>₱'.number_format($total_srp).'</td>
                    <td>
                        <div class="input-group">
                            <input type="text" class="form-control text-center qty-input" value="'.$qty.'" readonly>
                        </div>
                        <div class="d-flex justify-content-between mt-1">
                            <button class="btn btn-sm btn-outline-secondary minus-qty" type="button"
                                data-product-id="'.$id.'"
                                data-product-qty="'.$qty.'"
                            >-</button>
                            <button class="btn btn-sm btn-outline-secondary add-qty" type="button"
                                data-product-id="'.$id.'"
                                data-product-qty="'.$qty.'"
                            >+</button>
                        </div>
                    </td>
                    <td>
                        <input type="number" min="0" max="100" class="form-control text-center discount" value="'.$discount.'">
                        <button class="btn btn-sm btn-outline-secondary apply-discount" type="button"
                            data-product-id="'.$id.'"
                            data-product-discount="'.$discount.'"
                        >Apply</button>
                    </td>
                    <td>
                        <button class="btn btn-danger cart-delete"
                            data-product-id="'.$id.'"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>';
        $cart_total[] = $total_srp;
    }
    
    $stmt->close();

    $json = array();
    $json['tbody'] = $tbody;
    $json['cart_total'] = number_format(array_sum($cart_total));
    echo json_encode($json);
?>