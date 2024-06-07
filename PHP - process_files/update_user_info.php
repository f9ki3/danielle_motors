<?php
include "../admin/session.php";
include "../database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_fname = $_POST['fname'];
    $new_lname = $_POST['lname'];

    // Prepare the update query
    $update_userInfo = "UPDATE user SET user_fname = '$new_fname', user_lname = '$new_lname' WHERE id = '$user_id'";
    
    // Execute the update query
    if($conn->query($update_userInfo) === TRUE){
        $log_description = "Updated his/her name from " . $fname . " " . $lname . " to " . $new_fname . " " . $new_lname . ".";
        $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$id', audit_description = '$log_description', user_brn_code = '$branch_code', audit_date = '$currentTimestamp'";
        
        // Execute the insert query
        if($conn->query($insert_into_logs) === TRUE){
            $_SESSION['user_fname'] = $new_fname;
            $_SESSION['user_lname'] = $new_lname;
            header("Location: ../Profile-Settings/Profile/?update=successful");
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
