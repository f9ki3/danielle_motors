
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
            <div class="row">
                
                <div class="col-12 col-md-6 p-2">
                     <h6 class="fw-bolder">Today Sales</h6>
                     <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                     <h1 class="fw-bolder text-center text-primary mt-4">PHP 10,00.00</h1>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-2">
                     <h6 class="fw-bolder">Date and Time</h6>
                     <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                    <div style="display: flex; flex-direction: row; justify-content: center" >
                       <h1 class="fw-bolder text-center text-primary mt-4 realtime-time">time</h1>
                       <h1 class="fw-bolder text-center text-primary mt-4">&nbsp|&nbsp</h1>
                       <h1 class="fw-bolder text-center text-primary mt-4 realtime-date">date</h1>
                     </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 p-2">
                     <h6 class="fw-bolder">Today Customers</h6>
                     <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                     <h1 class="fw-bolder text-center text-primary mt-4">10</h1>
                     </div>
                </div>
                <div class="col-6 col-md-3 p-2">
                     <h6 class="fw-bolder">Today Deliveries</h6>
                     <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                     <h1 class="fw-bolder text-center text-primary mt-4">100</h1>
                    </div>
                </div>
                <div class="col-6 col-md-3 p-2">
                     <h6 class="fw-bolder">Total Products</h6>
                     <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                     <h1 class="fw-bolder text-center text-primary mt-4">332</h1>
                    </div>
                </div>
                <div class="col-6 col-md-3 p-2">
                     <h6 class="fw-bolder">Total Supplier</h6>
                     <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                     <h1 class="fw-bolder text-center text-primary mt-4">7</h1>
                    </div>
                </div>
            </div>
            
        </div>


        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <div class="col-12 col-md-6 p-2">
                     <h6 class="fw-bolder">Sales Transactions</h6>
                     <div class="border rounded p-2">
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                    <th scope="col" width="25%" class="product_id">Purchase ID</th>
                                    <th scope="col" width="50%">Customer Name</th>
                                    <th scope="col" width="25%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                     </div>
                </div>
                <div class="col-12 col-md-6 p-2">
                    <h6 class="fw-bolder">Delivery Transactions</h6>
                    <div class="border rounded p-2">
                        <table class="table mt-3">
                                    <thead>
                                        <tr>
                                        <th scope="col" width="25%" class="product_id">Delivery ID</th>
                                        <th scope="col" width="50%">Customer Name</th>
                                        <th scope="col" width="25%">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        <tr>
                                            <td scope="row" class="product_id">PROD001</td>
                                            <td >Fyke Lleva</td>
                                            <td>php 100.00</td>
                                        
                                        </tr>
                                        
                                    </tbody>
                        </table>
                    </div>
                </div>



                
            </div>
            
        </div>


        <!-- Add Modal -->
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
</div>




<!-- end inventory-->


</div>
<?php include 'footer.php'?>
</body>
</html>