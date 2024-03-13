<?php
    require_once '../../database/database.php';

    $query = 'SELECT price_list_cart.product_id,
                    price_list_cart.qty,
                    price_list_cart.srp,
                    product.image,
                    product.name,
                    product.supplier_code,
                    product.models
                FROM price_list_cart
                INNER JOIN product ON price_list_cart.product_id = product.id';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->bind_result($id, $qty, $srp, $image, $name, $supplier_code, $models);
    $tbody = '';
    $cart_total = array();
    while ($stmt->fetch()){
        $total_srp = $srp * $qty;
        $tbody .= '<tr>
                    <td><img src="'.$image.'" alt="" srcset="" style="width: 90px;"></td>
                    <td>'.$name.'</td>
                    <td>'.$supplier_code.'</td>
                    <td>'.$models.'</td>
                    <td>₱'.$total_srp.'</td>
                    <td>
                        <div class="input-group">
                            <button class="btn btn-sm btn-outline-secondary minus-qty" type="button"
                                data-product-id="'.$id.'"
                                data-product-qty="'.$qty.'"
                            >-</button>
                            <input type="text" class="form-control qty-input" value="'.$qty.'" readonly>
                            <button class="btn btn-sm btn-outline-secondary add-qty" type="button"
                                data-product-id="'.$id.'"
                                data-product-qty="'.$qty.'"
                            >+</button>
                        </div>
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
    $json['cart_total'] = array_sum($cart_total);
    echo json_encode($json);
?>