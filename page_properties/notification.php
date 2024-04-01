<?php 
include "../database/database.php";

$notification_sql = "SELECT notification.*, user.user_fname, user.user_lname, user.user_img AS profile_photo 
                     FROM notification 
                     LEFT JOIN user ON notification.sessionID = user.id";
$notification_res = $conn->query($notification_sql);

// Array to store grouped notifications
$grouped_notifications = array();

if ($notification_res->num_rows < 0) {
    echo '<div class="text-center p-9">
        <h1><span class="far fa-angry"></span> Empty</h1>
    </div>';
} else {
    while ($row = $notification_res->fetch_assoc()) {
        $id_of_ewan = $row['type_id'];
        $document_type = $row['type'];
        $sender = $row['sender'];
        $message = $row['message'];
        if ($row['status'] == 0) { 
            $status = "unread"; 
        } else { 
            $status = "read"; 
        };
        $date = $row['date'];
        $sender_name = $row['user_fname'] . " " . $row['user_lname'];
        $profile_photo = basename($row['profile_photo']);

        // Generating a unique key for grouping
        $group_key = $document_type . "_" . $status;

        // Check if the group key exists in the grouped notifications array
        if (array_key_exists($group_key, $grouped_notifications)) {
            // If exists, increment the count
            $grouped_notifications[$group_key]['count']++;
        } else {
            // If not exists, create a new group
            $grouped_notifications[$group_key] = array(
                'document_type' => $document_type,
                'status' => $status,
                'count' => 1,
                'sender_name' => $sender_name,
                'message' => $message,
                'date' => $date,
                'profile_photo' => $profile_photo
            );
        }
    }

    // Display grouped notifications
    foreach ($grouped_notifications as $group) {
        // Define the href based on the count of notifications
        if ($group['count'] > 1) {
            $href = "../" . $group['document_type'] . ".php";
        } else {
            $href = "../" . $group['document_type'] . "/?id=" . $id_of_ewan;
        }

        echo '<div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative ' . $group['status'] . ' border-bottom">';
        echo '<a style="text-decoration: none;" href="' . $href . '"/>';
        echo '<div class="d-flex align-items-center justify-content-between position-relative">';
        echo '<div class="d-flex">';
        echo '<div class="avatar avatar-m status-online me-3">';
        echo '<img class="rounded-circle" src="../../uploads/' . $group['profile_photo'] . '" alt="" />';
        echo '</div>';
        echo '<div class="flex-1 me-sm-3">';
        echo '<h4 class="fs--1 text-black">' . $group['sender_name'] . ' (' . $group['count'] . ')</h4>';
        echo '<p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal">';
        echo '<span class="me-1 fs--2">💬</span>' . $group['message'] . ' ';
        echo '<span class="ms-2 text-400 fw-bold fs--2">' . $group['count'] . '</span>';
        echo '</p>';
        echo '<p class="text-800 fs--1 mb-0">';
        echo '<span class="me-1 fas fa-clock"></span>';
        echo '<span class="fw-bold">' . $group['date'] . '</span>';
        echo '</p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="font-sans-serif d-none d-sm-block">';
        echo '<button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">';
        echo '<span class="fas fa-ellipsis-h fs--2 text-900"></span>';
        echo '</button>';
        echo '<div class="dropdown-menu dropdown-menu-end py-2">';
        echo '<a class="dropdown-item" href="#!">Mark as unread</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>
