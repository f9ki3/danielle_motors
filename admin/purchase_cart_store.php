
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?php include '../config/config.php';
?>

<style>
    .button-container {
    position: relative;
    }

    .badge-container {
        position: absolute;
        top: 0;
        right: 0;
    }

    .badge {
        position: absolute;
        top: -10px;
        right: -10px;
    }
</style>
<!-- start inventory-->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Purchase</h5>
            <a href="purchase" class="btn btn-sm  border rounded mb-2" id="resetButton" onclick="resetCart()">Purchase Warehouse</a>
            <a href="purchase_store" class="btn btn-primary btn-sm  border rounded mb-2" id="resetButton" onclick="resetCart()">Purchase Store</a>
            <a href="purchase_terms" class="btn btn-sm border rounded mb-2">Purchase with Terms</a>
            <a href="purchase_online" class="btn btn-sm border rounded mb-2">Purchase Online</a>
            <a href="store_stocks" class="btn btn-sm border  rounded mb-2">Store Stocks</a>
            
        </div>

        <div style="background-color: white;" class="rounded border p-3 w-100">
            <div class="row">
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <h5 class="fw-bolder ">Cart List</h5>
                        <!-- <input class="form-control form-control-sm" id="searchInput" placeholder="Search by Product Name"> -->
                    </div>
                    <!-- <div style="display: flex; flex-direction: row">
                        <select id="brandSelect"  class="form-select form-select-sm " aria-label="Default select example" style="width:100%">
                            <option selected>Select Brand</option>
                             <?php foreach ($brands as $brand): ?>
                            <option value="<?php echo $brand['id']; ?>"><?php echo $brand['brand_name']; ?></option>
                             <?php endforeach; ?>
                        </select>
                        <select id="categorySelect"  class="form-select form-select-sm " aria-label="Default select example" style="width: 100%">
                            <option selected>Select Category</option>
                             <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                             <?php endforeach; ?>
                        </select>
                    </div> -->
                    <div class="button-container">
                        <a href="purchase_store" class="btn border  btn-sm me-5 rounded">Purchase</a>
                        <div class="badge-container">
                            <a href="purchase_cart_store" class="btn btn-primary border btn-sm rounded">Cart</a>
                            <span class="badge text-bg-danger" id="counter"></span>
                        </div>
                    </div>
                </div>
                </div>
                <div style="height: auto;">
                    <hr>
                    <div style="height: 38vh; overflow: auto">
                        <table class="table">
                            <thead class="sticky-top">
                                <tr>
                                <th scope="col" width="15%">Product Name</th>
                                <th scope="col" width="10%">Model</th>
                                <th scope="col" width="10%">Brand</th>
                                <th scope="col" width="10%"> Price</th>
                                <th scope="col" width="5%"> Unit</th>
                                <th scope="col" width="10%">QTY</th>
                                <th scope="col" width="10%">Markup</th>
                                <th scope="col" width="10%">Discount</th>
                                <th scope="col" width="10%">Amount</th>
                                <th scope="col" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="cartItemsList" >
                                <!-- Cart items will be populated here -->
                            </tbody>
                        </table>
                    </div>
                    <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                        <div style="width: 49%" class="py-2">
                            <div class="border rounded p-4">
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-2" >
                                    <div class="form-floating" style="width: 32%;">
                                        <input type="text" id="transaction_customer_name" class="form-control" placeholder="">
                                        <label for="transaction_customer_name">Customer Name</label>
                                    </div>
                                    <div class="form-floating" style="width: 32%;">
                                        <input type="text" id="transaction_address" class="form-control mb-2" placeholder="Address">
                                        <label for="transaction_address">Address</label>
                                    </div>
                                    <div class="form-floating" style="width: 32%;">
                                        <input type="date" id="transaction_date" class="form-control" placeholder="Date" readonly >
                                        <label for="transaction_date">Date</label>
                                    </div>
                                    
                                </div>
                                
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-3">
                                    <div class="form-floating" style="width: 32%;">
                                        <select id="transaction_verified" class="form-select" aria-label="Default select example">
                                            <option selected value="Fyke Lleva">Fyke Lleva</option>
                                            <option value="Alexander Inciong">Alexander Inciong</option>
                                            <option value="Lois Rivera">Lois Rivera</option>
                                        </select>
                                        <label for="transaction_verified">Verified by</label>
                                    </div>
                                    <div class="form-floating" style="width: 32%;">
                                        <select id="transaction_inspected" class="form-select" aria-label="Default select example">
                                            <option selected value="Fyke Lleva">Fyke Lleva</option>
                                            <option value="Alexander Inciong">Alexander Inciong</option>
                                            <option value="Lois Rivera">Lois Rivera</option>
                                        </select>
                                        <label for="transaction_inspected">Inspected by</label>
                                    </div>
                                    <div class="form-floating" style="width: 32%;">
                                        <select id="transaction_received" class="form-select" aria-label="Default select example">
                                            <option selected value="Fyke Lleva">Fyke Lleva</option>
                                            <option value="Alexander Inciong">Alexander Inciong</option>
                                            <option value="Lois Rivera">Lois Rivera</option>
                                        </select>
                                        <label for="transaction_received">Recieved by</label>
                                    </div>
                                </div>

                                <div style="display: flex; flex-direction: row; justify-content: space-between"  class="mb-3">
                                    <div class="form-floating" style="width: 49%">
                                        <select id="transaction_payment" class="form-select" aria-label="Default select example" >
                                            <option selected value="Cash">Cash</option>
                                            <option value="G-Cash">G-Cash</option>
                                        </select>
                                        <label for="transaction_payment">Payment Type</label>
                                    </div>
                                    <div class="form-floating" style="width: 49%">
                                        <select id="transaction_type" class="form-select" aria-label="Default select example">
                                            <option selected value="Walk-in">Walk-in</option>
                                            <option value="Delivery">Delivery</option>
                                        </select>
                                        <label for="transaction_type">Transaction Type</label>
                                    </div>
                                </div>

                                <div style="display: flex; flex-direction: row; justify-content: space-between" >
                                    <div class="form-floating" style="width: 49%;">
                                        <input type="text" id="subtotal_discount_percentage" class="form-control" placeholder="" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); if(parseFloat(this.value) < 0) this.value = 0;" maxlength="3">
                                        <label for="subtotal_discount_percentage">Subtotal Discount (%)</label>
                                    </div>
                                    <div class="form-floating" style="width: 49%;">
                                        <input type="text" id="amount_payment" class="form-control" placeholder="Enter Payment"  oninput="this.value = this.value.replace(/[^0-9.]/g, ''); if(parseFloat(this.value) < 0) this.value = 0;" maxlength="7">
                                        <label for="amount_payment">Payment</label>
                                    </div>
                                    
                                </div>
                                
                            </div>

                        </div>
                        <div style="width: 50%" class="p-2">
                            <div class="border rounded p-4">
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Subtotal</h5>
                                    <h5 class="fw-bolder" id="subtotal">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Tax (12%)</h5>
                                    <h5 class="fw-bolder" id="tax">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Discount</h5>
                                    <h5 class="fw-bolder" id="subtotal_discount">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Total</h5>
                                    <h5 class="fw-bolder" id="total">PHP 100.00</h5>
                                </div>
                                
                                <hr>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Payment</h5>
                                    <h5 class="fw-bolder" id="payment"></h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Change</h5>
                                    <h5 class="fw-bolder" id="change">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between" class="mb-2 mt-2">
                                    <button style="width: 49%" id="resetButton" class="btn border-primary text-primary" onclick="resetCart()" disabled>Reset</button>
                                    <button style="width: 49%;" id="purchase_btn" class="btn btn-primary" disabled onclick="purchase()">Purchase</button>
                                    <button style="width: 49%; display: none" disabled id="loading" class="btn btn-primary" ">
                                        <div class="spinner-grow spinner-grow-sm m-1" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            
        </div>





<!-- end purchase cart-->



</div>
<?php include 'footer.php'?>
<script src="../jquery/purchase_cart_store.js"></script>
</body>
</html>