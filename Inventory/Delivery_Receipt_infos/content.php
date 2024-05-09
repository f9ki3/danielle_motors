<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <div class="row">
        <div class="col-auto">
            <h1>Enter Delivery Receipt<i class="text-success">#<?php echo str_pad($_SESSION['dr_id'], 6, '0', STR_PAD_LEFT); ?></i> Products Received</h1>
        </div>
    </div>
    <hr class="mb-5">
    <div class="mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6 col-xxs-6 mb-3">
                <div class="btn-group dropend mt-2 text-start"><button class="btn btn-primary" type="button">Mode</button>
                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                    <div class="dropdown-menu" role="tablist">
                        <a class="dropdown-item active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">Enter Product</a>
                        <a class="dropdown-item" id="profile-tab" data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">Enter New Product</a>
                    </div>
                </div>

                <div class="dropdown font-sans-serif d-inline-block  text-end">
                    <button class="btn btn-phoenix-secondary dropdown-toggle mt-2" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Print</button><span class="caret"> </span>
                    <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Print Delivery Receipt</a>
                        <a class="dropdown-item" href="#">Print Barcodes</a>
                    </div>
                </div>
            </div>
  
  
            <!-- ajax submit -->
            <div class="col-lg-4 tab-content mt-5">
                <div class="card tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-body" id="product_select">
                        <h3 class="card-title">Enter Product Details:</h3>
                        <hr>
                        <form id="products_infos">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                <select class="js-example-responsive" style="width: 100%; height: 200%;" id="product_id" name="product_id" required>
                                   <option value="">Select product</option>
                                   <label for="id_label_single">
                                        <?php
                                        $delivery_receipt_id = $_SESSION['dr_id'];
                                        $product_option_sql = "SELECT 
                                        p.id AS product_id, 
                                        p.name AS product_name, 
                                        u.name AS unit_name, 
                                        b.brand_name AS brand_name, 
                                        p.models AS model, 
                                        c.category_name AS category_name
                                    FROM product p
                                    JOIN unit u ON p.unit_id = u.id
                                    JOIN brand b ON p.brand_id = b.id
                                    JOIN category c ON p.category_id = c.id";
                                    
                                    $product_option_res = $conn->query($product_option_sql);
                                    
                                    if($product_option_res->num_rows > 0){
                                        while($row = $product_option_res->fetch_assoc()){
                                            $product_id = $row['product_id'];
                                            $product_name = $row['product_name'];
                                            $unit_name = $row['unit_name'];
                                            $brand_name = $row['brand_name'];
                                            $model = $row['model'];
                                            $category_name = $row['category_name'];

                                            
                                            echo '<option value="' . $product_id . '">' . $category_name . ' ' . $brand_name . ' ' . $product_name . ' ' . $unit_name . ' ' . $model .  '</option>';
                                            
                                            
                                        }
                                    }
                                    
                                        ?>
                                            </label>
                                        </select>
                                        <script>
                                            $(document).ready(function() {
                                                $('#product_id').select2({
                                                    width: '100%',
                                                    theme: 'bootstrap-5'
                                                });
                                            });
                                        </script>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" id="supplier_code" name="supplier_code">
                                        <label for="floatingInput">Supplier Code</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" id="original_price" name="original_price"  placeholder="" required/>
                                        <label for="floatingInput">Original Price</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" id="price" name="price"  placeholder="" required/>
                                        <label for="floatingInput">Price</label>
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
                                        <input class="form-control" id="wholesale" name="wholesale"  placeholder="" required/>
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

                                <div class="col-lg-12 mb-2">
                                    <select class="form-select" id="product_id" name="product_id" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}' required>
                                        <option value="">Select product</option>
                                        <?php
                                        $delivery_receipt_id = $_SESSION['dr_id'];
                                        $product_option_sql = "SELECT 
                                        p.id AS product_id, 
                                        p.name AS product_name, 
                                        u.name AS unit_name, 
                                        b.brand_name AS brand_name, 
                                        p.models AS model, 
                                        c.category_name AS category_name
                                    FROM product p
                                    JOIN unit u ON p.unit_id = u.id
                                    JOIN brand b ON p.brand_id = b.id
                                    JOIN category c ON p.category_id = c.id";
                                    
                                    $product_option_res = $conn->query($product_option_sql);
                                    
                                    if($product_option_res->num_rows > 0){
                                        while($row = $product_option_res->fetch_assoc()){
                                            $product_id = $row['product_id'];
                                            $product_name = $row['product_name'];
                                            $unit_name = $row['unit_name'];
                                            $brand_name = $row['brand_name'];
                                            $model = $row['model'];
                                            $category_name = $row['category_name'];

                                            
                                            echo '<option value="' . $product_id . '">' . $category_name . ' ' . $brand_name . ' ' . $product_name . ' ' . $unit_name . ' ' . $model .  '</option>';
                                            
                                            
                                        }
                                    }
                                    
                                        ?>
                                    </select>
                                </div>

                            </div>
                        
                    </div>
                    <div class="card-footer">
                        <button type="button" id="submitForm" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- --second tab -->
                <div class="card tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card-body" id="product_select">
                        <h3 class="card-title">Enter New Product Details</h3>
                        <hr>
                        <form id="products_infos_2" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                        <label for="">Upload Product Image</label>
                                        <input type="file" name="product_image" id="product_image" class="form-control">
                                        
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" name="product_name" id="product_name" >
                                        <label for="">Product Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" name="product_code" id="product_code" >
                                        <label for="">Product Code</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" id="supplier_code" name="supplier_code">
                                        <label for="">Supplier Code</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" name="barcode" id="barcode" >
                                        <label for="">Barcode</label>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 mb-2">
                                 <select class="js-example-responsive" style="width: 100%; height: 200%;" name="category" id="category">
                                            <option value="">Select category</option>
                                            <?php
                                            $category_sql = "SELECT id, category_name FROM category WHERE status = '1'";
                                            $category_res = $conn->query($category_sql);
                                            if($category_res->num_rows>0){
                                                while($row=$category_res->fetch_assoc()){
                                                    echo '<option value="' . $row['id'] . '">' . $row['category_name'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                </div>
                                <div class="col-lg-6 mb-2">
                                <select class="js-example-responsive" style="width: 100%; height: 200%;" name="brand" id="brand">
                                            <option value="">Select brand</option>
                                            <?php
                                            $brand_sql = "SELECT id, brand_name FROM brand WHERE status='1'";
                                            $brand_res = $conn->query($brand_sql);
                                            if($brand_res->num_rows>0){
                                                while($row=$brand_res->fetch_assoc()){
                                                    echo '<option value="' . $row['id'] . '">' . $row['brand_name'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                </div>
                                <div class="col-lg-6 mb-2">
                                <select class="js-example-responsive" style="width: 100%; height: 200%;"  name="unit" id="unit">
                                            <option value="">Select Unit</option>
                                            <?php
                                            $units_sql = "SELECT id, name FROM unit WHERE active='1'";
                                            $units_res = $conn->query($units_sql);
                                            if($units_res->num_rows>0){
                                                while($row=$units_res->fetch_assoc()){
                                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                </div>
                                <div class="col-lg-6 mb-2">
                                <select class="js-example-responsive" style="width: 100%; height: 200%;"  name="models[]" id="models[]">
                                        <option value="">Select Models</option>
                                        <?php
                                            $models_sql = "SELECT model_name FROM model WHERE status='1'";
                                            $models_res = $conn->query($models_sql);
                                            if($models_res->num_rows>0){
                                                while($row=$models_res->fetch_assoc()){
                                                    echo '<option value="' . $row['model_name'] . '">' . $row['model_name'] . '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                    <script>
                                        $(document).ready(function() {
                                            $('.js-example-responsive').select2({
                                                width: '100%',
                                                theme: 'bootstrap-5'
                                            });
                                        });
                                    </script>
                                </div>
                                
                                <div class="col-lg-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" id="original_price" name="original_price"  placeholder="" required/>
                                        <label for="floatingInput">Original Price</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" id="price" name="price"  placeholder="" required/>
                                        <label for="floatingInput">Price</label>
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
                                        <input class="form-control" id="wholesale" name="wholesale"  placeholder="" required/>
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
                        <button type="submit" id="submitForm_2" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ------------ -->
            <div class="col-lg-8 bg-white  mt-5 fs--1">
                <?php include "delivery_receipt_preview.php"; ?>
            </div>
        </div>
    </div>
</div>



<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="successToast" class="toast hide bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-white">
            Submission successful!
        </div>
    </div>

    <div id="errorToast" class="toast hide bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-danger text-white">
            Kindly fill up missing fields
        </div>
    </div>

    <div id="errorToast2" class="toast hide bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-danger text-white">
            Kindly fill up missing fields
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
        <?php 
        $wareloc_sql = "SELECT id, location_name FROM ware_location WHERE status = '1'";
        $wareloc_res = $conn->query($wareloc_sql);
        if($wareloc_res->num_rows>0){
            while($row=$wareloc_res->fetch_assoc()){
                $wr_id = $row['id'];
                $loc_name = $row['location_name'];
        ?>
        var option<?php echo $wr_id; ?> = document.createElement('option');
        option<?php echo $wr_id; ?>.value = '<?php echo $loc_name; ?>';
        option<?php echo $wr_id; ?>.textContent = '<?php echo $loc_name; ?>';
        selectLocation.appendChild(option<?php echo $wr_id; ?>);
        <?php 
            }
        }
        ?>

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

<div class="modals_container" id="modals_container"></div>