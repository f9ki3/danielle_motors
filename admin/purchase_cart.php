
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?php include '../config/config.php';
?>

<style>
    /* Adjust the min-width value according to your preference */
    .select2-container--default .select2-selection--single {
        min-width: 150px;
    }
</style>
<!-- start inventory-->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Purchase</h5>
            <a href="purchase" class="btn btn-primary btn-sm  border rounded mb-2">Purchase Walk-in</a>
            <a href="purchase_delivery" class="btn btn-sm border rounded mb-2">Purchase Delivery</a>
            <a href="purchase_online" class="btn btn-sm border rounded mb-2">Purchase Online</a>
            <a href="purchase_terms" class="btn btn-sm border rounded mb-2">Purchase with Terms</a>
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
                    <div>
                        <a href="purchase" class="btn border btn-sm me-1 rounded ">Purchase</a>
                        <a href="purchase_cart" class="btn border btn-primary btn-sm rounded">Cart <span class="badge text-bg-danger" id="counter"></span></a>
                    </div>
                </div>
                </div>
                <div style="height: 75vh;">
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
                        <div style="width: 49%" class="py-2 mb-2">
                            <div class="border rounded p-4">
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-3">
                                    <input type="text" class="form-control" placeholder="Customer Name" style="width: 49%">
                                    <input type="date" class="form-control" placeholder="Date" readonly style="width: 49%" id="dateInput">
                                </div>
                                <input type="text" class="form-control mb-2" placeholder="Address">

                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-3">
                                <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="receivedBy">
   
                                    </select>
                                <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="inspectedBy">

                                    </select>
                                <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="verifiedBy">

                                    </select>
                                </div>

                                <div style="display: flex; flex-direction: row; justify-content: space-between"  class="mb-3">
                                    <select class="form-select" aria-label="Default select example" style="width: 49%">
                                        <option selected>Payment Method</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select"  style="width: 49%" aria-label="Default select example">
                                        <option selected>Transaction Type</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div style="display: flex; flex-direction: row; justify-content: space-between"  class="mb-3">
                                    <input type="text" id="subtotal_discount_percentage" class="form-control" placeholder="Enter Subtotal Discount in percentage %" style="width: 49%">
                                    <input type="text" id="amount_payment" class="form-control" placeholder="Enter Payment" style="width: 49%">
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
                                    <h5 class="fw-bolder" id="payment">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Change</h5>
                                    <h5 class="fw-bolder" id="change">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <button style="width: 49%" class="btn border-primary text-primary">Reset</button>
                                    <button style="width: 49%" class="btn btn-primary">Purchase</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            
        </div>





<!-- end purchase cart-->



</div>
<?php include 'footer.php'?>



</body>
</html>
<script>
    // Get the current date in the format "YYYY-MM-DD"
    var today = new Date().toISOString().split('T')[0];

    // Set the default value of the input field to today's date
    document.getElementById('dateInput').value = today;

    // Function to update session storage and remove item from the cart
    function removeFromCart(index) {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        cartItems.splice(index, 1); // Remove item from cart array
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
        renderCartItems(); // Re-render the cart items
        updateCounter(cartItems.length); // Update the counter
        alertify.set('notifier', 'position', 'bottom-left');
        alertify.error('Remove Item');
    }

    function updateQuantity(index, newQuantity) {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        if (!isNaN(newQuantity) && newQuantity !== "") {
            // Convert newQuantity to a positive integer
            newQuantity = Math.max(1, Math.abs(parseInt(newQuantity)));
            cartItems[index].qty = newQuantity; // Update quantity
            sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
            renderCartItems(); // Re-render the cart items
        } else {
            // If newQuantity is empty, set it to 1
            newQuantity = 1;
            cartItems[index].qty = newQuantity;
            sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
            renderCartItems(); // Re-render the cart items
        }
    }



    // Function to handle discount type change
    function updateDiscountType(index, value) {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        var currentItem = cartItems[index];
        // Only update the discount type if it's different from the current type
        if (currentItem.discountType !== value) {
            currentItem.discountType = value; // Update discount type
            // If switching to percentage, keep the same discount value as a whole number
            if (value === "%") {
                currentItem.discount = Math.round(currentItem.discount);
            }
            sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
            renderCartItems(); // Re-render the cart items
        }
    }


    // Function to handle discount change
    function updateDiscount(index, value) {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        if (!isNaN(value)) { // Check if input is a valid number
            cartItems[index].discount = parseFloat(value); // Update discount value
        } else {
            cartItems[index].discount = 0; // Set discount to 0 if input is not a valid number
        }
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
        renderCartItems(); // Re-render the cart items
    }

    // Function to render cart items in the table
    function renderCartItems() {
        var cartItemsList = document.getElementById('cartItemsList');
        cartItemsList.innerHTML = ''; // Clear existing content
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        cartItems.forEach(function(item, index) {
            // Calculate the discounted amount
            var discountedPrice;
            if (item.discountType === "%") {
                discountedPrice = item.srp - (item.srp * item.discount / 100);
            } else {
                discountedPrice = item.srp - item.discount;
            }
            // Handle the case when the discount is 0
            if (item.discount === 0) {
                discountedPrice = item.srp; // Set discounted price to default SRP
            }
            var totalAmount = discountedPrice * item.qty;

            // Set default values to 0 if null or undefined
            var qtyValue = item.qty != null ? item.qty : 0;
            var discountValue = item.discount != null ? item.discount : 0;

            var row = document.createElement('tr');
            row.innerHTML = `
                <td scope="row">${item.product_name}</td>
                <td scope="row">${item.model}</td>
                <td>${item.brand}</td>
                <td> ₱ ${item.srp}</td>
                <td>${item.unit}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-light" onclick="updateQuantity(${index}, ${item.qty - 1})">-</button>
                        <input type="number" class="form-control w-50 text-center" value="${qtyValue}" onchange="updateQuantity(${index}, this.value)">
                        <button type="button" class="btn btn-light" onclick="updateQuantity(${index}, ${item.qty + 1})">+</button>
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control text-center w-25" value="${discountValue}" placeholder="" onchange="updateDiscount(${index}, this.value)">
                        <select class="form-select" style="width: auto;" aria-label="Default select example" onchange="updateDiscountType(${index}, this.value)">
                            <option ${item.discountType === "." ? "selected" : ""}>₱</option>
                            <option ${item.discountType === "%" ? "selected" : ""}>%</option>
                        </select>
                    </div>
                </td>
                <td style="color: ${totalAmount <= 0 ? 'red' : 'inherit'};">${new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(totalAmount)}</td>
                <td>
                    <button class="btn btn-light rounded rounded-5 p-2" onclick="removeFromCart(${index})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>
                </td>
            `;
            cartItemsList.appendChild(row);
        });
    }

    // Function to update the counter
    function updateCounter(count) {
        var counterElement = document.getElementById('counter');
        if (counterElement) {
            counterElement.textContent = count;
        }
    }

    // Add event listener to all "Add to Cart" buttons
    document.addEventListener("DOMContentLoaded", function() {
        var addToCartBtns = document.querySelectorAll('.addToCartBtn');
        addToCartBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var productData = JSON.parse(this.getAttribute('data-product'));
                addToCart(productData);
            });
        });

        // Function to add product to cart
        function addToCart(product) {
            var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
            var cartItem = {
                product_id: product.product_id,
                product_name: product.product_name,
                model: product.models,
                brand: product.brand_name,
                unit: product.unit_name,
                srp: product.srp,
                qty: 1, // Default quantity
                discountType: "%", // Default discount type
                discount: 0 // Default discount set to 0
            };

            // Check if the product already exists in the cart
            var existingItem = cartItems.find(function(item) {
                return item.product_id === cartItem.product_id;
            });

            if (existingItem) {
                // If the product already exists, display an alert and do not add it again
                alert('Product already exists in the cart!');
            } else {
                // Add new item to cart
                cartItems.push(cartItem);

                // Store updated cart items in session storage
                sessionStorage.setItem('cartItems', JSON.stringify(cartItems));

                // Display a confirmation message
                alert('Product added to cart!');

                // Render updated cart items
                renderCartItems();

                // Update the counter
                updateCounter(cartItems.length);
            }
        }
    }); 

    // Render initial cart items
    renderCartItems();

    // Initialize the counter with the number of items in the cart
    var initialCartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    updateCounter(initialCartItems.length);

//alex
$(document).ready(function () {
  
  function fetchAdminData(selectElementId, role) {
      $.ajax({
          url: '../php/fetch_admin_data.php', // Your server-side script to fetch admin data
          method: 'GET',
          data: { role: role }, // Optional: send role if needed
          dataType: 'json',
          success: function (data) {
              // Populate the dropdown options
              var selectElement = $('#' + selectElementId);
              selectElement.empty();
              selectElement.append('<option selected>Select ' + role + '</option>');
              $.each(data, function (index, admin) {
                  selectElement.append('<option value="' + admin.id + '">' + admin.fname + ' ' + admin.lname + '</option>');
              });
          },
          error: function (xhr, status, error) {
              console.error('Error fetching admin data:', error);
          }
      });
  }

  // Fetch data for receivedBy dropdown
  
  fetchAdminData('receivedBy', 'Recieved By');
  
  // Fetch data for inspectedBy dropdown
  fetchAdminData('inspectedBy', 'Inspected by');

  // Fetch data for verifiedBy dropdown
  fetchAdminData('verifiedBy', 'Verified By');
});
</script>
