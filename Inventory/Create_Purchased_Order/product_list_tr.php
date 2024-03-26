<?php 

$product_sql = "SELECT p.id, p.name, p.code, p.barcode, p.image, p.models, p.unit_id, p.brand_id, p.category_id, c.category_name, b.brand_name, u.name as unit_name 
                FROM product p
                LEFT JOIN category c ON p.category_id = c.id
                LEFT JOIN brand b ON p.brand_id = b.id
                LEFT JOIN unit u ON p.unit_id = u.id LIMIT 5";

$product_res = $conn->query($product_sql);

if($product_res->num_rows > 0){
    while($row = $product_res->fetch_assoc()){
        $product_id = $row['id'];
        $product_name = $row['name'];
        $product_code = $row['code'];
        $manufactureres_barcode = $row['barcode'];
        $product_image = $row['image'];
        $models = $row['models'];
        $unit_id = $row['unit_id'];
        $brand_id = $row['brand_id'];
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
        $brand_name = $row['brand_name'];
        $unit_name = $row['unit_name'];

        $total_stocks_sql = "SELECT SUM(qty) AS total_qty FROM stocks WHERE product_id = '$product_id'";
        $total_stocks_res = $conn->query($total_stocks_sql);
        if($total_stocks_res -> num_rows>0){
            $row = $total_stocks_res -> fetch_assoc();
            $total_stocks = $row['total_qty'];
        } else {
            $total_stocks = 0;
        }

        $product_stocks = $total_stocks;
        
        echo '<tr>
            <td colspan="9">' . $product_stocks . '
            </td>
        </tr>';
        
    }
}
?>
