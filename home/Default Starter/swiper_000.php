<div class="d-flex flex-between-center mb-3">
    <div class="d-flex">
        <span class="fas fa-bolt text-warning fs-2"></span>
        <h3 class="mx-2">Top Deals today</h3>
        <span class="fas fa-bolt text-warning fs-2"></span>
    </div>
    <a class="btn btn-link btn-lg p-0 d-none d-md-block" href="#!">Explore more<span class="fas fa-chevron-right fs--1 ms-1"></span></a>
</div>

<div class="swiper-theme-container products-slider">
    <div class="swiper swiper-container theme-slider" data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"768":{"slidesPerView":3,"spaceBetween":20},"1200":{"slidesPerView":4,"spaceBetween":16},"1540":{"slidesPerView":5,"spaceBetween":16}}}'>
        <div class="swiper-wrapper">
            <!-- loop this -->
            <div class="swiper-slide">
                <div class="position-relative text-decoration-none product-card h-100">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="border border-1 rounded-3 position-relative mb-3">
                                <button class="btn rounded-circle p-0 d-flex flex-center btn-wish z-index-2 d-toggle-container btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist">
                                    <span class="fas fa-heart d-block-hover"></span>
                                    <span class="far fa-heart d-none-hover"></span>
                                </button>
                                <img class="img-fluid" src="../../assets/img/products/6.png" alt="" />
                            </div>
                            <a class="stretched-link" href="product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">PlayStation 5 DualSense Wireless Controller</h6>
                            </a>
                            <p class="fs--1">
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="text-500 fw-semi-bold ms-1">(67 people rated)</span>
                            </p>
                        </div>
                        <div>
                            <p class="fs--1 text-1000 fw-bold mb-2">dbrand skin available</p>
                            <div class="d-flex align-items-center mb-1">
                                <p class="me-2 text-900 text-decoration-line-through mb-0">$125.00</p>
                                <h3 class="text-1100 mb-0">$89.00</h3>
                            </div>
                            <p class="text-700 fw-semi-bold fs--1 lh-1 mb-0">2 colors</p>
                            <!-- Add to Cart Button -->
                            <button onclick="addToCart('PlayStation 5 DualSense Wireless Controller', 89.00)" class="btn btn-primary mt-2">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end loop here -->
        </div>
    </div>
    <div class="swiper-nav swiper-product-nav">
        <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
        <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
    </div>
</div>

<a class="fw-bold d-md-none px-0" href="#!">Explore more<span class="fas fa-chevron-right fs--1 ms-1"></span></a>

<script>
function addToCart(productName, price) {
    // Retrieve existing cart items from localStorage or initialize an empty array
    let cartItems = JSON.parse(localStorage.getItem('cart')) || [];

    // Add the new item to the cart
    cartItems.push({ name: productName, price: price });

    // Update localStorage with the new cart items
    localStorage.setItem('cart', JSON.stringify(cartItems));
}
</script>
