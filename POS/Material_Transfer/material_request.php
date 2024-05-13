<?php
// Assuming $conn is your database connection object

$query = 'SELECT 
            mt.id,
            mt.material_invoice,
            mt.material_date,
            mt.material_cashier,
            mt.material_recieved_by,
            mt.material_inspected_by,
            mt.material_verified_by
          FROM 
            material_transfer mt
            ORDER BY
            mt.material_date DESC';

$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($id, $material_invoice, $material_date, $material_cashier, $material_received_by, $material_inspected_by, $material_verified_by);

    while ($stmt->fetch()) {
        echo '<tr onclick="redirectToMaterialTransfer(\'' . htmlspecialchars($material_invoice) . '\');">';
        echo '<td class="invoice align-middle ps-2">' . htmlspecialchars($material_invoice) . '</td>';
        echo '<td class="material_date align-middle">' . htmlspecialchars($material_date) . '</td>';
        echo '<td class="material_cashier align-middle">' . htmlspecialchars($material_cashier) . '</td>';
        echo '<td class="material_received_by align-middle text-start fw-semi-bold">' . htmlspecialchars($material_received_by) . '</td>';
        echo '<td class="material_inspected_by align-middle">' . htmlspecialchars($material_inspected_by) . '</td>';
        echo '<td class="material_verified_by align-middle">' . htmlspecialchars($material_verified_by) . '</td>';
        echo '<td class="align-middle text-center">';
        echo '<button class="btn btn-light rounded rounded-5 p-2" onclick="removeFromCart()">';
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">';
        echo '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>';
        echo '</svg>';
        echo '</button>';
        echo '</td>';
        echo '</tr>';
    }
    $stmt->close(); // Close the statement after use
} else {
    // Handle prepare error
    echo 'Error in preparing SQL statement.';
}
?>

<script>
function redirectToMaterialTransfer(materialInvoice) {
    var materialTransaction = encodeURIComponent(materialInvoice);
    window.location.href = '../Material_Transaction/?material_transaction=' + materialTransaction;
}
</script>
