<?php 
// Include database connection configuration
include '../../config/config.php';

// SQL query to fetch data
$sql = "SELECT * FROM purchase_transactions  WHERE TransactionDate BETWEEN 2024-04-08 AND 2024-04-23";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Define CSV file name
    $filename = "export.csv";

    // Set headers for file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Open output stream
    $output = fopen('php://output', 'w');

    // Get field names (headers)
    $fields = array_keys($result->fetch_assoc());

    // Write field names to CSV
    fputcsv($output, $fields);

    // Reset pointer to the beginning of the result set
    $result->data_seek(0);

    // Fetch data row by row
    while($row = $result->fetch_assoc()) {
        // Write each row to CSV file
        fputcsv($output, $row);
    }

    // Close output stream
    fclose($output);
    
    // Close MySQL connection
    $conn->close();

    exit(); // Stop further execution after downloading
} else {
    echo "No data found";
}

?>
