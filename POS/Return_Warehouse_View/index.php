<?php
// Include necessary files and set timezone
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include "../../page_properties/header_pos.php" ?>

<body>
    <main class="main" id="top">
        <?php include "../../page_properties/navbar_pos.php"; ?>
        <div class="content bg-white">
            <?php include "content.php"; ?>
            <?php include "../../page_properties/footer.php"; ?>
        </div>
    </main>
    <?php include "../../page_properties/theme-customizer.php"; ?>
    <?php include "../../page_properties/footer_main.php"; ?>
    <script>
        // Function to reload spinner for 3 seconds and play audio
        function reloadSpinner() {
            document.getElementById('spinner').style.display = 'flex';
            document.getElementById('content').style.display = 'none';
            setTimeout(function() {
                document.getElementById('spinner').style.display = 'none';
                document.getElementById('content').style.display = 'block';
                audio.pause();
                audio.currentTime = 0;
            }, 3000);
        }
        reloadSpinner();
    </script>
</body>

</html>
