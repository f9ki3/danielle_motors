
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
        
        </div>

        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input  class="form-control form-control-sm" placeholder="Search">
                    </div>

                    <div>
                        <a href="purchase" class="btn border btn-sm rounded">Purchase</a>
                        <a href="purchase_cart" class="btn border btn-sm rounded btn-primary">Cart</a>
                    </div>
                </div>
                <div class="mb-4">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col" width="5%">RACKID.</th>
                        <th scope="col" width="5%">PRODID.</th>
                        <th scope="col" width="5%">Img</th>
                        <th scope="col" width="15%">Product Name</th>
                        <th scope="col" width="5%">Unit Price</th>
                        <th scope="col" width="5%">QTY</th>
                        <th scope="col" width="10%">Discount</th>
                        <th scope="col" width="10%">Amount</th>
                        <th scope="col" width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" style="text-align: center">1</th>
                        <th scope="row" >1</th>
                        <td><img src="../uploads/batteries.jpeg" alt="" style="width: 100px"></td>
                        <td>Batteries</td>
                        <td>PHP 100.00</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">-</button>
                                <input type="text" class="form-control w-50 text-center" placeholder="1">
                                <button type="button" class="btn btn-light">+</button>
                            </div>
                        </td>
                        <td>
                        <div class="input-group">
                        <input type="text" class="form-control text-center w-25" placeholder="0%">
                        <select class="form-select" style="width: auto;" aria-label="Default select example">
                            <option selected>%</option>
                            <option value="1">.</option>
                        </select>
                        </div>
                        </td>
                        <td>
                            PHP 100.00
                        </td>
                        <td>
                        <button class="btn btn-light rounded rounded-5 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                        </button>
                        </td>
                        </tr>

                        <tr>
                        <th scope="row" style="text-align: center">1</th>
                        <th scope="row" >1</th>
                        <td><img src="../uploads/suzuki_trottle_cable.jpeg" alt="" style="width: 100px"></td>
                        <td>Suzuki Trottle</td>
                        <td>PHP 100.00</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">-</button>
                                <input type="text" class="form-control w-50 text-center" placeholder="1">
                                <button type="button" class="btn btn-light">+</button>
                            </div>
                        </td>
                        <td>
                        <div class="input-group">
                        <input type="text" class="form-control text-center w-25" placeholder="0%">
                        <select class="form-select" style="width: auto;" aria-label="Default select example">
                            <option selected>%</option>
                            <option value="1">.</option>
                        </select>
                        </div>
                        </td>
                        <td>
                            PHP 100.00
                        </td>
                        <td>
                        <button class="btn btn-light rounded rounded-5 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                        </button>
                        </td>
                        </tr>

                        <tr>
                        <th scope="row" style="text-align: center">1</th>
                        <th scope="row" >1</th>
                        <td><img src="../uploads/tires.jpeg" alt="" style="width: 100px"></td>
                        <td>Suzuki Tired</td>
                        <td>PHP 100.00</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">-</button>
                                <input type="text" class="form-control w-50 text-center" placeholder="1">
                                <button type="button" class="btn btn-light">+</button>
                            </div>
                        </td>
                        <td>
                        <div class="input-group">
                        <input type="text" class="form-control text-center w-25" placeholder="0%">
                        <select class="form-select" style="width: auto;" aria-label="Default select example">
                            <option selected>%</option>
                            <option value="1">.</option>
                        </select>
                        </div>
                        </td>
                        <td>
                            PHP 100.00
                        </td>
                        <td>
                        <button class="btn btn-light rounded rounded-5 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                        </button>
                        </td>
                        </tr>

                        <tr>
                        <th scope="row" style="text-align: center">1</th>
                        <th scope="row" >1</th>
                        <td><img src="../uploads/batteries.jpeg" alt="" style="width: 100px"></td>
                        <td>Batteries</td>
                        <td>PHP 100.00</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">-</button>
                                <input type="text" class="form-control w-50 text-center" placeholder="1">
                                <button type="button" class="btn btn-light">+</button>
                            </div>
                        </td>
                        <td>
                        <div class="input-group">
                        <input type="text" class="form-control text-center w-25" placeholder="0%">
                        <select class="form-select" style="width: auto;" aria-label="Default select example">
                            <option selected>%</option>
                            <option value="1">.</option>
                        </select>
                        </div>
                        </td>
                        <td>
                            PHP 100.00
                        </td>
                        <td>
                        <button class="btn btn-light rounded rounded-5 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                        </button>
                        </td>
                        </tr>

                        <tr>
                        <th scope="row" style="text-align: center">1</th>
                        <th scope="row" >1</th>
                        <td><img src="../uploads/suzuki_trottle_cable.jpeg" alt="" style="width: 100px"></td>
                        <td>Suzuki Trottle</td>
                        <td>PHP 100.00</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">-</button>
                                <input type="text" class="form-control w-50 text-center" placeholder="1">
                                <button type="button" class="btn btn-light">+</button>
                            </div>
                        </td>
                        <td>
                        <div class="input-group">
                        <input type="text" class="form-control text-center w-25" placeholder="0%">
                        <select class="form-select" style="width: auto;" aria-label="Default select example">
                            <option selected>%</option>
                            <option value="1">.</option>
                        </select>
                        </div>
                        </td>
                        <td>
                            PHP 100.00
                        </td>
                        <td>
                        <button class="btn btn-light rounded rounded-5 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                        </button>
                        </td>
                        </tr>

                        <tr>
                        <th scope="row" style="text-align: center">1</th>
                        <th scope="row" >1</th>
                        <td><img src="../uploads/tires.jpeg" alt="" style="width: 100px"></td>
                        <td>Suzuki Tired</td>
                        <td>PHP 100.00</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">-</button>
                                <input type="text" class="form-control w-50 text-center" placeholder="1">
                                <button type="button" class="btn btn-light">+</button>
                            </div>
                        </td>
                        <td>
                        <div class="input-group">
                        <input type="text" class="form-control text-center w-25" placeholder="0%">
                        <select class="form-select" style="width: auto;" aria-label="Default select example">
                            <option selected>%</option>
                            <option value="1">.</option>
                        </select>
                        </div>
                        </td>
                        <td>
                            PHP 100.00
                        </td>
                        <td>
                        <button class="btn btn-light rounded rounded-5 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                        </button>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row" style="text-align: center">1</th>
                        <th scope="row" >1</th>
                        <td><img src="../uploads/batteries.jpeg" alt="" style="width: 100px"></td>
                        <td>Batteries</td>
                        <td>PHP 100.00</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">-</button>
                                <input type="text" class="form-control w-50 text-center" placeholder="1">
                                <button type="button" class="btn btn-light">+</button>
                            </div>
                        </td>
                        <td>
                        <div class="input-group">
                        <input type="text" class="form-control text-center w-25" placeholder="0%">
                        <select class="form-select" style="width: auto;" aria-label="Default select example">
                            <option selected>%</option>
                            <option value="1">.</option>
                        </select>
                        </div>
                        </td>
                        <td>
                            PHP 100.00
                        </td>
                        <td>
                        <button class="btn btn-light rounded rounded-5 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                        </button>
                        </td>
                        </tr>

                        <tr>
                        <th scope="row" style="text-align: center">1</th>
                        <th scope="row" >1</th>
                        <td><img src="../uploads/suzuki_trottle_cable.jpeg" alt="" style="width: 100px"></td>
                        <td>Suzuki Trottle</td>
                        <td>PHP 100.00</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">-</button>
                                <input type="text" class="form-control w-50 text-center" placeholder="1">
                                <button type="button" class="btn btn-light">+</button>
                            </div>
                        </td>
                        <td>
                        <div class="input-group">
                        <input type="text" class="form-control text-center w-25" placeholder="0%">
                        <select class="form-select" style="width: auto;" aria-label="Default select example">
                            <option selected>%</option>
                            <option value="1">.</option>
                        </select>
                        </div>
                        </td>
                        <td>
                            PHP 100.00
                        </td>
                        <td>
                        <button class="btn btn-light rounded rounded-5 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                        </button>
                        </td>
                        </tr>

                        <tr>
                        <th scope="row" style="text-align: center">1</th>
                        <th scope="row" >1</th>
                        <td><img src="../uploads/tires.jpeg" alt="" style="width: 100px"></td>
                        <td>Suzuki Tired</td>
                        <td>PHP 100.00</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light">-</button>
                                <input type="text" class="form-control w-50 text-center" placeholder="1">
                                <button type="button" class="btn btn-light">+</button>
                            </div>
                        </td>
                        <td>
                        <div class="input-group">
                        <input type="text" class="form-control text-center w-25" placeholder="0%">
                        <select class="form-select" style="width: auto;" aria-label="Default select example">
                            <option selected>%</option>
                            <option value="1">.</option>
                        </select>
                        </div>
                        </td>
                        <td>
                            PHP 100.00
                        </td>
                        <td>
                        <button class="btn btn-light rounded rounded-5 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                        </button>
                        </td>
                        </tr>
                    
                    </tbody>
                    </table>
                </div>

                <div style="background-color: white; width: 81%; margin-left: 18%; height: 100px; display: flex; justify-content: space-between" class="rounded border p-3 fixed-bottom">
                    <h4 class="fw-bolder me-5 mt-3 text-secondary">Total Amount: PHP 100.00</h4>
                    <button class="btn btn-primary border h-75 w-25" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Proceed</button>
                    <!-- Your other content goes here -->
                </div>
                
            </div>

            

            
        </div>





<!-- end cart-->

<!-- Modal Checkout-->
<div class="modal modal-lg fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Customer Transactions</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center">
        <div style="display: flex; flex-direction: row; justify-content: space-between">
            <h4>Subtotal</h4>
            <h4>PHP 100.00</h4>
        </div>
        <div style="display: flex; flex-direction: row; justify-content: space-between">
            <h4>Discount</h4>
            <h4>PHP 100.00</h4>
        </div>
        <div style="display: flex; flex-direction: row; justify-content: space-between">
            <h4>Subtotal</h4>
            <h4>PHP 100.00</h4>
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
        <input type="text" placeholder="Payment" class="form-control mb-2">
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