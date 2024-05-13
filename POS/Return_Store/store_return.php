<?php
// Updated SQL query to fetch data from the table and sort by TransactionDate in descending order
$sql = "SELECT * FROM purchase_transactions WHERE TransactionType = 'Walk-in' ORDER BY TransactionDate DESC";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Output table header
    // echo '<table class="table table-hover">';
    // echo '<thead>';
    // echo '<tr>';
    // echo '<th scope="col" width="10%">Transaction Code</th>';
    // echo '<th scope="col" width="10%">Transaction Date</th>';
    // echo '<th scope="col" width="10%">Customer Name</th>';
    // echo '<th scope="col" width="10%">Payment Method</th>';
    // echo '<th scope="col" width="5%">Subtotal</th>';
    // echo '<th scope="col" width="5%">Tax</th>';
    // echo '<th scope="col" width="5%">Discount</th>';
    // echo '<th scope="col" width="5%">Total</th>';
    // echo '<th scope="col" width="5%">Payment</th>';
    // echo '<th scope="col" width="5%">Change</th>';
    // echo '</tr>';
    // echo '</thead>';
    // echo '<tbody>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr onclick=\"window.location='Return_Receipt.php?transaction_code=" . $row["TransactionID"] . "';\" style=\"cursor: pointer;\">";
        echo '<td>' . htmlspecialchars($row["TransactionID"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["TransactionDate"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["CustomerName"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["TransactionType"]) . '</td>';
        echo '<td>₱' . number_format($row["Subtotal"], 2) . '</td>';
        echo '<td>₱' . number_format($row["Tax"], 2) . '</td>';
        echo '<td>₱' . number_format($row["Discount"], 2) . '</td>';
        echo '<td>₱' . number_format($row["Total"], 2) . '</td>';
        echo '<td>₱' . number_format($row["Payment"], 2) . '</td>';
        echo '<td>₱' . number_format($row["ChangeAmount"], 2) . '</td>';
        echo '</tr>';
    }

    // echo '</tbody>';
    // echo '</table>';
} else {
    echo '<p>No transactions found.</p>';
}

// Close the database connection
$conn->close();
?>
</div>
</body>
</html>
