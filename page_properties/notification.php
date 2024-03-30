<?php 
include "../database/database.php";
$notification_sql = "SELECT notification.*, admin.user_fname, admin.user_lname, admin.img AS profile_photo 
                     FROM notification 
                     LEFT JOIN user ON notification.sessionID = admin.id";
$notification_res = $conn->query($notification_sql);
if($notification_res->num_rows<0){
    echo '<div class="text-center p-9">
        <h1><span class="far fa-angry"></span> Empty</h1>
    </div>';
} else {
    while($row=$notification_res->fetch_assoc()){
        $id_of_ewan = $row['type_id'];
        $document_type = $row['type'];
        $sender = $row['sender'];
        $message = $row['message'];
        $status = $row['status'];
        $date = $row['date'];
        $sender_name = $row['user_fname'] . " " . $row['user_lname'];
        $profile_photo = $row['profile_photo'];

        
?>

<div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
    <a style="text-decoration: none;" href="#"/>
    <div class="d-flex align-items-center justify-content-between position-relative">
        <div class="d-flex">
            <div class="avatar avatar-m status-online me-3">
                <img class="rounded-circle" src="../../uploads/<?php echo $profile_photo; ?>" alt="" />
            </div>
            <div class="flex-1 me-sm-3">
                <h4 class="fs--1 text-black"><?php echo $sender_name ; ?></h4>
                <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal">
                    <span class='me-1 fs--2'>💬</span><?php echo $message; ?>
                    <span class="ms-2 text-400 fw-bold fs--2">10m</span>
                </p>
                <p class="text-800 fs--1 mb-0">
                    <span class="me-1 fas fa-clock"></span>
                    <span class="fw-bold"><?php echo $date; ?></span>
                </p>
            </div>
        </div>
        <div class="font-sans-serif d-none d-sm-block">
            <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                <span class="fas fa-ellipsis-h fs--2 text-900"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end py-2">
                <a class="dropdown-item" href="#!">Mark as unread</a>
            </div>
        </div>
    </div>
</div>
<?php
    }
}