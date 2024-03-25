<?php
// Assuming you have already established a database connection ($conn)

// Inner join query to retrieve supplier product details along with related product, category, brand, unit, and supplier details
$supplier_products_sql = "SELECT sp.id, sp.date_added, sp.product_id, sp.supplier_code, sp.orig_price, sp.supplier_id,
                            p.name AS product_name, p.code AS product_code, p.barcode, p.image, p.models, p.category_id, p.brand_id, p.unit_id,
                            c.category_name, b.brand_name, u.name AS unit_name, s.supplier_name
                        FROM supplier_product AS sp
                        INNER JOIN product AS p ON sp.product_id = p.id AND p.active = '1'
                        LEFT JOIN category AS c ON p.category_id = c.id
                        LEFT JOIN brand AS b ON p.brand_id = b.id
                        LEFT JOIN unit AS u ON p.unit_id = u.id
                        LEFT JOIN supplier AS s ON sp.supplier_id = s.id";
$supplier_products_res = $conn->query($supplier_products_sql);

// Check if query was successful and retrieve data
if ($supplier_products_res->num_rows > 0) {
    while ($row = $supplier_products_res->fetch_assoc()) {
        // Access data using $row['column_name']
        $sp_id = $row['id'];
        $date_added = $row['date_added'];
        $product_id = $row['product_id'];
        $supplier_item_code = $row['supplier_code'];
        $original_price = $row['orig_price'];
        $supplier_id = $row['supplier_id'];
        $product_name = $row['product_name'];
        $product_code = $row['product_code'];
        $barcode = $row['barcode'];
        $image = $row['image'];
        $models = $row['models'];
        $category_name = $row['category_name'];
        $brand_name = $row['brand_name'];
        $unit_name = $row['unit_name'];
        $supplier_name = $row['supplier_name'];
        
        echo '<tr class="position-static">
            <td class="fs--1 align-middle">
                <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"/></div>
            </td>
            <td class="align-middle white-space-nowrap py-0"><a class="d-block border rounded-2" href="../landing/product-details.html"><img src="../../uploads/' . $image . '" alt="" width="53" /></a></td>
            <td class="product text-start">' . $product_name . '</td>
            <td class="price text-start">' . $brand_name . '</td>
            <td class="category text-start">' . $category_name . '</td>
            <td class="tags text-start">' . $unit_name . '</td>
            <td class="models text-start">
            ' . $models . '
            </td>
            <td class="vendor text-start">' . $supplier_name . '</td>
            <td class="time text-end">' . number_format((float)$original_price, 2, '.', ',') . '</td>
            <td class="hotdog text-start">' . $date_added . '</td>
            <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
            <div class="font-sans-serif btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                </div>
            </div>
            </td>
        </tr>';
    }
} else {
    echo "No records found.";
}

// Close database connection
$conn->close();
?>
