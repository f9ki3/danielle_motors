<div class="modal fade" id="add_product" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-fullscreen-md-down">
    <form id="add_brand_form" action="../../PHP - process_files/addexpense.php" method="POST" enctype="multipart/form-data">
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
                    <div class="col-lg-12">
                        <div class="form-floating mb-2">
                            <textarea class="form-control" name="description" id="description" required></textarea>
                            <label for="">Description</label>
                        </div>
                        
                    </div>

                    <div class="col-lg-6">
                        <div class="form-floating mb-2">
                            <select class="form-select" name="type" id="type">
                                <option value="DAILY">Daily</option>
                                <option value="Monthly">Monthly</option>
                            </select>
                            <label for="">Daily/Monthly</label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-floating mb-2">
                            <input class="form-control" type="number" name="amount" id="amount" required>
                            <label for="">Amount</label>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-floating mb-2">
                            <input class="form-control" type="number" name="amount_des" min="0" max="99" id="amount_des" value="00">
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
                    <input class="form-control" type="text" id="new_product_name" name="product_name" required>
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
                    <select name="category" id="edit_category" required>
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
                    <select id="edit_unit" name="unit" required>
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
                    <select id="edit_brand" name="brand" required>
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
                    <select id="edit_model" name="models[]" multiple="multiple" required>
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
                            <input class="form-control" type="number" id="edit_dealer" name="dealer" min="0" step="0.01" required>
                            <label for="floatingInput">Dealer Price</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-2">
                            <input class="form-control" type="number" id="edit_wholesale" name="wholesale" min="0" step="0.01" required>
                            <label for="floatingInput">Wholesale Price</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-2">
                            <input class="form-control" type="number" id="edit_srp" name="srp" min="0" step="0.01" required>
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