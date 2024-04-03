<?php
$password = "azul";
$hashed_password = hash('sha256', $password);
echo $hashed_password;
?>
