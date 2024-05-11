<div class="modal fade" id="add_product" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-fullscreen-md-down">
    <form id="add_brand_form" action="../../PHP - process_files/addproduct.php" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ENTER NEW PRODUCT</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fas fa-times fs--1"></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ------------------- -->
                <div class="row">
                    <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12 mb-1">
                        <input class="form-control" type="file" id="image" name="image" accept="image/*">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <select name="category" id="category">
                            <option value="" disabled selected>Select Category</option>
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
                            
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 mb-1">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" id="product_name" name="product_name">
                            <label for="floatingInput">Product Name</label>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 mb-1">
                        <div class="form-floating mb-3">
                            <input type="text" id="product_name" name="code" class="form-control" >
                            <label for="product_name">Item Code</label>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 mb-1">
                        <div class="form-floating mb-3">
                            <input type="text" id="product_name" name="supplier_code" class="form-control" >
                            <label for="product_name">Supplier Code</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-1">
                        <select  id="brand" name="brand">
                            <option value="" disabled selected>Select Brand</option>
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
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-1">
                        <select id="unit" name="unit">
                            <option value="" disabled selected>Select Unit</option>
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
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-1">
                    <select class="form-select" name="models[]" id="" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Model</option>
                                    <?php include "../../PHP - process_files/model_sql.php";?>
                                </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-1">
                        <div class="form-floating mb-3">
                            <input type="number" id="product_name" name="dealer" class="form-control" >
                            <label for="product_name">Dealer</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-1">
                        <div class="form-floating mb-3">
                            <input type="number" id="product_name" name="wholesale" class="form-control" >
                            <label for="product_name">Wholesale</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-1">
                        <div class="form-floating mb-3">
                            <input type="number" id="product_name" name="srp" class="form-control" >
                            <label for="product_name">SRP</label>
                        </div>
                    </div>
                </div>
                <!-- ------------------- -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
  </div>
</div>

<form action="../../PHP - process_files/update-product.php" method="POST" enctype="multipart/form-data">
<div class="modal fade" id="edit_product" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editing <span id="edit_product_name"></span></h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fas fa-times fs--1"></span>
                </button>
            </div>
            <div class="modal-body">
                <input class="form-control mb-2" type="file" id="image" name="image" accept="image/*">
                <div class="form-floating mb-2">
                    <input class="form-control" type="text" id="new_product_name" name="product_name">
                    <label for="floatingInput">Product Name</label>
                </div>
                <div class="form-floating mb-2">
                    <input class="form-control" type="text" id="new_item_code" name="item_code">
                    <label for="floatingInput">Item Code</label>
                </div>
                <div class="form-floating mb-2">
                    <input class="form-control" type="text" id="new_supplier_code" name="supplier_code">
                    <label for="floatingInput">Supplier Code</label>
                </div>
                <div class="form-floating mb-2">
                    <input class="form-control" type="text" id="new_barcode" name="barcode">
                    <label for="floatingInput">Barcode</label>
                </div>
                <div class="mb-2">
                    <label for="">Category</label>
                    <select name="category" id="edit_category">
                        <option value="" selected disabled>Select Category</option>
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
                </div>
                <div class="mb-2">
                    <label for="">Unit</label>
                    <select id="edit_unit" name="unit">
                        <option value="" selected disabled>Select Category</option>
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
                </div>
                <div class="mb-2">
                    <label for="">Brand</label>
                    <select id="edit_brand" name="brand">
                        <option value="" disabled selected>Select Brand</option>
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
                </div>
                <div class="mb-2">
                    <label for="">Models</label>
                    <select id="edit_model" name="models[]" multiple="multiple">
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
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-2">
                            <input class="form-control" type="number" id="edit_dealer" name="dealer">
                            <label for="floatingInput">Dealer Price</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-2">
                            <input class="form-control" type="number" id="edit_wholesale" name="wholesale">
                            <label for="floatingInput">Wholesale Price</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-2">
                            <input class="form-control" type="number" id="edit_srp" name="srp">
                            <label for="floatingInput">Suggested Retail Price</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="old_image" id="old_image">
                <input type="hidden" name="product_id" id="edit_product_id">
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
</form>