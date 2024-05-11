<?php
include "../admin/session.php";
include_once "../database/database.php";
date_default_timezone_set('Asia/Manila');
$currentDateTime = date('Y-m-d H:i:s');
$user_id = $id;


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary form fields are set
    if (isset($_POST['supp']) && isset($_POST['qty'])) {
        // Get the selected supplier ID and product amount
        $supp = $_POST['supp'];
        $qty = $_POST['qty'];

        // Loop through each selected supplier and quantity
        for ($i = 0; $i < count($supp); $i++) {
            // Separate the supplier ID and product amount
            list($supplier_id, $product_amount) = explode(', ', $supp[$i]);
            $quantity = $qty[$i];
            $product_id = $_POST['product_id'][$i];

            

            // Calculate the time one minute ago
            $oneMinuteAgo = date('Y-m-d H:i:s', strtotime('-3 minute'));

            // Prepare SQL query to check if there are any rows with publish_on within the last minute
            $check_saved_sql = "SELECT COUNT(*) AS count FROM purchased_order WHERE publish_on >= '$oneMinuteAgo' AND supplier_id = '$supplier_id'";

            // Execute the query
            $check_saved_result = $conn->query($check_saved_sql);

            // Check if there are any rows within the last minute
            if ($check_saved_result->num_rows > 0) {
                $row = $check_saved_result->fetch_assoc();
                $count = $row["count"];
                
                if ($count > 0) {
                    echo "There is data saved within the last minute.<br>";
                    // Prepare SQL query to check if there are any rows with publish_on within the last minute
                    $get_last_po = "SELECT po_id, supplier_id FROM purchased_order WHERE supplier_id = '$supplier_id' AND branch_code = '$branch_code' ORDER BY id DESC LIMIT 1";
                    $get_Res = $conn->query($get_last_po);
                    $last_po = $get_Res -> fetch_assoc();
                    $last_purchased_order = $last_po['po_id'];
                    $last_supplier_id = $last_po['supplier_id'];
                } else {
                    echo "There is no data saved within the last minute.<br>";
                    // Check if there is an existing row in the table
                    $result = mysqli_query($conn, "SELECT MAX(po_id) AS max_po_id FROM purchased_order");
                    $row = mysqli_fetch_assoc($result);

                    if ($row['max_po_id'] === null) {
                        // If no existing row, set $po_id to 1000
                        $po_id = 1000;
                    } else {
                        // If existing row(s) found, increment the maximum po_id value by 1
                        $po_id = $row['max_po_id'] + 1;
                    }
                    
                    $insert_to_purchased_order = "INSERT INTO purchased_order SET po_id = '$po_id', supplier_id = '$supplier_id', `status` = 1, requested_by = '$user_id', branch_code = '$branch_code'";
                    if($conn->query($insert_to_purchased_order)=== TRUE){
                        echo "successfully inserted";
                        $last_purchased_order = $po_id;
                    }
                    $last_supplier_id = $supplier_id;
                }
            }
            echo '<br>' . $last_purchased_order . '<br>';
            if($last_supplier_id === $supplier_id){
                echo $last_supplier_id . " is equal to " . $supplier_id;
                $insert_content = "INSERT INTO purchased_order_content_wh (po_id, product_id, order_qty, est_amount) VALUES ('$last_purchased_order', '$product_id', '$quantity', '$product_amount')";
                if($conn->query($insert_content)===TRUE){
                    echo "successfully inserted to purchased order content wh";
                } else {
                    echo "error";
                }
            } else {
                echo $last_supplier_id . " is NOT equal to " . $supplier_id;
            }
            

            // Now you can use $supplier_id, $product_amount, and $quantity as separate variables
            echo "Supplier ID: $supplier_id, Product Amount: $product_amount, Quantity: $quantity <br>";
            // Or perform any other action with these variables
        }
    } else {
        // Handle if the necessary form fields are not set
        echo "Error: Form fields not set.";
    }
} else {
    // Form not submitted
    echo "Form not submitted.";
}

// header("Location: ../Inventory/Purchased-Order-Supplier/?error=success");
$conn->close();
exit();
?>
