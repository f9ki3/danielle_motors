<?php
include "../../admin/session.php";
include "../../database/database.php";

// Fetch the content
ob_start();
include "content.php";
$content = ob_get_clean();

// Return the content
echo $content;
?>
