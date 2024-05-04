<button id="startButton">start</button>
<!-- <button id="lololoading" disabled><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></button> -->
<div class="display-brand-here" id="display-brand-here"></div>
<div class="display-category-here" id="display-category-here"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to execute the AJAX request
        function executeAjaxRequest() {
            $.ajax({
                url: 'brand_fix.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Update the content of the div with the response
                    $('#display-brand-here').text(response);
                    // Check if both brand and category updates are completed
                    if ($('#display-brand-here').text().trim() === 'update brand completed!' && $('#display-category-here').text().trim() === 'update of category complete!') {
                        // If both updates are completed, enable the start button
                        $('#startButton').prop('disabled', false).text('Start');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any errors that occur during the AJAX request
                }
            });
        }

        // Function to execute the AJAX request for category
        function executecategory() {
            $.ajax({
                url: 'category_fix.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Update the content of the div with the response
                    $('#display-category-here').text(response);
                    // Check if both brand and category updates are completed
                    if ($('#display-brand-here').text().trim() === 'update brand completed!' && $('#display-category-here').text().trim() === 'update of category complete!') {
                        // If both updates are completed, enable the start button
                        $('#startButton').prop('disabled', false).text('Start');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any errors that occur during the AJAX request
                }
            });
        }

        // When the button is clicked
        $('#startButton').click(function() {
            // Disable the button and change its text to Loading...
            $(this).prop('disabled', true).text('Loading...');
            // Execute the AJAX request for brand
            executeAjaxRequest();
            // Execute the AJAX request for category
            executecategory();
            // Set interval to trigger the AJAX request every 10 milliseconds
            setInterval(function() {
                executeAjaxRequest();
                executecategory();
            }, 500);
        });
    });
</script>
