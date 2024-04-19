<?php
// Assuming $conn is your database connection object

$query = 'SELECT 
            mt.id,
            mt.material_invoice,
            mt.material_date,
            mt.material_cashier,
            mt.material_received_by,
            mt.material_inspected_by,
            mt.material_verified_by
          FROM 
            material_transfer mt';

$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($id, $material_invoice, $material_date, $material_cashier, $material_received_by, $material_inspected_by, $material_verified_by);

    while ($stmt->fetch()) {
        echo '<tr>';
        echo '<td class="product align-middle ps-2">' . htmlspecialchars($material_invoice) . '</td>';
        echo '<td class="price align-middle"><span class="badge badge-phoenix badge-phoenix-primary">' . htmlspecialchars($material_date) . '</span></td>';
        echo '<td class="tags align-middle">' . htmlspecialchars($material_cashier) . '</td>';
        echo '<td class="vendor align-middle text-start fw-semi-bold">' . htmlspecialchars($material_received_by) . '</td>';
        echo '<td class="unit align-middle">' . htmlspecialchars($material_inspected_by) . '</td>';
        echo '<td class="model align-middle">' . htmlspecialchars($material_verified_by) . '</td>';
        echo '<td class="text-center align-middle text-end pe-0 ps-4 btn-reveal-trigger">
                <button class="btn me-3 btn-primary rounded-5 m-0 p-2"><span class="fas fa-cart-plus"></span></button>
            </td>';
        echo '</tr>';
    }
    $stmt->close(); // Close the statement after use
} else {
    // Handle prepare error
    echo 'Error in preparing SQL statement.';
}
?>
