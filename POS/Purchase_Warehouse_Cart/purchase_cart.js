

// Function to update cart item quantity
function updateCartItemQuantity(index, increment, qtyInput) {
    let click = new Audio('click_button.mp3');
    click.play();

    // Clear amount_payment input field
    document.getElementById('amount_payment').value = '';
    document.getElementById('payment').textContent = '₱ 0.00';
    document.getElementById('change').textContent = '₱ 0.00';
    
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    if (cartItems[index]) {
        var newQty = cartItems[index].qty + increment;

        if (newQty < 1) newQty = 1;
        if (newQty > cartItems[index].totalStocks) {
            alertify.set('notifier', 'position', 'bottom-left');
            alertify.error('Cannot exceed total stocks');
            document.querySelector('.qty').value = cartItems[index].totalStocks;
            return;
        }

        cartItems[index].qty = newQty;

        if (!isNaN(qtyInput) && qtyInput !== '') {
            cartItems[index].qty = parseInt(qtyInput);
            if (cartItems[index].qty < 1) cartItems[index].qty = 1;
            cartItems[index].totalAmount = cartItems[index].price * cartItems[index].qty;
        }

        cartItems[index].totalAmount = cartItems[index].price * newQty;
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
        displayCartItems();
        updateCounter(cartItems.length);
        updateSubtotal(); // Update subtotal after quantity change
    }
}

// Function to update price and type
function updatePriceAndType(index, type, amountInput) {
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    if (cartItems[index]) {
        cartItems[index].type = type;
        cartItems[index].amountInput = parseFloat(amountInput) || 0;

        if (type === "Markup") {
            cartItems[index].price = Number(cartItems[index].srp) + Number(cartItems[index].amountInput);
            let click = new Audio('click_button.mp3'); 
            click.play();
        } else if (type === "Discount") {
            cartItems[index].price = Number(cartItems[index].srp) - Number(cartItems[index].amountInput);
            let click = new Audio('click_button.mp3'); 
            click.play();
        }

        if (cartItems[index].price < 0) cartItems[index].price = 0;
        cartItems[index].totalAmount = cartItems[index].price * cartItems[index].qty;
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
        displayCartItems();
        updateCounter(cartItems.length);
        updateSubtotal(); // Update subtotal after price and type change
    }
}

// Function to display cart items
function displayCartItems() {
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    var tableBody = document.getElementById('cartTableBody');
    tableBody.innerHTML = '';

    if (cartItems.length === 0) {
        var emptyRow = document.createElement('tr');
        emptyRow.innerHTML = `<td colspan="11">
            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; height: 100%;">
                <p style="margin-top: 28px; color: ">Cart is empty</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" style="margin-bottom: 70px;" fill="gainsboro" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg>
            </div>
        </td>`;
        tableBody.appendChild(emptyRow);
    } else {
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
                    <div class="btn-group w-100" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-light btn-decrement">-</button>
                        <input type="number" class="form-control qty w-50 text-center" value="${item.qty}" maxlength="7" >
                        <button type="button" class="btn btn-light btn-increment">+</button>
                    </div>
                </td>
                <td>
                    <div class="input-group w-100">
                        <input type="text" class="form-control text-center w-25 amount-input" id="amountInput${index}" value="${item.amountInput}" placeholder="" maxlength="7">
                        <select class="form-select" style="width: 25%;" aria-label="Default select example" onchange="updatePriceAndType(${index}, this.value, document.getElementById('amountInput${index}').value)">
                            <option ${item.type === "Markup" ? "selected" : ""}>Markup</option>
                            <option ${item.type === "Discount" ? "selected" : ""}>Discount</option>
                        </select>
                    </div>
                </td>
                <td>₱ ${Number(item.price).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
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

            newRow.querySelector('.btn-decrement').addEventListener('click', function() {
                updateCartItemQuantity(index, -1);
            });
            newRow.querySelector('.btn-increment').addEventListener('click', function() {
                updateCartItemQuantity(index, 1);
            });

            var qtyInputElement = newRow.querySelector('.form-control');
            qtyInputElement.addEventListener('change', function() {
                var newQty = this.value;
                updateCartItemQuantity(index, newQty - item.qty);
            });

            var amountInputElement = newRow.querySelector('.amount-input');
            amountInputElement.addEventListener('blur', function() {
                var amountInput = this.value;
                var type = newRow.querySelector('select').value;
                updatePriceAndType(index, type, amountInput);
            });

            amountInputElement.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9.]/g, '');
                if (this.value.split('.').length > 2) {
                    this.value = this.value.replace(/\.+$/, "");
                }
            });

            amountInputElement.addEventListener('keydown', function(event) {
                if (event.key === '-' || event.key === '+') {
                    event.preventDefault();
                }
            });
        });
    }

    updateCounter(cartItems.length);
    updateSubtotal(); // Update subtotal when displaying cart items
}

// Function to update the counter
function updateCounter(count) {
    var counterElement = document.getElementById('counter');
    if (counterElement) {
        counterElement.textContent = count;
    }
}

// Call the displayCartItems function to initially display cart items
displayCartItems();
updateCounter(JSON.parse(sessionStorage.getItem('cartItems'))?.length || 0);

// Function to remove item from cart
function removeFromCart(index) {
    let click = new Audio('delete.mp3');
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    cartItems.splice(index, 1);
    click.play();
    alertify.set('notifier', 'position', 'bottom-left');
    alertify.error('Remove Items');
    sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
    displayCartItems();
    updateCounter(cartItems.length);
    updateSubtotal(); // Update subtotal after removing an item
}
