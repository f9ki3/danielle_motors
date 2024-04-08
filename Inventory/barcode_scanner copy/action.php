<?php 
if(isset($_POST['product_id'])){
    echo $_POST['product_id'];
} else {
    echo $_POST['product_name'];
}
