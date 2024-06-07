<?php
include "../../admin/session.php";
include "../../database/database.php";

$oldPassword = hash('sha256', $_POST['oldPassword']);

$query_pw = "SELECT user_password FROM user WHERE id = '$user_id' LIMIT 1";
$result_pw = $conn->query($query_pw);
if($result_pw->num_rows>0){
    $row=$result_pw->fetch_assoc();
    // For demonstration purposes, let's assume $dbPassword is the password retrieved from the database
    $dbPassword = $row['user_password'];

    if ($oldPassword === $dbPassword) {
        echo "matched";
    } else {
        echo "not_matched";
    }
}

?>
