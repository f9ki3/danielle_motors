<?php
include "../../admin/session.php";
include '../../config/config.php';

function generateTransactionID() {
    return "DMP" . mt_rand(1000000, 9999999); // Generate DMP+7 random digits
}

$user_account_id = $id;
$user_brn_code = $branch_code;
$transaction_customer_name = isset($_POST['transaction_customer_name']) ? $_POST['transaction_customer_name'] : '';
$transaction_date = isset($_POST['transaction_date']) ? $_POST['transaction_date'] : '';
$transaction_address = isset($_POST['transaction_address']) ? $_POST['transaction_address'] : '';
$transaction_verified = isset($_POST['transaction_verified']) ? $_POST['transaction_verified'] : '';
$transaction_inspected = isset($_POST['transaction_inspected']) ? $_POST['transaction_inspected'] : '';
$transaction_received = isset($_POST['transaction_received']) ? $_POST['transaction_received'] : '';
$transaction_payment = isset($_POST['transaction_payment']) ? $_POST['transaction_payment'] : '';
$transaction_type = isset($_POST['transaction_type']) ? $_POST['transaction_type'] : '';
$subtotal = isset($_POST['subtotal']) ? $_POST['subtotal'] : 0;
$tax = isset($_POST['tax']) ? $_POST['tax'] : 0;
$discount = isset($_POST['discount']) ? $_POST['discount'] : 0;
$total = isset($_POST['total']) ? $_POST['total'] : 0;
$amountPayment = isset($_POST['amountPayment']) ? $_POST['amountPayment'] : 0;
$change = isset($_POST['change']) ? $_POST['change'] : 0;
$cartItems = isset($_POST['cartItems']) ? $_POST['cartItems'] : [];

$transaction_id = generateTransactionID();

$sql = "INSERT INTO purchase_transactions (TransactionID, branch_code, CustomerName, TransactionDate, TransactionAddress, TransactionVerifiedBy, TransactionInspectedBy, TransactionReceivedBy, TransactionPaymentMethod, TransactionType, Subtotal, Tax, Discount, Total, Payment, ChangeAmount, status, cashier_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssddddddi", $transaction_id, $user_brn_code, $transaction_customer_name, $transaction_date, $transaction_address, $transaction_verified, $transaction_inspected, $transaction_received, $transaction_payment, $transaction_type, $subtotal, $tax, $discount, $total, $amountPayment, $change, $user_account_id);

if ($stmt->execute()) {
    foreach ($cartItems as $item) {
        $product_id = $item['productId'];
        $product_name = $item['productName'];
        $brand = $item['brandName'];
        $model = $item['models'];
        $quantity = $item['qty'];
        $unit = $item['unitName'];
        $srp = $item['price'];
        $discount = $item['amountInput'];
        $discount_type = $item['type'];
        $total_amount = $item['totalAmount'];
        
        $sql_cart = "INSERT INTO purchase_cart (ProductID, TransactionID, ProductName, Brand, Model, Quantity, Unit, SRP, Discount, DiscountType, TotalAmount, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";
        $stmt_cart = $conn->prepare($sql_cart);
        $stmt_cart->bind_param("sssssdssdss", $product_id, $transaction_id, $product_name, $brand, $model, $quantity, $unit, $srp, $discount, $discount_type, $total_amount);
        $stmt_cart->execute();
    }

    echo $transaction_id; // Echoing the transaction ID as response


    //for FIFO ng stocks
    foreach ($cartItems as $item) {
        $product_id = $item['productId'];
        $quantity = $item['qty'];

        // Update stocks in FIFO order
        $sql_stocks = "SELECT id, stocks FROM stocks 
                    WHERE branch_code = '$branch_code' 
                    AND product_id = '$product_id'
                    AND stocks > 0 
                    ORDER BY id ASC 
                    FOR UPDATE";

        $result = $conn->query($sql_stocks);
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        $remainingQuantity = $quantity;

        foreach ($rows as $row) {
            $id = $row['id'];
            $availableStock = $row['stocks'];
            $deductAmount = min($availableStock, $remainingQuantity);
            $remainingQuantity -= $deductAmount;

            // Deduct stock
            $sql_deduct = "UPDATE stocks 
                        SET stocks = stocks - $deductAmount 
                        WHERE id = $id";
            $conn->query($sql_deduct);

            if ($remainingQuantity <= 0) {
                break; // All requested quantity deducted
            }
        }

        // If there's remaining quantity, distribute it to another row
        if ($remainingQuantity > 0) {
            $sql_insert = "INSERT INTO stocks (branch_code, product_id, stocks) 
                        VALUES ('$branch_code', '$product_id', -$remainingQuantity)";
            $conn->query($sql_insert);
        }
    }
    $stmt_log = $conn->prepare("INSERT INTO `audit` (`id`, `audit_user_id`, `audit_date`, `audit_action`, `audit_description`, `user_brn_code`) VALUES (NULL, ?, ?, 'Purchase', 'Purchase Store', ?)");
    $stmt_log->bind_param("iss", $user_id, $currentTimestamp, $user_brn_code);
    $stmt_log->execute();
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>