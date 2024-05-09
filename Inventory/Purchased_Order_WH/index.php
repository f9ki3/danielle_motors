<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');

if(isset($_GET['id'])){
  // Prevent SQL Injection
  $po_id = $conn->real_escape_string($_GET['id']);
  
  // Perform the query using prepared statements
  $stmt = $conn->prepare("SELECT po.*, s.supplier_name, s.supplier_logo, s.supplier_email, s.supplier_address, s.phone
                          FROM purchased_order po
                          LEFT JOIN supplier s ON s.id = po.supplier_id
                          WHERE po_id = ? LIMIT 1");
  $stmt->bind_param("i", $po_id);
  $stmt->execute();
  $purchased_order_res = $stmt->get_result();
  
  // Check if the query was successful
  if($purchased_order_res){
    $po_row = $purchased_order_res->fetch_assoc();
    if($po_row){
      // Assign retrieved values to session variables
      $_SESSION['supplier_id'] = $po_row['supplier_id'];
      $_SESSION['po_id'] = $po_row['po_id'];
      $_SESSION['po_status'] = $po_row['status'];
      $_SESSION['po_requested_by'] = $po_row['requested_by'];
      $_SESSION['po_publish_on'] = $po_row['publish_on'];
      $_SESSION['po_total_est_amount'] = $po_row['total_est_amount'];
      $_SESSION['po_supplier_name'] = $po_row['supplier_name'];
      $_SESSION['po_supplier_logo'] = $po_row['supplier_logo'];
      $_SESSION['po_supplier_email'] = $po_row['supplier_email'];
      $_SESSION['po_supplier_address'] = $po_row['supplier_address'];
      $_SESSION['po_supplier_phone'] = $po_row['phone'];
      header("Location: ../Purchased_Order_WH/");
      exit(); // Make sure to stop execution after redirection
    } else {
      // Handle case when no data is found for the provided ID
      header("Location: ../../error.php");
      exit();
    }
  } else {
    // Handle database query error
    header("Location: ../../error.php");
    exit();
  }
}
$po_id = $_SESSION['po_id'];
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

 <?php include "../../page_properties/header.php" ?>

</style>

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
        if(isset($_GET['DR'])){
          include "preview.php";
        } else {
          include "content.php";
        }
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
      <?php include "../../page_properties/chat-container.php"; ?>
      <!-- /chat container -->
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- theme customizer -->
    <?php include "../../page_properties/theme-customizer.php"; ?>
    <!-- /theme customizer -->

    <?php include "../../page_properties/footer_main.php"; ?>
  </body>



<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>