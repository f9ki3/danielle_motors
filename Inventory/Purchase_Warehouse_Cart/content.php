<div id="spinner" style="height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div class="spinner-grow text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div id="content" style="display: none">
    <div class="row g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">Purchase Warehouse</h2>
        </div>
    </div>
    <div id="products" data-list="{&quot;valueNames&quot;:[&quot;product&quot;,&quot;price&quot;,&quot;category&quot;,&quot;tags&quot;,&quot;vendor&quot;,&quot;unit&quot;, &quot;model&quot;, &quot;status&quot;],&quot;page&quot;:10,&quot;pagination&quot;:true}">
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-3">
            <div class="search-box">
                <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                    <input class="form-control search-input search" type="search" placeholder="Search" aria-label="Search">
                <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path></svg><!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->
                </form>
            </div>
            
            <div class="ms-xxl-auto">
                <a href="../Purchase_Warehouse" class="btn border text-primary border-primary" ><span class="fas fa-plus me-2"></span> Purchase</a>
                <a href="../Purchase_Warehouse_Cart" class="btn text-primary border-primary border boder-primary position-relative">
                    <span class="fas fa-shopping-cart me-2"></span> Cart
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-circle" id="counter"></span>
                </a>

            </div>
            </div>
        </div>
        <div class="pt-3 mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1" style="height: 35vh;">
        <div style="height: 35vh;" class="table-responsive scrollbar mx-n1 px-1">
            <table class="table">
                <thead class="sticky-top bg-white">
                    <tr>
                        <th scope="col" width="15%">Product Name</th>
                        <th scope="col" width="15%">Model</th>
                        <th scope="col" width="8%">Brand</th>
                        <th scope="col" width="8%">Unit</th>
                        <th scope="col" width="8%">Stocks</th>
                        <th scope="col" width="8%">Price</th>
                        <th scope="col" width="15%">QTY</th>
                        <th scope="col" width="10%">Discount</th>
                        <th scope="col" width="10%">Amount</th>
                        <th scope="col" width="5%">Action</th>
                    </tr>
                </thead>
                <tbody id="cartTableBody" >
                    
                </tbody>
            </table>
        </div>
    </div>

        <div class="pt-5 mx-n4 pb-5 px-4 mx-lg-n6 px-lg-6 bg-white d-flex flex-row position-relative top-1 justify-content-between">
                        <div style="width: 49%">
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
                                        <input type="date" id="transaction_date" class="form-control" placeholder="Date" >
                                        <label for="transaction_date">Date</label>
                                    </div>
                                    
                                </div>
                                
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-3">
                                    <div class="form-floating" style="width: 32%;">
                                        <select class="form-select mb-2" aria-label="Default select example" style="width: 100%" id="transaction_verified">

                                        </select>
                                        <label for="transaction_verified">Verified by</label>
                                    </div>
                                    <div class="form-floating" style="width: 32%;">
                                        <select class="form-select mb-2" aria-label="Default select example" style="width: 100%" id="transaction_inspected">

                                        </select>
                                        <label for="transaction_inspected">Inspected by</label>
                                    </div>
                                    <div class="form-floating" style="width: 32%;">
                                    <select class="form-select mb-2" aria-label="Default select example" style="width: 100%" id="transaction_received">
                                        
                                        </select>
                                        <label for="transaction_received">Recieved by</label>
                                    </div>
                                </div>

                                <div style="display: flex; flex-direction: row; justify-content: space-between"  class="mb-3">
                                    <div class="form-floating" style="width: 49%">
                                        <select id="transaction_payment" class="form-select" aria-label="Default select example" >
                                            <option selected value="Cash">Cash</option>
                                            <option value="G-Cash">G-Cash</option>
                                            <option value="Maya">Maya</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="Others">Others</option>
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
                                        <input type="text" id="subtotal_discount_percentage" class="form-control" placeholder="" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); if(parseFloat(this.value) < 0) this.value = 0;" maxlength="3" value="0">
                                        <label for="subtotal_discount_percentage">Subtotal Discount (%)</label>
                                    </div>
                                    <div class="form-floating" style="width: 49%;">
                                        <input type="text" id="amount_payment" class="form-control" placeholder="Enter Payment" maxlength="10">
                                        <label for="amount_payment">Payment</label>
                                    </div>
                                    
                                </div>
                                
                            </div>

                        </div>
                        <div style="width: 49%">
                            <div class="border rounded p-4 pt-5">
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Subtotal</h5>
                                    <h5 class="fw-bolder" id="subtotal">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder d-none">Tax (12%)</h5>
                                    <h5 class="fw-bolder d-none" id="tax">PHP 100.00</h5>
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
                                    <h5 class="fw-bolder" id="payment">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Change</h5>
                                    <h5 class="fw-bolder" id="change">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between;" class="mt-5 pb-2">
                                    <button style="flex: 0 0 49%;" id="resetBtn" class="btn btn-lg mt-3 border border-primary text-primary" onclick="resetCart()">Reset</button>
                                    <button style="flex: 0 0 49%;" id="purchase_btn" class="btn btn-lg mt-3 btn-primary" onclick="purchase()">Purchase</button>
                                    <button style="flex: 0 0 49%; display: none;" id="loading" disabled class="btn btn-lg mt-3 btn-primary">
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
