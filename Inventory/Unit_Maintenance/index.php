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
    <script>
        $(document).ready(function(){
            $('.update').on('click', function(){
                $('#updateLabel').text('Editing `' + $(this).data('unit-name') + '`');
                $('#update_id').val($(this).data('unit-id'));
                $('#update_unit').val($(this).data('unit-name'));
                $('#updateModal').modal('show');
            });

            $('#update-form').on('submit', function(event){
                event.preventDefault();
                var id = $('#update_id').val();
                var unit = $('#update_unit').val();
                console.log(id + ' ' + unit);

                $.ajax({
                    url: '../../PHP - process_files/updateUnit.php',
                    method: 'POST',
                    data: {
                        id : id,
                        unit : unit
                    },
                    dataType: 'json',
                    success: function(response){
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    }
                })
            })
        })
    </script>
  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>