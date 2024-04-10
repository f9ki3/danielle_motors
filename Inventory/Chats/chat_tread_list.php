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
            $isActive = ($_SESSION['selected_message'] == $from_user_id) ? 'active' : '';
            $ariaSelected = ($_SESSION['selected_message'] == $from_user_id) ? 'true' : 'false';
        }
?>
<li class="nav-item <?php echo $chat_status;?>" role="presentation">
    <a id="message_id_<?php echo $from_user_id;?>" class="nav-link d-flex align-items-center justify-content-center p-2 <?php echo $isActive; ?> <?php echo $chat_status;?>" data-bs-toggle="tab" data-chat-thread="data-chat-thread" href="#tab-thread-<?php echo $from_user_id;?>"
        role="tab" aria-selected="<?php echo $ariaSelected; ?>">
        
        <div class="avatar avatar-xl status-online position-relative me-2 me-sm-0 me-xl-2"><img class="rounded-circle border border-2 border-white" src="../../uploads/<?php echo basename($user_pfp); ?>" alt="" /></div>
        <div class="flex-1 d-sm-none d-xl-block">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-900 fw-normal name text-nowrap"><?php echo $from_user_fullname; ?></h5>
                <p class="fs--2 text-600 mb-0 text-nowrap"><?php echo $date_Sent; ?></p>
            </div>
            <div class="d-flex justify-content-between">
                <p class="fs--1 mb-0 line-clamp-1 text-600 message"><?php echo $last_message_content; ?></p>
            </div>
        </div>
    </a>
</li>
<?php 
    }
} else {
?>
<p class="text-center">No message yet.</p>
<?php
}

?>


<script>
$(document).ready(function() {
    <?php 
    $message_lizt_sql = "SELECT from_user_id FROM chat_messages WHERE to_user_id = '$user_id'";
    $message_lizt_res = $conn->query($message_lizt_sql);
    if($message_lizt_res->num_rows>0){  
    while($ml_row = $message_lizt_res->fetch_assoc()){
        $ml_fromuser_id = $ml_row['from_user_id'];
    ?>
    // Add click event listener to the tag with the specified ID
    $('#message_id_<?php echo $ml_fromuser_id;?>').on('click', function() {
        loadChatBodyThreads();
        // Get the user ID from the ID attribute
        var userId = <?php echo $ml_fromuser_id; ?>;
        
        // Asynchronously load set_session.php with the user ID as a query parameter
        $.ajax({
            url: 'set_session.php?set=' + userId,
            type: 'GET',
            success: function(response) {
                // Log the response from the server
                console.log('Server response:', response);
            },
            error: function(xhr, status, error) {
                // Handle error if needed
                console.error('Error setting session:', error);
            }
        });
    });
    <?php 
    }
    }
    ?>
});
</script>

<?php 
$conn->close();
?>
