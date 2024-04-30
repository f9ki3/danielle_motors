<?php

// Fetch products with related information using JOINs
$product_sql = "
    SELECT 
        p.id AS product_id, 
        p.name AS product_name, 
        p.models AS product_models, 
        p.image,
        b.brand_name, 
        c.category_name, 
        u.name AS unit_name, 
        COALESCE(SUM(s.stocks), 0) AS total_stocks
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
        $product_image = $product_row['image'];
        if ($stocks < $critical_stocks) {
            $bg = '<span class="badge badge-phoenix badge-phoenix-danger">' . $stocks . '</span>';
        } elseif ($stocks <= $warning_stocks) {
            $bg = '<span class="badge badge-phoenix badge-phoenix-warning">' . $stocks . '</span>';
        } elseif ($stocks >= $max_stocks) {
            $bg = '<span class="badge badge-phoenix badge-phoenix-danger">' . $stocks . '</span>';
        } else {
            $bg = '<span class="badge badge-phoenix badge-phoenix-success">' . $stocks . '</span>';
        }
?>
        
        <tr>
            <td class="fs--1 align-middle">
                <div class="form-check mb-0 fs-0">
                    <input class="form-check-input" type="checkbox" data-bulk-select-row="{<input type='checkbox' name='product_id[]' value='<?php echo $product_id; ?>'  checked><input type='text' name='product_name[]' value='<?php echo $product_name; ?>' hidden><input type='text' name='category[]' value='<?php echo $category_name; ?>' hidden><input type='text' name='brand[]' value='<?php echo $brand_name; ?>' hidden><input type='text' name='unit[]' value='<?php echo $unit_name; ?>' hidden><input type='text' name='models[]' value='<?php echo $product_models; ?>' hidden> <input type='text' name='current_stock[]' value='<?php echo $stocks; ?>' hidden>}" />
                </div>
            </td>
            <td><img src="../../uploads/<?php echo basename($product_image); ?>" class="img img-fluid" width="53" alt=""></td>
            <td class="text-start name"><a  data-bs-toggle="collapse" href="#collapseExample_<?php echo $product_id;?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo $product_name; ?></a></td>
            <td class="text-start category"><?php echo $category_name; ?></td>
            <td class="text-start brand"><?php echo $brand_name; ?></td>
            <td class="text-start unit"><?php echo $unit_name; ?></td>
            <td class="text-start models"><?php echo $product_models; ?></td>
            <td class="text-center stock"><?php echo $bg; ?></td>
            
        </tr>
        <tr class="collapse" id="collapseExample_<?php echo $product_id;?>">
            <td colspan="8"></td>
        </tr>
        
<?php
        
    }
} else {
    // Handle query execution error
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
