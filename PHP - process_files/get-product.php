<?php
    require_once '../database/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $query = 'SELECT product.id, 
                        product.name, 
                        product.code, 
                        product.supplier_code, 
                        product.barcode, 
                        product.image, 
                        product.models,
                        product.active,
                        product.category_id,
                        product.brand_id,
                        product.unit_id,
                        price_list.dealer,
                        price_list.wholesale,
                        price_list.srp
                FROM product
                INNER JOIN price_list on price_list.product_id = product.id
                WHERE product.id = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $_POST['product_id']);
        $stmt->execute();
        $stmt->bind_result($id, $name, $code, $supplier_code, $barcode, $image, $models, $active, 
                            $category, $brand, $unit, $dealer, $wholesale, $srp);
        $stmt->fetch();
        $stmt->close();

        $json = array(
            'id' => $id,
            'name' => $name,
            'code' => $code,
            'supplier_code' => $supplier_code,
            'barcode' => $barcode,
            'image' => $image,
            'models' => $models,
            'active' => $active,
            'category' => $category,
            'brand' => $brand,
            'unit' => $unit,
            'dealer' => $dealer,
            'wholesale' => $wholesale,
            'srp' => $srp
        );

        echo json_encode($json);
    }
?>