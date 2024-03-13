<?php
include '../config/config.php';

// Check if 'newId' key is set in the $_POST array
if(isset($_POST['newId'])) {
    // Retrieve data from the AJAX request
    $newId = $_POST['newId'];
    $materialDate = $_POST['materialDate'];
    $materialInvoiceNo = $_POST['materialInvoiceNo'];
    $cashierName = $_POST['cashierName'];
    $receivedBy = $_POST['receivedBy'];
    $inspectedBy = $_POST['inspectedBy'];
    $verifiedBy = $_POST['verifiedBy'];

    // Update data in the database using the new ID
    $sql = "UPDATE material_transfer 
            SET material_date = '$materialDate', 
                material_invoice = '$materialInvoiceNo', 
                material_cashier = '$cashierName', 
                material_recieved_by = '$receivedBy', 
                material_inspected_by = '$inspectedBy', 
                material_verified_by = '$verifiedBy' 
            WHERE id = $newId";

    echo "SQL Query: " . $sql;

    // Update data in the database
    if (mysqli_query($conn, $sql)) {
        echo "Data updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Handle the case when 'newId' key is not set
    echo "Error: 'newId' key is not set in the POST request.";
}

mysqli_close($conn);
?>
