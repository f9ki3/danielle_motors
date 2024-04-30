<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../assets/libs/email/PHPMailer/PHPMailer.php';
require '../assets/libs/email/PHPMailer/Exception.php';
require '../assets/libs/email/PHPMailer/SMTP.php';
include "../database/database.php";

    $user_sql = "SELECT user_email FROM user";
    $user_result = $conn->query($user_sql);
    while($row = $user_result->fetch_assoc()){
        $email = $row['user_email'];

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pdm.azulchristian@gmail.com'; // Update with your email address
        $mail->Password = 'inzgajfxruvxqwbm'; // Update with your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('gtecnicacorporation@gmail.com', 'G-tecnica'); // Update with your name and email address
        $mail->addAddress($email); // Set the recipient email address
        $mail->Subject = 'G-tecnica Equipment Corporation Password';
        $mail->Body = 'buy your dildo here!';

        if ($mail->send()) {
            // Redirect user with success message
            echo "email_sent to" . $email;
        } else {
            echo "Error sending email: " . $mail->ErrorInfo;
        }
    }
    // $email = "andrada.joemarie.pdm@gmail.com";
    // $email = "floterina@gmail.com";
        // Send email with default password to the user
        // $mail = new PHPMailer;
        // $mail->isSMTP();
        // $mail->Host = 'smtp.gmail.com';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'pdm.azulchristian@gmail.com'; // Update with your email address
        // $mail->Password = 'inzgajfxruvxqwbm'; // Update with your email password
        // $mail->SMTPSecure = 'tls';
        // $mail->Port = 587;
        // $mail->setFrom('gtecnicacorporation@gmail.com', 'G-tecnica'); // Update with your name and email address
        // $mail->addAddress($email); // Set the recipient email address
        // $mail->Subject = 'G-tecnica Equipment Corporation Password';
        // $mail->Body = 'buy your dildo here!';

        // if ($mail->send()) {
        //     // Redirect user with success message
        //     echo "email_sent to" . $email;
        // } else {
        //     echo "Error sending email: " . $mail->ErrorInfo;
        // }
?>