
document.addEventListener("DOMContentLoaded", function() {
    // Add event listener to all "Add to Cart" buttons
    var addToCartBtns = document.querySelectorAll('.addToCartBtn');
    addToCartBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var productData = JSON.parse(this.getAttribute('data-product'));
            addToCart(productData);
        });
    });

    // Function to add product to cart
    function addToCart(product) {
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

        // Retrieve existing cart items from session storage
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

        // Check if the product already exists in the cart
        var existingItem = cartItems.find(function(item) {
            return item.product_id === cartItem.product_id;
        });

        if (existingItem) {
            alertify.set('notifier', 'position', 'bottom-left');
            // If the product already exists, display an alert and do not add it again
            alertify.error('Already Added');
        } else {
            // Add new item to cart
            cartItems.push(cartItem);

            // Store updated cart items in session storage
            sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
            
            alertify.set('notifier', 'position', 'bottom-left');
            // Display a confirmation message
            alertify.success('Added Success');

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

    // Initialize the counter with the number of items in the cart
    var initialCartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    updateCounter(initialCartItems.length);
});