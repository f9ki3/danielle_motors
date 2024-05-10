<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
if(isset($_GET['transaction'])){
  $mat_id = $_GET['transaction'];
  $_SESSION['invoice'] = $mat_id;
  header("Location: ../Material_transaction/");
  exit();
} else {
  $invoice = isset($_SESSION['invoice']) ? $_SESSION['invoice'] : null;
}
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
      <div class="content">
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
      <?php include "../../page_properties/chat-container.php"; ?>
      <!-- /chat container -->
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- theme customizer -->
    <?php include "../../page_properties/theme-customizer.php"; ?>
    <!-- /theme customizer -->

    <?php include "../../page_properties/footer_main.php"; ?>
    <script>
      $(document).ready(function(){
        $('#material_transaction_form').submit(function(e){
            e.preventDefault(); // Prevent default form submission

            // Serialize form data
            var formData = $(this).serialize();

            // AJAX request
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                beforeSend: function(){
                    // Show modal before AJAX request is sent
                    $('#verticallyCentered').modal('show');
                },
                success: function(response){
                    // Hide modal when AJAX request is successful
                    $('#verticallyCentered').modal('hide');
                    
                    // Refresh content of #to_refresh
                    $('#to_refresh').load(window.location.href + ' #to_refresh');
                },
                error: function(){
                    // Hide modal on error
                    $('#verticallyCentered').modal('hide');
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });

    

    </script>
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
                    selectElement.empty();
                    selectElement.append('<option selected>Select ' + role + '</option>');
                    $.each(data, function (index, admin) {
                        selectElement.append('<option value="' + admin.id + '">' + admin.user_fname + ' ' + admin.user_lname + ' ' + admin.user_position +'</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching admin data:', error);
                }
            });
        }

        // Fetch data for receivedBy dropdown
        
        // fetchAdminData('receivedBy', 'Recieved By');
        
      //   // Fetch data for inspectedBy dropdown
        fetchAdminData('inspectedBy', 'Inspected by');

      //   // Fetch data for verifiedBy dropdown
      //   fetchAdminData('verifiedBy', 'Verified By');
      });

      function fetchAdminData(adminId, adminData) {
          var admin = adminData.find(function (admin) {
              return admin.id == adminId;
          });
          return admin ? admin.user_fname + ' ' + admin.user_lname + ' ' + admin.user_position: '';
      }
    </script>

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var button = document.getElementById('material_transaction_form_button');
            if (button) {
                button.addEventListener('click', function(event) {
                    var selectValue = document.getElementById('inspectedBy').value;
                    var checkboxChecked = document.getElementById('flexCheckDefault').checked;

                    if (selectValue === '' || selectValue === 'Select Inspected By' || !checkboxChecked) {
                        event.preventDefault(); // Prevent form submission
                        Swal.fire({
                            title: 'Error!',
                            text: 'Please select inspector and confirm inspection.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    </script>

    <script>
      $(document).ready(function(){
        $('#print').on('click', function(){
          console.log('print clicked')
          var content = $('#printContent').html();
          var originalContent = $('body').html();

          $('body').html(content);

          window.print();
          $('body').html(originalContent);
        })
      });
    </script>

  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>