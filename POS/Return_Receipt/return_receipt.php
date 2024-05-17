<?php 
// SQL query to retrieve cart items for the given transaction ID
$sql = "SELECT * FROM purchase_cart WHERE TransactionID = '$transactionID' AND status != '1'";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        // Checkbox with onchange event to toggle quantity input field
        echo "<td><input type='checkbox' name='product_checkbox[]' onchange='toggleQuantityInput(this)' style='max-width: 50px; height: 50px'></td>";
        echo "<td>" . $row["ProductName"] . "</td>";
        echo "<td>" . $row["Brand"] . "</td>";
        echo "<td>" . $row["Model"] . "</td>";
        echo "<td>" . $row["Quantity"] . "</td>";
        // Input field for quantity return with max and min attributes to limit input
        echo "<td><input type='number' name='quantity_return[]' min='0' max='" . $row["Quantity"] . "' onchange='computeTotalRefund(this)'></td>";
        echo "<td>" . $row["SRP"] . "</td>";
        // Input field for refund amount, initially disabled
        echo "<td><input type='text' name='refund_amount[]' min='0' value='" . $row["SRP"] . "' disabled></td>";
        // Span to display the computed total refund amount
        echo "<td><span class='total-refund'></span></td>";
        // Hidden input field to store the total refund amount
        echo "<input type='hidden' name='total_refund_amount[]'>";
        // Displaying the status column with interpretation
        $status_text = '';
        switch ($row['status']) {
            case 1: $status_text = 'Complete'; break;
            case 2: $status_text = 'Pending'; break;
            case 3: $status_text = 'Refund'; break;
            case 4: $status_text = 'Replace'; break;
            case 5: $status_text = 'Void'; break;
            default: $status_text = 'Unknown'; break;
        }
        echo "<td>" . $status_text . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
?>
