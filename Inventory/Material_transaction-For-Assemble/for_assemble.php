<?php
$mat_trans_sql_again = "SELECT mt.*, p.name AS product_name, p.models AS product_model, p.image, p.code, c.category_name, b.brand_name, u.name AS unit_name, mt.product_id
FROM material_transaction mt
LEFT JOIN product p ON mt.product_id = p.id
LEFT JOIN category c ON p.category_id = c.id
LEFT JOIN brand b ON p.brand_id = b.id
LEFT JOIN unit u ON p.unit_id = u.id
WHERE mt.material_invoice_id = '$invoice_id'";
$mat_trans_res_again = $conn->query($mat_trans_sql_again);
if($mat_trans_res_again->num_rows > 0){
    while($row = $mat_trans_res_again->fetch_assoc()){
        $requested_qty = $row['qty_added'];
        $_product_name = $row['product_name'];
        $_product_model = $row['product_model'];
        $_product_image = $row['image'];
        $_product_code = $row['code'];
        $_category_name = $row['category_name'];
        $_brand_name = $row['brand_name'];
        $_unit_name = $row['unit_name'];
        $_product_id = $row['product_id'];
        $stocks_sql = "SELECT COUNT(product_id) AS product_id_count, qty, ware_loc_id FROM stocks WHERE product_id = '$_product_id' ORDER BY date_added ASC";
        $stocks_res = $conn->query($stocks_sql);
        $total_available_qty = 0;
        $items_to_pick = array();
                            
        if($stocks_res->num_rows > 0){
            while($row = $stocks_res->fetch_assoc()){
                $count = $row['product_id_count'];
                $available_qty = min($row['qty'], $requested_qty - $total_available_qty);
                                    
                // Add to the items to pick array
                $items_to_pick[] = array(
                    'count_id' => $row['product_id_count'],
                    'rack_location' => $row['ware_loc_id'],
                    'qty_to_pick' => $available_qty
                );

                // Update total available quantity
                $total_available_qty += $available_qty;
                
                // If we have reached the requested quantity, break the loop
                if ($total_available_qty >= $requested_qty) {
                    break;
                }

            }
        } else {
            // Add to the items to pick array
            $items_to_pick[] = array(
                'count_id' => $_product_id,
                'rack_location' => "N/A",
                'qty_to_pick' => 0
            );
        }

        // Display the result
        if ($total_available_qty < $requested_qty) {
            echo '<tr>
                    <td>'. $_product_name .'</td>
                    <td>'. $_brand_name .'</td>
                    <td>'. $_category_name .'</td>
                    <td>'. $_unit_name .'</td>
                    <td>'. $_product_model .'</td>
                    <td>'. $_rack_location .'</td>
                    <td>'. $qty_to_pick .'</td>
                </tr>';
        } else {
            echo "Pick the following items:\n";
            foreach ($items_to_pick as $item) {
                echo '<tr>
                    <td>'. $item['count_id'] .'</td>
                    <td>'. $item['rack_location'] .'</td>
                    <td>'. $item['qty_to_pick'] .'</td>
                </tr>';
            }
        }
    }
}
?>
