<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
<div class="card" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
    <div class="card-body" id="product_select">
        <h3 class="card-title">Enter Product Details:</h3>
        <hr>
        <form action="../../PHP - process_files/add_dr_info copy.php?id=<?php echo $_SESSION['dr_id']; ?>" method="POST">
            <div class="row">
                <div class="col-lg-12 mb-2">
                
                <?php 
                $barcode = $_GET['produtexist'];
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
            WHERE product.barcode = '$barcode'";
            $result = mysqli_query($conn, $query);
            $row = $result -> fetch_assoc();
            echo $row['brand_name'] . " " . $row['name'] . " " . $row['category_name'] . " " . $row['models'];
                ?>
                <input type="text" name="product_id" value="<?php echo $row['id'];?>" hidden>
                </div>
                
                <div class="col-lg-12 mb-2">
                    <div class="form-floating">
                        <input class="form-control" id="supplier_code" name="supplier_code">
                        <label for="floatingInput">Supplier Code</label>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="form-floating">
                        <input class="form-control" id="original_price" name="original_price"  placeholder="" value="<?php echo $row['srp']; ?>" required/>
                        <label for="floatingInput">Original Price</label>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="form-floating">
                        <input class="form-control" id="price" name="price"  placeholder="" required/>
                        <label for="floatingInput">Discounted Price</label>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="form-floating">
                        <input class="form-control" id="discount" name="discount" type="number" min="1" max="100" placeholder="" required/>
                        <label for="floatingInput">Discount ( % )</label>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="form-floating">
                        <input class="form-control" id="wholesale" name="wholesale"  placeholder="" value="<?php echo $row['wholesale']; ?>" required/>
                        <label for="floatingInput">Wholesale</label>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="form-floating">
                        <input class="form-control" id="total_qty" name="total_qty" type="number" min="1" placeholder="" required/>
                        <label for="floatingInput">Total qty</label>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <input class="form-control datetimepicker" id="expiration_date" name="expiration_date"  placeholder="Expiration date(if applicable)" data-options='{"disableMobile":true,"dateFormat":"Y-m-d"}' />
                
                </div>

            </div>
        
    </div>
    <div class="card-footer">
        <button type="submit" id="submitForm" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
</div>