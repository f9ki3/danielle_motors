<?php
include '../config/config.php';

// Check if the necessary POST data is set
if (isset($_POST['productId'], $_POST['qty_sent'])) {
    // Sanitize and validate input data
    $product_id = intval($_POST['productId']); // Convert to integer
    $quantity = intval($_POST['qty_sent']); // Convert to integer
    
    // Initialize variables to keep track of remaining quantity
    $remaining_quantity = $quantity;

    $stocks_sql = "SELECT * FROM stocks WHERE product_id = '$product_id' AND branch_code='DMP 000' ORDER BY rack_loc_id ASC";
    $stocks_res = $conn->query($stocks_sql);

    if ($stocks_res->num_rows > 0) {
        while ($row = $stocks_res->fetch_assoc()) {
            $stocks = $row['stocks'];
            $rack_loc = $row['rack_loc_id'];
            $pending_order = $row['pending_order'];

            // Calculate the quantity to be deducted from this rack
            $deducted_quantity = min($remaining_quantity, $stocks);
            
            // Calculate the new stocks after deduction
            $new_stocks = max(0, $stocks - $deducted_quantity); // Ensure new stocks is not negative

            // Update the stocks for this rack
            $update_stocks = "UPDATE stocks SET stocks = '$new_stocks' WHERE product_id = '$product_id' AND rack_loc_id = '$rack_loc'";
            $conn->query($update_stocks);

            // Calculate the new pending order after deduction
            $new_pending_order = $pending_order + $deducted_quantity;

            // Update the pending order for this rack
            $update_pending_order = "UPDATE stocks SET pending_order = '$new_pending_order' WHERE product_id = '$product_id' AND rack_loc_id = '$rack_loc' AND branch_code='DMP 000'";
            $conn->query($update_pending_order);

            // Update remaining quantity
            $remaining_quantity -= $deducted_quantity;

            // Check if remaining quantity is 0 or less, then break out of the loop
            if ($remaining_quantity <= 0) {
                break;
            }
        }

        // Check if all requested quantity has been fulfilled
        if ($remaining_quantity <= 0) {
            echo "Stocks updated successfully!";
        } else {
            echo "Error: Not enough stocks available to fulfill the request.";
        }
    } else {
        echo "Error: No stocks found for the given product ID.";
    }
} else {
    echo "Error: Missing POST data";
}
?>
