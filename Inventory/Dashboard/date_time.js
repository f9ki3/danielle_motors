$(document).ready(function() {
  // Function to update the time
  function updateTime() {
      // Get the current date and time
      var now = new Date();

      // Array of month names
      var monthNames = ["January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
      ];

      // Array of day names
      var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

      // Format the time (12-hour format)
      var hours = now.getHours() % 12 || 12; // Convert 24-hour to 12-hour format
      var minutes = now.getMinutes();
      var ampm = now.getHours() >= 12 ? 'PM' : 'AM';

      var month = monthNames[now.getMonth()]; // Get month name
      var day = now.getDate();
      var year = now.getFullYear();
      var dayName = dayNames[now.getDay()]; // Get day name

      // Construct the formatted date string
      var formattedDate = dayName + ", " + month + " " + day + ", " + year;

      // Update the time in the HTML
      $('.realtime-time').text(hours + ':' + (minutes < 10 ? '0' : '') + minutes + ' ' + ampm);
      $('.realtime-date').text(formattedDate);
  }

  // Update the time initially
  updateTime();

  // Update the time every second
  setInterval(updateTime, 1000);
});
