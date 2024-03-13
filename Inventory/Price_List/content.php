<div class="container">
<h1>Product Price List</h1>
<form action="../../PHP - process_files/addPrice.php" method="POST">
<label for="">Product</label>
<select name="product_id" id="products">
    <option value="" select-disabled>Select a product</option>
    <?php
        $query = 'SELECT id, name, models, active FROM product';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->bind_result($id, $name, $models, $active);
        while ($stmt->fetch()) {
            if ($active == 0) {
                continue;
            }

            echo '<option value="'.$id.'">'.$name.' ('.$models.')</option>';
        }
        $stmt->close();
    ?>
</select>

<label for="dealer">Dealer Price</label>
<input type="number" name="dealer" id="dealer" min="0" step="any">

<label for="wholesale">Wholesale Price</label>
<input type="number" name="wholesale" id="wholesale" min="0" step="any">

<label for="srp">SRP</label>
<input type="number" name="srp" id="srp" min="0" step="any">

<button type="submit">Add to Price List</button>
</form>
<div class="row mt-4">
    <div class="col-md-6">
    <h2>Price List</h2>
    <table class="table">
        <thead>
            <th>Image</th>
            <th>Product Name</th>
            <th>Supplier Code</th>
            <th>Model/s</th>
            <th>Dealer</th>
            <th>Wholesale</th>
            <th>SRP</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                $query = 'SELECT price_list.dealer,
                                price_list.wholesale,
                                price_list.srp,
                                product.image,
                                product.name,
                                product.supplier_code,
                                product.models,
                                product.id
                        FROM price_list
                        INNER JOIN product ON price_list.product_id = product.id';
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $stmt->bind_result($dealer, $wholesale, $srp, $image, $name, $supplier_code, $models, $id);
                while ($stmt->fetch()) {
                    echo '<tr>
                            <td><img src="'.$image.'" alt="" srcset="" style="width: 90px;"></td>
                            <td>'.$name.'</td>
                            <td>'.$supplier_code.'</td>
                            <td>'.$models.'</td>
                            <td>₱'.number_format($dealer).'</td>
                            <td>₱'.number_format($wholesale).'</td>
                            <td>₱'.number_format($srp).'</td>
                            <td>
                                <button class="btn btn-primary cart-button" 
                                    data-product-id="'.$id.'"
                                    data-product-srp="'.$srp.'"
                                >
                                <i class="fas fa-cart-plus"></i>
                                </button>
                            </td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>
    </div>
    <div class="col-md-6">
    <h2>Cart</h2>
    <table id="rightTable" class="table">
        <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Supplier Code</th>
                <th>Models</th>
                <th>SRP</th>
                <th>QTY</th>
                <th>Action</th>
        </thead>
        <tbody id="cart-body">

        </tbody>
    </table>
    
    <h2 class="text-end"><button class="btn btn-danger reset-cart">RESET</button></h2>
    <h2 class="text-end" id="cart-total">Total: ₱0</h2>
    </div>
</div>
</div>