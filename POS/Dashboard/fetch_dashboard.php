<?php
include '../../config/config.php';

// Array to hold the results
$response = array();

// Query 1: Total Walk-in
$query1 = "SELECT COUNT(branch_code) as 'total_walkin' FROM `purchase_transactions` WHERE branch_code='DMP -000' AND DATE(TransactionDate) = CURDATE() AND TransactionType='Walk-in'";
$result1 = $conn->query($query1);
if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
    $response['total_walkin'] = $row1['total_walkin'];
} else {
    $response['total_walkin'] = 0;
}

// Query 2: Total Delivery
$query2 = "SELECT COUNT(branch_code) as 'total_delivery' FROM `purchase_transactions` WHERE branch_code='DMP -000' AND DATE(TransactionDate) = CURDATE() AND TransactionType='Delivery'";
$result2 = $conn->query($query2);
if ($result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
    $response['total_delivery'] = $row2['total_delivery'];
} else {
    $response['total_delivery'] = 0;
}

// Query 3: Total Sales
$query3 = "SELECT SUM(total) as 'total_sales' FROM `purchase_transactions` WHERE branch_code='DMP -000' AND DATE(TransactionDate) = CURDATE()";
$result3 = $conn->query($query3);
if ($result3->num_rows > 0) {
    $row3 = $result3->fetch_assoc();
    $response['total_sales'] = $row3['total_sales'];
} else {
    $response['total_sales'] = 0;
}

// Query 4: Total Products
$query4 = "SELECT COUNT(id) as 'total_product' FROM `product`";
$result4 = $conn->query($query4);
if ($result4->num_rows > 0) {
    $row4 = $result4->fetch_assoc();
    $response['total_product'] = $row4['total_product'];
} else {
    $response['total_product'] = 0;
}

// Query 5: Total Suppliers
$query5 = "SELECT COUNT(id) as 'total_supplier' FROM `supplier`";
$result5 = $conn->query($query5);
if ($result5->num_rows > 0) {
    $row5 = $result5->fetch_assoc();
    $response['total_supplier'] = $row5['total_supplier'];
} else {
    $response['total_supplier'] = 0;
}

// Close conn
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
