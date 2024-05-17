<?php
include "../../database/database.php";

// Retrieve the current page number from the query parameters
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 50; // Number of items to fetch per page
$offset = ($page - 1) * $limit;

// SQL query to fetch the required data
$query = "
    SELECT 
        product.id, 
        product.name, 
        product.code,
        product.supplier_code,
        product.image,
        product.models,
        product.barcode,
        category.category_name,
        brand.brand_name,
        unit.name AS unit_name,
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
    LIMIT $limit OFFSET $offset
";

// Execute the query and fetch the results
$result = $conn->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'title' => '
            <tr class="position-static">
                <td class="align-middle white-space-nowrap py-0">
                    <a class="d-block border rounded-2" href="../landing/product-details.html">
                        <img src="../../uploads/' . $row['image'] . '" alt="" width="53" />
                    </a>
                </td>
                <td class="product align-middle ps-4 fw-semi-bold line-clamp-3">
                    ' . $row['name'] . '
                </td>
                <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">' . $row['wholesale'] . '</td>
                <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">' . $row['srp'] . '</td>
                <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold">' . $row['brand_name'] . '</td>
                <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">' . $row['category_name'] . '</td>
                <td class="align-middle review fs-0 text-center ps-4">' . $row['unit_name'] . '</td>
                <td class="vendor align-middle text-start fw-semi-bold ps-4">' . $row['models'] . '</td>
                <td class="time align-middle white-space-nowrap text-600 ps-4">' . $row['user_fname'] . ' ' . $row['user_lname'] . '</td>
                <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                    <div class="font-sans-serif btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                            <span class="fas fa-ellipsis-h fs--2"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end py-2">
                            <a class="dropdown-item" href="#!">View</a>
                            <a class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                    </div>
                </td>
            </tr>'
        );
    }
}

// Return the data as a JSON response
echo json_encode($data);

// Close the database connection
$conn->close();
?>
