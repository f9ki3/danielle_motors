<?php
include '../../config/config.php';

// Check if connection is successful
if ($conn->connect_error) {
    die(json_encode(array('error' => "Connection failed: " . $conn->connect_error)));
}

$sql = "SELECT DATE_FORMAT(TransactionDate, '%M') as month, SUM(Subtotal) as total_subtotal 
        FROM purchase_transactions 
        GROUP BY DATE_FORMAT(TransactionDate, '%Y-%m')
        ORDER BY MONTH(TransactionDate)";
$result = $conn->query($sql);

$data = array();

if ($result) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data['month'][] = $row['month'];
            $data['total_sales'][] = $row['total_subtotal'];
        }
    } else {
        $data = array('message' => 'No data found');
    }
} else {
    $data = array('error' => $conn->error);
}

header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>