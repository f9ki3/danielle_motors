$(document).ready(function() {
    // Attach event listener to the input field
    $("#select_product").on('change', function() {
        // Retrieve the current value of the input field
        var select = $(this).val();
        // Split the value by "-"
        var words = select.split("-");
        // Get the id
        var product_id = words[0];
        
        
        // Make an AJAX request to fetch the price
        $.ajax({
            url: '../php/get_price.php', // Your PHP script to retrieve the price
            type: 'POST', // You can use POST or GET depending on your implementation
            data: {product_id: product_id}, // Send the product ID to PHP script
            success: function(response) {
                // Assuming the response is the price
                var price = response;
                // Do something with the price, like updating a div
                $("#price").val(price);
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });
});
