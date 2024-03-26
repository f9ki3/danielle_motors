<?php
$sql = "SELECT mt.*, p.name AS product_name, p.models AS product_model, p.image, p.code, c.category_name, b.brand_name, u.name AS unit_name
        FROM material_transaction mt
        LEFT JOIN product p ON mt.product_id = p.id
        LEFT JOIN category c ON p.category_id = c.id
        LEFT JOIN brand b ON p.brand_id = b.id
        LEFT JOIN unit u ON p.unit_id = u.id
        WHERE mt.material_invoice_id = '$invoice'";
$res = $conn->query($sql);

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $id = $row['id'];
        $product_id = $row['product_id'];
        $input_srp = $row['input_srp'];
        $input_selling_price = $row['input_selling_price'];
        $qty_added = $row['qty_added'];
        $qty_sent = $row['qty_sent'];
        $markup_peso = $row['markup_peso'];
        $created_at = $row['created_at'];
        $status = $row['status'];
        $product_name = $row['product_name'];
        $product_model = $row['product_model'];
        $category_name = $row['category_name'];
        $brand_name = $row['brand_name'];
        $unit_name = $row['unit_name'];
        $product_img = $row['image'];
        $product_code = $row['code'];
?>
<tr>
    <td class="text-center p-0"><img src="../../uploads/<?php echo basename($product_img); ?>" class="img-fluid" style="height: 50px;"></td>
    <td><?php echo $product_name; ?></td>
    <td><?php echo $product_model; ?></td>
    <td><?php echo $product_code; ?></td>
    <td class="text-end"><?php echo number_format($input_srp, 2);?></td>
    <td><?php echo $qty_added;?></td>
    <td><input name="transaction_id" type="text" value="<?php echo $id; ?>" hidden><input name="qty_sent" type="number" class="form-control" min="0" max="10000" value="<?php echo $qty_added;?>"></td>
    <td class="text-end"><?php echo number_format($markup_peso, 2);?></td>
    <td><?php echo $status; ?></td>
    <td class="text-end"><?php echo number_format($input_selling_price, 2);?></td>
</tr>
<?php
    }
}
?>
