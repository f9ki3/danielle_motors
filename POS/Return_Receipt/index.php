<?php
include "../../admin/session.php";
include "../../database/database.php";
include "inputstyle.css";
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

<script>
function computeTotalRefund(element) {
    var row = element.closest('tr');
    var quantityReturn = parseFloat(row.querySelector('input[name="quantity_return[]"]').value) || 0;
    var srp = parseFloat(row.querySelector('input[name="refund_amount[]"]').value) || 0;
    var qty = parseFloat(row.querySelector('td:nth-child(6)').innerText) || 0; // Assuming the 6th cell contains the quantity
    var totalRefund = quantityReturn * srp;

    // Validate that return quantity does not exceed available quantity
    if (quantityReturn < qty) {
        alert('Return quantity cannot exceed the available quantity.');
        quantityReturn = qty;
        row.querySelector('input[name="quantity_return[]"]').value = qty;
        totalRefund = quantityReturn * srp;
    }

    // Validate that total refund does not exceed SRP * quantityReturn
    if (totalRefund > srp * quantityReturn) {
        alert('Total refund cannot exceed the SRP.');
        totalRefund = srp * quantityReturn;
        row.querySelector('input[name="refund_amount[]"]').value = srp;
    }

    row.querySelector('.total-refund').innerText = '₱' + totalRefund.toFixed(2);
    row.querySelector('input[name="total_refund_amount[]"]').value = totalRefund;

    // Recompute the overall Refund Amount and Total Reflected
    recomputeRefundAndTotal();
}

function recomputeRefundAndTotal() {
    var totalRefund = 0;
    document.querySelectorAll('input[name="total_refund_amount[]"]').forEach(function(element) {
        totalRefund += parseFloat(element.value) || 0;
    });

    var subtotal = parseFloat(document.getElementById('subtotal').innerText) || 0;
    var totalReflected = subtotal - totalRefund;

    document.getElementById('refund-amount').innerText = '₱' + totalRefund.toFixed(2);
    document.getElementById('total-reflected').innerText = '₱' + totalReflected.toFixed(2);
}
</script>

<script>
  function refundItems() {
    var reason = $('#Reason').val(); // Get the reason for return from the input box
    var user_brn_code = '<?php echo $transactionDetails["BranchCode"]; ?>'; // Get the branch code
    var transactionID = '<?php echo $transactionID; ?>'; // Get the transaction ID
    
    // Initialize an array to store the product IDs
    var productIDs = [];
    
    // Loop through the checked checkboxes to get the product IDs
    $('input[name="product_checkbox[]"]:checked').each(function() {
        var closestRow = $(this).closest('tr');
        var productID = closestRow.find('input[name="product_id[]"]').val(); // Get the product ID
        productIDs.push(productID); // Add the product ID to the array
    });
    
    // Perform AJAX request to customer_refund.php
    $.ajax({
        url: 'customer_refund.php',
        method: 'POST',
        data: {
            productIDs: productIDs,
            reason: reason,
            user_brn_code: user_brn_code,
            transactionID: transactionID
        },
        success: function(response) {
            // Handle successful response
            console.log('Refund request sent successfully');
            // Optionally, you can add code here to handle UI updates or notifications
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error('Error sending refund request:', error);
            // Optionally, you can display an error message or handle the error in another way
        }
    });
}
</script>

<script>
function submitRefundForm() {
    // Get the product IDs, reason, and user branch code from your application logic
    let productIDs = [/* your array of product IDs */]; // Replace with your product IDs array
    let reason = "your_reason"; // Replace with your reason
    let user_brn_code = "your_user_branch_code"; // Replace with your user branch code
    
    // Set the form input values
    document.getElementById('productIDs').value = JSON.stringify(productIDs); // Assuming you will handle this as an array in PHP
    document.getElementById('reason').value = reason;
    document.getElementById('user_brn_code').value = user_brn_code;
    
    // Submit the form
    document.getElementById('refundForm').submit();
}
</script>

  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>