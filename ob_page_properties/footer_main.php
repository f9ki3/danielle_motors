<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="vendors/popper/popper.min.js"></script>
<script src="vendors/bootstrap/bootstrap.min.js"></script>
<script src="vendors/anchorjs/anchor.min.js"></script>
<script src="vendors/is/is.min.js"></script>
<script src="vendors/fontawesome/all.min.js"></script>
<script src="vendors/lodash/lodash.min.js"></script>
<script src="polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
<script src="vendors/list.js/list.min.js"></script>
<script src="vendors/feather-icons/feather.min.js"></script>
<script src="vendors/dayjs/dayjs.min.js"></script>
<script src="assets/js/phoenix.js"></script>
<script src="assets/js/flatpickr.js"></script>
<script src="vendors/choices/choices.min.js"></script>
<script src="vendors/echarts/echarts.min.js"></script>
<script src="assets/js/regions.js"></script>
<script src="vendors/sortablejs/sortable.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script>
    // Function to load content from notification.php into the specified div
    function loadNotification() {
        $.ajax({
            url: 'page_properties/notification.php', // URL of the PHP file
            success: function(response) {
                // Update the content of the specified div with the response from notification.php
                $('#notification_display').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Log the error message to the console
                console.log("Error loading notification:", error);
                // Handle errors here (if needed)
            }
        });
    }

    // Call the loadNotification function when the page loads
    $(document).ready(function() {
        loadNotification(); // Initial loading
        // Optionally, you can set a timer to periodically update the content
        setInterval(loadNotification, 5000); // Refresh every 5 seconds (adjust the interval as needed)
    });
</script> -->
<script>
    // Simulating content loading delay
    setTimeout(function() {
        // Replace spinner with actual content
        document.getElementById('initialContent').style.display = 'none';
        document.getElementById('actualContent').style.display = 'block';
    }, 1500); // Change 3000 to the actual loading time in milliseconds
</script>


