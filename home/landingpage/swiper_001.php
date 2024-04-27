<?php
// Assuming $conn is your database connection
$found_brand = false;

while (!$found_brand) {
    // Fetch a random brand with more than 10 products
    $random_brand_query = "SELECT 
                                brand.id AS brand_id,
                                brand.brand_name
                            FROM 
                                brand
                            JOIN 
                                product ON brand.id = product.brand_id
                            GROUP BY 
                                brand.id
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
            $brand_id = $random_brand_row["brand_id"];

            // Fetch just one model related to the random brand
            $models_query = "SELECT 
                                product.models
                            FROM 
                                product
                            WHERE 
                                product.brand_id = $brand_id
                            ORDER BY 
                                RAND()
                            LIMIT 1";

            $models_result = $conn->query($models_query);

            if ($models_result === false) {
                echo "Error executing query: " . $conn->error;
            } else {
                if ($models_result->num_rows > 0) {
                    $models_row = $models_result->fetch_assoc();
                    $models = $models_row["models"];

                    // Display models in the label
                    echo '<div class="d-flex flex-between-center mb-3">';
                    echo '<h3>' . $models . '</h3>';
                    echo '<a class="fw-bold d-none d-md-block" href="#!">Explore more<span class="fas fa-chevron-right fs--1 ms-1"></span></a>';
                    echo '</div>';
                }
            }

            // Fetch products related to the random brand
            $products_query = "SELECT 
                                    product.name AS product_name,
                                    product.models AS product_models,
                                    price_list.srp,
                                    product.image,
                                    product.code
                                FROM 
                                    product
                                JOIN 
                                    price_list ON product.id = price_list.product_id
                                WHERE
                                    product.brand_id = $brand_id
                                ORDER BY
                                    RAND()
                                LIMIT 10";

            $products_result = $conn->query($products_query);

            if ($products_result === false) {
                echo "Error executing query: " . $conn->error;
            } else {
                if ($products_result->num_rows > 0) {
                    // Display products
                    echo '<div class="swiper-theme-container products-slider">';
                    echo '<div class="swiper swiper-container theme-slider" data-swiper=\'{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}\'>';
                    echo '<div class="swiper-wrapper">';

                    while ($row = $products_result->fetch_assoc()) {
                        // Display product card
                        echo '<div class="swiper-slide">';
                        echo '<div class="position-relative text-decoration-none product-card h-100">';
                        echo '<div class="d-flex flex-column justify-content-between h-100">';
                        echo '<div class="border border-1 rounded-3 position-relative mb-3">';
                        echo '<button class="btn rounded-circle p-0 d-flex flex-center btn-wish z-index-2 d-toggle-container btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist">';
                        echo '<span class="fas fa-heart d-block-hover"></span>';
                        echo '<span class="far fa-heart d-none-hover"></span>';
                        echo '</button>';
                        if (isset($row["image"])) {
                            echo '<img class="img-fluid" src="../../uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" />';
                        } else {
                            echo '<img class="img-fluid" src="../../default-image.jpg" alt="' . $row["product_name"] . '" />'; // Default image
                        }
                        echo '</div>';
                        echo '<a class="stretched-link" href="product-details.html">';
                        echo '<h6 class="mb-2 lh-sm line-clamp-3 product-name">' . $row["product_name"] . '</h6>';
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
                        echo '<h3 class="text-1100 mb-0">&#8369;' . $row["srp"] . '</h3>'; // Using SRP here with peso sign

                        echo '</div>';
                        echo '<p class="text-700 fw-semi-bold fs--1 lh-1 mb-0">2 colors</p>';
                        // Add "Add to Cart" button
                        echo '<button class="btn btn-primary btn-add-to-cart" data-product-id="' . $row["code"] . '">Add to Cart</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }

                    echo '</div>';
                    echo '</div>';
                    echo '<div class="swiper-nav">';
                    // echo '<div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>';
                    // echo '<div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>';
                    echo '</div>';
                    echo '</div>';

                    echo '<a class="fw-bold d-md-none" href="#!">Explore more<span class="fas fa-chevron-right fs--1 ms-1"></span></a>';
                    $found_brand = true;
                }
            }
        }
    }
}
?>


<script>
    // JavaScript to handle "Add to Cart" button click
    document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-add-to-cart').forEach(function(button) {
        button.addEventListener('click', function() {
            var productId = this.getAttribute('data-product-id');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/danielle_motors/home/cart/add_to_cart.php', true);
 // Adjust the URL as needed
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log('Product added to cart successfully!');
                    } else {
                        console.error('Error adding product to cart');
                    }
                }
            };
            xhr.send('product_id=' + productId);
        });
    });
});


</script>

