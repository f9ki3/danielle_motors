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
      <div class="content ps-0 pe-0 pb-0 m-0">
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
    
    <script type="text/javascript">
        $(document).ready(function(){
            function checkMessageChanges(){
                $.ajax({
                    url: 'check_message_changes.php',
                    type: 'GET',
                    success: function(response){
                        // Log the response to the console
                        console.log(response);
                        // Check if the response indicates a change in chat threads
                        if(response === "A row was deleted." || response === "A new row was inserted.") {
                            // If a change occurred, load chat threads
                            loadChatThreads();
                            // loadChatBodyThreads();
                            loadActualChat()
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error checking message changes:", error);
                    }
                });
            }
            
            // Call the function initially
            checkMessageChanges();
            
            // Set interval to call the function every 5 seconds
            setInterval(checkMessageChanges, 2000);
        });

        // Function to load content from chat_thread_list.php
        function loadChatThreads() {
            $.ajax({
                url: "chat_tread_list.php",
                type: "GET",
                success: function(response) {
                    // Replace the content of the ul element with the response from chat_thread_list.php
                    $('#chat_threads_list').html(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading chat threads:", error);
                }
            });
        }

        // Function to load content from chat_thread_list.php
        function loadChatBodyThreads() {
            $.ajax({
                url: "chat_body_thread.php",
                type: "GET",
                success: function(response) {
                    // Replace the content of the ul element with the response from chat_thread_list.php
                    $('#chat_body_thread').html(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading chat threads:", error);
                }
            });
        }

        

        // Call the function initially when the page loads
        loadChatThreads();
        loadChatBodyThreads();
    </script>

    



    

    
    


    

  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>