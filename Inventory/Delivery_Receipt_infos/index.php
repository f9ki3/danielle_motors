<?php
session_start();
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include "../../page_properties/header.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script>
        $(document).ready(function(){
            $('#submitForm').click(function(e){
                e.preventDefault(); // Prevent form submission and page reload

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
                            alert("Unexpected response from server");
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX errors
                        console.error(xhr.responseText);
                        alert("An error occurred while processing the request.");
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
            // Function to fetch PHP-generated content
            function fetchTableContent() {
                $.ajax({
                    url: 'tbody.php',
                    success: function(response) {
                        $('#live_product_data').html(response);
                        // After successfully updating content, initiate the next long poll
                        fetchTableContent();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // In case of error, retry the long poll after some time
                        setTimeout(fetchTableContent, 5000); // Retry after 5 seconds
                    }
                });
            }

            // Call the function initially
            fetchTableContent();



            // ------total
            // Function to fetch PHP-generated content
            function fetchTotalContent() {
                $.ajax({
                    url: 'dr_footer.php',
                    success: function(response) {
                        $('#dr_footer').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Call the function initially
            fetchTotalContent();

            // Call the function every 5 seconds (adjust the interval as needed)
            setInterval(fetchTotalContent, 5000); // 5000 milliseconds = 5 seconds
        });

    </script>
    <!-- <script>
    $(document).ready(function(){
        // Function to fetch PHP-generated content
        function fetchContent(url, targetElement) {
            $.ajax({
                url: url,
                success: function(response) {
                    $(targetElement).html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Call the functions initially
        fetchContent('tbody.php', '#live_product_data');
        fetchContent('dr_footer.php', '#dr_footer');

        // Call the functions every 5 seconds (adjust the interval as needed)
        setInterval(function() {
            fetchContent('tbody.php', '#live_product_data');
            fetchContent('dr_footer.php', '#dr_footer');
        }, 5000); // 5000 milliseconds = 5 seconds
    });
    </script> -->

  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>