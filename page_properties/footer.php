<?php 
$current_url = $_SERVER['REQUEST_URI'];

if($current_url === "/danielle_motors/Inventory/Chats/" || $current_url === "/Inventory/Chats/"){
    $d_none = "d-none";
} else {
    $d_none = "";
}
?>
<footer class="print_hide footer position-absolute <?php echo $d_none;?>">
    <div class="row g-0 justify-content-between align-items-center h-100">
        <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 mt-2 mt-sm-0 text-900">PDM Interns <span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2023 &copy;<a class="mx-1" href="https://www.instagram.com/p/C1oCOyePsPL/?img_index=1">Click here</a></p>
        </div>
        <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 text-600">v1.13.0</p>
        </div>
    </div>
</footer>
