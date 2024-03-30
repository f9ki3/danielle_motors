<?php

// Fetch products with related information using JOINs
$product_sql = "
    SELECT 
        p.id AS product_id, 
        p.name AS product_name, 
        p.models AS product_models, 
        b.brand_name, 
        c.category_name, 
        u.name AS unit_name, 
        COALESCE(SUM(s.qty), 0) AS total_stocks
    FROM 
        product p
    LEFT JOIN 
        brand b ON p.brand_id = b.id
    LEFT JOIN 
        category c ON p.category_id = c.id
    LEFT JOIN 
        unit u ON p.unit_id = u.id
    LEFT JOIN 
        stocks s ON p.id = s.product_id
    GROUP BY 
        p.id";

$product_res = $conn->query($product_sql);

$critical_stocks = 20;
$warning_stocks = 25;
$max_stocks = 30;
if ($product_res) {
    while ($product_row = $product_res->fetch_assoc()) {
        $product_id = $product_row['product_id'];
        $product_name = $product_row['product_name'];
        $product_models = $product_row['product_models'];
        $brand_name = $product_row['brand_name'];
        $category_name = $product_row['category_name'];
        $unit_name = $product_row['unit_name'];
        $stocks = $product_row['total_stocks'];
        if ($stocks < $critical_stocks) {
            $bg = '<span class="badge badge-phoenix badge-phoenix-danger">' . $stocks . '</span>';
        } elseif ($stocks <= $warning_stocks) {
            $bg = '<span class="badge badge-phoenix badge-phoenix-warning">' . $stocks . '</span>';
        } elseif ($stocks >= $max_stocks) {
            $bg = '<span class="badge badge-phoenix badge-phoenix-danger">' . $stocks . '</span>';
        } else {
            $bg = '<span class="badge badge-phoenix badge-phoenix-success">' . $stocks . '</span>';
        }

        echo '<tr>
            <td class="fs--1 align-middle">
                <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox" data-bulk-select-row="{&quot;name&quot;:&quot;Anna&quot;,&quot;email&quot;:&quot;anna@example.com&quot;,&quot;age&quot;:18}" />
                </div>
            </td>
            <td class="text-start name">' . $product_name . '</td>
            <td class="text-start category">' . $category_name . '</td>
            <td class="text-start brand">' . $brand_name . '</td>
            <td class="text-start unit">' . $unit_name . '</td>
            <td class="text-start models">' . $product_models . '</td>
            <td class="text-center stock">' . $bg . '</td>
            
        </tr>';
        
    }
} else {
    // Handle query execution error
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
