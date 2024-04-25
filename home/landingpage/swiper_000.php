<div class="row g-3 mb-9">
    <!-- Carousel -->
    <div class="col-12">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="whooping-banner w-100 rounded-3 overflow-hidden">
                        <div class="bg-holder z-index--1 product-bg" style="background-image:url(../../assets/img/e-commerce/whooping_banner_product.png);background-position: bottom right;"></div>
                        <!--/.bg-holder-->
                        <div class="bg-holder z-index--1 shape-bg" style="background-image:url(../../assets/img/e-commerce/whooping_banner_shape_2.png);background-position: bottom left;"></div>
                        <!--/.bg-holder-->
                        <div class="banner-text light">
                            <h2 class="text-warning-300 fw-bolder fs-lg-5 fs-xxl-6">Whooping <span class="gradient-text">60% </span>Off</h2>
                            <h3 class="fw-bolder fs-lg-3 fs-xxl-5 text-white light">on everyday items</h3>
                        </div>
                        <a class="btn btn-lg btn-primary rounded-pill banner-button" href="#!">Shop Now</a>
                    </div>
                </div>
                <!-- Add more carousel items for each image -->
                <!-- Example: -->
                <div class="carousel-item">
                    <img src="uploads/brands/image1.jpg" class="d-block w-100" alt="Brand 1">
                </div>
                <div class="carousel-item">
                    <img src="uploads/brands/image2.jpg" class="d-block w-100" alt="Brand 2">
                </div>
                <!-- Add more carousel items for each image -->
            </div>
        </div>
    </div>

    <?php
    // Assuming $conn is your database connection
    $found_brand = false;

    while (!$found_brand) {
        // Fetch a random brand with more than 10 products
        $random_brand_query = "SELECT 
                                    brand.brand_name
                                FROM 
                                    brand
                                JOIN 
                                    product ON brand.id = product.brand_id
                                GROUP BY 
                                    brand.brand_name
                                HAVING 
                                    COUNT(*) > 10
                                ORDER BY 
                                    RAND()
                                LIMIT 1";

        $random_brand_result = $conn->query($random_brand_query);

        if ($random_brand_result === false) {
            echo "Error executing query: " . $conn->error;
        } else {
            if ($random_brand_result->num_rows > 0) {
                $random_brand_row = $random_brand_result->fetch_assoc();
                $brand_name = $random_brand_row["brand_name"];

                // Fetch products related to the random brand
                $result = $conn->query("SELECT 
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
                                        JOIN 
                                            brand ON product.brand_id = brand.id
                                        WHERE
                                            brand.brand_name = '$brand_name'
                                        ORDER BY
                                            RAND()
                                        LIMIT 10");

                if ($result === false) {
                    echo "Error executing query: " . $conn->error;
                } else {
                    if ($result->num_rows > 0) {
                        // Display swiper label with dynamic brand name
                        echo '<div class="d-flex flex-between-center mb-3">';
                        echo '<div class="d-flex">';
                        echo '<span class="fas fa-bolt text-warning fs-2"></span>';
                        echo '<h3 class="mx-2">' . $brand_name . '</h3>';
                        echo '<span class="fas fa-bolt text-warning fs-2"></span>';
                        echo '</div>';
                        echo '<a class="btn btn-link btn-lg p-0 d-none d-md-block" href="#!">Explore more<span class="fas fa-chevron-right fs--1 ms-1"></span></a>';
                        echo '</div>';

                        // Display products
                        echo '<div class="swiper-theme-container products-slider">';
                        echo '<div class="swiper swiper-container theme-slider" data-swiper=\'{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"768":{"slidesPerView":3,"spaceBetween":20},"1200":{"slidesPerView":4,"spaceBetween":16},"1540":{"slidesPerView":5,"spaceBetween":16}}}\'>';
                        echo '<div class="swiper-wrapper">';

                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="swiper-slide">';
                            echo '<div class="position-relative text-decoration-none product-card h-100">';
                            echo '<div class="d-flex flex-column justify-content-between h-100">';
                            echo '<div class="border border-1 rounded-3 position-relative mb-3">';
                            echo '<button class="btn rounded-circle p-0 d-flex flex-center btn-wish z-index-2 d-toggle-container btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart">';
                            echo '<span class="fas fa-shopping-cart d-block-hover"></span>';
                            echo '</button>';
                            echo '<img class="img-fluid" src="../../uploads/' . basename($row["image"]) . '" alt="' . $row["name"] . '" />';
                            echo '</div>';
                            echo '<a class="stretched-link" href="product-details.html">';
                            echo '<h6 class="mb-2 lh-sm line-clamp-3 product-name">' . $row["name"] . '</h6>';
                            echo '</a>';
                            echo '<p class="fs--1">';
                            echo '<span class="fa fa-star text-warning"></span>';
                            echo '<span class="fa fa-star text-warning"></span>';
                            echo '<span class="fa fa-star text-warning"></span>';
                            echo '<span class="fa fa-star text-warning"></span>';
                            echo '<span class="fa fa-star text-warning"></span>';
                            echo '<span class="text-500 fw-semi-bold ms-1">(67 people rated)</span>';
                            echo '</p>';
                            echo '<div>';
                            echo '<p class="fs--1 text-1000 fw-bold mb-2">dbrand skin available</p>';
                            echo '<div class="d-flex align-items-center mb-1">';
                            echo '<p class="me-2 text-900 text-decoration-line-through mb-0">$125.00</p>';
                            echo '<h3 class="text-1100 mb-0">&#8369;' . $row["srp"] . '</h3>'; // Using SRP here with peso sign
                            echo '</div>';
                            echo '<p class="text-700 fw-semi-bold fs--1 lh-1 mb-0">2 colors</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                        echo '<div class="swiper-nav swiper-product-nav">';
                        // echo '<div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>';
                        // echo '<div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>';
                        echo '</div>';

                        echo '<a class="fw-bold d-md-none px-0" href="#!">Explore more<span class="fas fa-chevron-right fs--1 ms-1"></span></a>';
                        $found_brand = true; // Set flag to true to exit the loop
                    }
                }
            }
        }
    }
    ?>
</div>
