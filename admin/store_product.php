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
                            <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#add_stocks">+ Add Stocks</button>
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
            <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                            <td scope="col" width="10%">Product id</td>
                            <td scope="col" width="10%" >Date</td>
                            <td scope="col" width="15%">Product Name</td>
                            <td scope="col" width="15%">Stocks</td>
                            <td scope="col" width="15%">Current Price</td>
                            <td scope="col" width="15%">Selling Price</td>
                            <td scope="col" width="10%">Markup</td>
                            <td class="text-end" scope="col" width="20%">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td scope="row" class="product_id">PROD001</td>
                                <td class="product_img">03/11/24</td>
                                <td>Fyke Loterena</td>
                                <td>100pcs</td>
                                <td>php 100</td>
                                <td>Joemarie Andrade</td>
                                <td>php 200</td>
                                <td class="text-end">
                                    <button class="btn btn-sm border"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                    </svg> </button>

                                    <button class="btn btn-sm border"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg> </button>
                                </td>
                            
                        </tr>
                          
                        </tbody>
                        <!-- summary of materials -->
                        
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
                <option><?php echo $product['id']; echo "-"?><?php echo $product['product_name']; ?><?php echo " - "?><?php echo $product['models']; ?></option>
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