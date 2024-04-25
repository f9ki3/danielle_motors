<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include "../../page_properties/homepage_header.php" ?>

<body>
    <!-- Main Content -->
    <main class="main" id="top">
        <!-- Navigation -->
        <?php
        include "../../page_properties/homepage_main_nav.php";
        include "../../page_properties/homepage_sub_nav.php";
        ?>
        <!-- /Navigation -->

        <div class="ecommerce-homepage pt-5 mb-9">
            <?php include "content.php"; ?>
            <!-- Uncomment the following section if needed -->
            <!--
            <div class="d-flex flex-center content-min-h">
                <div class="text-center py-9">
                    <img class="img-fluid mb-7 d-dark-none" src="../../assets/img/spot-illustrations/2.png" width="470" alt="" />
                    <img class="img-fluid mb-7 d-light-none" src="../../assets/img/spot-illustrations/dark_2.png" width="470" alt="" />
                    <h1 class="text-800 fw-normal mb-5"><?php //echo $current_folder;?></h1>
                    <a class="btn btn-lg btn-primary" href="../../documentation/getting-started.html">Getting Started</a>
                </div>
            </div>
            -->
        </div>

        <!-- Chat container -->
        <?php include "../../page_properties/chat-container.php"; ?>
        <!-- /Chat container -->

        <!-- Footer -->
        <?php include "../../page_properties/homepage_subfooter.php"; ?>
        <?php include "../../page_properties/homepage_mainfooter.php"; ?>
    </main>
    <!-- End of Main Content -->

    <?php include "../../page_properties/homepage_footer_main.php"; ?>
</body>

</html>
