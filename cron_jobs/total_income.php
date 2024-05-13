<?php
// Include the database connection file
include "../database/database.php";

// Set the default timezone to Asia/Manila (Philippines)
date_default_timezone_set('Asia/Manila');

// Get the current timestamp
$currentTimestamp = time();

// Get the timestamp for yesterday (subtract 24 hours)
$yesterdayTimestamp = $currentTimestamp - (24 * 3600); // 24 hours * 3600 seconds per hour

// Format the current timestamp to display date and time
$dateWithTimestampFormat = date('Y-m-d H:i:s', $currentTimestamp);

// Format the timestamp for yesterday to display only date in year-month-date format
$dateYesterdayFormat = date('Y-m-d', $yesterdayTimestamp);

// Format the current timestamp to display only date in year-month-date format
$dateTodayFormat = date('Y-m-d', $currentTimestamp);

// Check if the current time is 1:30 in the afternoon
$timecheck = date('H:i', $currentTimestamp) >= '02:00';

// Output whether it's 1:30 PM or not
if ($timecheck) {
    // SQL query to select branch codes
    $branch_Sql = "SELECT brn_code FROM branch";
    $branch_result = $conn->query($branch_Sql);

    if($branch_result->num_rows>0){
        // Fetch branch code
        $branch = $branch_result->fetch_assoc();
        $brn_code = $branch['brn_code'];

        // Check if a report with specified conditions already exists
        $check_report_sql = "SELECT id FROM reports WHERE report_name = 'daily_income' AND report_type = 'daily' AND date_generated = '$dateYesterdayFormat' AND branch_code = '$brn_code'";
        $check_report_result = $conn->query($check_report_sql);

        if($check_report_result->num_rows<1){
            // Insert a new report if it doesn't exist
            $insert_to_reports = "INSERT INTO reports SET report_name = 'daily_income', report_type = 'daily', date_generated = '$dateYesterdayFormat', branch_code = '$brn_code', publish_by = '0'";

            if($conn->query($insert_to_reports) === TRUE ){
                echo "successfully inserted to reports table<br>";
                // Get the ID of the inserted report
                $report_id = $conn->insert_id;

                // SQL query to retrieve purchase transactions for yesterday
                $cx_receipt_sql = "SELECT pt.*, pc.* 
                                    FROM purchase_transactions AS pt
                                    LEFT JOIN purchase_cart AS pc ON pc.TransactionID = pt.TransactionID
                                    WHERE DATE(pt.TransactionDate) = '$dateYesterdayFormat'
                                    ORDER BY pt.TransactionDate ASC";
                $cx_receipt_res = $conn -> query($cx_receipt_sql);
                if($cx_receipt_res->num_rows>0){
                    while($resibo = $cx_receipt_res->fetch_assoc()){
                        // Retrieve data for each transaction
                        $receipt_product_id = $resibo['ProductID'];
                        $receipt_qty = $resibo['Quantity'];
                        $receipt_total_amount = $resibo['TotalAmount'];
                        $receipt_discount = $resibo['Discount'];
                        $receipt_discount_type = $resibo['DiscountType'];
                        $receipt_computation_status = $resibo['computation_status'];
                        $receipt_computed_qty = $resibo['computed_qty'];
                        
                        // Calculate final amount per product considering discounts
                        if($receipt_discount_type == "%"){
                            $per_product_computation = $receipt_total_amount / $receipt_qty;
                            $final_per_product_computation = ($receipt_discount / 100) * $per_product_computation;
                        } else {
                            $per_product_computation = $receipt_total_amount / $receipt_qty;
                            $final_per_product_computation = $per_product_computation - $receipt_discount;
                        }
                        $amount_per_product = $final_per_product_computation;
                        
                        // Check if computation status is not OK
                        if($receipt_computation_status !== "OK"){

                            // Using a for loop to print numbers from 1 to 10
                            for ( $i = $receipt_computed_qty; $i <= $receipt_qty; $i++) {
                                // Retrieve data from delivery receipt for further computation
                                $dr_sql = "SELECT dr.*, drc.*
                                FROM delivery_receipt AS dr
                                JOIN delivery_receipt_content AS drc ON drc.delivery_receipt_id = dr.id
                                WHERE drc.product_id = '$receipt_product_id' AND drc.computation_status != 'OK'
                                ORDER BY dr.received_date ASC
                                LIMIT 1";
                                $dr_res = $conn->query($dr_sql);
                                if($dr_res->num_rows>0){
                                    // Fetch data from delivery receipt
                                    $drc = $dr_res->fetch_assoc();
                                    $drc_id = $drc['delivery_receipt_id'];
                                    $drc_product_id = $drc['product_id'];
                                    $drc_qty = $drc['quantity'];
                                    $drc_puhunan = $drc['orig_price'];

                                    // Calculate profit per product
                                    $puhunan_per_product = $amount_per_product - $drc_puhunan;
                                } else {
                                    // Handle scenario when there's no delivery receipt for the product
                                }

                                if($i == $receipt_qty){
                                    
                                }
                            }
                            // ---------------------
                            

                        } else {
                            // Handle scenario when computation status is OK
                        }
                    }
                } else {    
                    // Handle error when there are no purchase transactions
                }
            } else {
                echo "error inserting the report<br>";
            } // End of inserting the report
        } else {
            echo "report already exist<br>";
        }
    } else {
        echo "no data on branch table<br>";
    }
} else {
    echo "not yet greater that 02:00 am<br>";
}

// Close the database connection
$conn->close();

// Exit the script
exit();
?>
