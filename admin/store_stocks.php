
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>

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

        <div style="background-color: white; height: 90vh;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <h6>Store Stocks</h6>
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input  class="form-control form-control-sm" placeholder="Search">
                    </div>

                    <div>
                        <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#add_stocks">+ Material Transfer</button>
                        <a heref="store_stocks" class="btn btn-primary border btn-sm rounded" >Stocks</a>
                        <a heref="purchase" class="btn border btn-sm rounded" >Product</a>
                    </div>
                </div>
            </div>

            <div>
            <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                            <td scope="col" width="15%">Material Invoice No.</td>
                            <td scope="col" width="15%" >Date</td>
                            <td scope="col" width="15%">Cashier Name</td>
                            <td scope="col" width="15%">Recieved by</td>
                            <td scope="col" width="15%">Inspected by</td>
                            <td scope="col" width="15%">Verified by</td>
                            <td class="text-end" scope="col" width="10%">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td scope="row" class="product_id">DMP001</td>
                                <td class="product_img">03/11/24</td>
                                <td>Fyke Loterena</td>
                                <td>Alexander Inciong</td>
                                <td>Louis Rivera</td>
                                <td>Joemarie Andrade</td>
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
                    </table>
            </div>
            
        </div>





<!-- end purchase-->

<!-- Modal -->
<div class="modal fade" id="add_stocks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Material Transfer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body " style="display: flex; flex-direction: column; align-items: center; justify-content: center">
        <input type="date" class="form-control mb-2">
        <input type="text" class="form-control mb-2" placeholder="Material Invoce No.">
        <input type="text" class="form-control mb-2" placeholder="Cashier Name">
        <div style=" display: flex; flex-direction: row; width: 100%; justify-content: space-between">
            <select class="form-select mb-2" aria-label="Default select example" style="width: 33%">
            <option selected>Recieved By</option>
            <option value="1">Fyke Loterena</option>
            <option value="2">Alexander Inciong</option>
            </select>
            <select class="form-select mb-2" aria-label="Default select example" style="width: 33%">
            <option selected>Inspected by </option>
            <option value="1">Fyke Loterena</option>
            <option value="2">Alexander Inciong</option>
            </select>
            <select class="form-select mb-2" aria-label="Default select example" style="width: 33%">
            <option selected>Verified by By</option>
            <option value="1">Fyke Loterena</option>
            <option value="2">Alexander Inciong</option>
            </select>
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