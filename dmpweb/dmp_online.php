<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danielle Motor Parts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .banner {
            position: relative;
            width: 100%;
            height: 300px; /* Adjust the height as needed */
            overflow: hidden;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .banner-text {
            font-family: 'Arial', sans-serif; /* Change the font family to your preferred font */
            font-size: 36px; /* Adjust the font size as needed */
            color: #fff; /* Text color */
        }

        .product {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .product img {
            width: 100%;
            height: auto;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .product-info {
            padding: 15px;
        }

        .product-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .product-price {
            font-size: 18px;
            color: #007bff;
            margin-bottom: 5px;
        }

        .product-description {
            font-size: 14px;
        }

        .modal-body .product {
            border: none;
            margin-bottom: 15px;
        }

        .modal-body .product img {
            width: 80px;
            height: auto;
            border-radius: 5px;
        }

        .modal-body .product-info {
            padding: 0 15px;
        }

        .total-price-section {
            font-size: 18px;
            font-weight: bold;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="path_to_your_logo.png" alt="Company Logo" class="mr-2" style="max-width: 60px;"> Danielle Motor Parts
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Motorcycle Engine Parts</a>
                        <a class="dropdown-item" href="#">Motorcycle Electrical Parts</a>
                        <a class="dropdown-item" href="#">Motorcycle Body & Frame Parts</a>
                        <!-- Add more categories as needed -->
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#cartModal">Cart <span id="cart-count" class="badge badge-light">0</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container text-center">
        <!-- Banner -->
        <div class="banner">
            <img src="path_to_banner_image.jpg" alt="Banner Image">
            <div class="banner-content">
                <h1 class="banner-text">Welcome to Danielle Motor Parts</h1>
            </div>
        </div>

        <!-- Featured Products -->
        <h2 class="mt-4">Featured Products</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="product">
                    <img src="path_to_product_image1.jpg" alt="Product 1">
                    <div class="product-info">
                        <h3 class="product-title">Product 1</h3>
                        <p class="product-price">$19.99</p>
                        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn btn-primary add-to-cart" data-product-id="1">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product">
                    <img src="path_to_product_image2.jpg" alt="Product 2">
                    <div class="product-info">
                        <h3 class="product-title">Product 2</h3>
                        <p class="product-price">$24.99</p>
                        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn btn-primary add-to-cart" data-product-id="2">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product">
                    <img src="path_to_product_image3.jpg" alt="Product 3">
                    <div class="product-info">
                        <h3 class="product-title">Product 3</h3>
                        <p class="product-price">$29.99</p>
                        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn btn-primary add-to-cart" data-product-id="3">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Login form -->
                    <form>
                        <div class="form-group">
                            <label for="loginEmail">Email address</label>
                            <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" id="loginPassword">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Registration form -->
                    <form>
                        <div class="form-group">
                            <label for="registerName">Full Name</label>
                            <input type="text" class="form-control" id="registerName">
                        </div>
                        <div class="form-group">
                            <label for="registerEmail">Email address</label>
                            <input type="email" class="form-control" id="registerEmail">
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">Password</label>
                            <input type="password" class="form-control" id="registerPassword">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Cart items will be dynamically added here -->
                </div>
                <div class="modal-footer">
                    <div class="total-price-section">
                        Total Amount Pay: <span id="total-amount-pay">$0.00</span>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="checkout-btn">Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var cartItems = [];

        $(document).ready(function(){
            // Function to add item to cart
            $('.add-to-cart').click(function(){
                var productId = $(this).data('product-id');
                var productName = $(this).closest('.product').find('.product-title').text();
                var productPrice = parseFloat($(this).closest('.product').find('.product-price').text().replace('$', ''));
                var productInfo = {
                    id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: 1 // Default quantity is 1
                };
                cartItems.push(productInfo);
                updateCartCount();
                renderCartItems();
                computeTotalAmount();
            });

            // Function to handle change in quantity input
            $(document).on('change', '.quantity-input', function(){
                var productId = $(this).data('product-id');
                var quantity = parseInt($(this).val());
                updateCartItemQuantity(productId, quantity);
                renderCartItems();
                computeTotalAmount();
            });

            // Other functions remain the same
        });

        function updateCartItemQuantity(productId, quantity) {
            cartItems.forEach(function(item) {
                if (item.id === productId) {
                    item.quantity = quantity;
                }
            });
        }

        function renderCartItems() {
            var modalBody = $('.modal-body');
            modalBody.empty();
            if (cartItems.length === 0) {
                modalBody.append('<p>Your cart is empty.</p>');
            } else {
                $.each(cartItems, function(index, item){
                    var subtotal = item.price * item.quantity;
                    var productHTML = `
                        <div class="product">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="path_to_product_image${item.id}.jpg" alt="${item.name}">
                                </div>
                                <div class="col-md-6 product-info">
                                    <h5>${item.name}</h5>
                                    <p>$${item.price.toFixed(2)} x <input type="number" class="quantity-input" data-product-id="${item.id}" value="${item.quantity}" min="1"></p>
                                    <p>Subtotal: $${subtotal.toFixed(2)}</p>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-danger remove-from-cart" data-product-id="${item.id}">Remove</button>
                                </div>
                            </div>
                        </div>
                    `;
                    modalBody.append(productHTML);
                });
            }
        }

        function computeTotalAmount() {
            var totalAmount = 0;
            cartItems.forEach(function(item) {
                totalAmount += item.price * item.quantity;
            });
            $('#total-amount-pay').text('$' + totalAmount.toFixed(2));
        }

        function updateCartCount() {
            var cartCount = cartItems.length;
            $('#cart-count').text(cartCount);
        }
    </script>
</body>
</html>