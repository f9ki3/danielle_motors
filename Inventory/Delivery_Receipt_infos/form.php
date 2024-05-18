<?php 
session_start();
include "../../database/database.php";
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap5-theme@1.0.2/dist/select2-bootstrap5.min.css" rel="stylesheet" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
        $('#submitForm').click(function(e){
            e.preventDefault(); // Prevent form submission and page reload
            
            // Check if any required field is empty
            var requiredFields = $('#products_infos').find(':input[required]');
            var emptyFields = requiredFields.filter(function() {
                return !$(this).val();
            });

            // If there are empty required fields, show toast and stop form submission
            if (emptyFields.length > 0) {
                var errorToast = $('#errorToast').clone();
                $('.toast-container').append(errorToast);
                var bsToast = new bootstrap.Toast(errorToast[0]);
                bsToast.show();
                return;
            }
            
            // Collect form data
            var formData = $('#products_infos').serialize();

            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: '../../PHP - process_files/add_dr_info.php?id=<?php echo $_SESSION['dr_id']; ?>',
                data: formData,
                dataType: 'json', // Expect JSON response from server
                success: function(response){
                    if (response.success) {
                        // Show success toast
                        var successToast = $('#successToast').clone();
                        successToast.find('.toast-body').text("Data successfully added!");
                        $('.toast-container').append(successToast);
                        var bsToast = new bootstrap.Toast(successToast[0]);
                        bsToast.show();
                        formz();

                        // Reset form fields
                        $('#products_infos :input').val('');
                    } else if (response.error) {
                        // Show error toast
                        var errorToast = $('#errorToast2').clone();
                        errorToast.find('.toast-body').text(response.error);
                        $('.toast-container').append(errorToast);
                        var bsToast = new bootstrap.Toast(errorToast[0]);
                        bsToast.show();
                    } else {
                        // Handle unexpected response
                        swal("Error", "Unexpected response from server", "error");
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX errors
                    console.error(xhr.responseText);
                    swal("Error", "An error occurred while processing the request.", "error")
                }
            });
        });
        $('#submitForm_2').click(function(f){
            f.preventDefault(); // Prevent form submission and page reload
                        
            // Check if any required field is empty
            var requiredFields_2 = $('#products_infos_2').find(':input[required]');
            var emptyFields_2 = requiredFields_2.filter(function() {
                return !$(this).val();
            });

            // If there are empty required fields, show toast and stop form submission
            if (emptyFields_2.length > 0) {
                var errorToast_2 = $('#errorToast').clone();
                $('.toast-container').append(errorToast_2);
                var bsToast_2 = new bootstrap.Toast(errorToast_2[0]);
                bsToast_2.show();
                return;
            }
                        
            // Create FormData object
            var formData_2 = new FormData($('#products_infos_2')[0]);

            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: '../../PHP - process_files/add_dr_info.php?id=<?php echo $_SESSION['dr_id']; ?>',
                data: formData_2,
                dataType: 'json', // Expect JSON response from server
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting contentType
                success: function(response_2){
                    if (response_2.success) {
                        // Show success toast
                        var successToast_2 = $('#successToast').clone();
                        successToast_2.find('.toast-body').text("Data successfully added!");
                        $('.toast-container').append(successToast_2);
                        var bsToast_2 = new bootstrap.Toast(successToast_2[0]);
                        bsToast_2.show();
                        formz();
                        

                        // Reset form fields
                        $('#products_infos_2 :input').val('');
                    } else if (response_2.error) {
                        // Show error toast
                        var errorToast_2 = $('#errorToast2').clone();
                        errorToast_2.find('.toast-body').text(response_2.error);
                        $('.toast-container').append(errorToast_2);
                        var bsToast_2 = new bootstrap.Toast(errorToast_2[0]);
                        bsToast_2.show();
                    } else {
                        // Handle unexpected response
                        swal("Error", "Unexpected response from server", "error");
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX errors
                    console.error(xhr.responseText);
                    swal("Error", "An error occurred while processing the request.", "error")
                }
            });
        });

    });

</script>
<div class="card tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
    <div class="card-body" id="product_select">
        <h3 class="card-title">Enter Product Details:</h3>
        <hr>
        <form id="products_infos">
            <div class="row">
                <div class="col-lg-12 mb-2">
                <select class="js-example-responsive" style="width: 100%; height: 200%;" id="product_id" name="product_id" required>
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

                            $dr_check = "SELECT total FROM delivery_receipt_content WHERE product_id = '$product_id' AND delivery_receipt_id = '$delivery_receipt_id' LIMIT 1";
                            $dr_check_result = $conn -> query($dr_check);
                            if($dr_check_result->num_rows>0){

                            } else {
                                echo '<option value="' . $product_id . '">' . $category_name . ' ' . $brand_name . ' ' . $product_name . ' ' . $unit_name . ' ' . $model .  '</option>';
                            }

                            
                            
                            
                        }
                    }
                    
                        ?>
                            
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
                        <input class="form-control" name="product_name" id="product_name" required>
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
                        <input class="form-control" name="barcode" id="barcode">
                        <label for="">Barcode</label>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-2">
                    <select class="js-example-responsive" style="width: 100%; height: 200%;" name="category" id="category" required>
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
                <select class="js-example-responsive" style="width: 100%; height: 200%;" name="brand" id="brand" required>
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
                <select class="js-example-responsive" style="width: 100%; height: 200%;"  name="unit" id="unit" required>
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
                <select class="js-models-responsive" multiple="multiple" style="width: 100%; height: 200%;"  name="models[]" id="models[]"  required>
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
        $(document).ready(function() {
            $('#product_id').select2({
                tags: 'true',
                width: '100%',
                placeholder: 'Select product',
                theme: 'bootstrap-5'
            });
                        
            
            $('.js-example-responsive').select2({
                tags: 'true',
                width: '100%',
                theme: 'bootstrap-5'
            });

            $('.js-models-responsive').select2({
                tags: 'true',
                width: '100%',
                placeholder: 'Select models',
                theme: 'bootstrap-5'
            });
        });
    </script>