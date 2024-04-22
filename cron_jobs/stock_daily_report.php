<?php
include "../database/database.php"; // Include the database connection file

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
        $check_report_sql = "SELECT id FROM reports WHERE report_name = 'stocks report' AND report_type = 'daily' AND date_generated = '$dateYesterdayFormat' AND branch_code = '$brn_code'";
        $check_report_result = $conn->query($check_report_sql);

        if($check_report_result->num_rows<1){
            // Insert a new report if it doesn't exist
            $insert_to_reports = "INSERT INTO reports SET report_name = 'stocks report', report_type = 'daily', date_generated = '$dateYesterdayFormat', branch_code = '$brn_code', publish_by = '11'";

            if($conn->query($insert_to_reports) === TRUE ){
                echo "successfully inserted to reports table<br>";
                // Get the ID of the inserted report
                $report_id = $conn->insert_id;

                // SQL query to select stocks
                $stocks_sql = "SELECT * FROM stocks WHERE branch_code = '$brn_code'";
                $stocks_result = $conn->query($stocks_sql);

                if($stocks_result->num_rows>0){
                    // Loop through each stock
                    while($stock = $stocks_result->fetch_assoc()){
                        // Assign stock details to variables
                        $stock_id = $stock['id'];
                        $stock_product_id = $stock['product_id'];
                        $stock_branch_code = $stock['branch_code'];
                        $stock_expiration_date = $stock['expiration_date'];
                        $stock_rack_location = $stock['rack_loc_id'];
                        $stock_qty = $stock['stocks'];
                        $stock_pending_order = $stock['pending_order'];
                        $stock_date_added = $stock['date_added'];
                        $stock_publish_by = $stock['publish_by'];
                        $stock_successful_stock_out_qty = $stock['successful_stock_out_qty'];

                        // Insert stock details into report_stocks table
                        $insert_to_stock_report = "INSERT INTO report_stocks SET report_id = '$report_id', product_id = '$stock_product_id', branch_code = '$stock_branch_code', expiration_date = '$stock_expiration_date', rack_loc_id = '$stock_rack_location', stocks = '$stock_qty', pending_order = '$stock_pending_order', date_added = '$stock_date_added', publish_by = '$stock_publish_by', successful_stock_out_qty = '$stock_successful_stock_out_qty'";

                        if($conn->query($insert_to_stock_report) === TRUE ){
                            echo "successfully inserted to report_stocks table.<br>";
                            $update_stock_out = "UPDATE stocks SET successful_stock_out_qty = 0 WHERE id = '$stock_id'";
                            if($conn->query($update_stock_out) === TRUE ){
                                echo "stock out updated successfully to 0.<br>";
                            } else {
                                echo "cant update stocks table<br>";
                            }
                        } else {
                            echo "error inserting to stock_report table.<br>";
                        }
                    }
                } else {
                    // Delete the report if no stocks found
                    $delete_report = "DELETE FROM reports WHERE report_name = 'stocks report' AND report_type = 'daily' AND date_generated = '$dateYesterdayFormat' AND branch_code = '$brn_code'";
                    if($conn->query($delete_report) === TRUE){
                        echo "successfuly deleted.<br>";
                    } else {
                        echo "error deleting report.<br>";
                    }
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

$conn->close(); // Close the database connection
exit(); // Exit the script
?>
