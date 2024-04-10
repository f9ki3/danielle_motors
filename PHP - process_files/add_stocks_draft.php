<?php
include "../admin/session.php";
include "../database/database.php";
date_default_timezone_set('Asia/Manila');
$currentDateTime = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Open database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $rack_id = $_POST['rack_id'];
        $rack_qty = $_POST['qty'];

        // Use prepared statement to prevent SQL injection
        $check_product_id_sql = "SELECT * FROM stocks_draft WHERE product_id = ? AND ware_loc_id = ? AND branch_code = ?";
        $stmt = $conn->prepare($check_product_id_sql);
        $stmt->bind_param("sss", $product_id, $rack_id, $branch_code);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            echo "duplicate entry";
        } else {
            // Insert new product
            $insert_data = "INSERT INTO stocks_draft (product_id, ware_loc_id, product_qty, user_id, date_added, branch_code) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_data);
            $stmt->bind_param("ssssss", $product_id, $rack_id, $rack_qty, $user_id, $currentDateTime, $branch_code);
            if($stmt->execute()) {
                echo "Product added successfully";
            } else {
                echo "Error adding product: " . $conn->error;
            }
        }

        // Close prepared statement
        $stmt->close();
    } elseif (isset($_POST['product_name'])) {
        $product_name = $_POST['product_name'];
        echo $product_name . " tangina";
    } else {
        echo "No product ID or product name provided";
    }

    // Close database connection
    $conn->close();
    exit();
}
?>
