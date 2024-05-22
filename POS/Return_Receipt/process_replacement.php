<?php
include "../../database/database.php";

// Fetch cart items for the given transaction ID
$sql = "SELECT * FROM purchase_cart WHERE TransactionID = '$transactionID' AND status != '1'";
$result = $conn->query($sql);

// Display the form with table
echo '<form id="refundForm" action="process_return.php" method="post">';
// Add the transactionID input field inside the form
echo '<input type="hidden" name="transactionID" value="' . $transactionID . '">'; // Add this line
echo '<input type="hidden" name="total_srp" value="' . $transactionDetails["Total"] . '">'; // Insert the hidden input field here
echo '<table class="table">';
echo '<thead>
        <tr>
            <th>Select</th>
            <th>Product Name</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Quantity</th>
            <th>Return Quantity</th>
            <th>SRP</th>
            <th>Refund Amount</th>
            <th>Total Refund</th>
            <th>Status</th>
        </tr>
      </thead>';
echo '<tbody>';

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
        echo "<td>{$row['ProductName']}</td>";
        echo "<td>{$row['Brand']}</td>";
        echo "<td>{$row['Model']}</td>";
        echo "<td>{$row['Quantity']}</td>";
        // Styled input field for quantity return with max and min attributes to limit input
        echo "<td><input type='number' name='quantity_return[]' class='form-control quantity-return' min='0' max='{$row['Quantity']}' value='0' onchange='computeTotalRefund(this)'></td>";
        echo "<td>{$row['SRP']}</td>";
        // Styled input field for refund amount
        echo "<td><input type='number' name='refund_amount[]' class='form-control refund-amount' min='0' max='{$row['SRP']}' value='{$row['SRP']}' onchange='computeTotalRefund(this)'></td>";
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
        echo "<td>{$status_text}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No results</td></tr>";
}
echo '</tbody>';
echo '</table>';

// Include the reason input and additional hidden fields
echo '<input type="text" id="reason_input" name="reason" class="form-control" placeholder="Enter reason to return" required>';
echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
echo '<input type="hidden" name="branch_code" value="' . $branch_code . '">';
echo '<input type="hidden" name="return_date" value="' . date('Y-m-d H:i:s') . '">';
echo '<input type="hidden" name="status" value="3">';
echo '</form>';
?>

<script>
// JavaScript function to handle form submission
function submitRefundForm(event) {
    event.preventDefault();
    
    // Retrieve values of input fields using JavaScript
    var reason = document.getElementById('reason_input').value;
    var subtotal = document.getElementById('subtotal').innerText;
    var refundAmount = document.getElementById('refund-amount').innerText;
    var totalReflected = document.getElementById('total-reflected').innerText;
    
    // Now you can proceed to use these values as needed, such as displaying, validating, or submitting them
    
    // For demonstration purposes, you can alert the values
    // alert("reason: " + reason + "\nSubtotal: " + subtotal + "\nRefund Amount: " + refundAmount + "\nTotal Reflected: " + totalReflected);
    if (reason === '') {
        alert('Please enter a reason for the return.');
        return;
    }
    document.getElementById('refundForm').submit();
}
</script>

<script>
// JavaScript to compute the total refund
function computeTotalRefund(element) {
    var row = element.closest('tr');
    var quantityReturn = row.querySelector('.quantity-return').value;
    var refundAmount = row.querySelector('.refund-amount').value;
    var totalRefund = quantityReturn * refundAmount;
    row.querySelector('.total-refund').innerText = '₱' + totalRefund.toFixed(2);
    row.querySelector('input[name="total_refund_amount[]"]').value = totalRefund;

    // Update refund amount display
    updateRefundAmount();
}

// Function to update the refund amount display
function updateRefundAmount() {
    var refundAmounts = document.querySelectorAll('.total-refund');
    var totalRefund = 0;
    refundAmounts.forEach(function(amount) {
        totalRefund += parseFloat(amount.innerText.replace('₱', '')) || 0;
    });
    document.getElementById('refund-amount').innerText = '₱' + totalRefund.toFixed(2);
}


</script>
