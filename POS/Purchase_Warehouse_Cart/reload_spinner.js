// Function to reload spinner for 3 seconds
function reloadSpinner() {
    // Show spinner
    document.getElementById('spinner').style.display = 'flex';
    // Hide content
    document.getElementById('content').style.display = 'none';
    
    // Set timeout to hide spinner and show content after 3 seconds
    setTimeout(function() {
        document.getElementById('spinner').style.display = 'none';
        document.getElementById('content').style.display = 'block';
    }, 2000); // 3000 milliseconds = 3 seconds
}

// Call the function to reload spinner
reloadSpinner();