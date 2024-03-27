<?php
// Check if all required parameters are set
if (isset($_POST['materialDate'], $_POST['materialInvoiceNo'], $_POST['cashierName'], $_POST['receivedBy'], $_POST['inspectedBy'], $_POST['verifiedBy'])) {

    // Convert and sanitize input data
    $materialDate = $_POST['materialDate'];
    $materialInvoiceNo = $_POST['materialInvoiceNo'];
    $cashierName = $_POST['cashierName'];
    $receivedBy = $_POST['receivedBy'];
    $inspectedBy = $_POST['inspectedBy'];
    $verifiedBy = $_POST['verifiedBy'];

    // Perform necessary operations with the received data
    // For example, update the active column in the database
    
    // Sample query (replace with your actual query)
    $sql = "UPDATE your_table SET active = 0 WHERE materialInvoiceNo = ?";
    
    // Prepare and execute the SQL query
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $materialInvoiceNo);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Active column updated successfully!";
    } else {
        echo "Error updating active column: " . mysqli_error($conn);
    }
    
    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Handle case where not all required parameters are set
    echo "Error: Missing required parameters.";
}
?>
