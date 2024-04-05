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
                <a href="../Purchase_Warehouse_Cart" class="btn btn-primary position-relative">
                    <span class="fas fa-shopping-cart me-2"></span> Cart
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-circle" id="counter"></span>
                </a>

            </div>
            </div>
        </div>
        <div class="pt-3 mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1" style="height: 35vh;">
        <div style="height: 35vh; overflow: auto;">
            <table class="table">
                <thead class="sticky-top bg-white">
                    <tr>
                        <th scope="col" width="15%">Product Name</th>
                        <th scope="col" width="10%">Model</th>
                        <th scope="col" width="5%">Brand</th>
                        <th scope="col" width="5%">Unit</th>
                        <th scope="col" width="5%">Stocks</th>
                        <th scope="col" width="10%">Price</th>
                        <th scope="col" width="10%">QTY</th>
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
                                        <input type="text" id="subtotal_discount_percentage" class="form-control" placeholder="" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); if(parseFloat(this.value) < 0) this.value = 0;" maxlength="3" value="0">
                                        <label for="subtotal_discount_percentage">Subtotal Discount (%)</label>
                                    </div>
                                    <div class="form-floating" style="width: 49%;">
                                        <input type="text" id="amount_payment" class="form-control" placeholder="Enter Payment"  oninput="this.value = this.value.replace(/[^0-9.]/g, ''); if(parseFloat(this.value) < 0) this.value = 0;" maxlength="7">
                                        <label for="amount_payment">Payment</label>
                                    </div>
                                    
                                </div>
                                
                            </div>

                        </div>
                        <div style="width: 49%">
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
                                    <button style="width: 49%" id="resetButton" class="btn btn-lg mt-3 border-primary text-primary" onclick="resetCart()" disabled>Reset</button>
                                    <button style="width: 49%;" id="purchase_btn" class="btn btn-lg mt-3 btn-primary" disabled onclick="purchase()">Purchase</button>
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

<script>
    function addToCart(productId, image, productName, supplierCode, brandName, unitName, models, srp, totalStocks) {
        // Create an object to hold the item data
        var cartItem = {
            productId: productId,
            image: image,
            productName: productName,
            supplierCode: supplierCode,
            brandName: brandName,
            unitName: unitName,
            models: models,
            srp: srp,
            totalStocks: totalStocks,
            qty: 1, // Default quantity
            discount: 0 // Default discount
        };

        // Retrieve existing cart items from session storage
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

        // Check if the product already exists in the cart
        var existingItem = cartItems.find(function (item) {
            return item.productId === cartItem.productId;
        });

        if (existingItem) {
            // If the product already exists, display an alert and do not add it again
            alertify.set('notifier', 'position', 'bottom-left');
            alertify.error('Already Added');
        } else {
            // Add new item to cart
            cartItems.push(cartItem);

            // Store updated cart items in session storage
            sessionStorage.setItem('cartItems', JSON.stringify(cartItems));

            // Display a confirmation message
            alertify.set('notifier', 'position', 'bottom-left');
            alertify.success('Added Success');

            // Update the counter
            updateCounter(cartItems.length);
        }
    }

    // Function to update the counter
    function updateCounter(count) {
        var counterElement = document.getElementById('counter');
        if (counterElement) {
            counterElement.textContent = count; // Update counter to total items in the cart
        }
    }

    // Initialize the counter with the number of items in the cart
    var initialCartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    updateCounter(initialCartItems.length);


    // Function to display cart items in the table
    function displayCartItems() {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        var tableBody = document.getElementById('cartTableBody');

        // Clear existing table content
        tableBody.innerHTML = '';

        // Loop through each cart item and append to the table
        cartItems.forEach(function (item, index) {
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td scope="row" class="ps-2">${item.productName}</td>
                <td scope="row">${item.models}</td>
                <td>${item.brandName}</td>
                <td>${item.unitName}</td>
                <td>${item.totalStocks}</td>
                <td>₱ ${item.srp}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-light" onclick="updateQuantity(${index}, ${item.qty - 1})">-</button>
                        <input type="number" class="form-control w-50 text-center" value="${item.qty}" onchange="updateQuantity(${index}, this.value)" oninput="this.value = this.value.replace(/[^1-9]/g, ''); if(parseFloat(this.value) < 0) this.value = 1;" maxlength="7">
                        <button type="button" class="btn btn-light" onclick="updateQuantity(${index}, ${item.qty + 1})">+</button>
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control text-center w-25" value="${item.discount}" placeholder="" onchange="updateDiscount(${index}, this.value)" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); if(parseFloat(this.value) < 0) this.value = 0;" maxlength="7">
                        <select class="form-select" style="width: auto;" aria-label="Default select example" onchange="updateDiscountType(${index}, this.value)">
                            <option ${item.discountType === "." ? "selected" : ""}>₱</option>
                            <option ${item.discountType === "%" ? "selected" : ""}>%</option>
                        </select>
                    </div>
                </td>
                <td style="color: ${item.totalAmount <= 0 ? 'red' : 'inherit'};">${new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(item.totalAmount)}</td>
                <td>
                    <button class="btn btn-light rounded rounded-5 p-2" onclick="removeFromCart(${index})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>
                </td>
            `;
            tableBody.appendChild(newRow);
        });
    }

    // Call the displayCartItems function to initially display cart items
    displayCartItems();

    // Function to remove item from cart
    function removeFromCart(index) {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        cartItems.splice(index, 1); // Remove item at specified index
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
        displayCartItems(); // Update displayed cart items
        updateCounter(cartItems.length); // Update counter
    }
</script>

