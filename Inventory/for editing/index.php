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
    <!-- Add any necessary JavaScript libraries -->
    
    <script>
      // Function to fetch JSON data from file
      function fetchChatsData(callback) {
        fetch('chats.json')
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.json();
          })
          .then(data => {
            callback(data);
          })
          .catch(error => {
            console.error('There was a problem fetching the data:', error);
          });
      }

      // Function to display chat threads
      function displayChatThreads(userId) {
        fetchChatsData(function(data) {
          const chatThreadList = document.getElementById('chat_thread_list');
          chatThreadList.innerHTML = ''; // Clear existing content

          // Filter JSON data based on to_user_id
          const filteredChats = data.filter(chat => chat.to_user_id === userId);

          // Create list items for each chat thread
          filteredChats.forEach(chat => {
            const listItem = document.createElement('li');
            listItem.classList.add('nav-item', chat.message_status);
            listItem.setAttribute('role', 'presentation');

            const link = document.createElement('a');
            link.id = `message_id_${chat.from_user_id}`;
            link.classList.add('nav-link', 'd-flex', 'align-items-center', 'justify-content-center', 'p-2', chat.message_status);
            link.setAttribute('data-bs-toggle', 'tab');
            link.setAttribute('data-chat-thread', 'data-chat-thread');
            link.href = `#tab-thread-${chat.from_user_id}`;
            link.setAttribute('role', 'tab');
            link.setAttribute('aria-selected', 'false');

            const avatarDiv = document.createElement('div');
            avatarDiv.classList.add('avatar', 'avatar-xl', 'status-online', 'position-relative', 'me-2', 'me-sm-0', 'me-xl-2');
            const avatarImg = document.createElement('img');
            avatarImg.classList.add('rounded-circle', 'border', 'border-2', 'border-white');
            avatarImg.src = `../../uploads/${chat.from_user_pfp}`;
            avatarImg.alt = '';

            const flexDiv = document.createElement('div');
            flexDiv.classList.add('flex-1', 'd-sm-none', 'd-xl-block');
            const innerDiv1 = document.createElement('div');
            innerDiv1.classList.add('d-flex', 'justify-content-between', 'align-items-center');
            const nameHeading = document.createElement('h5');
            nameHeading.classList.add('text-900', 'fw-normal', 'name', 'text-nowrap');
            nameHeading.textContent = chat.from_user_full_name;
            const timeParagraph = document.createElement('p');
            timeParagraph.classList.add('fs--2', 'text-600', 'mb-0', 'text-nowrap');
            timeParagraph.textContent = chat.date_sent;
            const innerDiv2 = document.createElement('div');
            innerDiv2.classList.add('d-flex', 'justify-content-between');
            const messageParagraph = document.createElement('p');
            messageParagraph.classList.add('fs--1', 'mb-0', 'line-clamp-1', 'text-600', 'message');
            messageParagraph.textContent = chat.message;

            // Appending elements
            innerDiv1.appendChild(nameHeading);
            innerDiv1.appendChild(timeParagraph);
            innerDiv2.appendChild(messageParagraph);
            flexDiv.appendChild(innerDiv1);
            flexDiv.appendChild(innerDiv2);
            avatarDiv.appendChild(avatarImg);
            link.appendChild(avatarDiv);
            link.appendChild(flexDiv);
            listItem.appendChild(link);
            chatThreadList.appendChild(listItem);
          });
        });
      }

      // Call the function with the desired user_id
      const user_id = "<?php echo $user_id;?>";
      displayChatThreads(user_id);
    </script>

    



    

    
    


    

  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
</html>