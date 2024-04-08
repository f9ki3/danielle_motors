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
    <!-- <script type="text/javascript">
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
    </script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // JavaScript to focus on the input element when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            try {
                document.getElementById('barcodeInput').focus();
            } catch (error) {
                console.error('An error occurred while trying to focus on the input element:', error);
            }
        });
    </script>
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
                                // Play the success sound
                                document.getElementById('successSound').play();
                                
                                // Check the barcode against the database
                                makeAjaxRequest();
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

            // Function to handle AJAX request
            function makeAjaxRequest() {
                const barcodeInput = document.getElementById('barcodeInput');
                const productIdSelect = document.getElementById('product_id');
                const enterDetailsBtn = document.getElementById('enterDetailsBtn');
                const barcode = barcodeInput.value;

                // Reset the select element
                productIdSelect.selectedIndex = -1;

                // AJAX request
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'get_content.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.error) {
                            // Handle error response
                            console.error(response.error);
                            swal("Product not found", "Enter the barcode again, or manually enter the product data", "error");
                            productIdSelect.value = '';
                            enterDetailsBtn.style.display = 'inline-block'; // Show "Enter Details" button
                            document.getElementById('errorSound').play();
                        } else {
                            // Update select options with response data
                            const productId = response.product_id;
                            const option = productIdSelect.querySelector(`option[value="${productId}"]`);
                            if (option) {
                                option.selected = true;
                                enterDetailsBtn.style.display = 'none'; // Hide "Enter Details" button
                                productIdSelect.style.display = 'inline-block'; // Show select tag for product_id
                                productIdSelect.value = productId; // Set value of productIdSelect
                                document.getElementById('form-extension').style.display = 'none'; // Hide the form extension
                            } else {
                                swal("Product not found", "Enter the barcode again, or manually enter the product data", "error");
                                productIdSelect.value = '';
                                enterDetailsBtn.style.display = 'inline-block'; // Show "Enter Details" button
                            }
                        }
                    } else {
                        // Handle other HTTP status
                        console.error('Request failed. Status code: ' + xhr.status);
                    }
                };
                xhr.send('barcodeInput=' + encodeURIComponent(barcode));
            }
        });
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const barcodeInput = document.getElementById('barcodeInput');
        const productIdSelect = document.getElementById('product_id');
        const enterDetailsBtn = document.getElementById('enterDetailsBtn');
        let timeoutId;

        // Function to handle AJAX request
        function makeAjaxRequest() {
            const barcode = barcodeInput.value;

            // Reset the select element
            productIdSelect.selectedIndex = -1;

            // AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'get_content.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.error) {
                        // Handle error response
                        console.error(response.error);
                        swal("Product not found", "Enter the barcode again, or manually enter the product data", "error");
                        productIdSelect.value = '';
                        enterDetailsBtn.style.display = 'inline-block'; // Show "Enter Details" button
                        document.getElementById('errorSound').play();
                    } else {
                        // Update select options with response data
                        const productId = response.product_id;
                        const option = productIdSelect.querySelector(`option[value="${productId}"]`);
                        if (option) {
                            option.selected = true;
                            enterDetailsBtn.style.display = 'none'; // Hide "Enter Details" button
                            productIdSelect.style.display = 'inline-block'; // Show select tag for product_id
                            productIdSelect.value = productId; // Set value of productIdSelect
                            document.getElementById('form-extension').style.display = 'none'; // Hide the form extension
                        } else {
                            swal("Product not found", "Enter the barcode again, or manually enter the product data", "error");
                            productIdSelect.value = '';
                            enterDetailsBtn.style.display = 'inline-block'; // Show "Enter Details" button
                        }
                    }
                } else {
                    // Handle other HTTP status
                    console.error('Request failed. Status code: ' + xhr.status);
                }
            };
            xhr.send('barcodeInput=' + encodeURIComponent(barcode));
        }

        // Event listener for "Enter Details" button
        enterDetailsBtn.addEventListener('click', function() {
            document.getElementById('form-extension').style.display = 'block'; // Unhide the form extension
        });






        // Event listener for input change
        function handleInput() {
            // Clear previous timeout
            clearTimeout(timeoutId);

            // Set new timeout
            timeoutId = setTimeout(makeAjaxRequest, 2000);
        }

        // Trigger AJAX request when the page loads if barcode input has a value
        if (barcodeInput.value.trim() !== '') {
            makeAjaxRequest();
        }

        // Event listener for input change
        barcodeInput.addEventListener('input', handleInput);

        // Event listener for Enter key press
        barcodeInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                clearTimeout(timeoutId); // Clear timeout if Enter is pressed
                makeAjaxRequest();
            }
        });

        // Event listener for "Enter Details" button click
        enterDetailsBtn.addEventListener('click', function() {
            enterDetailsBtn.style.display = 'none'; // Hide "Enter Details" button
            productIdSelect.style.display = 'none'; // Hide select tag
            productIdSelect.selectedIndex = -1; // Deselect the option
        });


        // Event listener for "Undo" button click
        document.getElementById('undoBtn').addEventListener('click', function() {
            enterDetailsBtn.style.display = 'inline-block'; // Show "Enter Details" button
            productIdSelect.style.display = 'inline-block'; // Show select tag
            document.getElementById('form-extension').style.display = 'none'; // Hide the form extension
        });

        // Event listener for "Submit" button click
        document.getElementById('submitBtn').addEventListener('click', function() {
            enterDetailsBtn.style.display = 'inline-block'; // Show "Enter Details" button
            productIdSelect.style.display = 'inline-block'; // Show select tag
        });
    });
    </script>
    

  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>