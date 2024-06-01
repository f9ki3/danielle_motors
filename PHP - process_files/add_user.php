<?php
include "../admin/session.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../database/database.php';
require '../assets/libs/email/PHPMailer/PHPMailer.php';
require '../assets/libs/email/PHPMailer/Exception.php';
require '../assets/libs/email/PHPMailer/SMTP.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the POST request
    $fname = $_POST['user_fname'];
    $mname = $_POST['user_mname'];
    $lname = $_POST['user_lname'];   
    $province = $_POST['user_province'];
    $municipality = $_POST['user_municipality'];
    $brgy = $_POST['user_brgy'];
    $address1 = $_POST['user_address1'];
    $brn_code = $_POST['brn_code'];
    $position = $_POST['user_position'];
    $email = $_POST['user_email'];
    $contact = $_POST['user_contact'];
    $account_type = $_POST['account_type'];
    $user_name = $_POST['user_name'];

    // Sanitize input data to prevent SQL injection
    $fname = mysqli_real_escape_string($conn, $fname);
    $mname = mysqli_real_escape_string($conn, $mname);
    $lname = mysqli_real_escape_string($conn, $lname);
    $province = mysqli_real_escape_string($conn, $province);
    $municipality = mysqli_real_escape_string($conn, $municipality);
    $brgy = mysqli_real_escape_string($conn, $brgy);
    $address1 = mysqli_real_escape_string($conn, $address1);
    $brn_code = mysqli_real_escape_string($conn, $brn_code);
    $position = mysqli_real_escape_string($conn, $position);
    $email = mysqli_real_escape_string($conn, $email);
    $contact = mysqli_real_escape_string($conn, $contact);
    $account_type = mysqli_real_escape_string($conn, $account_type);
    $user_name = mysqli_real_escape_string($conn, $user_name);
    $user_status = 0;

    // Check if the email already exists in the database
    $sql = "SELECT COUNT(*) FROM user WHERE user_email = '$email' OR username = '$user_name'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_row();
        $emailCount = $row[0];

        if ($emailCount > 0) {
            // Redirect back with an error message if email already exists
            header("Location: ../Inventory/AddUsers/?duplicate_email=true");
            exit();
        } 
        $result->close();
    } else {
        echo "Error executing query: " . $conn->error;
    }

    // Destination path for the default image
    $destination = 'avatar-placeholder.webp';
    // Generate a random 6-digit code
    $random_code = rand(100000, 999999);
    // Generate default password
    $password = $random_code;
    $hashedPassword = hash('sha256', $password);

    // Prepare and execute the INSERT query to add user to the database
    $stmt = $conn->prepare("INSERT INTO user (user_fname, user_mname, user_lname, user_province, user_municipality, user_brgy, user_address, user_brn_code, user_email, user_contact, user_password, user_img, user_status, user_position, user_account_type, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssss", $fname, $mname, $lname, $province, $municipality, $brgy, $address1, $brn_code, $email, $contact, $hashedPassword, $destination, $user_status, $position, $account_type, $user_name);

    if ($stmt->execute()) {
        // Send email with default password to the user
        $mail = new PHPMailer;
        $mail->isSMTP();
        // $mail->Host = 'smtp.gmail.com';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'pdm.azulchristian@gmail.com'; // Update with your email address
        // $mail->Password = 'inzgajfxruvxqwbm'; // Update with your email password
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no_reply@dmp-motors.com'; // Update with your email address
        $mail->Password = '4koSiDMP123*';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('no_reply@dmp-motors.com', 'Danielle Motors'); // Update with your name and email address
        $mail->addAddress($email); // Set the recipient email address
        $mail->Subject = 'DMP';
        $mail->Body = 'Your default password is: ' . $password . '.';

        if ($mail->send()) {
            $log_description = "Created tje account for " . $fname . " " . $lname . ".";
            $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$id', audit_description = '$log_description'";
            $conn->query($log_description);

            // Redirect user with success message
            header("Location: ../Inventory/User_Maintenance/?error=false");
            $conn->close();
            exit();
        } else {
            echo "Error sending email: " . $mail->ErrorInfo;
        }
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>