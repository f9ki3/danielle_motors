<?php include '../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shop</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <style>
        /* Custom CSS for Header */
        header {
            background-color: gray; /* Gray background color */
            padding: 10px 0; /* Add padding to the header */
        }

        /* Custom CSS for Navbar */
        .navbar-brand {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }
        .navbar-nav {
            padding-top: 0.5rem;
        }
        .nav-link {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            margin-right: 1rem;
        }

        /* Custom CSS for Carousel */
        #featuredBrandsCarousel .carousel-inner .carousel-item img {
            width: 100%;
            height: 300px; /* Set the desired height for carousel images */
            object-fit: cover;
        }

        /* Custom CSS for Filters */
        #priceFilterBtn {
            width: 100%;
        }

        /* Custom CSS for Product Images */
        .product .card-img-top {
            height: 250px; /* Set the desired height for product images */
            object-fit: contain;
        }

        /* Custom CSS for Sticky Footer */
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa; /* Choose your desired background color */
            padding: 10px 0; /* Add padding to the footer */
            text-align: center; /* Center-align the content in the footer */
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Company Logo -->
                <a class="navbar-brand" href="#"><img src="img/dmplogo0005.png" alt="Company Logo" style="max-width: 100px;"></a>
                <!-- Company Name -->
                <h1 class="mr-auto">Your Shop</h1>
                <!-- Navigation Menu -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Featured Brands Carousel -->
    <div id="featuredBrandsCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            // Directory path where images are stored
            $directory = 'img';
            // Get all files in the directory
            $files = glob($directory . '/*.{jpg,png,gif}', GLOB_BRACE);
            // Output carousel indicators
            for ($i = 0; $i < count($files); $i++) {
                echo '<li data-target="#featuredBrandsCarousel" data-slide-to="' . $i . '"' . ($i === 0 ? ' class="active"' : '') . '></li>';
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            // Output carousel items
            for ($i = 0; $i < count($files); $i++) {
                echo '<div class="carousel-item' . ($i === 0 ? ' active' : '') . '">';
                echo '<img class="d-block w-100 img-fluid" src="' . $files[$i] . '" alt="Slide ' . ($i + 1) . '">';
                echo '</div>';
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#featuredBrandsCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#featuredBrandsCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar with Filters -->
            <div class="col-md-3">
                <h3>Filters</h3>
                <div class="card">
                    <div class="card-body">
                        <!-- Filter by Price -->
                        <h5 class="card-title">Price Range</h5>
                        <div class="form-group">
                            <label for="minPrice">Minimum SRP:</label>
                            <input type="number" class="form-control" id="minPrice" placeholder="Min SRP">
                        </div>
                        <div class="form-group">
                            <label for="maxPrice">Maximum SRP:</label>
                            <input type="number" class="form-control" id="maxPrice" placeholder="Max SRP">
                        </div>
                        <!-- Dropdown for Models -->
                        <h5 class="card-title">Models</h5>
                        <select class="form-control" id="modelsDropdown" multiple>
                            <?php
                            // Fetch models from the database (using config.php's database connection)
                            $sql = "SELECT DISTINCT models FROM product";
                            $result = $conn->query($sql);

                            // Check if the query executed successfully
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option>' . $row["models"] . '</option>';
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </select>

                        <!-- Dropdown for Categories -->
                        <h5 class="card-title mt-3">Categories</h5>
                        <select class="form-control" id="categoriesDropdown" multiple>
                            <?php
                            // Fetch category names from the database (using config.php's database connection)
                            $sql = "SELECT * FROM category";
                            $result = $conn->query($sql);

                            // Check if the query executed successfully
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["id"] . '">' . $row["category_name"] . '</option>';
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </select>

                        <button type="button" class="btn btn-primary mt-3" onclick="applyFilters()">Apply Filter</button>
                        
                    </div>
                </div>
            </div>
            <!-- Main Content Area -->
            <div class="col-md-8" id="productContainer">
                <h2>Products</h2>
                <div class="row">
                    <?php
                    // Fetch products with their corresponding SRP from the joint table (using config.php's database connection)
                    $sql = "SELECT 
                        product.name,
                        product.code,
                        product.supplier_code,
                        product.barcode,
                        product.image,
                        product.models,
                        price_list.srp,
                        product.category_id
                    FROM 
                        product
                    JOIN 
                        price_list ON product.id = price_list.product_id
                    ORDER BY
                        price_list.srp ASC";

                    $result = $conn->query($sql);

                    // Check if the query executed successfully
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-4 product" data-category-id="' . $row["category_id"] . '">';
                            echo '<div class="card mb-4">';
                            echo '<img src=" uploads/' . basename($row["image"]) . '" class="card-img-top" alt="' . $row["name"] . '">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $row["name"] . '</h5>';
                            echo '<p class="card-text">Code: ' . $row["code"] . '</p>';
                            echo '<p class="card-text">Supplier Code: ' . $row["supplier_code"] . '</p>';
                            echo '<p class="card-text">Barcode: ' . $row["barcode"] . '</p>';
                            echo '<p class="card-text">Models: ' . $row["models"] . '</p>';
                            echo '<p class="card-text srp">SRP: ₱' . $row["srp"] . '</p>';
                            echo '<a href="#" class="btn btn-primary">Add to Cart</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No products found.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>Contact us: 
                <a href="tel:09173128059">0917 312 8059</a> | 
                <a href="https://www.facebook.com/dmpdaniellemotorparts" target="_blank">Facebook</a> | 
                <a href="https://shopee.ph/daniellemotorparts" target="_blank">Shopee</a> | 
                <a href="https://www.google.com/maps/place/Danielle+Motor+Parts/@14.7815018,120.9782232,17z/data=!3m1!4b1!4m6!3m5!1s0x3397ad5d5b6b5e2b:0x22ac9c0bd1bc764c!8m2!3d14.7814966!4d120.9807981!16s%2Fg%2F11k6yrzyn9?entry=ttu" target="_blank">Location</a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
        // Initialize Select2 for Models and Categories dropdowns
        $(document).ready(function() {
            $('#modelsDropdown, #categoriesDropdown').select2();
        });

        function applyFilters() {
            var minPrice = parseFloat(document.getElementById("minPrice").value) || 0;
            var maxPrice = parseFloat(document.getElementById("maxPrice").value) || Infinity;
            var selectedModels = $('#modelsDropdown').val() || [];
            var selectedCategories = $('#categoriesDropdown').val() || [];

            // Hide all products
            $(".product").hide();

            // Show products within the selected price range, models, and categories
            $(".product").each(function() {
                var product = $(this);
                var srp = parseFloat(product.find(".srp").text().replace("SRP: ₱", ""));
                var productCategoryId = parseInt(product.data('category-id'));
                var productModels = product.find(".card-text:contains('Models:')").text().toLowerCase(); // Get all models text

                // Check if any of the selected models exists in the product's models
                var modelFound = false;
                selectedModels.forEach(function(selectedModel) {
                    if (productModels.includes(selectedModel.toLowerCase())) {
                        modelFound = true;
                    }
                });

                if ((selectedCategories.length === 0 || selectedCategories.includes(productCategoryId.toString())) &&
                    (selectedModels.length === 0 || modelFound) &&
                    srp >= minPrice && srp <= maxPrice) {
                    product.show();
                }
            });
        }
    </script>
</body>
</html>
