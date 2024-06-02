<?php 
include "../database/database.php";
include "../admin/session.php";

if(isset($_GET['user_id'])){
    $his_user_id = $_GET['user_id'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if user_position is set and not empty
        if(isset($_POST['user_position']) && !empty($_POST['user_position'])) {
            $user_position = $_POST['user_position'];
            
            // Prepare and execute the update query
            $update_position = "UPDATE user SET user_position = '$user_position' WHERE id = '$his_user_id'";
            if($conn->query($update_position) === TRUE ){
                $log_description = "Updated User Position to " . $user_position . ".";
                $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$user_id', audit_description = '$log_description', user_brn_code = '$branch_code', audit_date = '$currentTimestamp'";
                $conn->query($insert_into_logs);
                header("Location: ../Inventory/User_Maintenance/");
                $conn->close();
                exit;
            } else {
                // If there's an error in the query execution, handle it
                echo "Error: " . $update_position . "<br>" . $conn->error;
            }
        } else {
            // If user_position is not set or empty, handle the error
            echo "Error: User position is not set or empty.";
        }
    } else {
        // If request method is not POST, handle the error
        echo "Error: Invalid request method.";
    }
} else {
    // If user_id is not set, handle the error
    echo "Error: User ID is not set.";
}
?>
