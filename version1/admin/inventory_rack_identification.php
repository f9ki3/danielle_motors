
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>

<!-- start stock-in-->

<div style="width: 100%" class="content p-3">
    <div>
        <?php include 'inventory_menu.php'?>

        <div style="background-color: white; height: 90vh;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <h6>Rack Identification</h6>
                <div class="col-12 col-md-3 p-2">
                    <div class="border p-2 rounded text-center" data-bs-toggle="modal" data-bs-target="#add_rack">+ Add</div>
                </div>

                <?php 
                    for ($i = 0; $i <= 20; $i++) {
                        $letter = chr(65 + $i); // 65 is tde ASCII value for 'A'
                        echo '<div class="col-6 col-md-3 p-2 text-center">
                        <div class="border p-2 rounded">RACK - ' . $letter . '</div>
                        </div>';
                    }
                ?>



                
            </div>
            
        </div>


        <!-- Add Modal -->
        <div class="modal fade mt-5" id="add_rack" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Rack Identification</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input id="rack_id" type="text" class="form-control form-control-sm mb-2" placeholder="Rack ID">
                <textarea id="rack_description" name="" class="form-control form-control-sm mb-2" placeholder="Description" id="" cols="30" rows="5"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add_rack">+ Add</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>




<!-- end stock-in-->

 <!-- Add Rack Modal -->
 <div class="modal fade mt-5" id="add_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control form-control-sm mb-2" placeholder="SR NO.">
                <input type="text" class="form-control form-control-sm mb-2" placeholder="Product Name">
                <textarea name="" class="form-control form-control-sm mb-2" placeholder="Description" id="" cols="30" rows="5"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">+ Add</button>
            </div>
            </div>
        </div>
        </div>


</div>
<?php include 'footer.php'?>
</body>
</html>