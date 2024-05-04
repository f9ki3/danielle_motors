<button id="startButton">Start</button>
<button id="lololoading"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></button>
<div class="display-here" id="display-here"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to execute the AJAX request
        function executeAjaxRequest() {
            $.ajax({
                url: 'qr_fix.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Update the content of the div with the response
                    $('#display-here').text(response);
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any errors that occur during the AJAX request
                }
            });
        }

        // When the button is clicked
        $('#startButton').click(function() {
            // Execute the AJAX request
            executeAjaxRequest();
            // Set interval to trigger the AJAX request every 10 milliseconds
            setInterval(executeAjaxRequest, 10);
        });
    });
</script>
