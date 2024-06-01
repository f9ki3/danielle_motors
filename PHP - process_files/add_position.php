<?php
include "../admin/session.php";
include "../database/database.php";
date_default_timezone_set('Asia/Manila');
$currentDate = date('Y-m-d H:i:s');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Escape user inputs for security
    $position_name = mysqli_real_escape_string($conn, $_POST['position_name']);
    
    // Check if the position_name already exists
    $check_query = "SELECT COUNT(*) as count FROM `groups` WHERE position_name = '$position_name'";
    $check_result = mysqli_query($conn, $check_query);
    $row = mysqli_fetch_assoc($check_result);
    $existing_count = $row['count'];
    if ($existing_count > 0) {
        header("Location: ../Inventory/User_Position_Maintenance/?duplicate_entry=true");
        // Close connection
        mysqli_close($conn);
        exit(); // Stop further execution
    }
    
    // Check if checkboxes are checked and prepare permission string
    $permissions = "";
    if(isset($_POST['permission']) && is_array($_POST['permission']) && count($_POST['permission']) > 0) {
        $permissions = implode(", ", $_POST['permission']);
    }

    // Insert query
    $sql = "INSERT INTO `groups` (position_name, permission_name, `status`, date_added) VALUES ('$position_name', '$permissions', 1, '$currentDate')";

    if(mysqli_query($conn, $sql)){
        $log_description = "Created position: " . $position_name . ".";
        $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$id', audit_description = '$log_description', user_brn_code = '$branch_code'";
        $conn->query($log_description);
        header("Location: ../Inventory/User_Position_Maintenance/?duplicate_entry=false");
        // Close connection
        mysqli_close($conn);
        exit(); // Stop further execution
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        // Close connection
        mysqli_close($conn);
        exit(); // Stop further execution
    }

    // Close connection
    mysqli_close($conn);
    exit(); // Stop further execution
}
?>
