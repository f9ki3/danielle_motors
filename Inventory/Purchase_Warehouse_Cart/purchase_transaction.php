<?php
// Establish database connection (replace these variables with your actual database credentials)
// $servername = "sql.freedb.tech";
// $username = "freedb_dmp_master";
// $password = "8@YASU8ypbA2uA%";
// $dbname = "freedb_dmp_db";

// $servername = "localhost";       // Localhost kasi dun na tayo sa files sa hostinger mag eedit
// $username = "u680032315_dmp";    // Bale live development na kasi alam ko hindi pwede ma access outside
// $password = "Dmpoffice2023";     // Yung DB ng hostinger
// $dbname = "u680032315_dmp_db";   // We will be using FTP and GitAccess

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

include '../../config/config.php';

// Function to generate a unique TransactionID
function generateTransactionID() {
    return "DMP" . mt_rand(1000000, 9999999); // Generate DMP+7 random digits
}

// Prepare data received from AJAX request
$transaction_customer_name = $_POST['transaction_customer_name'];
$transaction_date = $_POST['transaction_date'];
$transaction_address = $_POST['transaction_address'];
$transaction_verified = $_POST['transaction_verified'];
$transaction_inspected = $_POST['transaction_inspected'];
$transaction_received = $_POST['transaction_received'];
$transaction_payment = $_POST['transaction_payment'];
$transaction_type = $_POST['transaction_type'];
$subtotal = $_POST['subtotal'];
$tax = $_POST['tax'];
$discount = $_POST['discount'];
$total = $_POST['total'];
$amountPayment = $_POST['amountPayment'];
$change = $_POST['change'];
$cartItems = $_POST['cartItems'];

// Generate TransactionID
$transaction_id = generateTransactionID();

// Insert data into purchase_transactions table
$sql = "INSERT INTO purchase_transactions (TransactionID, CustomerName, TransactionDate, TransactionAddress, TransactionVerifiedBy, TransactionInspectedBy, TransactionReceivedBy, TransactionPaymentMethod, TransactionType, Subtotal, Tax, Discount, Total, Payment, ChangeAmount) 
        VALUES ('$transaction_id', '$transaction_customer_name', '$transaction_date', '$transaction_address', '$transaction_verified', '$transaction_inspected', '$transaction_received', '$transaction_payment', '$transaction_type', '$subtotal', '$tax', '$discount', '$total', '$amountPayment', '$change')";

if ($conn->query($sql) === TRUE) {
    // Insert data into purchase_cart table
    foreach ($cartItems as $item) {
        $product_id = $item['productId'];
        $product_name = $item['productName'];
        $brand = $item['brandName'];
        $model = $item['models'];
        $quantity = $item['qty'];
        $unit = $item['unitName'];
        $srp = $item['srp'];
        $discount = $item['discount'];
        $discount_type = isset($item['discountType']) && !empty($item['discountType']) ? $item['discountType'] : '₱';
        $total_amount = $item['totalAmount'];
        $sql_cart = "INSERT INTO purchase_cart (ProductID, TransactionID, ProductName, Brand, Model, Quantity, Unit, SRP, Discount, DiscountType, TotalAmount) 
                     VALUES ('$product_id', '$transaction_id', '$product_name', '$brand', '$model', '$quantity', '$unit', '$srp', '$discount', '$discount_type', '$total_amount')";
        $conn->query($sql_cart);
    }
    echo $transaction_id; // Echoing the transaction ID as response


    //for FIFO ng stocks
    foreach ($cartItems as $item) {
        $product_id = $item['productId'];
        $quantity = $item['qty'];
        $branch_code = "WAREHOUSE";

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

    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
