<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motorcycle Parts & Accessories Shop</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add CSS for the modal */
        .account-options-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
        }

        .account-options-modal-content {
            text-align: center;
        }

        .account-options-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Motorcycle Parts & Accessories Shop</h1>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li class="products-link">
                        <a href="#">Products</a>
                        <ul class="categories-dropdown">
                            <li><a href="helmets.html">Helmets</a></li>
                            <li><a href="jackets.html">Jackets</a></li>
                            <li><a href="gloves.html">Gloves</a></li>
                            <li><a href="tires.html">Tires</a></li>
                            <li><a href="brakes.html">Brakes</a></li>
                            <!-- Add more categories as needed -->
                        </ul>
                    </li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#" class="cart" onclick="showCart()">Cart <span id="cart-items">0</span></a></li>
                    <li><a href="#" class="account-icon" onclick="showAccountOptions()">Account</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h2>Welcome to Our Shop</h2>
                <p>Find the best motorcycle parts and accessories here!</p>
            </div>
        </section>

        <section class="search">
            <div class="container">
                <input type="text" id="searchInput" placeholder="Search products...">
                <button onclick="searchProducts()">Search</button>
            </div>
        </section>

        <section class="products">
            <div class="container" id="productContainer">
                <h2>Featured Products</h2>
                <div class="products-container">
                    <div class="product" id="fullFaceHelmet">
                        <img src="full_face_helmet.jpg" alt="Full Face Helmet">
                        <h3>Full Face Helmet</h3>
                        <div class="product-description">
                            <p>Description of Full Face Helmet. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <p class="price">$199.99</p>
                        <button onclick="addToCart('fullFaceHelmet', 'Full Face Helmet', 199.99)">Add to Cart</button>
                    </div>
                    <div class="product" id="modularHelmet">
                        <img src="modular_helmet.jpg" alt="Modular Helmet">
                        <h3>Modular Helmet</h3>
                        <div class="product-description">
                            <p>Description of Modular Helmet. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <p class="price">$249.99</p>
                        <button onclick="addToCart('modularHelmet', 'Modular Helmet', 249.99)">Add to Cart</button>
                    </div>
                    <!-- Add more product listings -->
                </div>
            </div>
        </section>
        
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Motorcycle Parts & Accessories Shop. All rights reserved.</p>
        </div>
    </footer>

    <div id="cart-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeCart()">&times;</span>
            <h2>Shopping Cart</h2>
            <ul id="cart-list">
                <!-- Cart items will be added here dynamically -->
            </ul>
            <p>Total: <span id="cart-total">$0.00</span></p>
            <button onclick="checkout()">Checkout</button>
        </div>
    </div>

    <!-- Account Options Modal -->
    <div id="account-options-modal" class="account-options-modal">
        <div class="account-options-modal-content">
            <span class="account-options-close" onclick="closeAccountOptions()">&times;</span>
            <h2>Account Options</h2>
            <ul>
                <li><a href="#">Sign In</a></li>
                <li><a href="#">Sign Up</a></li>
                <li><a href="#">Sign Up with Facebook</a></li>
                <li><a href="#">Sign Up with Gmail</a></li>
            </ul>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
