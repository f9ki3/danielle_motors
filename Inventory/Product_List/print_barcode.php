<?php include "../../page_properties/header.php";?>
<div class="text-center p-3 bg-white">
<?php

if(isset($_GET['barcode'])){
    echo '<img src="../../assets/php-barcode-master/barcode.php?codetype=Code39&size=50&text=' . $_GET['barcode']  . '&print=true" class="img img-fluid">';
}
?>
</div>
<?php include "../../page_properties/footer_main.php";?>
<script>
        window.onload = function () {
            // Set the scale to 85%, paper size to A4, and orientation to landscape
            var style = document.createElement('style');
            style.innerHTML = '@page { size: A4 landscape; }';
            document.head.appendChild(style);

            // Trigger Ctrl+P shortcut for printing
            window.print();
        };
    </script>