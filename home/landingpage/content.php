<?php
session_start();

// Function to add a product to the cart
function addToCart($productId) {
    // Retrieve product details based on product ID
    // This is a placeholder; you need to implement your own logic to fetch product details
    $productDetails = getProductDetails($productId);
    
    // Add product to the cart session variable
    $_SESSION['cart'][] = $productDetails;
}

// Placeholder function to retrieve product details based on product ID
function getProductDetails($productId) {
    // You need to implement this function to retrieve product details from your database or elsewhere
    // Return product details as an associative array
}

// Check if a product is being added to the cart
if(isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    addToCart($productId);
}
?>

<?php include "upper_buttons.php";?>

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-0 px-xl-3">
    <div class="container px-xl-0 px-xxl-3">
        <?php include "promotions.php";?>
        <div class="row g-4 mb-6">
            <div class="col-12 col-lg-9 col-xxl-10">
                <?php include "swiper_000.php";?>
            </div>
            <div class="col-lg-3 d-none d-lg-block col-xxl-2">
                <div class="h-100 position-relative rounded-3 overflow-hidden">
                    <div class="bg-holder" style="background-image:url(../../assets/img/e-commerce/4.png);"></div>
                    <!--/.bg-holder-->
                </div>
            </div>
            <!-- mini promotion here -->
            <div class="col-12 d-lg-none">
                <a href="#!">
                    <img class="w-100 rounded-3" src="../../assets/img/e-commerce/6.png" alt="" />
                </a>
            </div>
            <!-- end -->
        </div>
        <div class="mb-6">
            <?php include "swiper_001.php";?>
        </div>
        <div class="mb-6">
            <?php include "swiper_002.php";?>
        </div>
        <div class="row flex-center mb-15 mt-11 gy-6">
            <div class="col-auto">
                <img class="d-dark-none" src="../../assets/img/spot-illustrations/light_30.png" alt="" width="305" />
                <img class="d-light-none" src="../../assets/img/spot-illustrations/dark_30.png" alt="" width="305" />
            </div>
            <div class="col-auto">
                <div class="text-center text-lg-start">
                    <h3 class="text-1000 mb-2"><span class="fw-semi-bold">Want to have the </span>ultimate <br class="d-md-none" />customer experience?</h3>
                    <h1 class="display-3 fw-semi-bold mb-4">Become a <span class="text-primary fw-bolder">member </span>today!</h1>
                    <a class="btn btn-lg btn-primary px-7" href="../../pages/authentication/simple/sign-up.html">Sign up<span class="fas fa-chevron-right ms-2 fs--1"></span></a>
                </div>
            </div>
        </div>
        
        <!-- Form for adding product to cart -->
        <form action="landingpage.php" method="post">
            <input type="hidden" name="add_to_cart" value="true">
            <input type="hidden" name="product_id" value="1"> <!-- Replace with actual product ID -->
            <button type="submit" class="btn btn-primary">Add Product to Cart</button>
        </form>
    </div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->
