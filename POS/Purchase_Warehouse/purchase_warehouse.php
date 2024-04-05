<?php
$query = 'SELECT 
        pl.id AS price_list_id,
        pl.product_id AS pl_product_id,
        pl.dealer,
        pl.wholesale,
        pl.srp,
        p.id AS product_id,
        p.name AS product_name,
        p.code AS product_code,
        p.supplier_code,
        p.barcode,
        p.image,
        p.models,
        p.unit_id,
        u.name AS unit_name,
        p.brand_id,
        b.brand_name,
        p.category_id,
        c.category_name,
        SUM(s.stocks) AS total_stocks,
        s.pending_order
        FROM 
        price_list pl
        JOIN 
        product p ON pl.product_id = p.id
        JOIN 
        brand b ON p.brand_id = b.id
        JOIN 
        category c ON p.category_id = c.id
        JOIN 
        unit u ON p.unit_id = u.id
        LEFT JOIN 
        stocks s ON p.id = s.product_id -- Assuming p.id refers to product_id in stocks table
        WHERE 
        s.branch_code = ? -- Filter by branch_code
        GROUP BY 
        pl.product_id -- Group by product_id
        ORDER BY 
        price_list_id DESC';

$stmt = $conn->prepare($query);
$branch_code = 'WAREHOUSE'; // Assuming WAREHOUSE is the branch code
$stmt->bind_param('s', $branch_code); // Bind parameter
$stmt->execute();
$stmt->bind_result($price_list_id, $pl_product_id, $dealer, $wholesale, $srp, $product_id, $product_name, $product_code, $supplier_code, $barcode, $image, $models, $unit_id, $unit_name, $brand_id, $brand_name, $category_id, $category_name, $total_stocks, $pending_order);

while ($stmt->fetch()) {
    echo '
    <tr>
    <td class="fs--1 align-middle">
        <div class="form-check mb-0 fs-0">
            <input class="form-check-input" type="checkbox">
        </div>
    </td>
    <td class="align-middle white-space-nowrap py-0">
        <div style="height: 50px; width: 50px">
            <img style="width: 100%; height: 100%; object-fit: cover" src="../../uploads/'. basename($image) .'" alt="" width="53">
        </div>
    </td>
    <td class="product align-middle ">' . $product_name . '</td>
    <td class="price align-middle "><span class="badge badge-phoenix badge-phoenix-primary">' . $supplier_code . '</span></td>
    <td class="tags align-middle">Pulley Set</td>
    <td class="vendor align-middle text-start fw-semi-bold ">' . $brand_name . '</td>
    <td class="unit align-middle">'.$unit_name.'</td>
    <td class="model align-middle">' . $models . '</td>
    <td class="status align-middle"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">active</span><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check ms-1" style="height:12.8px;width:12.8px;"><polyline points="20 6 9 17 4 12"></polyline></svg></span></td>
    <td class="product align-middle ">₱ ' . number_format($srp, 2, '.', ',') . '</td>
    <td class="product align-middle ">';

    if($total_stocks == 0){
        echo '<span class="badge badge-phoenix badge-phoenix-danger"> No Stocks</span>';
    } else {
        echo '<span class="badge badge-phoenix badge-phoenix-success">Available (' . $total_stocks . ')</span>';
    }

    echo '</td>
    <td class="text-center align-middle text-end pe-0 ps-4 btn-reveal-trigger">
        <button class="btn me-3 btn-primary rounded rounded rounded-5 m-0 p-2" onclick="addToCart(
        \''.$product_id.'\', 
        \''.$image.'\', 
        \''.$product_name.'\', 
        \''.$supplier_code.'\', 
        \''.$brand_name.'\', 
        \''.$unit_name.'\', 
        \''.$models.'\', 
        \''.$srp.'\', 
        \''.$total_stocks.'\'
        )"><span class="fas fa-cart-plus "></span></button>
    </td>
    </tr>';
}

?>
<script>
function addToCart(productId, image, productName, supplierCode, brandName, unitName, models, srp, totalStocks) {
    // Create an object to hold the item data
    var cartItem = {
        productId: productId,
        image: image,
        productName: productName,
        supplierCode: supplierCode,
        brandName: brandName,
        unitName: unitName,
        models: models,
        srp: srp,
        totalStocks: totalStocks
    };
    
    // Retrieve existing cart items from session storage
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

    // Check if the product already exists in the cart
    var existingItem = cartItems.find(function(item) {
        return item.productId === cartItem.productId;
    });

    if (existingItem) {
        // If the product already exists, display an alert and do not add it again
        alertify.set('notifier', 'position', 'bottom-left');
        alertify.error('Already Added');
    } else {
        // Add new item to cart
        cartItems.push(cartItem);

        // Store updated cart items in session storage
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
        
        // Display a confirmation message
        alertify.set('notifier', 'position', 'bottom-left');
        alertify.success('Added Success');

        // Update the counter
        updateCounter(cartItems.length);
    }
}
</script>