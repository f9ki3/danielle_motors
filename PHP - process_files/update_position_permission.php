<?php
include "../database/database.php";
// Check if permission array is set in the POST data
if(isset($_POST['permission'])) {
    // Get the permission IDs from the POST data
    $permissions = $_POST['permission'];

    // Check if only one permission is selected
    if(count($permissions) == 1) {
        // Only one permission is selected, update the permission_name accordingly
        $permission_name = $permissions[0];
    } else {
        // More than one permission is selected, concatenate the permission names
        $permission_name = implode(', ', $permissions);
    }

    // Update the permission_name in the groups table
    $permission_id = $_POST['permission_id'];
    $sql = "UPDATE `groups` SET permission_name = '$permission_name' WHERE id = $permission_id";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        header("Location: ../Inventory/User_Position_Maintenance/?update_success=true");
    } else {
        header("Location: ../Inventory/User_Position_Maintenance/?update_success=false");
    }
} else {
    echo "No permission selected";
}
?>