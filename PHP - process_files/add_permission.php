<?php
include "../admin/session.php";
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include '../database/database.php';

    // Escape user inputs for security
    $permission_name = mysqli_real_escape_string($conn, $_POST['permission_name']);
    $permission_group = mysqli_real_escape_string($conn, $_POST['permission_group']);
    // Convert to uppercase
    $permission_name_uppercase = strtoupper($permission_name);
    $permission_group_uppercase = strtoupper($permission_group);

    // Check if permission_name already exists
    $check_sql = "SELECT * FROM permission WHERE permission_name = '$permission_name_uppercase'";
    $check_result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        header("Location: ../Inventory/User_Permission_Maintenance/?duplicate_entry=true");
        // Close connection
        mysqli_close($conn);
        exit(); // Exit the script
    }

    // Get current timestamp in the Philippines timezone
    $timezone = new DateTimeZone('Asia/Manila');
    $date_added = new DateTime('now', $timezone);
    $date_added = $date_added->format('Y-m-d H:i:s');

    // Attempt insert query execution
    $sql = "INSERT INTO permission (permission_name, date_added, user_id, permission_group) VALUES ('$permission_name_uppercase', '$date_added', '$id', '$permission_group_uppercase')";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../Inventory/User_Permission_Maintenance/?duplicate_entry=false");
        // Close connection
        mysqli_close($conn);
        exit(); // Exit the script
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
