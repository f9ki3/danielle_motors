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
        totalAmount: totalAmount // Total amount calculation
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
    
        // Check if cart is empty
        if (cartItems.length === 0) {
            var emptyRow = document.createElement('tr');
            emptyRow.innerHTML = `<td colspan="9">
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; height: 100%;">
                    <p style="margin-top: 44px; color: ">Cart is empty</p>
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
                            <button type="button" class="btn btn-light" onclick="updateQuantity(${index}, ${item.qty - 1})">-</button>
                            <input type="number" class="form-control w-75 text-center" value="${item.qty}" onchange="updateQuantity(${index}, this.value)" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(parseFloat(this.value) < 0) this.value = 1;" maxlength="7">
                            <button type="button" class="btn btn-light" onclick="updateQuantity(${index}, ${item.qty + 1})">+</button>
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
        let click = new Audio('delete.mp3'); // Replace 'path_to_your_audio_file.mp3' with the actual path to your audio file
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        cartItems.splice(index, 1); // Remove item at specified index
        click.play();
        alertify.set('notifier', 'position', 'bottom-left');
        alertify.error('Remove Items');
        sessionStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update session storage
        displayCartItems(); // Update displayed cart items
        updateCounter(cartItems.length); // Update counter
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
    }


    
   // Function to update the quantity of an item in the cart
    function updateQuantity(index, newQuantity) {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        // Create an audio element
        let click = new Audio('click_button.mp3'); // Replace 'path_to_your_audio_file.mp3' with the actual path to your audio file
        
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
    }


    // Function to console log all cart items
    function consoleLogCartItems() {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        console.log("Cart Items:");
        console.log(cartItems);
    }

    // Call the function to console log all cart items
    consoleLogCartItems();

     // Function to calculate and display subtotal
     function calculateSubtotal() {
        var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
        var subtotal = cartItems.reduce((acc, item) => acc + item.totalAmount, 0); // Calculate subtotal
        
        // Display subtotal in the specified element
        document.getElementById('subtotal').textContent = "PHP " + subtotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    // Call the function to calculate and display subtotal
    calculateSubtotal();