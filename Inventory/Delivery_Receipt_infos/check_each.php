<?php 
session_start();

// Ensure $_SESSION['dr_id'] is set
if (!isset($_SESSION['dr_id'])) {
    $response = "incomplete";
} else {
    $dr_id = $_SESSION['dr_id'];

    include "../../database/database.php"; // Include database connection

    // Prepare and execute the SQL query using prepared statements
    $check_each_data = "SELECT discount FROM delivery_receipt_content WHERE delivery_receipt_id = ?";
    $stmt = $conn->prepare($check_each_data);
    $stmt->bind_param("s", $dr_id);
    $stmt->execute();
    $check_each_data_res = $stmt->get_result();

    if ($check_each_data_res->num_rows > 0) {
        $checker = 0;

        while ($row = $check_each_data_res->fetch_assoc()) {
            $discount = $row['discount'];
            if (!isset($discount)) {
                $checker += 1;
            }
        }

        if ($checker >= 1) {
            $response = "incomplete";
        } else {
            $response = "completed";
        }
    } else {
        $response = "incomplete";
    }

    // Close database connection
    $stmt->close();
    $conn->close();
}

// Return JSON response
echo json_encode($response);
exit;
?>
