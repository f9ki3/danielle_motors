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
        stocks s ON p.id = s.product_id
        WHERE 
        s.branch_code = ?
        GROUP BY 
        pl.product_id
        ORDER BY 
        price_list_id DESC;
';

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $branch_code);
$stmt->execute();
$stmt->bind_result($price_list_id, $pl_product_id, $dealer, $wholesale, $srp, $product_id, $product_name, $product_code, $supplier_code, $barcode, $image, $models, $unit_id, $unit_name, $brand_id, $brand_name, $category_id, $category_name, $total_stocks, $pending_order);

while ($stmt->fetch()) {
    echo '
    <tr>
    <td class="align-middle white-space-nowrap py-0">
        <div style="height: 50px; width: 50px">
            <img style="width: 100%; height: 100%; object-fit: cover" src="../../uploads/'. basename($image) .'" alt="" width="53">
        </div>
    </td>
    <td class="product align-middle ">' . $product_name . '</td>
    <td class="barcode align-middle ">' . $barcode . '</td>
    <td class="price align-middle "><span class="badge badge-phoenix badge-phoenix-primary">' . $supplier_code . '</span></td>
    <td class="tags align-middle">'.$category_name.'</td>
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
        <button class="btn me-3 btn-primary rounded rounded rounded-5 m-0 p-2" ';
        if($total_stocks == 0){
            echo 'disabled';
        } else {
            echo 'enabled';
        }
        echo ' onclick="addToCart(
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
        // Calculate total amount
        var totalAmount = srp * 1; // Multiply srp by quantity (initially 1)
        let click = new Audio('click_button.mp3'); // Replace 'path_to_your_audio_file.mp3' with the actual path to your audio file
        click.play();

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
            totalStocks: totalStocks,
            qty: 1, // Default quantity
            discount: 0, // Default discount,
            discountType: "₱",
            totalAmount: totalAmount // Total amount calculation
        };

        // Retrieve existing cart items from session storage
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

        // Check if the product already exists in the cart
        var existingItem = cartItems.find(function (item) {
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

// Function to update the counter
function updateCounter(count) {
    var counterElement = document.getElementById('counter');
    if (counterElement) {
        counterElement.textContent = count; // Update counter to total items in the cart
    }
}

// Initialize the counter with the number of items in the cart
var initialCartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
updateCounter(initialCartItems.length);
</script>
