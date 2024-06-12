<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include "../../page_properties/header_pos.php" ?>
  <body>
    <main class="main" id="top">
      <?php include "../../page_properties/navbar_pos.php";?>
      <div class="content bg-white">
        <?php 
        include "content.php";
        ?>
        <?php include "../../page_properties/footer.php"; ?>
      </div>
    </main>

    <?php include "../../page_properties/theme-customizer.php"; ?>

    <?php include "../../page_properties/footer_main.php"; ?>
  </body>

</html>