<?php 
include "../../admin/session.php";
include "../../database/database.php";

if(!isset($_SESSION['product_id'])){
    $_SESSION['product_id'] = 0;
} else {
    $get_last_pid = "SELECT produ"
}
