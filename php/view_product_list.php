<?php

// Assuming you have already established a database connection

try {
    $pdo = new PDO("mysql:host=localhost;dbname=dms_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Prepare and execute the SQL query
$sql = "SELECT 
            pl.id AS price_list_id,
            pl.dealer,
            pl.wholesale,
            pl.srp,
            p.id AS product_id,
            p.name AS product_name,
            p.code AS product_code,
            p.supplier_code,
            p.barcode,
            p.image,
            p.models,
            u.id AS unit_id,
            u.name AS unit_name,
            b.id AS brand_id,
            b.brand_name,
            c.id AS category_id,
            c.category_name
        FROM 
            price_list pl
        JOIN 
            product p ON pl.product_id = p.id
        JOIN 
            unit u ON p.unit_id = u.id
        JOIN 
            brand b ON p.brand_id = b.id
        JOIN 
            category c ON p.category_id = c.id";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the data in a table
echo "<table border='1'>";
echo "<tr>
        <th>Price List ID</th>
        <th>Dealer</th>
        <th>Wholesale</th>
        <th>SRP</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Code</th>
        <th>Supplier Code</th>
        <th>Barcode</th>
        <th>Image</th>
        <th>Models</th>
        <th>Unit ID</th>
        <th>Unit Name</th>
        <th>Brand ID</th>
        <th>Brand Name</th>
        <th>Category ID</th>
        <th>Category Name</th>
    </tr>";

foreach ($rows as $row) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}

echo "</table>";

?>
