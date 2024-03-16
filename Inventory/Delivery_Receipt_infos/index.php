<?php
session_start();
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include "../../page_properties/header.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
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
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Call the function initially
            fetchTableContent();

            // Call the function every 5 seconds (adjust the interval as needed)
            setInterval(fetchTableContent, 5000); // 5000 milliseconds = 5 seconds
        });
    </script>
  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>