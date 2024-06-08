<?php
include "../admin/session.php";
include "../database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_pw = hash('sha256', $_POST['new_pw']);

    // Prepare the update query
    $update_userInfo = "UPDATE user SET user_password= '$new_pw' WHERE id = '$user_id'";
    
    // Execute the update query
    if($conn->query($update_userInfo) === TRUE){
        $log_description = "Updated his/her password.";
        $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$id', audit_description = '$log_description', user_brn_code = '$branch_code', audit_date = '$currentTimestamp'";
        
        // Execute the insert query
        if($conn->query($insert_into_logs) === TRUE){
            header("Location: ../Profile-Settings/Profile/?m4b4j0=successful");
            $conn->close();
            exit;
        } else {
            // Handle insert query error
            echo "Error inserting into logs table: " . $conn->error;
        }
    } else {
        // Handle update query error
        echo "Error updating user info: " . $conn->error;
    }
}
?>
