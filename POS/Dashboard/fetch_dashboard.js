$(document).ready(function() {
    // Fetch data from fetch_dashboard.php
    $.ajax({
        url: 'fetch_dashboard.php', // URL of the PHP script
        type: 'GET', // HTTP method
        dataType: 'json', // Expected response data type
        success: function(response) {
            // Log the response to the console
            console.log(response);

            // Assign values to respective IDs and format numbers
            $('#total_delivery').text(new Intl.NumberFormat('en-PH').format(response.total_delivery));
            $('#total_product').text(new Intl.NumberFormat('en-PH').format(response.total_product));
            $('#total_sales').text(new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(response.total_sales));
            $('#total_supplier').text(new Intl.NumberFormat('en-PH').format(response.total_supplier));
            $('#total_customer').text(new Intl.NumberFormat('en-PH').format(response.total_walkin));
        },
        error: function(xhr, status, error) {
            // Log any error to the console
            console.error('Error fetching data:', status, error);
        }
    });
});
