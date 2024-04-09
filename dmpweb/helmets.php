<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helmets and Accessories</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <header>
        <div class="container">
            <h1>Motorcycle Parts & Accessories Shop</h1>
            <nav>
                <ul>
                    <li><a href="dmp_online.html">Home</a></li>
                    <li><a href="#" class="active">Helmets and Accessories</a></li>
                    <li><a href="jackets.html">Jackets</a></li>
                    <li><a href="gloves.html">Gloves</a></li>
                    <li><a href="tires.html">Tires</a></li>
                    <li><a href="brakes.html">Brakes</a></li>
                    <!-- Add more categories as needed -->
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#" class="cart" onclick="showCart()">Cart <span id="cart-items">0</span></a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main>
        <section class="hero">
            <div class="container">
                <h2>Welcome to Our Helmets and Accessories Section</h2>
                <p>Find the best helmets and accessories here!</p>
            </div>
        </section>

        <section class="search">
            <div class="container">
                <input type="text" placeholder="Search helmets...">
                <button type="submit">Search</button>
            </div>
        </section>

        
        <section class="products">
            <div class="container">
                <h2>Helmets</h2>
                <div class="products-container">
                    <div class="product" id="helmet1">
                        <img src="helmet1.jpg" alt="Helmet 1">
                        <h3>Helmet 1</h3>
                        <div class="product-description">
                            <p>Description of Helmet 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.</p>
                        </div>
                        <p class="price">$99.99</p>
                        <button onclick="addToCart('helmet1', 'Helmet 1', 99.99)">Add to Cart</button>
                    </div>
                    <div class="product" id="helmet2">
                        <img src="helmet2.jpg" alt="Helmet 2">
                        <h3>Helmet 2</h3>
                        <div class="product-description">
                            <p>Description of Helmet 2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.</p>
                        </div>
                        <p class="price">$149.99</p>
                        <button onclick="addToCart('helmet2', 'Helmet 2', 149.99)">Add to Cart</button>
                    </div>
                    <!-- Add more helmet products and accessories as needed -->
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Motorcycle Parts & Accessories Shop. All rights reserved.</p>
        </div>
    </footer>

    <!-- Cart Modal -->
    <div id="cart-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeCart()">&times;</span>
            <h2>Shopping Cart</h2>
            <ul id="cart-list">
                <!-- Cart items will be added here dynamically -->
            </ul>
            <p>Total: <span id="cart-total">$0.00</span></p>
        </div>
    </div>

    <script>
        let cartItems = 0;
        let cart = [];

        function addToCart(productId, productName, price) {
            cartItems++;
            document.getElementById('cart-items').textContent = cartItems;
            cart.push({ id: productId, name: productName, price: price });
            console.log(`Added ${productName} to cart`);
        }

        function showCart() {
            let modal = document.getElementById('cart-modal');
            let cartList = document.getElementById('cart-list');
            let total = 0;
            cartList.innerHTML = ''; // Clear previous cart items
            cart.forEach(item => {
                let li = document.createElement('li');
                li.textContent = `${item.name} - $${item.price}`;
                cartList.appendChild(li);
                total += item.price;
            });
            document.getElementById('cart-total').textContent = `$${total.toFixed(2)}`;
            modal.style.display = 'block';
        }

        function closeCart() {
            let modal = document.getElementById('cart-modal');
            modal.style.display = 'none';
        }
    </script>
</body>
</html>
