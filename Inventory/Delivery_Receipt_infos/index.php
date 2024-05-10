<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');

$dr_id = $_SESSION['dr_id'];
$select_dr_Status = "SELECT `status` FROM delivery_receipt WHERE id = '$dr_id'";
$select_dr_res = $conn->query($select_dr_Status);
if($select_dr_res->num_rows>0){
    $row=$select_dr_res->fetch_assoc();
    $dr_status = $row['status'];
}
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<?php include "../../admin/header.php" ?>
<?php include "../../page_properties/header.php" ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap5-theme@1.0.2/dist/select2-bootstrap5.min.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="DRstyle.css"> -->

    <!-- <script>
        $(document).ready(function(){
            $('#submitForm').click(function(e){
                e.preventDefault(); // Prevent form submission and page reload

                // Collect form data
                var formData = $('#products_infos').serialize();

                // Send AJAX request
                $.ajax({
                    type: 'POST',
                    url: '../../PHP - process_files/add_dr_info.php?id=<?php //echo $_SESSION['dr_id']; ?>',
                    data: formData,
                    dataType: 'json', // Expect JSON response from server
                    success: function(response){
                        if (response.success) {
                            // Show success alert message
                            alert(response.message);
                        } else {
                            // Show validation errors
                            var errorMessages = response.errors.join("\n");
                            alert(errorMessages);
                        }
                    }
                });
            });
        });
    </script> -->
    <script>
        $(document).ready(function(){
            $('#submitForm').click(function(e){
                e.preventDefault(); // Prevent form submission and page reload
                
                // Check if any required field is empty
                var requiredFields = $('#products_infos').find(':input[required]');
                var emptyFields = requiredFields.filter(function() {
                    return !$(this).val();
                });

                // If there are empty required fields, show toast and stop form submission
                if (emptyFields.length > 0) {
                    var errorToast = $('#errorToast').clone();
                    $('.toast-container').append(errorToast);
                    var bsToast = new bootstrap.Toast(errorToast[0]);
                    bsToast.show();
                    return;
                }
                
                // Collect form data
                var formData = $('#products_infos').serialize();

                // Send AJAX request
                $.ajax({
                    type: 'POST',
                    url: '../../PHP - process_files/add_dr_info.php?id=<?php echo $_SESSION['dr_id']; ?>',
                    data: formData,
                    dataType: 'json', // Expect JSON response from server
                    success: function(response){
                        if (response.success) {
                            // Show success toast
                            var successToast = $('#successToast').clone();
                            successToast.find('.toast-body').text("Data successfully added!");
                            $('.toast-container').append(successToast);
                            var bsToast = new bootstrap.Toast(successToast[0]);
                            bsToast.show();

                            // Reset form fields
                            $('#products_infos :input').val('');
                        } else if (response.error) {
                            // Show error toast
                            var errorToast = $('#errorToast2').clone();
                            errorToast.find('.toast-body').text(response.error);
                            $('.toast-container').append(errorToast);
                            var bsToast = new bootstrap.Toast(errorToast[0]);
                            bsToast.show();
                        } else {
                            // Handle unexpected response
                            swal("Error", "Unexpected response from server", "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX errors
                        console.error(xhr.responseText);
                        swal("Error", "An error occurred while processing the request.", "error")
                    }
                });
            });
            $('#submitForm_2').click(function(f){
                f.preventDefault(); // Prevent form submission and page reload
                            
                // Check if any required field is empty
                var requiredFields_2 = $('#products_infos_2').find(':input[required]');
                var emptyFields_2 = requiredFields_2.filter(function() {
                    return !$(this).val();
                });

                // If there are empty required fields, show toast and stop form submission
                if (emptyFields_2.length > 0) {
                    var errorToast_2 = $('#errorToast').clone();
                    $('.toast-container').append(errorToast_2);
                    var bsToast_2 = new bootstrap.Toast(errorToast_2[0]);
                    bsToast_2.show();
                    return;
                }
                            
                // Create FormData object
                var formData_2 = new FormData($('#products_infos_2')[0]);

                // Send AJAX request
                $.ajax({
                    type: 'POST',
                    url: '../../PHP - process_files/add_dr_info.php?id=<?php echo $_SESSION['dr_id']; ?>',
                    data: formData_2,
                    dataType: 'json', // Expect JSON response from server
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Prevent jQuery from setting contentType
                    success: function(response_2){
                        if (response_2.success) {
                            // Show success toast
                            var successToast_2 = $('#successToast').clone();
                            successToast_2.find('.toast-body').text("Data successfully added!");
                            $('.toast-container').append(successToast_2);
                            var bsToast_2 = new bootstrap.Toast(successToast_2[0]);
                            bsToast_2.show();

                            // Reset form fields
                            $('#products_infos_2 :input').val('');
                        } else if (response_2.error) {
                            // Show error toast
                            var errorToast_2 = $('#errorToast2').clone();
                            errorToast_2.find('.toast-body').text(response_2.error);
                            $('.toast-container').append(errorToast_2);
                            var bsToast_2 = new bootstrap.Toast(errorToast_2[0]);
                            bsToast_2.show();
                        } else {
                            // Handle unexpected response
                            swal("Error", "Unexpected response from server", "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX errors
                        console.error(xhr.responseText);
                        swal("Error", "An error occurred while processing the request.", "error")
                    }
                });
            });

        });

    </script>
    




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
        if($dr_status != 1){
            include "content.php";
        } else {
            include "save_content.php";
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
    <script>
        function checkDRChanges(dr_id) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        if (xhr.responseText.trim() === "changes were made") {
                            tbody(); // Call tbody() function if changes were made
                            dr_footer();
                            modals();
                        }
                        console.log(xhr.responseText);
                    } else {
                        console.error('Error occurred: ' + xhr.status);
                    }
                }
            };
            xhr.open("GET", "check_dr_changes.php?id=" + dr_id, true);
            xhr.send();
        }

        // Replace dr_id with the actual delivery receipt id
        var dr_id = "<?php echo $_SESSION['dr_id']; ?>";
        setInterval(function() {
            checkDRChanges(dr_id);
        }, 2000); // Check every 5 seconds


        // Function to reload the preview
        function tbody() {
            $.ajax({
                url: 'tbody.php?id=<?php echo $_SESSION['dr_id'];?>',
                type: 'GET',
                success: function(response){
                    $('#live_product_data').html(response);
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            });
        }

        function modals() {
            $.ajax({
                url : 'modals.php?id=<?php echo $_SESSION['dr_id'];?>',
                type: 'GET',
                success: function(response){
                    $('#modals_container').html(response);
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            })
        }
        // Function to reload the preview
        function dr_footer() {
            $.ajax({
                url: 'dr_footer.php?id=<?php echo $_SESSION['dr_id'];?>',
                type: 'GET',
                success: function(response){
                    $('#dr_footer').html(response);
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            });
        }

        // Call the function initially
        tbody();
        dr_footer();
        modals();
    </script>

 <script>
        $(document).ready(function() {
            $('#product_id').select2({
                tags: 'true',
                width: '100%',
                placeholder: 'Select product',
                theme: 'bootstrap-5'
            });
                        
            
            $('.js-example-responsive').select2({
                tags: 'true',
                width: '100%',
                theme: 'bootstrap-5'
            });

            $('.js-models-responsive').select2({
                tags: 'true',
                width: '100%',
                placeholder: 'Select models',
                theme: 'bootstrap-5'
            });
        });
    </script>


    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>