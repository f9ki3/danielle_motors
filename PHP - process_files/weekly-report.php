<?php
    include "../database/database.php";

    date_default_timezone_set('Asia/Manila');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $json = array();
        $daily_sales = 0;

        $current_date = date('Y-m-d');
        $current_date_2 = date('d/m/Y');

        $query = 'SELECT DATE(date_range.Date) AS Date, COALESCE(SUM(Total), 0) AS TotalSales 
          FROM (
              SELECT CURDATE() - INTERVAL a.a DAY AS Date
              FROM (
                  SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6
              ) AS a
          ) AS date_range
          LEFT JOIN purchase_transactions ON DATE(purchase_transactions.TransactionDate) = DATE(date_range.Date)
          WHERE date_range.Date >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
          GROUP BY DATE(date_range.Date)';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->bind_result($date, $sales);
        $json['sales'] = array();
        $json['date'] = array();
        while ($stmt->fetch()) {
            $json['date'][] = date('F j, Y', strtotime($date));
            $json['sales'][] = $sales;
        }
        $stmt->close();

        $query = 'SELECT DATE(date) AS Date, SUM(amount) AS TotalSales 
          FROM expenses 
          WHERE date >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) 
          AND date < CURDATE() 
          AND type = ? 
          GROUP BY DATE(date)';
        $stmt = $conn->prepare($query);
        $type = 'Daily';
        $stmt->bind_param('s', $type);
        $stmt->execute();
        $stmt->bind_result($date, $expense);
        $json['expenses'] = array();
        while ($stmt->fetch()) {
            $json['expenses'][] = $expense;
        }
        $stmt->close();

        $query = 'SELECT DATE_FORMAT(STR_TO_DATE(received_date, "%d/%m/%Y"), "%Y-%m-%d") AS date,
                 SUM(delivery_receipt_content.price * delivery_receipt_content.quantity) AS total_delivery 
          FROM delivery_receipt 
          INNER JOIN delivery_receipt_content ON delivery_receipt_content.delivery_receipt_id = delivery_receipt.id 
          WHERE STR_TO_DATE(received_date, "%d/%m/%Y") >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
          GROUP BY DATE_FORMAT(STR_TO_DATE(received_date, "%d/%m/%Y"), "%Y-%m-%d")';

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->bind_result($date, $delivery);
        $json['delivery'] = array();
        while ($stmt->fetch()) {
            $json['delivery'][] = $delivery;
        }
        $stmt->close();

        $conn->close();
        echo json_encode($json);
    }
?>