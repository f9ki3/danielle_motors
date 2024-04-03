function purchase() {
    document.getElementById("purchase_btn").style.display = "none";
    document.getElementById("loading").style.display = "block";
    // Collect necessary data
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    var subtotal = calculateSubtotal();
    var tax = calculateTax(subtotal);
    var discountPercentage = parseFloat(document.getElementById('subtotal_discount_percentage').value) || 0;
    var discount = calculateDiscount(subtotal, discountPercentage);
    var total = calculateTotal(subtotal, tax, discount);
    var amountPayment = parseFloat(document.getElementById('amount_payment').value) || 0;
    var change = Math.max(amountPayment - total, 0);

    cartItems.forEach(function(item, index) {
        var discountedPrice;
        if (item.discountType === "%") {
            discountedPrice = item.srp - (item.srp * item.discount / 100);
        } else if (item.discountType === "₱") { // Handle fixed discount amount
            discountedPrice = item.srp - item.discount;
        } else {
            item.discountType = "₱"; // Default discount type to peso currency if not specified
            discountedPrice = item.srp - item.discount; // Default to full price if discount type is unknown
        }
        item.totalAmount = discountedPrice * item.qty; // compute total amount
        item.quantity = item.qty; // Add quantity
    });
    
    // User input to change discount type to "%" if selected
    var userInputDiscountType = ""; // Assume user input is provided here
    if (userInputDiscountType === "%") {
        cartItems.forEach(function(item) {
            item.discountType = "%";
        });
    }
    
    

    // Collect transaction details
    var transaction_customer_name = document.getElementById('transaction_customer_name').value || '';
    var transaction_date = new Date().toISOString(); // Assuming transaction date is current date
    var transaction_address = document.getElementById('transaction_address').value || '';
    var transaction_verified = document.getElementById('transaction_verified').value || '';
    var transaction_inspected = document.getElementById('transaction_inspected').value || '';
    var transaction_received = document.getElementById('transaction_received').value || '';
    var transaction_payment = document.getElementById('transaction_payment').value || '';
    var transaction_type = document.getElementById('transaction_type').value || '';

    // Prepare data for AJAX request
    var data = {
        cartItems: cartItems,
        transaction_customer_name: transaction_customer_name,
        transaction_date: transaction_date,
        transaction_address: transaction_address,
        transaction_verified: transaction_verified,
        transaction_inspected: transaction_inspected,
        transaction_received: transaction_received,
        transaction_payment: transaction_payment,
        transaction_type: transaction_type,
        subtotal: subtotal,
        tax: tax,
        discount: discount,
        total: total,
        amountPayment: amountPayment,
        change: change
    };

    // Log cartItems and data
    console.log("Cart Items:", cartItems);
    console.log("Data to be sent:", data);

    // Send data to PHP script using AJAX
    $.ajax({
        type: "POST",
        url: "../php/purchase_transaction.php",
        data: data,
        success: function(transaction_code) {
            console.log(transaction_code);
            // Determine the URL to redirect based on transaction type
            var redirectURL;
            if (transaction_type.toLowerCase() === 'walk-in') {
                redirectURL = 'purchase_receipt';
            } else if (transaction_type.toLowerCase() === 'delivery') {
                redirectURL = 'purchase_delivery_receipt';
            } else {
                // Default to purchase_receipt.php if transaction type is unknown
                redirectURL = 'purchase_receipt.php';
            }

            // Append transaction code as a query parameter to the redirect URL
            redirectURL += '?transaction_code=' + encodeURIComponent(transaction_code);

            // Redirect the user after a delay of 2 seconds
            window.location.href = redirectURL;
            
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
            // Handle error gracefully
        }
    });

    // Optionally, update UI
    updateUI();
    // Optionally, reset the cart after purchase
    resetCart();
}


// Function to reset the cart and clear session storage
function resetCart() {
    sessionStorage.removeItem('cartItems'); // Remove cart items from session storage
    renderCartItems(); // Re-render the cart items (to clear the display)
    updateCounter(0); // Update the counter to 0
    updateUI(); // Update the UI to reset all values
    // Clear input fields
    document.getElementById('transaction_customer_name').value = '';
    document.getElementById('transaction_address').value = '';
    document.getElementById('amount_payment').value = '';
    document.getElementById('subtotal_discount_percentage').value = '';

     // Clear <h5> element with ID 'payment'
     document.getElementById('payment').innerHTML = '₱0.00';
     document.getElementById('change').innerHTML = '₱0.00';
    
    alertify.set('notifier', 'position', 'bottom-left');
    alertify.success('Success');
    document.getElementById("resetButton").disabled = true;
}


 // Function to calculate subtotal based on local storage including discounted prices
function calculateSubtotal() {
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    var subtotal = 0;
    cartItems.forEach(function(item) {
        // Calculate the discounted price
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
        // Add discounted price multiplied by quantity to subtotal
        subtotal += discountedPrice * item.qty;
    });
    return subtotal;
}


// Function to calculate tax
function calculateTax(subtotal) {
    return Math.max(0.12 * subtotal, 0);
}

// Function to calculate discount
function calculateDiscount(subtotal, discountPercentage) {
    return Math.max(subtotal * (discountPercentage / 100), 0);
}

// Function to calculate total
function calculateTotal(subtotal, tax, discount) {
    return subtotal - discount;
}


// Function to update UI
function updateUI() {
    var subtotal = calculateSubtotal();
    var tax = calculateTax(subtotal);
    var discountPercentage = parseFloat(document.getElementById('subtotal_discount_percentage').value) || 0;
    var discount = calculateDiscount(subtotal, discountPercentage);
    var total = calculateTotal(subtotal, tax, discount);
    var amountPayment = parseFloat(document.getElementById('amount_payment').value) || 0;
    var change = Math.max(amountPayment - total, 0);

    document.getElementById('subtotal').textContent = new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(subtotal);
    document.getElementById('tax').textContent = new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(tax);
    document.getElementById('subtotal_discount').textContent = new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(discount);
    document.getElementById('total').textContent = new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(total);
    document.getElementById('payment').textContent = new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(amountPayment);
    document.getElementById('change').textContent = new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(change);

    // start of validation
    // Function to check if all required fields have values
    function checkFields() {
        var customerName = document.getElementById("transaction_customer_name").value;
        var address = document.getElementById("transaction_address").value;
        var discountPercentage = document.getElementById("subtotal_discount_percentage").value;
        var paymentAmount = document.getElementById("amount_payment").value;

        // Check if all fields have values
        if (customerName && address && discountPercentage && paymentAmount) {
            document.getElementById("purchase_btn").removeAttribute("disabled");
        } else {
            document.getElementById("purchase_btn").setAttribute("disabled", "disabled");
        }
    }

    // Call checkFields function when input values change
    document.getElementById("transaction_customer_name").addEventListener("input", checkFields);
    document.getElementById("transaction_address").addEventListener("input", checkFields);
    document.getElementById("subtotal_discount_percentage").addEventListener("input", checkFields);
    document.getElementById("amount_payment").addEventListener("input", checkFields);
    // end of validation
}

// Add event listeners to input fields
document.getElementById('subtotal_discount_percentage').addEventListener('input', updateUI);
document.getElementById('amount_payment').addEventListener('input', updateUI);

// Initialize UI
updateUI();

// Get the current date in the format "YYYY-MM-DD"
var today = new Date().toISOString().split('T')[0];

// Set the default value of the input field to today's date
document.getElementById('transaction_date').value = today;

// Function to update session storage and remove item from the cart
function removeFromCart(index) {
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    cartItems.splice(index, 1); // Remove item from cart array
    sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
    renderCartItems(); // Re-render the cart items
    updateCounter(cartItems.length); // Update the counter
    updateUI();
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
        updateUI();
    } else {
        // If newQuantity is empty, set it to 1
        newQuantity = 1;
        cartItems[index].qty = newQuantity;
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
        renderCartItems(); // Re-render the cart items
        updateUI();
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
        updateUI();
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
    updateUI();
}

function renderCartItems() {
    var cartItemsList = document.getElementById('cartItemsList');
    cartItemsList.innerHTML = ''; // Clear existing content
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    var totalCartAmount = 0; // Initialize totalCartAmount
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
        totalCartAmount += totalAmount; // Add to totalCartAmount

        // Set default values to 0 if null or undefined
        var qtyValue = item.qty != null ? item.qty : 0;
        var discountValue = item.discount != null ? item.discount : 0;

        // Store totalAmount, discountType, and totalCartAmount in localStorage
        localStorage.setItem(`totalAmount_${index}`, totalAmount);
        localStorage.setItem(`discountType_${index}`, item.discountType);
        localStorage.setItem('totalCartAmount', totalCartAmount);

        // Update cartItem object with totalAmount
        item.totalAmount = totalAmount;

        var row = document.createElement('tr');
        row.innerHTML = `
            <!-- your HTML for displaying cart item details -->
        `;
        cartItemsList.appendChild(row);
    });

    // Update cartItems in sessionStorage with totalAmount included
    sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
}


function renderCartItems() {
    var cartItemsList = document.getElementById('cartItemsList');
    cartItemsList.innerHTML = ''; // Clear existing content
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    var totalCartAmount = 0; // Initialize totalCartAmount
    
    // Display message if cart is empty
    if (cartItems.length === 0) {
        cartItemsList.innerHTML = `
        <tr>
            <td colspan="9">
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; height: 100%;" >
                    <p style="margin-top: 80px; color: ">Cart is empty</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" style="margin-bottom: 70px;" fill="gainsboro" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg>
                </div>
            </td>
        </tr>`;
        return; // Stop further execution
    }

    
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
        totalCartAmount += totalAmount; // Add to totalCartAmount

        // Set default values to 0 if null or undefined
        var qtyValue = item.qty != null ? item.qty : 0;
        var discountValue = item.discount != null ? item.discount : 0;

        // Store totalAmount and discountType in localStorage
        localStorage.setItem(`totalAmount_${index}`, totalAmount);
        localStorage.setItem(`discountType_${index}`, item.discountType);

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
                    <input type="number" class="form-control w-50 text-center" value="${qtyValue}" onchange="updateQuantity(${index}, this.value)" oninput="this.value = this.value.replace(/[^1-9]/g, ''); if(parseFloat(this.value) < 0) this.value = 1;" maxlength="7">
                    <button type="button" class="btn btn-light" onclick="updateQuantity(${index}, ${item.qty + 1})">+</button>
                </div>
            </td>
            <td><input type="text" class="form-control" value="${item.markup}"></td>
            <td>
                <div class="input-group">
                    <input type="text" class="form-control text-center w-25" value="${discountValue}" placeholder="" onchange="updateDiscount(${index}, this.value)" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); if(parseFloat(this.value) < 0) this.value = 0;" maxlength="7">
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

    // Store totalCartAmount in localStorage
    localStorage.setItem('totalCartAmount', totalCartAmount);

    // Enable or disable the reset button based on whether there are items in the cart
    var resetButton = document.querySelector('button[onclick="resetCart()"]');
    if (cartItems.length > 0) {
        resetButton.removeAttribute('disabled');
    } else {
        resetButton.setAttribute('disabled', 'disabled');
    }
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

