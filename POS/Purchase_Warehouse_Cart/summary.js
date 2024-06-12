function purchase() {
    // Hide purchase button and show loading spinner
    document.getElementById("purchase_btn").style.display = "none";
    document.getElementById("loading").style.display = "block";

    // Get cart items from session storage
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

    // Get transaction details from form inputs
    var transaction_customer_name = document.getElementById('transaction_customer_name').value || 'N/A';
    var transaction_address = document.getElementById('transaction_address').value || 'N/A';
    var transaction_date = document.getElementById('transaction_date').value || '';
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
        change: change,
    };
    console.log(data)
    // // Send AJAX request to purchase_transaction.php
    $.ajax({
        type: "POST",
        url: "purchase_transaction.php",
        data: data,
        success: function(transaction_code) {
            alertify.set('notifier', 'position', 'bottom-left');
            alertify.success('Successfully Purchased');
            let click = new Audio('success.mp3');
            click.play();

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

    displayCartItems();
    updateCounter(0); 
    sessionStorage.clear()
}

// Function to update the subtotal
function updateSubtotal() {
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    var subtotal = cartItems.reduce((acc, item) => acc + item.totalAmount, 0);
    document.getElementById('subtotal').textContent = '₱ ' + subtotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    var discountPercentage = parseFloat(document.getElementById('subtotal_discount_percentage').value) || 0;
    var discountAmount = (subtotal * discountPercentage) / 100;
    document.getElementById('subtotal_discount').textContent = '₱ ' + discountAmount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    var total = subtotal - discountAmount;
    document.getElementById('total').textContent = '₱ ' + total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    var tax = subtotal * 0.12;
    document.getElementById('tax').textContent = '₱ ' + tax.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

// Input validation for the discount percentage input
document.getElementById('subtotal_discount_percentage').addEventListener('input', function(event) {
    var input = event.target.value;

    // Remove any non-digit characters
    input = input.replace(/[^0-9.]/g, '');

    // Remove extra decimal points if present
    var decimalParts = input.split('.');
    if (decimalParts.length > 2) {
        input = decimalParts[0] + '.' + decimalParts.slice(1).join('');
    }

    // Prevent negative values
    if (input.startsWith('-')) {
        input = input.substring(1);
    }

    // Update the input value
    event.target.value = input;

    // Update subtotal calculations
    updateSubtotal();
});
// Function to update the payment value
function updatePayment() {
    var paymentValue = parseFloat(document.getElementById('amount_payment').value) || 0; // Default value of 0
    document.getElementById('payment').textContent = '₱ ' + paymentValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    
    // Call updateChange after updating payment
    updateChange();

    var totalValue = parseFloat(document.getElementById('total').textContent.replace('₱ ', '').replace(',', '')) || 0;
    var purchaseButton = document.getElementById('purchase_btn');

    // Enable/disable purchase button based on payment amount and total amount
    if (totalValue > 0 && paymentValue >= totalValue) {
        purchaseButton.disabled = false;
    } else {
        purchaseButton.disabled = true;
    }
}



// Function to update the change value
function updateChange() {
    var totalValue = parseFloat(document.getElementById('total').textContent.replace('₱ ', '').replace(',', '')) || 0;
    var paymentValue = parseFloat(document.getElementById('amount_payment').value) || 0;
    var change = paymentValue - totalValue;
    var changeElement = document.getElementById('change');

    // Check if change is negative
    if (change < 0) {
        changeElement.style.color = 'red'; // Change color to red
    } else {
        changeElement.style.color = ''; // Reset color to default
    }

    // Update change text content
    changeElement.textContent = '₱ ' + change.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

// Event listener for the amount_payment input
document.getElementById('amount_payment').addEventListener('input', updatePayment);

// Initial call to updateSubtotal to ensure the subtotal is displayed on page load
updateSubtotal();

// Initial call to updatePayment to ensure the payment is displayed on page load
updatePayment();

// Function to update the change value
function updateChange() {
    var totalValue = parseFloat(document.getElementById('total').textContent.replace('₱ ', '').replace(',', '')) || 0;
    var paymentValue = parseFloat(document.getElementById('amount_payment').value) || 0;

    // If payment is 0, change is also 0
    var change = paymentValue === 0 ? 0 : (paymentValue - totalValue);

    document.getElementById('change').textContent = '₱ ' + change.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}