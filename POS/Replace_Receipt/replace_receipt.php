<?php
include "../../database/database.php";

$transactionID = $_GET['transaction_code']; // Assuming you pass the transaction code via GET

// Fetch transaction details
$transactionDetailsSql = "SELECT * FROM purchase_transactions WHERE TransactionID = '$transactionID'";
$transactionDetailsResult = $conn->query($transactionDetailsSql);
$transactionDetails = $transactionDetailsResult->fetch_assoc();

// Fetch cart items for the given transaction ID
$sql = "SELECT * FROM purchase_cart WHERE TransactionID = '$transactionID' AND status NOT IN ('1', '2', '3')";
$result = $conn->query($sql);

// Fetch quantity and reason from replacements_customer
$replacementSql = "SELECT qty, reason FROM replacements_customer WHERE transactionID = '$transactionID' AND status = 5";
$replacementResult = $conn->query($replacementSql);
$replacementData = $replacementResult->fetch_assoc();

$qty = $replacementData['qty'] ?? '';
$reason = $replacementData['reason'] ?? '';

// Display the form with table
echo '<form id="refundForm" action="process_replacement.php" method="post">';
echo '<input type="hidden" name="transactionID" value="' . $transactionID . '">';
echo '<input type="hidden" name="total_srp" value="' . $transactionDetails["Total"] . '">';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        if ($row['status'] == 5) {
            echo "<td><input type='checkbox' name='product_checkbox[]' value='{$row['ProductID']}' style='max-width: 50px; height: 50px'></td>";
        } else {
            echo "<td></td>";
        }
        echo "<input type='hidden' name='product_id[]' value='{$row['ProductID']}'>";
        echo "<td>{$row['ProductName']}</td>";
        echo "<td>{$row['Brand']}</td>";
        echo "<td>{$row['Model']}</td>";
        echo "<td>{$row['Quantity']}</td>";
        echo "<td><input type='number' name='quantity_return[]' class='form-control quantity-return' min='0' max='{$row['Quantity']}' value='0' onchange='computeTotalRefund(this)'></td>";

        $status_text = '';
        switch ($row['status']) {
            case 1: $status_text = 'Complete'; break;
            case 2: $status_text = 'Pending'; break;
            case 3: $status_text = 'Refund'; break;
            case 4: $status_text = 'Replaced'; break;
            case 5: $status_text = 'For Replacement'; break;
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

echo '<input type="text" id="reason_input" name="reason" class="form-control mb-2 w-100" placeholder="Enter reason to return" value="' . htmlspecialchars($reason) . '" required>';
echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
echo '<input type="hidden" name="branch_code" value="' . $branch_code . '">';
echo '<input type="hidden" name="return_date" value="' . date('Y-m-d H:i:s') . '">';
echo '<input type="hidden" name="status" value="3">';
echo '</form>';

$isStatusFive = ($transactionDetails['status'] == 4) ? 'true' : 'false';
?>

<script>
 // JavaScript function to handle form submission
function submitRefundForm(event) {
    event.preventDefault();

    var reason = document.getElementById('reason_input').value;

    if (reason === '') {
        swal("Warning!", "Please enter a reason for the return.", "warning");
        return;
    }

    swal({
        title: "Are you sure?",
        text: "Do you want to proceed with the return?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willSubmit) => {
        if (willSubmit) {
            document.getElementById('refundForm').submit();
        }
    });
}

// Disable the replacement button if status is 5
document.addEventListener('DOMContentLoaded', function() {
    var isStatusFive = <?php echo $isStatusFive; ?>;
    if (isStatusFive) {
        document.getElementById('refundBtn').disabled = true;
    }
});
</script>
