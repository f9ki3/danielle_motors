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
        if ($row['status'] == 2) {
            echo "<td><input type='checkbox' name='product_checkbox[]' value='{$row['ProductID']}' style='max-width: 50px; height: 50px'></td>";
        } else {
            echo "<td></td>";
        }
        echo "<input type='hidden' name='product_id[]' value='{$row['ProductID']}'>";
        echo "<td>" . $row["ProductName"] . "</td>";
        echo "<td>" . $row["Brand"] . "</td>";
        echo "<td>" . $row["Model"] . "</td>";
        echo "<td>" . $row["Quantity"] . "</td>";
        // Styled input field for quantity return with max and min attributes to limit input
        echo "<td><input type='number' name='quantity_return[]' class='form-control quantity-return' min='0' max='" . $row["Quantity"] . "' value='0' onchange='computeTotalRefund(this)'></td>";
        echo "<td>" . $row["SRP"] . "</td>";
        // Styled input field for refund amount
        echo "<td><input type='number' name='refund_amount[]' class='form-control refund-amount' min='0' max='" . $row["SRP"] . "' value='" . $row["SRP"] . "' onchange='computeTotalRefund(this)'></td>";
        // Span to display the computed total refund amount
        echo "<td><span class='total-refund'>₱0.00</span></td>";
        // Hidden input field to store the total refund amount
        echo "<input type='hidden' name='total_refund_amount[]' value='0'>";
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
