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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../assets/libs/node_modules/@zxing/library/umd/index.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        const product_id_input = document.getElementById('product_id');
        const product_name_input = document.getElementById('product_name');
        const product_model_input = document.getElementById('product_model');
        let timeoutId;

        // Function to handle AJAX request
        function makeAjaxRequest() {
            const product_id = product_id_input.value;

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
                        product_name_input.value = '';
                        product_model_input.value = '';
                    } else {
                        // Update form fields with response data
                        product_name_input.value = response.product_name;
                        product_model_input.value = response.product_model;
                    }
                } else {
                    // Handle other HTTP status codes
                    console.error('Request failed. Status code: ' + xhr.status);
                }
            };
            xhr.send('product_id=' + encodeURIComponent(product_id));
        }

        // Event listener for input change
        product_id_input.addEventListener('input', function() {
            // Clear previous timeout
            clearTimeout(timeoutId);

            // Set new timeout
            timeoutId = setTimeout(makeAjaxRequest, 2000);
        });

        // Event listener for Enter key press
        product_id_input.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                clearTimeout(timeoutId); // Clear timeout if Enter is pressed
                makeAjaxRequest();
            }
        });

        // Remove readonly attribute on input fields
        product_name_input.removeAttribute('readonly');
        product_model_input.removeAttribute('readonly');
    });
  </script>
  <script type="text/javascript">
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text
                // Set the value of the input field to the scanned barcode
                document.getElementById('product_id').value = result.text;
                // Play the success sound
                document.getElementById('successSound').play();
                // Submit the form using AJAX
                // submitFormWithAjax();
              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continuous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })

      function submitFormWithAjax() {
        const form = document.getElementById('product_stockin_form');
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert('Form submitted successfully via AJAX.');
                    // Reset the value of the input field
                    document.getElementById('product_id').value = '';
                } else {
                    alert('Form submission failed.');
                }
            }
        };
        xhr.open(form.method, form.action, true);
        xhr.send(formData);
    }

    })
  </script>

  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>