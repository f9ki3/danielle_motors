<?php
// Establish database connection (replace these variables with your actual database credentials)
$servername = "sql.freedb.tech";
$username = "freedb_dmp_master";
$password = "8@YASU8ypbA2uA%";
$dbname = "freedb_dmp_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform SQL query
$sql = "SELECT 
            pl.id AS price_list_id,
            pl.product_id,
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
            p.unit_id,
            u.name AS unit_name,
            p.brand_id,
            b.brand_name,
            p.category_id,
            c.category_name
        FROM 
            price_list pl
        JOIN 
            product p ON pl.product_id = p.id
        JOIN 
            brand b ON p.brand_id = b.id
        JOIN 
            category c ON p.category_id = c.id
        JOIN 
            unit u ON p.unit_id = u.id";

$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

?>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . htmlspecialchars($row["product_id"]) . "</td>
                    <td><img src=\"../uploads/" . htmlspecialchars($row["image"]) . "\" alt=\"\" style=\"width: 70px\"></td>
                    <td>" . htmlspecialchars($row["product_name"]) . "</td>
                    <td>" . htmlspecialchars($row["models"]) . "</td>
                    <td>" . htmlspecialchars($row["brand_name"]) . "</td>
                    <td>₱" . htmlspecialchars($row["srp"]) . "</td>
                    <td>" . htmlspecialchars($row["unit_name"]) . "</td>
                    <td>
                        <button class=\"btn mb-3 me-3 rounded-5 btn-primary\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-cart-plus-fill\" viewBox=\"0 0 16 16\">
                                <path d=\"M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0\"/>
                            </svg>
                        </button>
                    </td>
                </tr>";
            
                }
            } else {
                echo "<tr><td colspan=\"6\">0 results</td></tr>";
            }
            ?>