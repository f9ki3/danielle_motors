<?php
include "../../admin/session.php";
include "../../database/database.php";
include "inputstyle.css";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include "../../page_properties/header.php" ?>
  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <!-- navigation -->
      <?php include "../../page_properties/nav.php";?>
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
    // if (quantityReturn < qty) {
    //     alert('Return quantity cannot exceed the available quantity.');
    //     quantityReturn = qty;
    //     row.querySelector('input[name="quantity_return[]"]').value = qty;
    //     totalRefund = quantityReturn * srp;
    // }

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

// Disable the replacement button if status is not equal to 3
document.addEventListener('DOMContentLoaded', function() {
    var isStatusFive = <?php echo $isStatusFive; ?>;
    if (isStatusFive) {
        document.getElementById('refundBtn').disabled = true;
    }
});


</script>


  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>