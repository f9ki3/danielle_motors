<?php
include '../config/config.php';

// Check if the necessary POST data is set
if (isset($_POST['productId'], $_POST['input_srp'], $_POST['input_selling_price'], $_POST['qty_added'], $_POST['material_invoice_id'])) {
    // Sanitize and validate input data
    $productId = intval($_POST['productId']); // Convert to integer
    $inputSrp = floatval($_POST['input_srp']); // Convert to float
    $inputSellingPrice = floatval($_POST['input_selling_price']); // Convert to float
    $qtyAdded = intval($_POST['qty_added']); // Convert to integer
    $materialInvoiceId = mysqli_real_escape_string($conn, $_POST['material_invoice_id']);
    
    // Compute markupPeso
    $markupPeso = $inputSellingPrice - $inputSrp;

    // Prepare the SQL statement to insert into material_transaction table
    $sql = "INSERT INTO material_transaction (product_id, material_invoice_id, input_srp, input_selling_price, qty_added, markup_peso) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters to the statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "isdddi", $productId, $materialInvoiceId, $inputSrp, $inputSellingPrice, $qtyAdded, $markupPeso);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Material transaction saved successfully!";
    } else {
        echo "Error saving material transaction: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle case where required POST data is not set
    echo "Error: Required data not provided";
}

// Close the database connection
mysqli_close($conn);
?>
