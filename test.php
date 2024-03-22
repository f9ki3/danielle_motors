<?php

$variable = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ12345678901234567890";
$randomized = str_shuffle($variable);
$randomized = substr($randomized, 0, 16);

echo $randomized;

?>
