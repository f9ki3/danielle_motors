<?php include "upper_buttons.php";?>

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-0 px-xl-3">
    <div class="container px-xl-0 px-xxl-3">
        <!-- Cart Page -->
        <div id="cart"></div>

        <script>
            // Retrieve cart items from localStorage
            let cartItems = JSON.parse(localStorage.getItem('cart')) || [];

            // Display cart items
            let cartDiv = document.getElementById('cart');
            cartItems.forEach(item => {
                cartDiv.innerHTML += `<p>${item.name} - $${item.price}</p>`;
            });
        </script>
    </div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->
