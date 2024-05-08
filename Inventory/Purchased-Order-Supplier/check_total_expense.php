<?php
// Include necessary files (ensure proper security measures)
include "../../admin/session.php";
include "../../database/database.php";

// Establish database connection
// Assuming $conn is properly initialized elsewhere in your code

// Set timezone
date_default_timezone_set('Asia/Manila');

// Get current month
$current_month = date('m');

// Query to check total expenses for the current month
$check_total_expenses = "
    SELECT SUM(drc.total) AS total_expenses_this_month
    FROM delivery_receipt AS dr
    INNER JOIN delivery_receipt_content AS drc ON dr.id = drc.delivery_receipt_id
    WHERE SUBSTRING(dr.received_date, 4, 2) = ?";
$stmt = $conn->prepare($check_total_expenses);
$stmt->bind_param('s', $current_month);
$stmt->execute();
$result = $stmt->get_result();

// Initialize variables
$total_expenses_this_month = 0;
$current_expenses = 0;

if($result && $result->num_rows > 0){
    $row = $result->fetch_assoc();
    $total_expenses_this_month = $row['total_expenses_this_month'];
    $current_expenses = $total_expenses_this_month;
}

// Fetch expense limits for the branch (assuming $branch_code is defined elsewhere)
$expense_limit_sql = "SELECT * FROM expense_limit WHERE branch_code = ? LIMIT 1";
$stmt = $conn->prepare($expense_limit_sql);
$stmt->bind_param('s', $branch_code);
$stmt->execute();
$expense_limit_res = $stmt->get_result();

$warning = 10000000000; // Default warning limit
$limit = 10000000000; // Default expense limit

if($expense_limit_res && $expense_limit_res->num_rows > 0){
    $expense = $expense_limit_res->fetch_assoc();
    $warning = $expense['warning_expense'];
    $limit = $expense['limit_expense'];
}

// Determine response based on current expenses
if($current_expenses >= $limit){
    $response = "limit";
} elseif($current_expenses >= $warning) {
    $response = "warning";
} else {
    $response = "ok";
}
// Send response as JSON
echo json_encode($response);

// Close prepared statements and database connection
$stmt->close();
$conn->close();
exit();
?>
