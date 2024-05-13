<?php
$query = "SELECT * FROM purchase_transactions WHERE TransactionType = 'Walk-in' ORDER BY TransactionDate DESC";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result(); // Get result set

// Fetch data from the result set
while ($row = $result->fetch_assoc()) {
    $TransactionID = $row['TransactionID'];
    $CustomerName = $row['CustomerName'];
    $TransactionDate = $row['TransactionDate'];
    $TransactionAddress = $row['TransactionAddress'];
    $TransactionVerifiedBy = $row['TransactionVerifiedBy'];
    $TransactionInspectedBy = $row['TransactionInspectedBy'];
    $TransactionReceivedBy = $row['TransactionReceivedBy'];
    $TransactionPaymentMethod = $row['TransactionPaymentMethod'];
    $TransactionType = $row['TransactionType'];
    $Subtotal = $row['Subtotal'];
    $Tax = $row['Tax'];
    $Discount = $row['Discount'];
    $Total = $row['Total'];
    $Payment = $row['Payment'];
    $ChangeAmount = $row['ChangeAmount'];

    // Output the data
    echo '<tr class="transaction-row" style="cursor: pointer;" onclick="window.location.href=\'../Sales_Warehouse_Walkin_Receipt?transaction_code=' . $TransactionID . '\'">
    <td class="sort transaction-code white-space-nowrap align-middle" style="width: 5%;">' . $TransactionID . '</td>
    <td class="sort transaction-date white-space-nowrap align-middle" style="width: 15%;">' . $TransactionDate . '</td>
    <td class="sort customer-name align-middle text-start" style="width: 10%;">' . $CustomerName . '</td>
    <td class="sort payment-method align-middle text-start" style="width: 10%;">' . $TransactionPaymentMethod . '</td>
    <td class="sort subtotal align-middle text-start" style="width: 10%;"> ₱ ' . number_format($Subtotal, 2) . '</td>
    <td class="sort tax align-middle text-start" style="width: 5%;"> ₱ ' . number_format($Tax, 2) . '</td>
    <td class="sort discount align-middle text-start" style="width: 15%;"> ₱ ' . number_format($Discount, 2) . '</td>
    <td class="sort total align-middle text-start" style="width: 10%;"> ₱ ' . number_format($Total, 2) . '</td>
    <td class="sort payment align-middle text-start" style="width: 10%;"> ₱ ' . number_format($Payment, 2) . '</td>
    <td class="sort change align-middle text-start" style="width: 10%;"> ₱ ' . number_format($ChangeAmount, 2) . '</td>
</tr>';
}
?>
