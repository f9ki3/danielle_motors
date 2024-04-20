<?php
include "../../admin/session.php";
include "../../database/database.php";
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
    <script type="text/javascript" src="../../assets/libs/node_modules/@zxing/library/umd/index.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        window.addEventListener('load', function () {
            let selectedDeviceId;
            const codeReader = new ZXing.BrowserMultiFormatReader();
            console.log('ZXing code reader initialized');
            codeReader.listVideoInputDevices()
                .then((videoInputDevices) => {
                    const sourceSelect = document.getElementById('sourceSelect');
                    selectedDeviceId = videoInputDevices[0].deviceId;
                    if (videoInputDevices.length >= 1) {
                        videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option');
                            sourceOption.text = element.label;
                            sourceOption.value = element.deviceId;
                            sourceSelect.appendChild(sourceOption);
                        });

                        sourceSelect.onchange = () => {
                            selectedDeviceId = sourceSelect.value;
                        };

                        const sourceSelectPanel = document.getElementById('sourceSelectPanel');
                        sourceSelectPanel.style.display = 'block';
                    }

                    document.getElementById('startButton').addEventListener('click', () => {
                        codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
                            if (result) {
                                console.log(result);
                                document.getElementById('result').textContent = result.text;
                                // Set the value of the input field to the scanned barcode
                                document.getElementById('barcodeInput').value = result.text;
                                // Make an AJAX request to get the product ID
                                const xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function () {
                                    if (xhr.readyState === XMLHttpRequest.DONE) {
                                        if (xhr.status === 200) {
                                            // Parse the JSON response
                                            const response = JSON.parse(xhr.responseText);
                                            if (response.product_id) {
                                                // Product found, select the corresponding option in the select element
                                                document.getElementById('product_id').value = response.product_id;
                                                document.getElementById('productfoundSound').play();
                                            } else if (response.error && response.error === 'Product not found') {
                                                // Product not found, show a SweetAlert
                                                swal("Product not found", "Enter the barcode again, or manually enter the product data", "error");
                                                // Play the error sound
                                                document.getElementById('errorSound').play();
                                            }
                                        } else {
                                            // Error handling
                                            console.error('Error fetching product ID:', xhr.status);
                                        }
                                    }
                                };
                                xhr.open('POST', 'get_content.php', true);
                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                xhr.send('barcodeInput=' + encodeURIComponent(result.text));
                                // Play the success sound
                                document.getElementById('successSound').play();
                            }
                            if (err && !(err instanceof ZXing.NotFoundException)) {
                                console.error(err);
                                document.getElementById('result').textContent = err;
                            }
                        });
                        console.log(`Started continuous decode from camera with id ${selectedDeviceId}`);
                    });

                    document.getElementById('resetButton').addEventListener('click', () => {
                        codeReader.reset();
                        document.getElementById('result').textContent = '';
                        console.log('Reset.');
                    });

                })
                .catch((err) => {
                    console.error(err);
                });
        });
    </script>

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get references to the barcode input and product select elements
            const barcodeInput = document.getElementById('barcodeInput');
            const productIdSelect = document.getElementById('product_id');

            // Add event listener for input change on barcode input
            barcodeInput.addEventListener('input', function () {
                // Get the barcode value
                const barcodeValue = barcodeInput.value;

                // Make an AJAX request to get the product ID
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Parse the JSON response
                            const response = JSON.parse(xhr.responseText);
                            if (response.product_id) {
                                // Product found, select the corresponding option in the select element
                                productIdSelect.value = response.product_id;
                                document.getElementById('productfoundSound').play();
                                return;
                            } else if (response.error && response.error === 'Product not found') {
                                // Product not found, show a SweetAlert
                                swal("Product not found", "Enter the barcode again, or manually enter the product data", "error");
                                // Play the error sound
                                document.getElementById('errorSound').play();
                            }
                        } else {
                            // Error handling
                            console.error('Error fetching product ID:', xhr.status);
                        }
                    }
                };
                xhr.open('POST', 'get_content.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('barcodeInput=' + encodeURIComponent(barcodeValue));
            });
        });
    </script>


    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('submitBtn').addEventListener('click', function (event) {
                // Prevent the default form submission behavior
                event.preventDefault();
                
                // Create a FormData object from the form
                var formData = new FormData(document.getElementById('barcodeForm'));
                
                // Create an AJAX request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../../PHP - process_files/add_stocks_draft.php', true);

                // Set up the onload event handler
                xhr.onload = function () {
                    // Check if the request was successful
                    if (xhr.status === 200) {
                        // Clear input fields
                        document.getElementById('barcodeForm').reset();
                        // Set focus to barcode input
                        document.getElementById('barcodeInput').focus();
                        // Log the response in the console
                        console.log(xhr.responseText);
                    }
                };

                // Set up the onerror event handler
                xhr.onerror = function () {
                    // Handle any errors that occur during the request
                    console.error('Error occurred during AJAX request.');
                };

                // Send the AJAX request with the form data
                xhr.send(formData);
            });
        });
    </script>


    <script>
    $(document).ready(function(){
        function checkStocksDraft(){
            $.ajax({
                url: 'check_stocks_draft.php',
                type: 'GET',
                dataType: 'text',
                success: function(response){
                    console.log(response);
                    // Reload the preview if a new row was inserted or deleted
                    if(response === "A new row was inserted." || response === "A row was deleted.") {
                        reloadPreview();
                    }
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    console.log("Error occurred while checking stocks draft.");
                }
            });
        }

        // Function to reload the preview
        function reloadPreview() {
            $.ajax({
                url: 'preview.php',
                type: 'GET',
                success: function(response){
                    $('#stock_in_preview').html(response);
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            });
        }

        // Call the function initially
        reloadPreview();

        // Call the function to check stocks draft initially and then every 5 seconds
        checkStocksDraft();
        setInterval(checkStocksDraft, 5000); // 5000 milliseconds = 5 seconds
    });
    </script>

  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>