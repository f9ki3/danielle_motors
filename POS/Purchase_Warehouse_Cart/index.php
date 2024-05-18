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
        <!-- ?php include "../../page_properties/footer.php"; ?> -->
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
    <script src='purchase_cart.js'></script>
    <script src='reload_spinner.js'></script>
  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>

<script>
      $(document).ready(function () {
  
        function fetchAdminData(selectElementId, role) {
            $.ajax({
                url: '../../php/fetch_admin_data.php', // Your server-side script to fetch admin data
                method: 'GET',
                data: { role: role }, // Optional: send role if needed
                dataType: 'json',
                success: function (data) {
                    // Populate the dropdown options
                    var selectElement = $('#' + selectElementId);
                    // selectElement.empty();
                    // selectElement.append('<option selected>Select ' + role + '</option>');
                    $.each(data, function (index, admin) {
                        selectElement.append('<option value="' + admin.user_fname + ' ' + admin.user_lname +  '">' + admin.user_fname + ' ' + admin.user_lname + ' ' + admin.user_position +'</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching admin data:', error);
                }
            });
        }

        // Fetch data for receivedBy dropdown
        fetchAdminData('transaction_received', 'Recieved By');
        
        // Fetch data for inspectedBy dropdown
          fetchAdminData('transaction_inspected', 'Inspected by');
  
        // Fetch data for verifiedBy dropdown
          fetchAdminData('transaction_verified', 'Verified By');
      });

      function fetchAdminData(adminId, adminData) {
          var admin = adminData.find(function (admin) {
              return admin.id == adminId;
          });
          return admin ? admin.user_fname + ' ' + admin.user_lname + ' ' + admin.user_position: '';
      }
    </script>