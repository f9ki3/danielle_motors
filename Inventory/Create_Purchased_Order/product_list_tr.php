<?php 
// Prepare SQL query to fetch product information with total stocks
$product_sql = "SELECT p.id, p.name, p.code, p.barcode, p.image, p.models, p.unit_id, p.brand_id, p.category_id, 
                c.category_name, b.brand_name, u.name as unit_name, COALESCE(SUM(s.qty), 0) AS total_qty
                FROM product p
                LEFT JOIN category c ON p.category_id = c.id
                LEFT JOIN brand b ON p.brand_id = b.id
                LEFT JOIN unit u ON p.unit_id = u.id
                LEFT JOIN stocks s ON p.id = s.product_id
                GROUP BY p.id";

// Execute the SQL query
$product_res = $conn->query($product_sql);

// Check if there are any products retrieved
if ($product_res->num_rows > 0) {
    while ($row = $product_res->fetch_assoc()) {
        // Retrieve product information from the fetched row
        $product_id = $row['id'];
        $product_name = $row['name'];
        $total_stocks = $row['total_qty'];

        // Display product information in table row
        echo '<tr>
                <td colspan="11">' . $total_stocks . ' ' . $product_name . '</td>
              </tr>';
    }
} else {
    echo '<tr>
        <td colspan="11" class="text-center" style="padding:250px;"><h1><span class="far fa-angry"></span></h1><br> Empty!</td>
    </tr>';
}
?>
