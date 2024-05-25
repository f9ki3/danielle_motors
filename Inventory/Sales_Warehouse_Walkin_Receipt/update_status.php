<?php
include '../../config/config.php';

// Check if the necessary POST data is set
if (isset($_POST['transaction_code'])) {
    $transactionID = mysqli_real_escape_string($conn, $_POST['transaction_code']);

    // Prepare and bind SQL statement to update the status in purchase_transactions table
    $stmt_purchase_transactions = $conn->prepare("UPDATE purchase_transactions SET status = 2 WHERE TransactionID = ?");
    $stmt_purchase_transactions->bind_param("s", $transactionID);

    // Execute the statement for purchase_transactions
    if ($stmt_purchase_transactions->execute()) {
        echo "Status updated successfully in purchase_transactions";

        // Prepare and bind SQL statement to update the status in purchase_cart table
        $stmt_purchase_cart = $conn->prepare("UPDATE purchase_cart SET status = 2 WHERE TransactionID = ?");
        $stmt_purchase_cart->bind_param("s", $transactionID);

        // Execute the statement for purchase_cart
        if ($stmt_purchase_cart->execute()) {
            echo "Status updated successfully in purchase_cart";
        } else {
            echo "Error updating status in purchase_cart: " . $conn->error;
        }

        // Close the statement for purchase_cart
        $stmt_purchase_cart->close();
    } else {
        echo "Error updating status in purchase_transactions: " . $conn->error;
    }

    // Close the statement for purchase_transactions
    $stmt_purchase_transactions->close();
} else {
    echo "Error: Transaction code not provided";
}

// Close the database connection
$conn->close();
?>
