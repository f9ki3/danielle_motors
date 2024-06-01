<?php
include "../admin/session.php";
include_once "../database/database.php";

// Retrieve form data
$branchname = $_POST['brn_name'];
$status = $_POST['status'];
$address = $_POST['address_line1'];
$brgy = $_POST['brgy'];
$municipality = $_POST['municipality'];
$town = $_POST['province'];
$telnum = $_POST['contact'];
$email = $_POST['email'];

// Check if the email already exists
$stmt = $conn->prepare("SELECT COUNT(*) FROM branch WHERE brn_email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($emailCount);
$stmt->fetch();
$stmt->close();

if ($emailCount > 0) {
    // Email already exists, redirect to maintenance page
    header("Location: ../Add_branch/?error=email_already_exist");
    exit(); // Stop further execution
}

// Generate branch code
$baseBranchCode = substr(strtoupper($_POST['brn_name']), 0, 4); // First 4 letters of branchname
$branchcode = $baseBranchCode . '-' . "000"; // Initial branch code

// Check if the branch code already exists
$stmt = $conn->prepare("SELECT COUNT(*) FROM branch WHERE brn_code = ?");
$stmt->bind_param("s", $branchcode);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();

$stmt->close();

if ($count > 0) {
    // Branch code already exists, find the next available branch code
    $stmt = $conn->prepare("SELECT MAX(SUBSTRING_INDEX(brn_code,'-', -1)) FROM branch WHERE brn_code LIKE ?");
    $likeParam = $baseBranchCode . "-%";
    $stmt->bind_param("s", $likeParam);
    $stmt->execute();
    $stmt->bind_result($maxCode);
    $stmt->fetch();
    $stmt->close();

    // Increment the branch code number and format it
    $nextCodeNumber = intval($maxCode) + 1;
    $branchcode = $baseBranchCode . "-" . sprintf('%03d', $nextCodeNumber);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO branch (brn_code, brn_name, brn_status, brn_address, brn_brgy, brn_municipality, brn_province, brn_telnum,  brn_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Check if the prepare was successful
if ($stmt) {
    $stmt->bind_param("sssssssss", $branchcode, $branchname, $status, $address, $brgy, $municipality, $town, $telnum, $email);

    // Execute the statement
    if ($stmt->execute()) {
        $log_description = "Added branch: " . $branchname . ".";
        $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$id', audit_description = '$log_description', user_brn_code = '$branch_code'";
        $conn->query($log_description);
        // Data inserted successfully
        header("location: ../Inventory/Branch_Maintenance/");
    } else {
        // Error occurred
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Error in preparing the statement
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
