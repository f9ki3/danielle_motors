<div class="mb-9">
    <div class="row">
        <div class="col-auto">
            <h1>Enter Delivery Receipt <i class="text-success">#<?php echo str_pad($_SESSION['dr_id'], 6, '0', STR_PAD_LEFT); ?></i> Products Received</h1>
        </div>
    </div>
    <hr class="mb-5">
    <div class="mb-5">
        <div class="row">
            <!-- ajax submit -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Enter Product Details</h3>
                        <hr>
                        <form id="products_infos">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <select class="form-select" id="product_id" name="product_id" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                                        <option value="">Select product</option>
                                        <?php
                                        $product_option_sql = "SELECT * FROM product";
                                        $product_option_res = $conn->query($product_option_sql);
                                        if($product_option_res->num_rows>0){
                                            while($row=$product_option_res->fetch_assoc()){
                                                $product_id = $row['id'];
                                                $product_name = $row['name'];
                                                $unit_id = $row['unit_id'];
                                                $brand_id = $row['brand_id'];
                                                $model = $row['models'];
                                                $category_id = $row['category_id'];
                                                $unit_sql = "SELECT name FROM unit WHERE id = '$unit_id'";
                                                $unit_res = $conn->query($unit_sql);
                                                if($unit_res->num_rows>0){
                                                    $row=$unit_res->fetch_assoc();
                                                    $unit = $row['name'];
                                                }
                                                $brand_sql = "SELECT brand_name FROM brand WHERE id='$brand_id'";
                                                $brand_res = $conn->query($brand_sql);
                                                if($brand_res->num_rows>0){
                                                    $row=$brand_res->fetch_assoc();
                                                    $brand=$row['brand_name'];
                                                }
                                                $category_sql = "SELECT category_name FROM category WHERE id = '$category_id'";
                                                $category_res = $conn->query($category_sql);
                                                if($category_res->num_rows>0){
                                                    $row=$category_res->fetch_assoc();
                                                    $category = $row['category_name'];
                                                }
                                                echo '<option value="' . $product_id . '">' . $category . ' ' . $brand . ' ' . $product_name . ' ' . $unit . ' ' . $model .  '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" id="original_price" name="original_price" type="text" placeholder="" />
                                        <label for="floatingInput">Original Price</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" id="price" name="price" type="text" placeholder="" />
                                        <label for="floatingInput">Price</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" id="discount" name="discount" type="number" min="1" max="100" placeholder="" />
                                        <label for="floatingInput">Discount ( % )</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" id="total_qty" name="total_qty" type="number" min="1" placeholder="" />
                                        <label for="floatingInput">Total qty</label>
                                    </div>
                                </div>
                                <hr class="mb-2">
                                <h5 class="mb-3 card-title">Where to store</h5>
                            <div id="dynamicLocations" class="row">
                    <!-- Dynamic locations will be added here -->
                </div>

                            </div>
                        
                    </div>
                    <div class="card-footer">
                        <button type="button" id="new_location" class="btn btn-primary"><span class="fas fa-plus"></span> location</button>
                        <button type="button" id="submitForm" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ------------ -->
            <div class="col-lg-8 bg-white">
                <div class="row mt-5 mb-5">
                    <div class="col-auto">
                        <button class="btn btn-secondary">Print</button>
                        
                    </div>
                </div>
                <hr class="mb-5">
                <?php include "delivery_receipt_preview.php"; ?>
            </div>
        </div>
    </div>
</div>







<script>
    document.getElementById('new_location').addEventListener('click', function() {
        var dynamicLocations = document.getElementById('dynamicLocations');

        var locationDiv = document.createElement('div');
        locationDiv.className = 'col-lg-6 mb-2';

        var selectLocation = document.createElement('select');
        selectLocation.className = 'form-select mt-2';
        selectLocation.id = 'rack[]';
        selectLocation.name = 'rack[]';
        selectLocation.setAttribute('data-choices', 'data-choices');
        selectLocation.setAttribute('data-options', '{"removeItemButton":true,"placeholder":true}');

        var optionDefault = document.createElement('option');
        optionDefault.value = '';
        optionDefault.textContent = 'Select location';
        selectLocation.appendChild(optionDefault);

        var option1 = document.createElement('option');
        option1.textContent = 'Rack A-1-1';
        selectLocation.appendChild(option1);

        var option2 = document.createElement('option');
        option2.textContent = 'Rack A-1-2';
        selectLocation.appendChild(option2);

        var option3 = document.createElement('option');
        option3.textContent = 'Rack A-1-3';
        selectLocation.appendChild(option3);

        var option4 = document.createElement('option');
        option4.textContent = 'Rack A-1-4';
        selectLocation.appendChild(option4);

        locationDiv.appendChild(selectLocation);

        var quantityDiv = document.createElement('div');
        quantityDiv.className = 'col-lg-6 mb-2 form-floating';

        var inputQuantity = document.createElement('input');
        inputQuantity.className = 'form-control';
        inputQuantity.id = 'qty[]';
        inputQuantity.name = 'qty[]';
        inputQuantity.type = 'number';
        inputQuantity.min = '1';

        var labelQuantity = document.createElement('label');
        labelQuantity.htmlFor = 'floatingInput';
        labelQuantity.textContent = 'Quantity';

        quantityDiv.appendChild(inputQuantity);
        quantityDiv.appendChild(labelQuantity);

        dynamicLocations.appendChild(locationDiv);
        dynamicLocations.appendChild(quantityDiv);
    });
</script>

