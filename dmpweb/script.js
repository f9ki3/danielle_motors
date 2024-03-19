// Define products array
let products = [
    {
        id: 'fullFaceHelmet',
        name: 'Full Face Helmet',
        category: 'Helmets',
        price: 199.99,
        description: 'Description of Full Face Helmet. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
    },
    {
        id: 'modularHelmet',
        name: 'Modular Helmet',
        category: 'Helmets',
        price: 249.99,
        description: 'Description of Modular Helmet. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
    }
];

let cartItems = 0;
let cart = [];

function addToCart(productId, productName, price) {
    cartItems++;
    document.getElementById('cart-items').textContent = cartItems;
    cart.push({ id: productId, name: productName, price: price });
    console.log(`Added ${productName} to cart`);
}

function showCart() {
    let modal = document.getElementById('cart-modal');
    let cartList = document.getElementById('cart-list');
    let total = 0;
    cartList.innerHTML = ''; // Clear previous cart items
    cart.forEach(item => {
        let li = document.createElement('li');
        li.textContent = `${item.name} - $${item.price}`;
        let removeBtn = document.createElement('button');
        removeBtn.textContent = 'Remove';
        removeBtn.onclick = function() {
            removeFromCart(item.id);
        };
        li.appendChild(removeBtn);
        cartList.appendChild(li);
        total += item.price;
    });
    document.getElementById('cart-total').textContent = `$${total.toFixed(2)}`;
    modal.style.display = 'block';
}

function closeCart() {
    let modal = document.getElementById('cart-modal');
    modal.style.display = 'none';
}

function searchProducts() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const filteredProducts = products.filter(product => {
        return (
            product.name.toLowerCase().includes(searchInput) || 
            product.category.toLowerCase().includes(searchInput)
        );
    });
    renderProducts(filteredProducts);
}

function showAccountOptions() {
    let modal = document.getElementById('account-options-modal');
    modal.style.display = 'block';
}

function closeAccountOptions() {
    let modal = document.getElementById('account-options-modal');
    modal.style.display = 'none';
}

function removeFromCart(productId) {
    const index = cart.findIndex(item => item.id === productId);
    if (index !== -1) {
        cart.splice(index, 1); // Remove the item from the cart array
        updateCartDisplay(); // Update the cart display
    }
}

function updateCartDisplay() {
    let cartList = document.getElementById('cart-list');
    let total = 0;
    cartList.innerHTML = ''; // Clear previous cart items
    cart.forEach(item => {
        let li = document.createElement('li');
        li.textContent = `${item.name} - $${item.price}`;
        let removeBtn = document.createElement('button');
        removeBtn.textContent = 'Remove';
        removeBtn.onclick = function() {
            removeFromCart(item.id);
        };
        li.appendChild(removeBtn);
        cartList.appendChild(li);
        total += item.price;
    });
    document.getElementById('cart-total').textContent = `$${total.toFixed(2)}`;
}
