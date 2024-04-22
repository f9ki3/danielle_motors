<?php
// Set the timezone to Philippines
date_default_timezone_set('Asia/Manila');

// Check if today is the 1st day of the month
if(date('j') == 1) {
    // Check if it's 3 am
    if(date('G') == 3) {
        // If it's the 1st day of the month and it's 3 am, get yesterday's date
        $yesterday = date('Y-m-d', strtotime('yesterday'));
        echo "Yesterday's date at 3 am: $yesterday 03:00:00";
    } else {
        echo "It's the 1st day of the month, but it's not 3 am yet.";
    }
} else {
    echo "It's not the 1st day of the month.";
}
?>
