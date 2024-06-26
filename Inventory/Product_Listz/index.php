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
    <script src="infinite_scrolling.js"></script>
    <script>
        $(document).ready(function() {
            var offset = 0;

            function fetchProduct() {
                $.ajax({
                    url: 'fetch_product.php',
                    type: 'GET',
                    data: { offset: offset },
                    dataType: 'json',
                    success: function(response) {
                        if (response) {
                            // Construct HTML for displaying product details
                            var html = '<tr>';
                            html += '<td class="align-middle white-space-nowrap py-0"><img src="../../uploads/' + response.image + '" alt="" width="53"></td>';
                            html += '<td class="product align-middle ps-4">' + response.name + '</td>';
                            html += '<td class="product align-middle ps-4">₱' + parseFloat(response.wholesale).toFixed(2) + '</td>';
                            html += '<td class="product align-middle ps-4">₱' + parseFloat(response.srp).toFixed(2) + '</td>';
                            html += '<td class="price align-middle white-space-nowrap text-start ps-4"><span class="badge badge-phoenix badge-phoenix-primary">' + response.code + '</span></td>';
                            html += '<td class="category align-middle white-space-nowrap ps-4 text-start"><span class="badge badge-phoenix badge-phoenix-secondary">' + response.barcode + '</span></td>';
                            html += '<td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">' + response.category_name + '</td>';
                            html += '<td class="vendor align-middle text-start fw-semi-bold ps-4">' + response.brand_name + '</td>';
                            html += '<td class="time align-middle white-space-nowrap text-600 ps-4">' + response.unit_name + '</td>';
                            html += '<td class="time align-middle white-space-nowrap text-600 ps-4">' + response.models + '</td>';
                            html += '<td class="time align-middle white-space-nowrap text-600 ps-4"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Active</span><span class="ms-1"><i class="fas fa-check"></i></span></span></td>';
                            html += '<td class="publish align-middle white-space-nowrap text-600 ps-4">' + response.user_fname + ' ' + response.user_lname + '</td>';
                            html += '<td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">';
                            html += '<div class="font-sans-serif btn-reveal-trigger position-static">';
                            html += '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">';
                            html += '<span class="fas fa-ellipsis-h fs--2"></span></button>';
                            html += '<div class="dropdown-menu dropdown-menu-end py-2">';
                            html += '<a class="dropdown-item edit_product" data-product-id="' + response.id + '">Edit</a>';
                            html += '<div class="dropdown-divider"></div>';
                            // html += '<a class="dropdown-item" href="print_barcode.php?barcode=' + response.barcode + '">Export</a>';
                            // html += '<a class="dropdown-item text-danger" href="#!">Remove</a>';
                            html += '</div></div></td></tr>';

                            // Append product HTML to the container
                            $('#productList').append(html);

                            // Update offset for the next fetch
                            offset++;

                            // Fetch next product recursively
                            fetchProduct();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching product:', error);
                    }
                });
            }

            // Start fetching products when document is ready
            fetchProduct();
        });
    </script>
  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>