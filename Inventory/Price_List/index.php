<?php
session_start();
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

    <?php include "../../page_properties/header.php" ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <!-- navigation -->
      <?php include "../../page_properties/nav.php";?>
      <!-- /navigation -->
      <div class="content">
        <?php 
        include "content.php";
        ?>


        <!-- <div class="d-flex flex-center content-min-h">
          <div class="text-center py-9"><img class="img-fluid mb-7 d-dark-none" src="../../assets/img/spot-illustrations/2.png" width="470" alt="" /><img class="img-fluid mb-7 d-light-none" src="../../assets/img/spot-illustrations/dark_2.png" width="470" alt="" />
            <h1 class="text-800 fw-normal mb-5"></h1><a class="btn btn-lg btn-primary" href="../../documentation/getting-started.html">Getting Started</a>
          </div>
        </div> -->
        <!-- footer -->
        <?php include "../../page_properties/footer.php"; ?>
        <!-- /footer -->
      </div>
      <!-- chat-container -->
      <?php include "../../page_properties/chat-container.php"; ?>
      <!-- /chat container -->
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- theme customizer -->
    <?php include "../../page_properties/theme-customizer.php"; ?>
    <!-- /theme customizer -->

    <?php include "../../page_properties/footer_main.php"; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
        // Initialize Select2 for the searchable dropdown
        $(document).ready(function() {
            $(".print").on('click', function() {
                var content = '';

                // Iterate over each row in the cart-body
                $("#cart-body tr").each(function() {
                    // Select only the columns you want to include
                    var name = $(this).find("td:eq(0)").html();
                    var models = $(this).find("td:eq(1)").html();
                    var qty = $(this).find(".qty-input").val();;
                    var unit = $(this).find("td:eq(3)").html();
                    var subtotal = $(this).find("td:eq(4)").html();
                    var discount = $(this).find(".discount").val();

                    // Create a new row with selected columns
                    content += '<tr><td class="fs-3">' + name + '</td><td class="ps-3"></td><td class="fs-3">' + models + '</td><td class="ps-3"></td><td class="fs-3">' + qty + '</td><td class="ps-3"></td><td class="fs-3">' + unit + '</td><td class="ps-3"></td><td class="fs-3">' + subtotal + '</td><td class="ps-3"></td><td class="fs-3">' + discount + '%</td></tr>';
                });

                // Get the total amount
                var total = $("#cart-total").text();

                // Create a new table with selected columns and total
                var printableContent = '<table>' + content + '</table>' +
                                    '<div class="col-lg-6"><h2 class="text-end" id="cart-total">' + total + '</h2></div>';

                // Print the selected columns
                var originalContent = $("body").html();
                $("body").html(printableContent);
                window.print(); // This triggers the browser's print dialog
                $("body").html(originalContent); // Restore original content
            });
            $(document).on('click', '.cart-delete', function(){
                var id = $(this).data('product-id');
                var row = $(this).closest('tr');
                
                row.remove();

                $.ajax({
                    url: 'remove_cart.php',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response){
                        $('#cart-body').html(response.tbody);
                        $('#cart-total').text('Total: ₱' + response.cart_total);
                    }
                })
            });

            $(document).on('click', '.add-qty', function(){
                var id = $(this).data('product-id');
                var qty = $(this).data('product-qty');

                $.ajax({
                    url: 'add-qty.php',
                    method: 'POST',
                    data: {
                        id: id,
                        qty: qty
                    },
                    dataType: 'json',
                    success: function(response){
                        $('#cart-body').html(response.tbody);
                        $('#cart-total').text('Total: ₱' + response.cart_total);
                    }
                })
            });

            $(document).on('click', '.minus-qty', function(){
                var id = $(this).data('product-id');
                var qty = $(this).data('product-qty');

                $.ajax({
                    url: 'minus-qty.php',
                    method: 'POST',
                    data: {
                        id: id,
                        qty: qty
                    },
                    dataType: 'json',
                    success: function(response){
                        $('#cart-body').html(response.tbody);
                        $('#cart-total').text('Total: ₱' + response.cart_total);
                    }
                })
            });

            $(document).on('click', '.apply-discount', function(){
                var row = $(this).closest('td');
                var discount = row.find('.discount');
                var value = discount.val();
                var id = $(this).data('product-id');


                $.ajax({
                    url: 'cart-discount.php',
                    method: 'POST',
                    data: {
                        id: id,
                        discount: value
                    },
                    dataType: 'json',
                    success: function(response){
                        $('#cart-body').html(response.tbody);
                        $('#cart-total').text('Total: ₱' + response.cart_total);
                    }
                })
            });

            $('.cart-button').on('click', function(){
                var id = $(this).data('product-id');
                var srp = $(this).data('product-srp');

                $.ajax({
                    url: 'price_list_cart.php',
                    method: 'POST',
                    data: {
                        id: id,
                        srp: srp
                    },
                    dataType: 'json',
                    success: function(response){
                        $('#cart-body').html(response.tbody);
                        $('#cart-total').text('Total: ₱' + response.cart_total);
                    }
                })
            });

            $('.reset-cart').on('click', function(){
                $.ajax({
                    url: 'reset-cart.php',
                    success: function(){
                        $('#cart-body').empty();
                        $('#cart-total').empty();
                        $('#cart-total').text('Total: ₱0');
                    }
                })
            })
           
            
            $('#products').select2();
        });
    </script>

  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>