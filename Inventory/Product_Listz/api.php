<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u680032315_dmp_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$page = $_GET['page'];
$limit = 50; // Number of items to fetch per page
$offset = ($page - 1) * $limit;

$query = "SELECT 
                    product.id, 
                    product.name, 
                    product.code,
                    product.supplier_code,
                    product.image,
                    product.models,
                    product.barcode,
                    category.category_name,
                    brand.brand_name,
                    unit.name,
                    product.active,
                    user.user_fname,
                    user.user_lname,
                    price_list.wholesale,
                    price_list.srp
                FROM product
                LEFT JOIN category ON category.id = product.category_id
                LEFT JOIN brand ON brand.id = product.brand_id
                LEFT JOIN unit ON unit.id = product.unit_id
                LEFT JOIN user ON user.id = product.publish_by
                LEFT JOIN price_list ON price_list.product_id = product.id
                LIMIT $limit OFFSET $offset";
$result = $conn->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'title' => "<td><img class='img img-fluid' src='../../uploads/" . basename($row['image']) . "' style='width: 30px;'></td>
            <td class='product align-middle ps-4'>" . $row['name'] . "</td>
            <td>" . $row['models'] . "</td>"
        );
    }
}

echo json_encode($data);

$conn->close();
?>
