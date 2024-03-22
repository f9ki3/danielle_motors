<?php
// Establish database connection (replace these variables with your actual database credentials)
$servername = "sql.freedb.tech";
$username = "freedb_dmp_master";
$password = "8@YASU8ypbA2uA%";
$dbname = "freedb_dmp_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
        $product_id = $item['product_id'];
        $product_name = $item['product_name'];
        $brand = $item['brand'];
        $model = $item['model'];
        $quantity = $item['quantity'];
        $unit = $item['unit'];
        $srp = $item['srp'];
        $discount = $item['discount'];
        $discount_type = isset($item['discountType']) && !empty($item['discountType']) ? $item['discountType'] : '₱';
        $total_amount = $item['totalAmount'];
        $sql_cart = "INSERT INTO purchase_cart (ProductID, TransactionID, ProductName, Brand, Model, Quantity, Unit, SRP, Discount, DiscountType, TotalAmount) 
                     VALUES ('$product_id', '$transaction_id', '$product_name', '$brand', '$model', '$quantity', '$unit', '$srp', '$discount', '$discount_type', '$total_amount')";
        $conn->query($sql_cart);
    }
    echo $transaction_id; // Echoing the transaction ID as response
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
