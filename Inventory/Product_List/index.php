<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

 <?php include "../../page_properties/header.php" ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap5-theme@1.0.2/dist/select2-bootstrap5.min.css" rel="stylesheet" />

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
    $(document).ready(function(){
        // Variable to store the last known hash
        var lastHash = '';

        // Function to fetch PHP-generated content
        function fetchTableContent() {
            $.ajax({
                url: 'total_products.php',
                success: function(response) {
                    // Calculate hash of the response
                    var currentHash = hash(response);
                    
                    // If hash has changed, update content
                    if (currentHash !== lastHash) {
                        // Update lastHash
                        lastHash = currentHash;

                        // Extract the number from the response
                        var match = response.match(/\((\d+)\)/);
                        if (match) {
                            var newNumber = parseInt(match[1]);
                            
                            // Get the current number inside the span
                            var currentNumber = parseInt($('#total_product').text());
                            
                            // Animate the change
                            $('#total_product').prop('Counter', currentNumber).animate({
                                Counter: newNumber
                            }, {
                                duration: 1000, // Animation duration in milliseconds
                                step: function (now) {
                                    // Update the displayed number with the animation
                                    $(this).text('(' + Math.ceil(now) + ')');
                                }
                            });
                        } else {
                            console.error("Number not found in response:", response);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Function to calculate hash
        function hash(str) {
            var hash = 0, i, chr;
            if (str.length === 0) return hash;
            for (i = 0; i < str.length; i++) {
                chr = str.charCodeAt(i);
                hash = ((hash << 5) - hash) + chr;
                hash |= 0; // Convert to 32bit integer
            }
            return hash;
        }

        // Call the function initially
        fetchTableContent();

        // Call the function every 5 seconds (adjust the interval as needed)
        setInterval(fetchTableContent, 1000); // 5000 milliseconds = 5 seconds

        $('#brand').select2({
            dropdownParent: $('#add_product'),
            tags: true,
            height: '100%',
            width: '100%',
            theme: 'bootstrap-5',
            placeholder: 'Select Brand',
        });

        $('#category').select2({
            dropdownParent: $('#add_product'),
            tags: true,
            height: '100%',
            width: '100%',
            theme: 'bootstrap-5',
            placeholder: 'Select Category',
        });

        $('#unit').select2({
            dropdownParent: $('#add_product'),
            tags: true,
            height: '100%',
            width: '100%',
            theme: 'bootstrap-5',
            placeholder: 'Select Unit',
        });

        $('.js-models-responsive').select2({
                tags: 'true',
                width: '100%',
                placeholder: 'Select models',
                theme: 'bootstrap-5'
            });

    });
    </script>


    </script>
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>