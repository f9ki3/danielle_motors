<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

 <?php include "../../page_properties/header_pos.php" ?>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <!-- navigation -->
      <?php include "../../page_properties/navbar_pos.php";?>
      <!-- /navigation -->
      <div class="content bg-white">
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
      <!-- <?php include "../../page_properties/chat-container.php"; ?> -->
      <!-- /chat container -->
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- theme customizer -->
    <?php include "../../page_properties/theme-customizer.php"; ?>
    <!-- /theme customizer -->

    <?php include "../../page_properties/footer_main.php"; ?>
    <script>
          // Function to reload spinner for 3 seconds and play audio
          function reloadSpinner() {
              // Show spinner
              document.getElementById('spinner').style.display = 'flex';
              // Hide content
              document.getElementById('content').style.display = 'none';
              
              // // Create an audio element
              // var audio = new Audio('yamete-kudasai-mp3-(original)-made-with-Voicemod.mp3.mp3'); // Replace 'path_to_your_audio_file.mp3' with the actual path to your audio file
              
              // // Play audio
              // audio.play();
              
              // Set timeout to hide spinner, stop audio, and show content after 3 seconds
              setTimeout(function() {
                  document.getElementById('spinner').style.display = 'none';
                  document.getElementById('content').style.display = 'block';
                  audio.pause(); // Pause audio
                  audio.currentTime = 0; // Reset audio to beginning
              }, 2000); // 3000 milliseconds = 3 seconds
          }


          // Call the function to reload spinner
          reloadSpinner();
    </script>
  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>