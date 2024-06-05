<?php
session_start();
require "../database/database.php";
date_default_timezone_set('Asia/Manila');

// Check if file is uploaded
if ($_FILES['logo']['error'] !== UPLOAD_ERR_OK) {
    $conn->close();
    die("Upload failed with error code " . $_FILES['logo']['error']);
    exit();
}



// Get file extension
$extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);

// Directory where to save the uploaded file
$uploadDirectory = '../uploads/';

// Generate new filename
$filename = generateFilename($uploadDirectory, 'dmplogo', $extension);

// Move uploaded file to directory with new filename
if (!move_uploaded_file($_FILES['logo']['tmp_name'], $uploadDirectory . $filename)) {
    die("Error moving uploaded file");
}

// Prepare data for database insertion
$logo_name = $filename;
$published_date = date("Y-m-d H:i:s", strtotime("now")); // Current date and time
$published_by = "Admin Test"; // Assuming $admin is defined elsewhere
$status = isset($_POST['setaslogo']) ? "active" : "disabled"; // Check if checkbox is checked

// Update existing logos to 'disabled' if the checkbox is checked
if (isset($_POST['setaslogo'])) {
    $update_sql = "UPDATE logo SET status = 'disabled'";
    if ($conn->query($update_sql) !== TRUE) {
        die("Error updating existing logos: " . $conn->error);
    }
}

// SQL query to insert data into database
$sql = "INSERT INTO logo (logo_name, publish_by, status) VALUES ('$logo_name', '$published_by', '$status')";

if ($conn->query($sql) === TRUE) {
    $log_description = "Changed the logo.";
    $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$user_id', audit_description = '$log_description', user_brn_code = '$branch_code', audit_date = '$currentTimestamp'";
    $conn->query($insert_into_logs);
    $conn->close();
    header("Location: ../Inventory/Logo_Maintenance/?successfullyuploaded=true");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Function to generate unique filename
function generateFilename($directory, $prefix, $extension) {
    $counter = 0;
    $filename = '';

    // Find available filename by incrementing counter
    do {
        $counter++;
        $filename = $prefix . sprintf('%04d', $counter) . '.' . $extension;
    } while (file_exists($directory . $filename));

    return $filename;
}
?>
