<h1>PRODUCTS</h1>
        <form action="../../PHP - process_files/addProduct.php" method="POST" enctype="multipart/form-data">
            <label for="product_name">Image</label>
            <input type="file" id="image" name="image" accept="image/*">

            <label for="product_name">Product Name</label>
            <input type="text" id="product_name" name="product_name">
            
            <label for="product_name">Category</label>
            <select id="category" name="category">
                <option select-disabled>Select a category</option>
                <?php
                    $query = 'SELECT id, category_name, status FROM category';
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($id, $category_name, $status);
                    while ($stmt->fetch()) {
                        if ($status == 0) {
                            continue;
                        }

                        echo '<option value="'.$id.'">'.$category_name.'</option>';
                    }

                    $stmt->close();
                ?>
            </select>

            <label for="product_name">Brand</label>
            <select id="brand" name="brand">
                <option select-disabled>Select a brand</option>
                <?php
                    $query = 'SELECT id, brand_name, status FROM brand';
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($id, $brand_name, $status);
                    while ($stmt->fetch()) {
                        if ($status == 0) {
                            continue;
                        }

                        echo '<option value="'.$id.'">'.$brand_name.'</option>';
                    }

                    $stmt->close();
                ?>
            </select>

            <label for="product_name">Unit</label>
            <select id="unit" name="unit">
                <option select-disabled>Select unit of measurement</option>
                <?php
                    $query = 'SELECT id, name, active FROM unit';
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($id, $unit_name, $status);
                    while ($stmt->fetch()) {
                        if ($status == 0) {
                            continue;
                        }

                        echo '<option value="'.$id.'">'.$unit_name.'</option>';
                    }

                    $stmt->close();
                ?>
            </select>

            <label for="product_name">Model/s</label>
            <select id="model" name="models[]" multiple>
                <option select-disabled>Select model/s</option>
                <?php
                    $query = 'SELECT id, model_name, status FROM model';
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($id, $model_name, $status);
                    while ($stmt->fetch()) {
                        if ($status == 0) {
                            continue;
                        }

                        echo '<option value="'.$model_name.'">'.$model_name.'</option>';
                    }

                    $stmt->close();
                ?>
            </select>

            <label for="product_name">Item Code</label>
            <input type="text" id="product_name" name="code">

            <label for="product_name">Supplier Code</label>
            <input type="text" id="product_name" name="supplier_code">

            <button type="submit">Submit</button>
        </form>

    <table class="table">
        <thead>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Item Code</th>
            <th>Supplier Code</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Unit</th>
            <th>Model/s</th>
            <th>Status</th>
        </thead>
        <tbody>
            <?php
                $query = 'SELECT 
                                product.id, 
                                product.name, 
                                product.code,
                                product.supplier_code,
                                product.image,
                                product.models,
                                category.category_name,
                                brand.brand_name,
                                unit.name,
                                product.active
                            FROM product
                            INNER JOIN category ON category.id = product.category_id
                            INNER JOIN brand ON brand.id = product.brand_id
                            INNER JOIN unit ON unit.id = product.unit_id';
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $stmt->bind_result($product_id, $product_name, $product_sku, $product_upc, $product_image, $models, $category, $brand, $unit, $active);
                while ($stmt->fetch()) {
                    if ($active == 1) {
                        $status = 'active';
                    } else {
                        $status = 'inactive';
                    }

                    echo '<tr>
                            <td><img src="../'.$product_image.'" class="img-fluid" alt="" srcset=""></td>
                            <td>'.$product_name.'</td>
                            <td>'.$product_sku.'</td>
                            <td>'.$product_upc.'</td>
                            <td>'.$category.'</td>
                            <td>'.$brand.'</td>
                            <td>'.$unit.'</td>
                            <td>'.$models.'</td>
                            <td>'.$status.'</td>
                        </tr>';
                }

                $stmt->close();
            ?>
        </tbody>
    </table>