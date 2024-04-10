<?php 
session_start();
if(isset($_GET['set'])){
    $_SESSION['selected_message'] = $_GET['set'];
} else {
    echo $_SESSION['selected_message'];
}