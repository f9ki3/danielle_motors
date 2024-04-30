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
                    echo '<a 'product.name,
                    product.code,
                    product.supplier_code,
                    product.barcode,
                    product.image,
                    product.models,
                    price_list.srp,
                    product.category_id' id="product" product.code class="btn btn-link btn-lg p-0 d-none d-md-block" href="#!">Explore more<span class="fas fa-chevron-right fs--1 ms-1"></span></a>';
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
                        echo '<button class="btn btn-primary text-light rounded-circle p-0 d-flex flex-center btn-wish z-index-2 d-toggle-container btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist">';
                        echo '<span class="fas fa-heart "></span>';
                        echo '</button>';
                        echo '<button class="btn btn-primary text-light rounded-circle p-0 me-6 d-flex flex-center btn-wish z-index-2 d-toggle-container btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist">';
                        echo '<span class="fas fas fa-cart-plus"></span>';
                        echo '</button>';
                        if (isset($row["image"])) {
                            echo '<div style="height: 250px; width: 100%;">
                                <img style="object-fit: cover; height: 100%; width: 100%;" class="rounded" src="../../uploads/' . basename($row["image"]) . '" alt="' . $row["name"] . '" />
                             </div>';
                        } else {
                            echo '<img class="img-fluid" src="../../uploads/product_dummy.jpg"  />'; // Default image
                        }
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
<<<<<<< Updated upstream
=======
                        // Add "Add to Cart" button
                        // echo '<button class="btn btn-primary btn-add-to-cart" data-product-id="' . $row["code"] . '">Add to Cart</button>';
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======
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
>>>>>>> Stashed changes
