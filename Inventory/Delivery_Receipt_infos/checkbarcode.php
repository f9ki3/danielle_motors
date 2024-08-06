<?php
// Include necessary files
require_once '../../admin/session.php'; // Ensures user is logged in
include "../../database/database.php"; // Includes database connection

if(isset($_POST['barcode'])){
    $barcode = $_POST['barcode'];
    $check_if_barcode_exist = "SELECT id FROM product WHERE barcode = '$barcode' LIMIT 1";
    $result_of_barcode = $conn->query($check_if_barcode_exist);
    if($result_of_barcode->num_rows>0){
        header("Location: ../process_barcode/?produtexist=$barcode");
        $conn->close();
        exit;
    } else {
        header("Location: ../process_barcode2/?produtexist=$barcode");
        $conn->close();
        exit;
    }
}