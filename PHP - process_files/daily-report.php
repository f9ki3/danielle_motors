<?php
    include "../database/database.php";

    date_default_timezone_set('Asia/Manila');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $json = array();
        $daily_sales = 0;

        $current_date = date('Y-m-d');
        $current_date_2 = date('d/m/Y');

        $yesterday_date = date('Y-m-d', strtotime('-1 day', strtotime($current_date)));

        $query = 'SELECT Total FROM purchase_transactions WHERE DATE(TransactionDate) = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $yesterday_date);
        $stmt->execute();
        $stmt->bind_result($sales);
        while ($stmt->fetch()) {
            $daily_sales += $sales;
        }
        $stmt->close();

        $json['sales'] = $daily_sales; // Daily Total Sales

        $daily_expense = 0;

        $query = 'SELECT amount FROM expenses WHERE DATE(date) = ? AND type = ?';
        $stmt = $conn->prepare($query);
        $type = 'Daily';
        $stmt->bind_param('ss', $current_date, $type);
        $stmt->execute();
        $stmt->bind_result($expense);
        while ($stmt->fetch()) {
            $daily_expense += $expense;
        }
        $stmt->close();

        $json['expenses'] = $daily_expense; // Daily Total Expense

        $query = 'SELECT delivery_receipt.id,
                        delivery_receipt_content.price, 
                        delivery_receipt_content.quantity 
                FROM delivery_receipt
                INNER JOIN delivery_receipt_content ON delivery_receipt_content.delivery_receipt_id = delivery_receipt.id
                WHERE received_date = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $current_date_2);
        $stmt->execute();
        $stmt->bind_result($id, $price, $qty);
        $daily_delivery = 0;
        while ($stmt->fetch()) {
            $delivery = $price * $qty;
            $daily_delivery += $delivery;
        }
        $stmt->close();

        $json['delivery'] = $daily_delivery;

        $conn->close();
        echo json_encode($json);
    }
?>