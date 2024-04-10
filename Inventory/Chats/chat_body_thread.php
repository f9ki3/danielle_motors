<?php 
include "../../admin/session.php";
include "../../database/database.php";
$message_list_sql = "SELECT cm.id, cm.from_user_id, cm.message, cm.date_sent, cm.status, u.user_fname, u.user_lname, u.user_img
                    FROM chat_messages cm
                    INNER JOIN (
                        SELECT MAX(id) AS max_id, from_user_id
                        FROM chat_messages
                        WHERE to_user_id = '$user_id'
                        GROUP BY from_user_id
                    ) max_ids ON cm.id = max_ids.max_id
                    INNER JOIN user u ON cm.from_user_id = u.id
                    ORDER BY cm.id DESC";
$message_list_result = $conn->query($message_list_sql);
if($message_list_result->num_rows > 0){
    while($row = $message_list_result->fetch_assoc()){
        $message_id = $row['id'];
        $from_user_id = $row['from_user_id'];
        $last_message_content = $row['message'];
        $date_Sent = $row['date_sent'];
        $user_pfp = $row['user_img'];
        $from_user_fullname = $row['user_fname'] . " " . $row['user_lname'];
        if($row['status'] == 0){
            $chat_status = "unread";
        } else {
            $chat_status = "read";
        }
        
        // Check if $_SESSION['selected_message'] is set
        $isActive = '';
        $ariaSelected = 'false';
        if(isset($_SESSION['selected_message'])){
            // If it's set, check if it matches the current $from_user_id
            $isActive = ($_SESSION['selected_message'] == $from_user_id) ? 'active show' : '';
            $ariaSelected = ($_SESSION['selected_message'] == $from_user_id) ? 'true' : 'false';
        }
?>
<div class="tab-pane h-100 fade <?php echo $isActive;?>" id="tab-thread-<?php echo $from_user_id;?>" role="tabpanel" aria-labelledby="tab-thread-<?php echo $from_user_id;?>">
    <div class="card flex-1 h-100 phoenix-offcanvas-container">
        <div class="card-header p-3 p-md-4 d-flex flex-between-center">
            <!-- Header section -->
            <div class="d-flex align-items-center">
                <button class="btn ps-0 pe-2 text-700 d-sm-none" data-phoenix-toggle="offcanvas" data-phoenix-target="#chat-sidebar">
                    <span class="fa-solid fa-chevron-left"></span>
                </button>
                <div class="d-flex flex-column flex-md-row align-items-md-center">
                    <button class="btn fs-1 fw-semi-bold text-1100 d-flex align-items-center p-0 me-3 text-start" data-phoenix-toggle="offcanvas" data-phoenix-target="#thread-details-<?php echo $from_user_id;?>">
                        <span class="line-clamp-1"><?php echo $from_user_fullname;?></span>
                        <span class="fa-solid fa-chevron-down ms-2 fs--2"></span>
                    </button>
                    <p class="fs--1 mb-0 me-2">
                        <span class="fa-solid fa-circle text-success fs--3 me-2"></span>Active now
                    </p>
                </div>
            </div>
            <div class="d-flex">
                <button class="btn btn-icon btn-primary me-1"><span class="fa-solid fa-phone"></span></button>
                <button class="btn btn-icon btn-primary me-1"><span class="fa-solid fa-video"></span></button>
                <button class="btn btn-icon btn-phoenix-primary" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                    <span class="fa-solid fa-ellipsis-vertical"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end p-0">
                    <li><a class="dropdown-item" href="#!">Add to favourites</a></li>
                    <li><a class="dropdown-item" href="#!">View profile</a></li>
                    <li><a class="dropdown-item" href="#!">Report</a></li>
                    <li><a class="dropdown-item" href="#!">Manage notifications</a></li>
                </ul>
            </div>
        </div>
        <!-- Body section -->
        <div class="card-body p-3 p-sm-4 scrollbar actual_chats" >
            
        </div>
        <!-- Footer section -->
        <div class="card-footer">
            <div class="chat-textarea outline-none scrollbar mb-1" contenteditable="true"></div>
            <div class="d-flex justify-content-between align-items-end">
                <div>
                    <button class="btn btn-link py-0 ps-0 pe-2 text-900 fs--1 btn-emoji" data-picmo="data-picmo">
                        <span class="fa-regular fa-face-smile"></span>
                    </button>
                    <label class="btn btn-link py-0 px-2 text-900 fs--1" for="chatPhotos-0">
                        <span class="fa-solid fa-image"></span>
                    </label>
                    <input class="d-none" type="file" accept="image/*" id="chatPhotos-0" />
                    <label class="btn btn-link py-0 px-2 text-900 fs--1" for="chatAttachment-0">
                        <span class="fa-solid fa-paperclip"></span>
                    </label>
                    <input class="d-none" type="file" id="chatAttachment-0" />
                    <button class="btn btn-link py-0 px-2 text-900 fs--1">
                        <span class="fa-solid fa-microphone"></span>
                    </button>
                    <button class="btn btn-link py-0 px-2 text-900 fs--1">
                        <span class="fa-solid fa-ellipsis"></span>
                    </button>
                </div>
                <div>
                    <button class="btn btn-primary fs--2" type="button">Send<span class="fa-solid fa-paper-plane ms-1"></span></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Thread details offcanvas -->
    <div class="phoenix-offcanvas phoenix-offcanvas-top h-100 w-100 bg-white scrollbar z-index-0" id="thread-details-<?php echo $from_user_id;?>">
        <div class="border-bottom p-4">
            <div class="d-flex flex-between-center">
                <button class="btn p-0" data-phoenix-dismiss="offcanvas">
                    <span class="fa-solid fa-chevron-left text-700"></span>
                </button>
                <button class="btn p-0 btn-reveal dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                    <span class="fas fa-ellipsis-v text-700"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end py-2">
                    <a class="dropdown-item" href="#!">View</a>
                    <a class="dropdown-item" href="#!">Export</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#!">Remove</a>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center text-center">
                <div class="avatar avatar-4xl mb-2">
                    <img class="rounded-circle border border-2 border-white" src="../../uploads/<?php echo basename($user_pfp);?>" alt="" />
                </div>
                <h4 class="fw-semi-bold mb-3"><?php echo $from_user_fullname;?></h4>
                <div class="d-flex">
                    <button class="btn btn-primary btn-icon fs--2 me-1"><span class="fas fa-phone"></span></button>
                    <button class="btn btn-primary btn-icon fs--2 me-1"><span class="fas fa-video"></span></button>
                    <button class="btn btn-phoenix-secondary btn-icon fs--2"><span class="fas fa-search"></span></button>
                </div>
            </div>
        </div>
        <div class="p-4 px-sm-5 scrollbar">
            <!-- Shared media -->
            <button class="btn d-block p-0 fw-semi-bold mb-3">
                <span class="fa-solid fa-user-pen me-3"></span>Nickname
            </button>
            <button class="btn d-block p-0 fw-semi-bold mb-3">
                <span class="fa-solid fa-palette me-3"></span>Change Color
            </button>
            <button class="btn d-block p-0 fw-semi-bold mb-5">
                <span class="fa-solid fa-user-plus me-3"></span>Create Group Chat
            </button>
            <!-- Shared media -->
            <div class="d-flex mb-5">
                <span class="fa-solid fa-photo-film me-3 fs--1"></span>
                <div>
                    <h6 class="fw-semi-bold mb-2">Shared Media</h6>
                    <div class="row g-2">
                        <div class="col-auto">
                            <a href="../../assets/img/chat/2.png" data-gallery="gallery">
                                <img class="fit-cover rounded-2 hover-bg-200" src="../../assets/img/chat/2.png" alt="" height="100" width="100" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shared files -->
            <div class="mb-5">
                <div class="d-flex">
                    <span class="fa-solid fa-folder me-3 fs--1"></span>
                    <div class="flex-1">
                        <h6 class="fw-semi-bold border-bottom pb-2 mb-0">Shared Files</h6>
                        <div class="mb-2">
                            <!-- Individual file -->
                            <div class="border-bottom d-flex align-items-center justify-content-between">
                                <a class="text-decoration-none d-flex align-items-center py-3" href="#!">
                                    <div class="btn-icon btn-icon-lg border border-500 rounded-3 text-500 flex-column me-2">
                                        <span class="fs-0 mb-1 fa-solid fa-file-zipper"></span>
                                        <p class="mb-0 fs--2 fw-bold lh-1">zip</p>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="text-900 line-clamp-1">Federico_godarf_design.zip</h6>
                                        <div class="d-flex align-items-center lh-1">
                                            <p class="fs--2 mb-0 text-700 fw-semi-bold">53.34 MB</p>
                                            <span class="fa-solid fa-circle text-500 fs--2" data-fa-transform="shrink-12"></span>
                                            <p class="fs--2 mb-0 text-700 fw-semi-bold">Dec 8, 2011</p>
                                        </div>
                                    </div>
                                </a>
                                <button class="btn p-0"><span class="fa-regular fa-arrow-alt-circle-down fs-0 text-700"></span></button>
                            </div>
                            <!-- More files -->
                            <!-- Add more files here -->
                        </div>
                        <a class="btn btn-link fs--2 p-0" href="#!">See 19 more <span class="fa-solid fa-chevron-down ms-1"></span></a>
                    </div>
                </div>
            </div>
            <!-- Other options -->
            <button class="btn d-block p-0 fw-semi-bold mb-3"><span class="fa-solid fa-bell-slash me-3"></span>Mute Conversation</button>
            <button class="btn d-block p-0 fw-semi-bold mb-3"><span class="fa-solid fa-gear me-3"></span>Manage Settings</button>
            <button class="btn d-block p-0 fw-semi-bold mb-3"><span class="fa-solid fa-hand-holding-heart me-3"></span>Get help</button>
            <button class="btn d-block p-0 fw-semi-bold mb-3"><span class="fa-solid fa-flag me-3"></span>Report Account</button>
            <button class="btn d-block p-0 fw-semi-bold"><span class="fa-solid fa-ban me-3"></span>Block Account</button>
        </div>
    </div>
</div>
<?php 
    }
} else {

}

?>
<!-- ------------ -->
<script src="../../assets/js/phoenix.js"></script>
<script>
    // Function to load content from chat_thread_list.php
    function loadActualChat() {
        $.ajax({
            url: "actual_chats.php",
            type: "GET",
            success: function(response) {
                // Replace the content of the ul element with the response from chat_thread_list.php
                $('.actual_chats').html(response);
            },
            error: function(xhr, status, error) {
                console.error("Error loading chat threads:", error);
            }
        });
    }
    loadActualChat();
</script>