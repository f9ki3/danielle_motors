function purchase() {
    // Hide purchase button and show loading spinner
    document.getElementById("purchase_btn").style.display = "none";
    document.getElementById("loading").style.display = "block";

    // Get cart items from session storage
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

    // Get transaction details from form inputs
    var transaction_customer_name = document.getElementById('transaction_customer_name').value || '';
    var transaction_date = new Date().toISOString();
    var transaction_address = document.getElementById('transaction_address').value || '';
    var transaction_verified = document.getElementById('transaction_verified').value || '';
    var transaction_inspected = document.getElementById('transaction_inspected').value || '';
    var transaction_received = document.getElementById('transaction_received').value || '';
    var transaction_payment = document.getElementById('transaction_payment').value || '';
    var transaction_type = document.getElementById('transaction_type').value || '';

    // Get transaction totals
    var subtotal = parseFloat(document.getElementById('subtotal').textContent.replace('₱ ', '').replace(/,/g, ''));
    var tax = parseFloat(document.getElementById('tax').textContent.replace('₱ ', '').replace(/,/g, ''));
    var subtotalDiscount = parseFloat(document.getElementById('subtotal_discount').textContent.replace('₱ ', '').replace(/,/g, ''));
    var total = parseFloat(document.getElementById('total').textContent.replace('₱ ', '').replace(/,/g, ''));
    var payment = parseFloat(document.getElementById('payment').textContent.replace('₱ ', '').replace(/,/g, ''));
    var change = parseFloat(document.getElementById('change').textContent.replace('₱ ', '').replace(/,/g, ''));

    // Prepare data to be sent
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
        discount: subtotalDiscount,
        total: total,
        amountPayment: payment,
        change: change
    };

    // console.log("Cart Items:", cartItems);
    // console.log("Data to be sent:", data);

    // Send AJAX request to purchase_transaction.php
    $.ajax({
        type: "POST",
        url: "purchase_transaction.php",
        data: data,
        success: function(transaction_code) {
            alertify.set('notifier', 'position', 'bottom-left');
            alertify.success('Successfully Purchased');
            let click = new Audio('success.mp3');
            click.play()

            console.log(transaction_code);

            // Determine redirect URL based on transaction type
            var redirectURL;
            if (transaction_type.toLowerCase() === 'walk-in') {
                redirectURL = '../Purchase_Warehouse_Walkin_Receipt';
            } else if (transaction_type.toLowerCase() === 'delivery') {
                redirectURL = '../Purchase_Warehouse_Delivery_Receipt';
            } else {
                redirectURL = '../Purchase_Warehouse';
            }
            redirectURL += '?transaction_code=' + transaction_code;

            // Redirect to receipt page
            window.location.href = redirectURL;
            
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });

    displayCartItems()
    resetCart()
}


function resetCart() {
    // Clear the cartItems from session storage
    sessionStorage.removeItem('cartItems');
    displayCartItems();
    updateCounter();
    updateSubtotal();
    updateDiscountType();
    updateValues();
    var updatebtn = document.getElementById('resetBtn');
    updatebtn.disabled = true;

    // Update payment and change amounts
    document.getElementById('paymentAmount').textContent = '₱ 0.00';
    document.getElementById('changeAmount').textContent = '₱ 0.00';
}

// Function to handle validation and enable/disable purchase button
function validateAndEnablePurchaseButton() {
    var customerNameInput = document.getElementById('transaction_customer_name');
    var addressInput = document.getElementById('transaction_address');
    var paymentAmount = parseFloat(document.getElementById('payment').textContent.replace('₱ ', '').replace(/,/g, ''));
    var totalAmount = parseFloat(document.getElementById('total').textContent.replace('₱ ', '').replace(/,/g, ''));

    // Check if customer name and address are filled
    var isCustomerNameValid = customerNameInput.value.trim() !== '';
    var isAddressValid = addressInput.value.trim() !== '';

    // Check if payment is greater than or equal to total
    var isPaymentValid = paymentAmount >= totalAmount;

    // Enable/disable purchase button based on validation
    var purchaseButton = document.getElementById('purchase_btn');
    purchaseButton.disabled = !(isCustomerNameValid && isAddressValid && isPaymentValid);
}

// Event listeners for input changes
document.getElementById('transaction_customer_name').addEventListener('input', validateAndEnablePurchaseButton);
document.getElementById('transaction_address').addEventListener('input', validateAndEnablePurchaseButton);
document.getElementById('payment').addEventListener('DOMSubtreeModified', validateAndEnablePurchaseButton); // Using DOMSubtreeModified to detect changes in the payment display

// Initial validation and button state
validateAndEnablePurchaseButton();


// Function to update the subtotal
function updateSubtotal() {
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    var subtotal = 0;

    // Calculate subtotal by summing up totalAmount of each cart item
    cartItems.forEach(function(item) {
        subtotal += item.totalAmount;
    });

    // Calculate tax (12% of subtotal)
    var tax = subtotal * 0.12;

    // Format subtotal and tax as currency with commas for thousands separators and two decimal places
    var formattedSubtotal = '₱ ' + subtotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    var formattedTax = '₱ ' + tax.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    // Update the UI with the calculated subtotal and tax
    document.getElementById('subtotal').textContent = formattedSubtotal;
    document.getElementById('tax').textContent = formattedTax;

    // Calculate and update values whenever subtotal changes
    updateValues();
}

// Function to calculate and update subtotal discount, total, payment, and change
// Function to calculate and update subtotal discount, total, payment, and change
function updateValues() {
    // Get input values
    var subtotal = parseFloat(document.getElementById('subtotal').textContent.replace('₱ ', '').replace(/,/g, ''));
    var discountPercentageInput = document.getElementById('subtotal_discount_percentage');
    var discountPercentage = parseFloat(discountPercentageInput.value);
    var amountPaymentInput = document.getElementById('amount_payment');
    var amountPayment = parseFloat(amountPaymentInput.value);

    // Check if the input is null or exceeds 100, set it to 0 or 100 accordingly
    if (discountPercentage === null || isNaN(discountPercentage) || discountPercentage < 0) {
        discountPercentage = 0;
    } else if (discountPercentage > 100) {
        discountPercentage = 100;
    }

    // Check if payment is null, set it to 0
    if (amountPayment === null || isNaN(amountPayment)) {
        amountPayment = 0;
    }

    // Update the input values
    discountPercentageInput.value = discountPercentage;
    amountPaymentInput.value = amountPayment;

    // Calculate subtotal discount
    var subtotalDiscount = subtotal * (discountPercentage / 100);

    // Update subtotal discount field
    document.getElementById('subtotal_discount').textContent = '₱ ' + subtotalDiscount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    // Calculate total
    var total = subtotal - subtotalDiscount;

    // Update total field
    document.getElementById('total').textContent = '₱ ' + total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    // Calculate change
    var change = 0;
    if (amountPayment !== 0) {
        change = amountPayment - total;
    }

    // Ensure change is not negative
    if (change < 0) {
        change = 0;
    }

    // Update payment and change fields
    document.getElementById('payment').textContent = '₱ ' + amountPayment.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('change').textContent = '₱ ' + change.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    // Color payment input and payment display red if payment is less than the total and not equal to 0
    if (amountPayment < total && amountPayment !== 0) {
        amountPaymentInput.style.color = 'red';
        document.getElementById('payment').style.color = 'red';
    } else {
        amountPaymentInput.style.color = ''; // Reset to default color
        document.getElementById('payment').style.color = ''; // Reset to default color
    }
}

// Event listener for input changes
document.getElementById('subtotal_discount_percentage').addEventListener('input', function() {
    updateValues();
});

document.getElementById('amount_payment').addEventListener('input', function() {
    updateValues();
});

// Initial update
updateSubtotal();

    
// Modify existing functions to call updateSubtotal after updating cart items

function addToCart(productId, image, productName, supplierCode, brandName, unitName, models, srp, totalStocks) {
    // Calculate total amount
    var totalAmount = srp * 1; // Multiply srp by quantity (initially 1)

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
        discount: 0, // Default discount
        discountType: ".", // Default discount type
        totalAmount: totalAmount // Total amount calculation
    };


    // Retrieve existing cart items from session storage
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

    // Check if the product already exists in the cart
    var existingItem = cartItems.find(function(item) {
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

        // Update subtotal
        updateSubtotal();
    }
}



function updateCounter(count) {
    var counterElement = document.getElementById('counter');
    var resetButton = document.getElementById('resetBtn');

    if (counterElement) {
        counterElement.textContent = count; // Update counter to total items in the cart

        // Check if count is 0 and disable the reset button if it is
        if (count === 0 && resetButton) {
            resetButton.disabled = true;
        } else {
            // Enable the reset button if count is not 0
            resetButton.disabled = false;
        }
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
    
        // Check if cart is empty
        if (cartItems.length === 0) {
            var emptyRow = document.createElement('tr');
            emptyRow.innerHTML = `<td colspan="9">
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; height: 100%;">
                    <p style="margin-top: 28px; color: ">Cart is empty</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" style="margin-bottom: 70px;" fill="gainsboro" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg>
                </div>
            </td>`;
            tableBody.appendChild(emptyRow);
        } else {
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
                            <button type="button" class="btn btn-light" onclick="updateQuantity(${index}, ${item.qty - 1}, ${item.totalStocks})">-</button>
                            <input type="number" class="form-control w-75 text-center" value="${item.qty}" onchange="updateQuantity(${index}, this.value, ${item.totalStocks})" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(parseFloat(this.value) < 0) this.value = 1; if(parseFloat(this.value) > ${item.totalStocks}) this.value = ${item.totalStocks};" maxlength="7">
                            <button type="button" class="btn btn-light" onclick="updateQuantity(${index}, ${item.qty + 1}, ${item.totalStocks})">+</button>
                        </div>
                
                    </td>
                    <td>
                        <div class="input-group">
                            <input type="text" class="form-control text-center w-50" value="${item.discount}" placeholder="" onchange="updateDiscount(${index}, this.value)" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); if(parseFloat(this.value) < 0) this.value = 0;" maxlength="7">
                            <select class="form-select" style="width: auto;" aria-label="Default select example" onchange="updateDiscountType(${index}, this.value)">
                                <option ${item.discountType === "." ? "selected" : ""}>₱</option>
                                <option ${item.discountType === "%" ? "selected" : ""}>%</option>
                            </select>
                        </div>
                    </td>
                    <td style="color: ${item.totalAmount <= 0 ? 'red' : 'inherit'};">₱ ${Number(item.totalAmount).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                    <td>
                        <button class="btn btn-light rounded rounded-5 p-2" onclick="removeFromCart(${index})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                            </svg>
                        </button>
                    </td>
                `;
                tableBody.appendChild(newRow);
            });
        }
    }
    


    // Call the displayCartItems function to initially display cart items
    displayCartItems();

    // Function to remove item from cart
    function removeFromCart(index) {
        // Create an audio element
        let click = new Audio('delete.mp3'); // Replace 'delete.mp3' with the actual path to your audio file
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        cartItems.splice(index, 1); // Remove item at specified index
        click.play();
        alertify.set('notifier', 'position', 'bottom-left');
        alertify.error('Remove Items');
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
        displayCartItems(); // Update displayed cart items
        updateCounter(cartItems.length); // Update counter

        // Update subtotal and values after removing an item
        updateSubtotal();
        updateValues();
    }


    // Function to update the discount of an item in the cart
    function updateDiscount(index, newDiscount) {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        // Create an audio element
        let click = new Audio('click_button.mp3'); // Replace 'path_to_your_audio_file.mp3' with the actual path to your audio file

        // If the new discount value is null, set it to 0
        if (newDiscount === null || newDiscount === '') {
            newDiscount = 0;
        }

        // Ensure that the discount value does not exceed the maximum based on the discount type
        if (cartItems[index].discountType === "%") {
            // If the discount type is percentage, set the maximum discount to 100
            newDiscount = Math.min(parseFloat(newDiscount), 100);
        } else {
            // If the discount type is peso, set the maximum discount based on srp
            newDiscount = Math.min(parseFloat(newDiscount), cartItems[index].srp);
        }

        // Update the discount of the specified item
        cartItems[index].discount = newDiscount; // Update discount

        // Recalculate total amount for the item considering discount
        var discountAmount = (cartItems[index].discountType === "%") ? (cartItems[index].srp * cartItems[index].qty * cartItems[index].discount / 100) : cartItems[index].discount * cartItems[index].qty;
        cartItems[index].totalAmount = (cartItems[index].srp * cartItems[index].qty) - discountAmount;

        // Play audio
        click.play();
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
        displayCartItems(); // Update displayed cart items
        updateCounter(cartItems.length); // Update counter

        // Update subtotal
        updateSubtotal();
    }


    // Function to update the discount type of an item in the cart
    function updateDiscountType(index, newDiscountType) {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

        // Update the discount type of the specified item
        cartItems[index].discountType = newDiscountType; // Update discount type

        // Reset the discount value to 0 whenever the discount type is changed
        cartItems[index].discount = 0;

        // Recalculate total amount for the item considering discount type
        var discountAmount = (cartItems[index].discountType === "%") ? (cartItems[index].srp * cartItems[index].qty * cartItems[index].discount / 100) : cartItems[index].discount * cartItems[index].qty;
        cartItems[index].totalAmount = (cartItems[index].srp * cartItems[index].qty) - discountAmount;

        sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
        displayCartItems(); // Update displayed cart items
        updateCounter(cartItems.length); // Update counter

        // Update subtotal
        updateSubtotal();
    }


    
   // Function to update the quantity of an item in the cart
//    function updateQuantity(index, newQuantity, totalStocks) {
//     var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
//     // Create an audio element
//     let click = new Audio('click_button.mp3'); // Replace 'click_button.mp3' with the actual path to your audio file

//     if (!newQuantity || newQuantity <= 0) {
//         // If the quantity is empty or zero, set it to one
//         newQuantity = 1;
//     }

//     // Ensure that the quantity does not exceed the totalStocks limit
//     newQuantity = Math.min(newQuantity, totalStocks);

//     // Update the quantity of the specified item
//     cartItems[index].qty = parseInt(newQuantity); // Update quantity

//     // Recalculate total amount for the item considering the discount
//     var discountAmount = (cartItems[index].discountType === "%") ? (cartItems[index].srp * cartItems[index].discount / 100) : cartItems[index].discount;
//     cartItems[index].totalAmount = (cartItems[index].srp - discountAmount) * newQuantity;

//     // Play audio
//     click.play();
//     sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
//     displayCartItems(); // Update displayed cart items
//     updateCounter(cartItems.length); // Update counter

//     // Update subtotal
//     updateSubtotal();
// }

// Function to update the quantity of an item in the cart
function updateQuantity(index, newQuantity, totalStocks) {
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    // Create an audio element
    let click = new Audio('click_button.mp3'); // Replace 'click_button.mp3' with the actual path to your audio file

    if (!newQuantity || newQuantity <= 0) {
        // If the quantity is empty or zero, set it to one
        newQuantity = 1;
    }

    // Update the quantity of the specified item
    cartItems[index].qty = parseInt(newQuantity); // Update quantity

    // Recalculate total amount for the item considering the discount
    var discountAmount = (cartItems[index].discountType === "%") ? (cartItems[index].srp * cartItems[index].discount / 100) : cartItems[index].discount;
    cartItems[index].totalAmount = (cartItems[index].srp - discountAmount) * newQuantity;

    // Play audio
    click.play();
    sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
    displayCartItems(); // Update displayed cart items
    updateCounter(cartItems.length); // Update counter

    // Update subtotal
    updateSubtotal();
}


// Get today's date
var today = new Date();
  
// Format date as YYYY-MM-DD
var formattedDate = today.toISOString().substr(0, 10);

// Set the input field's value to today's date
document.getElementById('transaction_date').value = formattedDate;

    