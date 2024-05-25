<?php
include "../../database/database.php";

// Fetch cart items for the given transaction ID
$sql = "SELECT * FROM purchase_cart WHERE TransactionID = '$transactionID' AND status NOT IN ('1', '5', '4')";
$result = $conn->query($sql);

// Check if the status is 3, if so, disable the input fields
$disabled = ($transactionDetails['status'] == 3) ? 'disabled' : '';

// Fetch transaction details
$transactionDetailsSql = "SELECT * FROM purchase_transactions WHERE TransactionID = '$transactionID'";
$transactionDetailsResult = $conn->query($transactionDetailsSql);
$transactionDetails = $transactionDetailsResult->fetch_assoc();

// Fetch cart items for the given transaction ID
$sql = "SELECT * FROM purchase_cart WHERE TransactionID = '$transactionID' AND status NOT IN ('1', '4', '5')";
$result = $conn->query($sql);

// If disabled, fetch return quantity and reason from returns_customer table
if ($disabled) {
    $returnSql = "SELECT qty, reason FROM returns_customer WHERE transactionID = '$transactionID' AND status = 3";
    $returnResult = $conn->query($returnSql);
    $returnData = $returnResult->fetch_assoc();

    // Assign values if found, otherwise keep them as empty strings
    $qty = $returnData['qty'] ?? '';
    $reason = $returnData['reason'] ?? '';
} else {
    $qty = '';
    $reason = '';
}

// Display the form with table
echo '<form id="refundForm" action="process_return.php" method="post">';
echo '<input type="hidden" name="transactionID" value="' . $transactionID . '">';
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
            <th>Paid Amount</th>
            <th>Refund Amount</th>';
if ($disabled) {
    // If $disabled is true, render this
} else {
    // If $disabled is false, render this
    echo '<th>Total Refund</th>';
}
echo '<th>Status</th>
        </tr>
      </thead>';
echo '<tbody>';


// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $paidAmount = $row["TotalAmount"] / $row["Quantity"]; // Calculate PaidAmount
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
        echo "<td><input type='number' name='quantity_return[]' class='form-control quantity-return' min='0' max='{$row['Quantity']}' value='{$qty}' onchange='computeTotalRefund(this)' $disabled></td>";
        echo "<td>₱ " . number_format($paidAmount, 2) . "</td>"; // Display PaidAmount
        echo "<td><input type='number' name='refund_amount[]' class='form-control refund-amount' min='0' value='{$paidAmount}' onchange='computeTotalRefund(this)' disabled></td>";  
        if ($disabled) {
            // If disabled, hide
        } else {
            // If not disabled, just generate the input field without populating it
            echo "<td><span class='total-refund'>₱0.00</span></td>";
        }
        echo "<input type='hidden' name='total_refund_amount[]' value='0'>";
        // Styled input field for refund amount
        // if ($disabled) {
        //     // If disabled, populate the input field with the reason and disable it
        //     echo "<td><input type='number' name='refund_amount[]' class='form-control refund-amount' min='0' value='{$paidAmount}' onchange='computeTotalRefund(this)' disabled></td>";  
        // } else {
        //     // If not disabled, just generate the input field without populating it
        //     echo "<td><input type='number' name='refund_amount[]' class='form-control refund-amount' min='0' max='{$row['SRP']}' value='{$paidAmount}' onchange='computeTotalRefund(this)' disabled></td>";
        // }
        // Span to display the computed total refund amount
   

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
    echo "<tr><td colspan='11'>No results</td></tr>";
}
echo '</tbody>';
echo '</table>';

// Check if the reason input field is disabled
if ($disabled) {
    // If disabled, populate the input field with the reason and disable it
    echo '<input type="text" name="reason" id="reason_input" class="form-control mb-2 w-100" placeholder="Enter reason to return" value="' . htmlspecialchars($reason) . '" required disabled>';   
} else {
    // If not disabled, just generate the input field without populating it
    echo '<input type="text" id="reason_input" name="reason" class="form-control" placeholder="Enter reason to return" required>';
}

// Include the reason input and additional hidden fields
// echo '<input type="text" id="reason_input" name="reason" class="form-control" placeholder="Enter reason to return" required>';
echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
echo '<input type="hidden" name="branch_code" value="' . $branch_code . '">';
echo '<input type="hidden" name="return_date" value="' . date('Y-m-d H:i:s') . '">';
echo '<input type="hidden" name="status" value="3">';
echo '</form>';

$isStatusFive = ($transactionDetails['status'] != 2) ? 'true' : 'false';
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
    
    // Check if the reason is empty
    if (reason === '') {
        swal("Error", "Please enter a reason for the return.", "error");
        return;
    }

    // Use SweetAlert to confirm submission
    swal({
        title: "Are you sure?",
        text: "Do you want to submit this return?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willSubmit) => {
        if (willSubmit) {
            document.getElementById('refundForm').submit();
        }
    });
}

// function computeTotalRefund(element) {
//     var row = element.closest('tr');
//     var quantityReturn = row.querySelector('.quantity-return').value;
//     var paidAmount = parseFloat(row.querySelector('td:nth-child(8)').innerText.replace('₱', '').trim()); // Get Paid Amount from the table cell
//     var totalRefund = quantityReturn * paidAmount;
//     row.querySelector('.total-refund').innerText = '₱' + totalRefund.toFixed(2);
//     row.querySelector('input[name="total_refund_amount[]"]').value = totalRefund;
   
//     // Update refund amount display
//     updateRefundAmount();
// }


// JavaScript to compute the total refund nung partial pa
function computeTotalRefund(element) {
    var row = element.closest('tr');
    var quantityReturn = row.querySelector('.quantity-return').value;
    var paidAmount = row.querySelector('td:nth-child(8)').innerText.replace('₱', '').trim(); // Get Paid Amount from the table cell
    var totalRefund = quantityReturn * paidAmount;
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

       // JavaScript function to handle form submission success
       function handleFormSubmissionSuccess() {
        // Redirect to the next page
       window.location.href = '../Return_Receipt/?transaction_code=<?php echo $transactionID; ?>';
    }
       </script>
   