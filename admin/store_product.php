<?php include '../config/config.php'?>
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?PHP Include '../php/product_dropdown.php'?>

<!-- start inventory-->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Purchase</h5>
            <a href="purchase" class="btn btn-sm  border rounded mb-2">Purchase Walk-in</a>
            <a href="purchase_delivery" class="btn btn-sm border rounded mb-2">Purchase Delivery</a>
            <a href="purchase_online" class="btn btn-sm border rounded mb-2">Purchase Online</a>
            <a href="purchase_terms" class="btn btn-sm border rounded mb-2">Purchase with Terms</a>
            <a href="store_stocks" class="btn btn-sm border btn-primary rounded mb-2">Store Stocks</a>
            
        </div>

        <div style="background-color: white; height: auto;" class="rounded border p-3 mb-3 w-100">
             <div class="border rounded mt-2 p-3" >
                    <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <div>
                            <h4>Material Invoice: DMP0001</h4>
                            <h4>Date: 03/11/24</h4>
                        </div>
                        <div>
                            <!-- <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#add_stocks">+ Add Stocks</button> -->
                            <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#print">Print</button>
                        </div>
                    </div>

                    <div class="m-0" style="display: flex; flex-direction: row; justify-content: space-between">
                        <p>Cashier: Fyke Loterena</p>
                        <p>Recieved by: Louis Rivera</p>
                        <p>Verified by: Alexander Inciong</p>
                        <p>Inspected by: Andrada</p>
                    </div>
                    <div>
                        <input type="text" class="form-control mb-2 form-control-sm w-25" placeholder="Search">
                    </div>
             </div>
             

             <div style="overflow-y: auto; height: 450px">
        <table id="deliverydataMaterial" class="table mt-1 stripe hover order-column row-border">
            <thead>
                <tr>
                    <th scope="col" width="10%">Product id</th>
                    <th scope="col" width="10%">Date</th>
                    <th scope="col" width="15%">Product Name</th>
                    <th scope="col" width="15%">Stocks</th>
                    <th scope="col" width="15%">Current Price</th>
                    <th scope="col" width="15%">Selling Price</th>
                    <th scope="col" width="10%">Markup</th>
                    <th class="text-end" scope="col" width="20%">Action</th>
                </tr>
            </thead>
           <tbody id="MaterialTableBody"class="table table-bordered stripe hover order-column row-border" >
            </tbody>
        </table>
    </div>
            <div class="border rounded mt-2 p-3" >
                    <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <div>
                            <h4>Net : PHP 100.00</h4>
                            <h4>Gross: PHP 100.00</h4>

                        </div>
                        <div style="width: 30%">
                            <button type="button" class="btn w-100 btn-primary mb-2">Save</button>
                            <button type="button" class="btn w-100 btn-outline-primary mb-2">Cancel</button>
                        </div>
                    </div>

                    
                    
             </div>
            
        </div>




<!-- end purchase-->

<!-- Modal -->
<div class="modal fade" id="add_stocks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Stocks</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body " style="display: flex; flex-direction: column; align-items: center; justify-content: center">

        <datalist id="suggestions">
            <?php foreach ($products as $product): ?>
                <option><?php echo $product['id']; echo "-"?><?php echo $product['name']; ?><?php echo " - "?><?php echo $product['models']; ?></option>
            <?php endforeach; ?>
        </datalist>

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">Select Product </span>
            <input type="text" id="select_product" class="form-control" list="suggestions" placeholder="Search Here">
        </div>

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">Net Price</span>
            <input type="text" class="form-control" id="price" value="100">
        </div>

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">Net Price</span>
            <input type="text" class="form-control" >
        </div>

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">QTY</span>
            <input type="text" class="form-control" >
        </div>
            
        
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
        </div>
    </div>
  </div>
</div>
<!-- End Modal -->


</div>
<?php include 'footer.php'?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#deliverydataMaterial').DataTable({
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
            'url': '../php/delivery_stock_fetch.php',
            'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [] // Adjust the index to match the actual number of columns
        }]
    });
});
</script>
