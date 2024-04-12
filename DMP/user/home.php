<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danielle Motor Parts</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS for the footer */
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        .footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="../img/dmplogo0005.png" alt="Company Logo" class="mr-2" style="max-width: 60px;"> Danielle Motor Parts
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div>
                <input type="text" class="form-control w-100" placeholder="Search" id="search-input">
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 order-md-first"> <!-- Changed order of columns to push the sidebar to the left edge -->
                <div class="sidebar">
                    <h2>Categories</h2>
                    <input class="form-control mb-2" id="category-search" type="text" placeholder="Search...">
                    <div class="dropdown-categories">
                        <?php
                            require_once '../../config/config.php.php';
                            $sql = 'SELECT id, category_name FROM category ORDER BY category_name'; // Ordering categories alphabetically
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) { // Check if any categories are returned
                                while ($row = $result->fetch_assoc()) {
                                    echo '<a class="dropdown-item category-item" href="#" data-category-id="' . $row["id"] . '">' . $row["category_name"] . '</a>';
                                }
                            } else {
                                echo '<span class="dropdown-item disabled">No categories found</span>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Main Content Area -->
            <div class="col-md-9">
                <!-- Banner -->
                <div class="banner d-relative">
                    <img style="width:100%; " src="../img/banner.png" alt="Banner Image">
                    <div class="banner-content">
                        <h1 class="banner-text">Welcome to Danielle Motor Parts</h1>
                    </div>
                </div>

                <!-- Featured Products -->
                <h2 class="mt-4">Featured Products</h2>
                <div class="row" id="featured-products">
                    <?php
                        require_once '../../config/config.php.php';
                        $sql = 'SELECT 
                        p.id AS product_id,
                        p.name AS product_name,
                        p.image,
                        p.models,
                        p.category_id,
                        c.category_name,
                        pl.id AS price_list_id,
                        pl.srp
                    FROM 
                        product p
                    JOIN 
                        price_list pl ON p.id = pl.product_id
                    JOIN
                        category c ON p.category_id = c.id';

                        $all_product = $conn->query($sql);
                        while ($row = mysqli_fetch_assoc($all_product)) {
                    ?>
                    <div class="col-md-4 featured-product" data-categories="<?php echo $row['category_name']; ?>">
                        <div class="product border d-flex justify-content-center w=100 flex-column align-item-center text-center">
                            <div style="border: 1px solid black; width: 100px; height: 100px;">
                                <img style="object-fit: cover; width:100%; height:100%; " src="../../uploads/<?php echo basename($row["image"]); ?>" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title"><?php echo $row["product_name"] ?></h3>
                                <p class="product model"> <?php echo $row["models"] ?>   </p>
                                <p class="product-price">₱<?php echo $row["srp"] ?></p>
                                <p class="product-category">Category: <?php echo $row["category_name"] ?></p>
                                <!-- Add more details as needed -->
                                <!-- <button class="btn btn-primary add-to-cart" data-product-id="<?php echo $row["id"] ?>">Add to Cart</button> -->
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <p>Contact us: <a href="tel:+1234567890">+1234567890</a> | <a href="https://www.facebook.com/profile.php?id=61550312534384" target="_blank">Facebook</a> | <a href="https://shopee.ph/daniellemotorparts?is_from_login=true" target="_blank">Shopee</a> | <a href="https://www.google.com/maps/place/Danielle+Motor+Parts/@14.7815018,120.9782232,17z/data=!3m1!4b1!4m6!3m5!1s0x3397ad5d5b6b5e2b:0x22ac9c0bd1bc764c!8m2!3d14.7814966!4d120.9807981!16s%2Fg%2F11k6yrzyn9?entry=ttu" target="_blank">Location</a></p>
            </div>
        </footer>


    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Add input event listener to search input
            const searchInput = document.getElementById('search-input');
            searchInput.addEventListener('input', function() {
                const searchText = this.value.trim().toLowerCase();
                filterSearchResults(searchText);
            });

            // Add input event listener to category search input
            const categorySearchInput = document.getElementById('category-search');
            categorySearchInput.addEventListener('input', function() {
                const searchText = this.value.trim().toLowerCase();
                filterCategoryResults(searchText);
            });

            // Add click event listener to category items
            const categoryItems = document.querySelectorAll('.category-item');
            categoryItems.forEach(item => {
                item.addEventListener('click', function() {
                    const categoryName = this.textContent.trim().toLowerCase();
                    filterProductsByCategory(categoryName);
                });
            });
        });

        function filterSearchResults(searchText) {
            const featuredProducts = document.querySelectorAll('.featured-product');
            featuredProducts.forEach(product => {
                const productName = product.querySelector('.product-title').textContent.trim().toLowerCase();
                const productCategory = product.querySelector('.product-category').textContent.trim().toLowerCase();
                if (productName.includes(searchText) || productCategory.includes(searchText)) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        }

        function filterCategoryResults(searchText) {
            const categoryItems = document.querySelectorAll('.dropdown-categories .category-item');
            categoryItems.forEach(item => {
                const categoryName = item.textContent.trim().toLowerCase();
                if (categoryName.includes(searchText)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        function filterProductsByCategory(categoryName) {
            const featuredProducts = document.querySelectorAll('.featured-product');
            featuredProducts.forEach(product => {
                const productCategory = product.getAttribute('data-categories').toLowerCase();
                if (productCategory === categoryName) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
