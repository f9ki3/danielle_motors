<?php
    include "../database/database.php";

    date_default_timezone_set('Asia/Manila');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $json = array();
        $daily_sales = 0;

        $current_date = date('Y-m-d');
        $current_date_2 = date('d/m/Y');

        $query = 'SELECT DATE(TransactionDate) AS Date, SUM(Total) AS TotalSales FROM purchase_transactions WHERE TransactionDate >= DATE_SUB(?, INTERVAL 1 WEEK) GROUP BY DATE(TransactionDate)';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $current_date);
        $stmt->execute();
        $stmt->bind_result($date, $sales);
        $json['sales'] = array();
        while ($stmt->fetch()) {
            $json['sales'][] = $sales;
        }
        $stmt->close();

        $query = 'SELECT DATE(date) AS Date, SUM(amount) AS TotalSales FROM expenses WHERE date >= DATE_SUB(?, INTERVAL 1 WEEK) AND type = ? GROUP BY DATE(date)';
        $stmt = $conn->prepare($query);
        $type = 'Daily';
        $stmt->bind_param('ss', $current_date, $type);
        $stmt->execute();
        $stmt->bind_result($date, $expense);
        $json['expenses'] = array();
        $json['date'] = array();
        while ($stmt->fetch()) {
            $json['date'][] = date('F j, Y', strtotime($date));
            $json['expenses'][] = $expense;
        }
        $stmt->close();

        // $json['expenses'] = $daily_expense; // Daily Total Expense

        // $query = 'SELECT delivery_receipt.id,
        //                 delivery_receipt_content.price, 
        //                 delivery_receipt_content.quantity 
        //         FROM delivery_receipt
        //         INNER JOIN delivery_receipt_content ON delivery_receipt_content.delivery_receipt_id = delivery_receipt.id
        //         WHERE received_date = ?';
        // $stmt = $conn->prepare($query);
        // $stmt->bind_param('s', $current_date_2);
        // $stmt->execute();
        // $stmt->bind_result($id, $price, $qty);
        // $daily_delivery = 0;
        // while ($stmt->fetch()) {
        //     $delivery = $price * $qty;
        //     $daily_delivery += $delivery;
        // }
        // $stmt->close();

        // $json['delivery'] = $daily_delivery;

        $conn->close();
        echo json_encode($json);
    }
?>