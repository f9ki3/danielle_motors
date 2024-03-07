
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>

<!-- start cart-->

<div style="width: 100%" class="content p-3" >
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Purchase</h5>
            <button class="btn btn-sm border btn-primary rounded mb-2">Purchase Walk-in</button>
            <button class="btn btn-sm border rounded mb-2">Purchase Delivery</button>
            <button class="btn btn-sm border rounded mb-2">Purchase Online</button>
            <button class="btn btn-sm border rounded mb-2">Purchase with Terms</button>
            <button class="btn btn-sm border rounded mb-2">Store Stocks</button>
        </div>

        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Purchase Receipt</h5>
            <div class="row">
                <div>
                <div class="w-100 border rounded p-3 mb-2">
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <div class=" w-50 p-1">
                                <h6 class="fw-bolder">Customer Name: Fyke Lleva</h6>
                                <p>Address: Pinasabog Sub. Loma De Gato Marilao Bulacan</p>
                            </div>
                            <div class=" w-50 p-1">
                                <div style="display: flex; flex-direction: row; justify-content: space-between">
                                    <h6 class="fw-bolder">Purchase No: DMP10001</h6>
                                    <div>
                                    <button class="btn btn-light border border-primary text-primary btn-sm">view</button>
                                    <button class="btn btn-primary btn-sm">print</button>
                                    </div>
                                </div>
                                <p>Date: March 06, 2024</p>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;" class="border-top pt-2">
                            <div style="width: 35%">Recieved by: Alexander Inciong</div>
                            <div style="width: 35%">Inspected by: Fyke Lleva</div>
                            <div style="width: 35%">Verified by: Lois Lance Rivera</div>
                        </div>
                </div>
                <div class="w-100 border rounded p-3 mb-2">
                        <div>
                            <table class="table table-striped">
                                <tr>
                                    <th width="1%">rackid</th>
                                    <th width="5%">productid</th>
                                    <th width="15%">product name</th>
                                    <th width="5%" class="text-center">qty</th>
                                    <th width="10%">price</th>
                                    <th width="10%" class="text-center">discount</th>
                                    <th width="10%" class="text-center">amount</th>
                                </tr>
                                <!-- make a loop data here from data set -->
                                <tr>
                                    <td>RACK001</td>
                                    <td>PROD002</td>
                                    <td>Suzuki Tires 130/80-14 </td>
                                    <td class="text-center">2</td>
                                    <td>PHP 550.00</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">1100</td>
                                </tr>
                                <tr>
                                    <td>RACK001</td>
                                    <td>PROD002</td>
                                    <td>Suzuki Tires 130/80-14 </td>
                                    <td class="text-center">2</td>
                                    <td>PHP 550.00</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">1100</td>
                                </tr>
                                <tr>
                                    <td>RACK001</td>
                                    <td>PROD002</td>
                                    <td>Suzuki Tires 130/80-14 </td>
                                    <td class="text-center">2</td>
                                    <td>PHP 550.00</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">1100</td>
                                </tr>
                                <tr>
                                    <td>RACK001</td>
                                    <td>PROD002</td>
                                    <td>Suzuki Tires 130/80-14 </td>
                                    <td class="text-center">2</td>
                                    <td>PHP 550.00</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">1100</td>
                                </tr>
                                <!-- end loop -->
                            </table>
                        </div>
                    </div>

                    
                    <div class="w-100 border rounded p-4 mb-2">
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h class="fw-bolder">Subtotal</h>
                            <h class="fw-bolder">PHP 6600.00</h>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h class="fw-bolder">Discount</h>
                            <h class="fw-bolder">PHP 0.00</h>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h class="fw-bolder">Total Amount</h>
                            <h class="fw-bolder">PHP 6600.00</h>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h class="fw-bolder">Change</h>
                            <h class="fw-bolder">PHP 100.00</h>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        



<!-- end cart-->

<!-- Modal Checkout-->
<div class="modal  fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Customer Transactions</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center">
            <div class="w-100 border rounded p-3 mb-2">
                <div style="display: flex; flex-direction: row; justify-content: space-between">
                    <h class="fw-bolder">Subtotal</h>
                    <h class="fw-bolder">PHP 100.00</h>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: space-between">
                    <h class="fw-bolder">Discount</h>
                    <h class="fw-bolder">PHP 100.00</h>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: space-between">
                    <h class="fw-bolder">Total Amount</h>
                    <h class="fw-bolder">PHP 100.00</h>
                </div>
            </div>
        <input type="text" placeholder="Customer Name" class="form-control mb-2">
        <div style=" display: flex; flex-direction: row; width: 100%; justify-content: space-between">
            <select class="form-select mb-2" aria-label="Default select example" style="width: 33%">
            <option selected>Recieved By</option>
            <option value="1">Fyke Loterena</option>
            <option value="2">Alexander Inciong</option>
            </select>
            <select class="form-select mb-2" aria-label="Default select example" style="width: 33%">
            <option selected>Inspected by By</option>
            <option value="1">Fyke Loterena</option>
            <option value="2">Alexander Inciong</option>
            </select>
            <select class="form-select mb-2" aria-label="Default select example" style="width: 33%">
            <option selected>Verified by By</option>
            <option value="1">Fyke Loterena</option>
            <option value="2">Alexander Inciong</option>
            </select>
        </div>
        <select class="form-select mb-2" aria-label="Default select example" >
            <option selected>Mode of Payment</option>
            <option value="1">Cash</option>
            <option value="2">G-Cash</option>
            <option value="2">Maya</option>
        </select>
        <input type="text" placeholder="Payment Amount" class="form-control mb-2">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Purchase</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->


</div>
<?php include 'footer.php'?>
</body>
</html>