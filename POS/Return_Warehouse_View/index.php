<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include "../../page_properties/header_pos.php" ?>
  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <!-- navigation -->
      <?php include "../../page_properties/navbar_pos.php";?>
      <!-- /navigation -->
      <div class="content bg-white">
        <?php 
        include "content.php";
        ?>
        <!-- <div class="d-flex flex-center content-min-h">
          <div class="text-center py-9"><img class="img-fluid mb-7 d-dark-none" src="../../assets/img/spot-illustrations/2.png" width="470" alt="" /><img class="img-fluid mb-7 d-light-none" src="../../assets/img/spot-illustrations/dark_2.png" width="470" alt="" />
            <h1 class="text-800 fw-normal mb-5"><?php echo $current_folder;?></h1><a class="btn btn-lg btn-primary" href="../../documentation/getting-started.html">Getting Started</a>
          </div>
        </div> -->
        <!-- footer -->
        <?php include "../../page_properties/footer.php"; ?>
        <!-- /footer -->
      </div>
      <!-- chat-container -->
      <!-- <?php include "../../page_properties/chat-container.php"; ?> -->
      <!-- /chat container -->
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- theme customizer -->
    <?php include "../../page_properties/theme-customizer.php"; ?>
    <!-- /theme customizer -->

    <?php include "../../page_properties/footer_main.php"; ?>
    
    <!-- Include jQuery and DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>

    <script type="text/javascript">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script>
$(document).ready(function () {
    // Return Material Transfer
    $('#returnMaterialTransfer').click(function () {
        // Check if the button is enabled
        if ($(this).prop('disabled')) {
            return; // Do nothing if the button is disabled
        }
        
        var user_brn_code = $('#user_brn_code').val();
        var materialInvoiceNo = $('#material_invoice').val();
        var sessionID = $('#sessionID').val();
        var cashierName = $('#cashierName').val();
        var reason = $('#Reason').val(); // Get the value of the "Reason" input field
        
        // Calculate total return amount and total selling price
        var totalReturnAmount = 0;
        var totalSellingPrice = 0;
        $('input.quantity-return').each(function() {
            var closestRow = $(this).closest('tr');
            var inputSrp = parseFloat(closestRow.find('td:eq(5)').text()); // Get input SRP
            var qtyReceive = parseFloat(closestRow.find('td:eq(7)').text()); // Get quantity receive
            
            var quantityReturn = parseFloat($(this).val()); // Get quantity return value
            
            if (!isNaN(inputSrp) && !isNaN(quantityReturn)) {
                totalSellingPrice += inputSrp * (qtyReceive - quantityReturn);
                totalReturnAmount += inputSrp * quantityReturn; // Calculate total return amount
            }
        });

        // Update total selling price display
        $('#totalSellingPrice').text('Total Selling Amount: ₱' + totalSellingPrice.toFixed(2));

        console.log('Total return Price:', totalReturnAmount);
        console.log('Total Selling Price:', totalSellingPrice); // Log the total selling price
        // Save Material Transfer with total values
        $.ajax({
            url: '../../php/store_stocks_recompute_return.php',
            method: 'POST',
            data: {

                materialInvoiceID: materialInvoiceNo,
                totalReturnAmount: totalReturnAmount, // Pass totalReturnAmount to the AJAX request
                totalSellingPrice: totalSellingPrice // Pass totalReturnAmount to the AJAX request
            },
            success: function (response) {
                console.log(response);
                // Send notification
                $.ajax({
                    url: '../../php/update_notification.php',
                    method: 'POST',
                    data: {
                        sessionID: sessionID,
                        type_id: materialInvoiceNo,
                        type: 'Material Transaction',
                        sender: cashierName,
                        message: reason
                    },
                    success: function (response) {
                        console.log('Notification sent successfully');
                        
                        // Loop through checked checkboxes and update product stocks
                        $('input[name="product_checkbox[]"]:checked').each(function() {
                            var closestRow = $(this).closest('tr');
                            var productId = closestRow.find('input[name="product_id[]"]').val();
                            var qtytotal = closestRow.find('td:eq(7)').data('quantity-added'); // Retrieve data attribute value
                            var inputId = 'quantityInput_' + closestRow.attr('data-row-index');
                            var qtySent = $('#' + inputId).val(); // Retrieve input value
                            var qtyWarehouse = qtytotal - qtySent; // Calculate qtyWarehouse
                            var status = closestRow.find('td:eq(9)').text().trim(); // Assuming status is in the 9th column
                            
                            console.log('Status:', status); // Log the status value
                            console.log('Branch_code:', user_brn_code); // Log the branch code value
                            console.log('productId:', productId); // Log the product ID value
                            console.log('Qtytotal:', qtytotal); // Log qtytotal
                            console.log('QtySent:', qtySent); // Log qtySent
                            console.log('QtyWarehouse:', qtyWarehouse); // Log qtyWarehouse
                            
                            if (status === 'Request Return') {
                                // Only update product stocks if status is 'Request Return'
                                $.ajax({
                                    url: '../../php/return_product_stocks.php',
                                    method: 'POST',
                                    data: {
                                        productId: productId,
                                        qty_total: qtytotal,
                                        qty_warehouse: qtyWarehouse,
                                        user_brn_code: user_brn_code,
                                        qty_sent: qtySent,
                                        input_id: inputId,
                                        materialInvoiceID: materialInvoiceNo,
                                        sessionID: sessionID,
                                        sender: cashierName,
                                        status: status,
                                        message: reason
                                    },
                                    success: function (response) {
                                        console.log('Product stocks updated successfully for product ID ' + productId);
                                    },
                                    error: function (xhr, status, error) {
                                        console.error('Error updating product stocks for product ID ' + productId + ':', error);
                                    }
                                });
                            } else {
                                console.log('Status is not "Request Return", skipping product ID ' + productId);
                                console.log('Status is:', status);
                                // Handle other statuses here
                                // You can add any desired behavior for statuses other than "Request Return"
                            }
                        });
                        
                        swal("Material Returned", "Products have been returned", "success").then((value) => {
                            if (value) {
                                // Reload the page after the AJAX request completes
                                window.location.reload();
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Error sending notification:', error);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error('Error saving material transfer:', error);
            }
        });
    });

    // Update input field when checkbox is clicked
    $('input[name="product_checkbox[]"]').click(function () {
        var closestRow = $(this).closest('tr');
        var qtyRequested = parseInt(closestRow.find('td:eq(6)').text());

        if ($(this).prop('checked')) {
            var inputField = $('<input type="number" class="form-control quantity-return" min="0">');
            var inputId = 'quantityInput_' + closestRow.attr('data-row-index');
            inputField.attr('id', inputId);
            inputField.attr('max', qtyRequested);
            inputField.val(qtyRequested);
            closestRow.find('td:eq(8)').html(inputField);
        } else {
            closestRow.find('td:eq(6)').text(closestRow.find('td:eq(8)').attr('data-quantity-requested'));
            closestRow.find('td:eq(8)').empty(); // Clear the input field
        }

        updateButtonStatus();
    });

    // Recompute total return amount when quantity return is changed
    $(document).on('change', '.quantity-return', function() {
        var totalReturnAmount = 0;
        $('.quantity-return').each(function() {
            var closestRow = $(this).closest('tr');
            var inputSrp = parseFloat(closestRow.find('td:eq(5)').text()); // Get input SRP
            var quantityReturn = parseFloat($(this).val()); // Get quantity return value

            if (!isNaN(inputSrp) && !isNaN(quantityReturn)) {
                totalReturnAmount += inputSrp * quantityReturn; // Calculate total return amount
            }
        });
        $('#totalReturnAmount').text('Total Return Amount: ₱' + totalReturnAmount.toFixed(2)); // Update total return amount display
    });

    // Recompute total selling price when quantity return is changed
    $(document).on('change', '.quantity-return', function () {
        var totalSellingPrice = 0;

        $('input[name="product_checkbox[]"]:checked').each(function () {
            var closestRow = $(this).closest('tr');
            var inputSrp = parseFloat(closestRow.find('td:eq(5)').text()); // Get input SRP
            var qtyAdded = parseFloat(closestRow.find('td:eq(7)').data('quantity-added')); // Get quantity added
            var quantityReturn = parseFloat($(this).val()); // Get quantity return value
            var quantityRetain = qtyAdded - quantityReturn; // Calculate quantity retained

            if (!isNaN(inputSrp) && !isNaN(quantityRetain)) {
                totalSellingPrice == inputSrp * quantityRetain; // Calculate total selling price
            }
        });

        // Update total selling price display
        $('#totalSellingPrice').text('Total Selling Amount: ₱' + totalSellingPrice.toFixed(2));
    });
    // Recompute total selling price when checkbox state changes
$('input[name="product_checkbox[]"]').click(function () {
    var totalSellingPrice = 0;

    $('input[name="product_checkbox[]"]:checked').each(function () {
        var closestRow = $(this).closest('tr');
        var inputSrp = parseFloat(closestRow.find('td:eq(5)').text()); // Get input SRP
        var quantityRequested = parseFloat(closestRow.find('td:eq(6)').text()); // Get quantity requested
        var quantityReturned = parseFloat(closestRow.find('td:eq(7)').text()); // Get quantity returned

        if (!isNaN(inputSrp) && !isNaN(quantityRequested) && !isNaN(quantityReturned)) {
            totalSellingPrice += inputSrp * (quantityRequested - quantityReturned); // Calculate total selling price
        }
    });

    // Update total selling price display
    $('#totalSellingPrice').text('Total Selling Amount: ₱' + totalSellingPrice.toFixed(2));
});

// Recompute total selling price when quantity return is changed
$(document).on('change', '.quantity-return', function () {
    var totalSellingPrice = 0;

    $('input[name="product_checkbox[]"]:checked').each(function () {
        var closestRow = $(this).closest('tr');
        var inputSrp = parseFloat(closestRow.find('td:eq(5)').text()); // Get input SRP
        var quantityRequested = parseFloat(closestRow.find('td:eq(6)').text()); // Get quantity requested
        var quantityReturned = parseFloat(closestRow.find('.quantity-return').val()); // Get quantity returned

        if (!isNaN(inputSrp) && !isNaN(quantityRequested) && !isNaN(quantityReturned)) {
            totalSellingPrice += inputSrp * (quantityRequested - quantityReturned); // Calculate total selling price
        }
    });

    // Update total selling price display
    $('#totalSellingPrice').text('Total Selling Price: ₱' + totalSellingPrice.toFixed(2));
});


    // Initial update of button status
    updateButtonStatus();

    // Function to update button status based on status value
    function updateButtonStatus() {
        console.log('Function updateButtonStatus() is running.');

        var allReturn = true;
        var anyChecked = false;

        $('input[name="product_checkbox[]"]').each(function () {
            var closestRow = $(this).closest('tr');
            var status = closestRow.find('td:eq(9)').text().trim();
            console.log('Status:', status);

            if ($(this).prop('checked')) {
                anyChecked = true;

                if (status !== 'Request Return') {
                    allReturn = false;
                }
            } else {
                closestRow.find('td:eq(6)').text(closestRow.find('td:eq(8)').attr('data-quantity-requested'));
            }
        });

        console.log('Any checkbox checked:', anyChecked);
        console.log('All return:', allReturn);

        if (allReturn && anyChecked) {
            $('#acceptMaterialTransfer').prop('disabled', false);
            $('#returnMaterialTransfer').prop('disabled', false);
        } else {
            $('#acceptMaterialTransfer').prop('disabled', true);
            $('#returnMaterialTransfer').prop('disabled', true);
        }
    }
});
</script>
  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>
