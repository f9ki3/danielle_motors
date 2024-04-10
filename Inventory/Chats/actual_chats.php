<?php
include "../../admin/session.php";
include "../../database/database.php";
$from_user_id = $_SESSION['selected_message'];

$sql = "SELECT cm.*, u.user_fname, u.user_lname, u.user_img
        FROM chat_messages cm
        INNER JOIN user u ON cm.from_user_id = u.id
        WHERE (cm.from_user_id = '$from_user_id' AND cm.to_user_id = '$user_id')
        OR (cm.from_user_id = '$user_id' AND cm.to_user_id = '$from_user_id')
        ORDER BY cm.id ASC";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $user_profile_photo = $row['user_img'];
        $to_user_id = $row['to_user_id'];
        $from_id = $row['from_user_id'];
        $message = $row['message'];
        if($from_id === $from_user_id){
?>
<!-- Chat messages -->
<div class="d-flex chat-message">
    <!-- Received message -->
    <div class="d-flex mb-2 flex-1">
        <div class="w-100 w-xxl-75">
            <div class="d-flex hover-actions-trigger">
                <div class="avatar avatar-m me-3 flex-shrink-0">
                    <img class="rounded-circle" src="../../uploads/<?php echo basename($user_profile_photo); ?>" alt="" />
                </div>
                <div class="chat-message-content received me-2">
                    <div class="mb-1 received-message-content border rounded-2 p-3">
                        <p class="mb-0"><?php echo $message;?></p>
                    </div>
                </div>
                <!-- Hover actions -->
                <div class="d-none d-sm-flex">
                    <div class="hover-actions position-relative align-self-center me-2">
                        <button class="btn p-2 fs--2"><span class="fa-solid fa-reply"></span></button>
                        <button class="btn p-2 fs--2"><span class="fa-solid fa-trash"></span></button>
                        <button class="btn p-2 fs--2"><span class="fa-solid fa-share"></span></button>
                        <button class="btn p-2 fs--2"><span class="fa-solid fa-face-smile"></span></button>
                    </div>
                </div>
                <!-- Hover actions for small devices -->
                <div class="d-sm-none hover-actions align-self-center me-2 end-0">
                    <div class="bg-white rounded-pill d-flex align-items-center border border-300 px-2 actions">
                        <button class="btn p-2" type="button"><span class="fa-solid fa-reply text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-trash text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-share text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-face-smile text-primary"></span></button>
                    </div>
                </div>
            </div>
            <p class="mb-0 fs--2 text-600 fw-semi-bold ms-7">Yesterday, 10 AM</p>
        </div>
    </div>
</div>
<?php 
        } else {
?>
<!-- Sent message -->
<div class="d-flex chat-message">
    <div class="d-flex mb-2 justify-content-end flex-1">
        <div class="w-100 w-xxl-75">
            <div class="d-flex flex-end-center hover-actions-trigger">
                <!-- Hover actions for small devices -->
                <div class="d-sm-none hover-actions align-self-center me-2 start-0">
                    <div class="bg-white rounded-pill d-flex align-items-center border border-300 px-2 actions">
                        <button class="btn p-2" type="button"><span class="fa-solid fa-reply text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-pen-to-square text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-trash text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-share text-primary"></span></button>
                        <button class="btn p-2" type="button"><span class="fa-solid fa-face-smile text-primary"></span></button>
                    </div>
                </div>
                <div class="d-none d-sm-flex">
                    <div class="hover-actions position-relative align-self-center">
                        <button class="btn p-2 fs--2"><span class="fa-solid fa-reply text-primary"></span></button>
                        <button class="btn p-2 fs--2"><span class="fa-solid fa-pen-to-square text-primary"></span></button>
                        <button class="btn p-2 fs--2"><span class="fa-solid fa-share text-primary"></span></button>
                        <button class="btn p-2 fs--2"><span class="fa-solid fa-trash text-primary"></span></button>
                        <button class="btn p-2 fs--2"><span class="fa-solid fa-face-smile text-primary"></span></button>
                    </div>
                </div>
                <div class="chat-message-content me-2">
                    <div class="mb-1 sent-message-content light bg-primary rounded-2 p-3 text-white">
                        <p class="mb-0"><?php echo $message;?></p>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <p class="mb-0 fs--2 text-600 fw-semi-bold">Yesterday, 10 AM</p>
            </div>
        </div>
    </div>
</div>
<?php 
        }
    }
}
?>
