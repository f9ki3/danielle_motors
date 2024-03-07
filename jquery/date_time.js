$(document).ready(function() {
    // Function to update the time
    function updateTime() {
      // Get the current date and time
      var now = new Date();
      
      // Format the time (12-hour format)
      var hours = now.getHours() % 12 || 12; // Convert 24-hour to 12-hour format
      var minutes = now.getMinutes();
      var ampm = now.getHours() >= 12 ? 'PM' : 'AM';
      
      // Format the date
      var month = now.getMonth() + 1; // Month is zero-based
      var day = now.getDate();
      var year = now.getFullYear();
      
      // Update the time in the HTML
      $('.realtime-time').text(hours + ':' + (minutes < 10 ? '0' : '') + minutes + ' ' + ampm);
      $('.realtime-date').text(month + '/' + day + '/' + year);
    }
    
    // Update the time initially
    updateTime();
    
    // Update the time every second
    setInterval(updateTime, 1000);
  });