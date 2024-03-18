<?php
// Establish database connection (replace these variables with your actual database credentials)
if (!isset($database_connection)) {
    include("../config/config.php");
    $database_connection = true;
}

// Perform SQL query
$sql = "SELECT 
            pl.id AS price_list_id,
            pl.product_id,
            pl.dealer,
            pl.wholesale,
            pl.srp,
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
            c.category_name
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
        ORDER by price_list_id DESC";

$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . htmlspecialchars($row["product_code"]) . "</td>
        <td>" . htmlspecialchars($row["product_name"]) . "</td>
        <td><img src='../uploads/" . htmlspecialchars($row["image"]) . "' style='height: 50px; width: 50px'></td>
        <td>" . htmlspecialchars($row["models"]) . "</td>
        <td>" . htmlspecialchars($row["brand_name"]) . "</td>
        <td>₱ " . number_format($row["srp"], 2, '.', ',') . "</td>
        <td>" . htmlspecialchars($row["unit_name"]) . "</td>
        <td class='d-flex justify-content-center'>
            <button class='btn mb-3 me-3 rounded-5 btn-primary addToCartBtn' data-product='" . htmlspecialchars(json_encode($row)) . "'>
                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-cart-plus-fill' viewBox='0 0 16 16'>
                    <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0'/>
                </svg>
            </button>
        </td>
    </tr>";
    }
} else {
    echo "<tr class='border'><td colspan='6'>0 results</td></tr>";
}
?>
<script>
    // Function to update session storage and remove item from the cart
    function removeFromCart(index) {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        cartItems.splice(index, 1); // Remove item from cart array
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
        renderCartItems(); // Re-render the cart items
        updateCounter(cartItems.length); // Update the counter
    }

    // Function to render cart items in the table
    function renderCartItems() {
        var cartItemsList = document.getElementById('cartItemsList');
        cartItemsList.innerHTML = ''; // Clear existing content
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        cartItems.forEach(function(item, index) {
            // Calculate the total amount
            var totalAmount = item.srp * item.qty;

            var row = document.createElement('tr');
            row.innerHTML = `
                <td scope="row">${item.product_name}</td>
                <td scope="row">${item.model}</td>
                <td>${item.brand}</td>
                <td>PHP ${item.srp}</td>
                <td>${item.unit}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-light">-</button>
                        <input type="text" class="form-control w-50 text-center" value="${item.qty}" readonly>
                        <button type="button" class="btn btn-light">+</button>
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control text-center w-25" value="${item.discount}">
                        <select class="form-select" style="width: auto;" aria-label="Default select example">
                            <option selected>%</option>
                            <option value="1">.</option>
                        </select>
                    </div>
                </td>
                <td>
                    PHP ${totalAmount.toFixed(2)}
                </td>
                <td>
                    <button class="btn btn-light rounded rounded-5 p-2" onclick="removeFromCart(${index})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>
                </td>
            `;
            cartItemsList.appendChild(row);
        });
    }

    
    // Add event listener to all "Add to Cart" buttons
    document.addEventListener("DOMContentLoaded", function() {
        var addToCartBtns = document.querySelectorAll('.addToCartBtn');
        addToCartBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var productData = JSON.parse(this.getAttribute('data-product'));
                addToCart(productData);
            });
        });

        // Function to add product to cart
        function addToCart(product) {
            var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
            var cartItem = {
                product_id: product.product_id,
                product_name: product.product_name,
                model: product.models,
                brand: product.brand_name,
                unit: product.unit_name,
                srp: product.srp,
                qty: 1, // Default quantity
                discount: 0 // Default discount
            };

            // Check if the product already exists in the cart
            var existingItem = cartItems.find(function(item) {
                return item.product_id === cartItem.product_id;
            });

            if (existingItem) {
                // If the product already exists, display an alert and do not add it again
                alert('Product already exists in the cart!');
            } else {
                // Add new item to cart
                cartItems.push(cartItem);

                // Store updated cart items in session storage
                sessionStorage.setItem('cartItems', JSON.stringify(cartItems));

                // Display a confirmation message
                alert('Product added to cart!');

                // Render updated cart items
                renderCartItems();

                // Update the counter
                updateCounter(cartItems.length);
            }
        }

        // Function to update the counter
        function updateCounter(count) {
            var counterElement = document.getElementById('counter');
            if (counterElement) {
                counterElement.textContent = count;
            }
        }

    });

    // Render initial cart items
    renderCartItems();

    // Initialize the counter with the number of items in the cart
    var initialCartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    updateCounter(initialCartItems.length);
</script>
