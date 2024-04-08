<?php
include "../../database/database.php";

// Check if product_id is set and not empty
if (isset($_POST['barcodeInput']) && !empty($_POST['barcodeInput'])) {
    // Prepare the SQL statement
    $sql = "SELECT id FROM product WHERE barcode = ? LIMIT 1";
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bind_param("s", $_POST['barcodeInput']);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a row is found
    if ($row = $result->fetch_assoc()) {
        $product_id = $row['id'];
        // Output the product id
        echo json_encode(array("product_id" => $product_id));
    } else {
        // Output if product not found
        echo json_encode(array("error" => "Product not found"));
    }

    // Close the statement
    $stmt->close();
} else {
    // Output if barcodeInput is not set or empty
    echo json_encode(array("error" => "Barcode input is required"));
}
?>
