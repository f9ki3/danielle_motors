// function addToCart(productId, image, productName, supplierCode, brandName, unitName, models, srp, totalStocks) {
//     // Create an object to hold the item data
//     var cartItem = {
//         productId: productId,
//         image: image,
//         productName: productName,
//         supplierCode: supplierCode,
//         brandName: brandName,
//         unitName: unitName,
//         models: models,
//         srp: srp,
//         totalStocks: totalStocks,
//         qty: 1, // Default quantity
//         discount: 0 // Default discount
//     };
    
//     // Retrieve existing cart items from session storage
//     var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

//     // Check if the product already exists in the cart
//     var existingItem = cartItems.find(function(item) {
//         return item.productId === cartItem.productId;
//     });

//     if (existingItem) {
//         // If the product already exists, display an alert and do not add it again
//         alertify.set('notifier', 'position', 'bottom-left');
//         alertify.error('Already Added');
//     } else {
//         // Add new item to cart
//         cartItems.push(cartItem);

//         // Store updated cart items in session storage
//         sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
        
//         // Display a confirmation message
//         alertify.set('notifier', 'position', 'bottom-left');
//         alertify.success('Added Success');

//         // Update the counter
//         updateCounter(cartItems.length);
//     }
// }

// // Function to update the counter
// function updateCounter(count) {
//     var counterElement = document.getElementById('counter');
//     if (counterElement) {
//         counterElement.textContent = count; // Update counter to total items in the cart
//     }
// }

// // Initialize the counter with the number of items in the cart
// var initialCartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
// updateCounter(initialCartItems.length);


// // Function to display cart items in the table
// function displayCartItems() {
//     var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
//     var tableBody = document.getElementById('cartTableBody');

//     // Clear existing table content
//     tableBody.innerHTML = '';

//     // Loop through each cart item and append to the table
//     cartItems.forEach(function(item, index) {
//         var newRow = document.createElement('tr');
//         newRow.innerHTML = `
//             <td scope="row">${item.productName}</td>
//             <td scope="row">${item.models}</td>
//             <td>${item.brandName}</td>
//             <td>${item.unitName}</td>
//             <td>${item.totalStocks}</td>
//             <td>₱ ${item.srp}</td>
//             <td>
//                 <div class="btn-group" role="group" aria-label="Basic example">
//                     <button type="button" class="btn btn-light" onclick="updateQuantity(${index}, ${item.qty - 1})">-</button>
//                     <input type="number" class="form-control w-50 text-center" value="${item.qty}" onchange="updateQuantity(${index}, this.value)" oninput="this.value = this.value.replace(/[^1-9]/g, ''); if(parseFloat(this.value) < 0) this.value = 1;" maxlength="7">
//                     <button type="button" class="btn btn-light" onclick="updateQuantity(${index}, ${item.qty + 1})">+</button>
//                 </div>
//             </td>
//             <td>
//                 <div class="input-group">
//                     <input type="text" class="form-control text-center w-25" value="${item.discount}" placeholder="" onchange="updateDiscount(${index}, this.value)" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); if(parseFloat(this.value) < 0) this.value = 0;" maxlength="7">
//                     <select class="form-select" style="width: auto;" aria-label="Default select example" onchange="updateDiscountType(${index}, this.value)">
//                         <option ${item.discountType === "." ? "selected" : ""}>₱</option>
//                         <option ${item.discountType === "%" ? "selected" : ""}>%</option>
//                     </select>
//                 </div>
//             </td>
//             <td style="color: ${item.totalAmount <= 0 ? 'red' : 'inherit'};">${new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(item.totalAmount)}</td>
//             <td>
//                 <button class="btn btn-light rounded rounded-5 p-2" onclick="removeFromCart(${index})">
//                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
//                         <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
//                     </svg>
//                 </button>
//             </td>
//         `;
//         tableBody.appendChild(newRow);
//     });
// }

// // Call the displayCartItems function to initially display cart items
// displayCartItems();