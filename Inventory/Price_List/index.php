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
            var logo = new Image();
            logo.src = '../../uploads/dmp_logo.png';

            $(".print").on('click', function() {
                var content = '';
                var total = $('#cart-total').text();

                // Iterate over each row in the cart-body
                $("#cart-body tr").each(function() {
                    // Select only the columns you want to include
                    var name = $(this).find("td:eq(0)").text();
                    var models = $(this).find("td:eq(1)").text();
                    var qty = $(this).find(".qty-input").val();
                    var unit = $(this).find("td:eq(3)").text();
                    var discount = $(this).find(".discount").val();
                    var subtotal = $(this).find("td:eq(4)").text();

                    // Create a new row with selected columns
                    content += '<tr><td class="center">' + name + '</td><td class="center">' + models + '</td><td class="center">' + qty + '</td><td class="center">' + unit + '</td><td class="center">' + discount + '%</td><td class="center">' + subtotal + '</td></tr>';
                });

                // Create a new table with selected columns
                var printableContent = '<style>' +
                                        'table { width: 100%; border-collapse: collapse; }' +
                                        'th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }' +
                                        'th { background-color: #f2f2f2; }' +
                                        '.receipt { margin: 20px auto; max-width: 400px; }' +
                                        '.total { font-weight: bold; text-align: right; margin-top: 10px; }' +
                                        '.header { text-align: center; margin-bottom: 20px; }' +
                                        '.logo { width: 100px; height: 100px; margin-bottom: 10px; }' +
                                        '.center { text-align: center; }' +
                                        '</style>' +
                                        '<div class="receipt">' +
                                        '<div class="header">' +
                                        '<img src="' + logo.src + '" alt="Company Logo" class="logo">' +
                                        '<h1>Danielle Motor Parts</h1>' +
                                        '<p>M. Villarica Rd. Prenza I, Marilao, Bulacan</p>' +
                                        '</div>' +
                                        '<h2>Receipt</h2>' +
                                        '<table>' +
                                        '<thead><tr><th>Item</th><th>Model</th><th>Quantity</th><th>Unit Price</th><th>Discount</th><th>Subtotal</th></tr></thead>' +
                                        '<tbody>' + content + '</tbody>' +
                                        '</table>' +
                                        '<div class="total">' + total + '</span></div>' +
                                        '</div>';

                // Open a new window with the receipt content and print it
                var printWindow = window.open('', '_blank');
                printWindow.document.write('<html><head><title>Receipt</title></head><body>' + printableContent + '</body></html>');
                printWindow.document.close();

                // Print the receipt
                printWindow.print();

                window.onafterprint = function() {
                    printWindow.close();
                };
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