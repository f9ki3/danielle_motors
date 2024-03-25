<?php
// Assuming you have established a connection to your database already
// and stored the connection object in $pdo

// Check if material_invoice_id is set and is not empty
if(isset($_POST['materiald']) && !empty($_POST['materiald'])) {
    // Sanitize the input to prevent SQL injection
    $material_invoice_id = $_POST['materiald'];

    // Prepare the SQL statement
    $sql = "SELECT 
                mt.product_id,
                mt.input_srp,
                mt.input_selling_price,
                mt.qty_added,
                mt.qty_sent,
                mt.markup_peso,
                mt.created_at,
                mt.status,
                p.name,
                p.models,
                p.code,
                p.image
            FROM 
                material_transaction mt
            JOIN 
                product p ON mt.product_id = p.id
            WHERE material_invoice_id = :material_invoice_id
            ORDER BY material_invoice_id"; // Sorting by material_invoice_id

    // Prepare and execute the statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':material_invoice_id', $material_invoice_id, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the results into an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output the results as JSON
    echo json_encode($results);
} else {
    // If material_invoice_id is not set or empty, return an empty array
    echo json_encode([]);
}
?>
