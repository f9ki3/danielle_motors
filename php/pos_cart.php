<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Cart</title>
<!-- Include Bootstrap for styling -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Cart Items</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>SRP</th>
                <th>Models</th>
                <th>Brand</th>
                <th>Unit</th>
            </tr>
        </thead>
        <tbody id="cartItemsList">
            <!-- Cart items will be populated here -->
        </tbody>
    </table>
</div>

<script>
// Retrieve cart items from session storage
var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];

// Display cart items in the table
var cartItemsList = document.getElementById('cartItemsList');
cartItems.forEach(function(item) {
    var row = document.createElement('tr');
    row.innerHTML = `
        <td>${item.productName}</td>
        <td>${item.srp}</td>
        <td>${item.models}</td>
        <td>${item.brand}</td>
        <td>${item.unit}</td>
    `;
    cartItemsList.appendChild(row);
});
</script>

</body>
</html>
