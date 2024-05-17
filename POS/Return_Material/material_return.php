<?php

// Assuming $conn is your database connection object

// Fetch data from the database
$branch_code;

$query = "SELECT 
            mt.material_invoice,
            mt.material_date,
            mt.material_cashier,
            mt.material_recieved_by,
            mt.material_inspected_by,
            mt.material_verified_by
          FROM 
            material_transfer mt
          WHERE
            mt.declined = 2
            AND mt.branch_code = '$branch_code'
          ORDER BY
            mt.material_date DESC";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr onclick="redirectToMaterialTransfer(\'' . htmlspecialchars($row["material_invoice"]) . '\');">';
        echo '<td class="invoice align-middle ps-2">' . htmlspecialchars($row["material_invoice"]) . '</td>';
        echo '<td class="material_date align-middle">' . htmlspecialchars($row["material_date"]) . '</td>';
        echo '<td class="material_cashier align-middle">' . htmlspecialchars($row["material_cashier"]) . '</td>';
        echo '<td class="material_received_by align-middle text-start fw-semi-bold">' . htmlspecialchars($row["material_recieved_by"]) . '</td>';
        echo '<td class="material_inspected_by align-middle">' . htmlspecialchars($row["material_inspected_by"]) . '</td>';
        echo '<td class="material_verified_by align-middle">' . htmlspecialchars($row["material_verified_by"]) . '</td>';
        echo '</tr>';
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();

?>

<script>
function redirectToMaterialTransfer(materialInvoice) {
    var materialTransaction = encodeURIComponent(materialInvoice);
    window.location.href = '../Return_Warehouse_View/?material_transaction=' + materialTransaction;
}
</script>
