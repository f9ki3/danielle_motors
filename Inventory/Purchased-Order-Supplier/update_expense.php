<?php
include "../../admin/session.php";
include "../../database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming $branch_code is properly set before this point
    $warning = $_POST['warning_level'];
    $limit = $_POST['danger_level'];
    
    // Prepare and execute the SQL query
    $update_expense = "UPDATE expense_limit SET warning_expense = '$warning', limit_expense = '$limit' WHERE branch_code = '$branch_code'";
    
    if ($conn->query($update_expense) === TRUE) {
        $conn->close();
        header("Location: ../Purchased-Order-Supplier/?update=success");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
