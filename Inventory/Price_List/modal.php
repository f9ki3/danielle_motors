<div class="modal fade" id="add_pricelist" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down">
    <form id="add_price_list_form" action="addPrice.php" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ENTER PRICE FOR A PRODUCT</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fas fa-times fs--1"></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- -*-*-*-*-* -->
                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <select class="form-select mb-2" name="product_id" id="products" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Select product</option>
                            <?php
                                $query = 'SELECT product.id, product.name, product.models, product.active FROM product
                                            WHERE active = 1
                                            AND NOT EXISTS (
                                                SELECT 1 FROM price_list WHERE product.id = price_list.product_id
                                            )';
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
                    </div>
                    <div class="col-lg-4 mb-2">
                        <div class="form-floating mb-3">
                            <input class="form-control mb-2" type="number" name="dealer" id="dealer" min="0" step="any">
                            <label for="dealer">Dealer Price</label>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <div class="form-floating mb-3">
                            <input class="form-control mb-2" type="number" name="wholesale" id="wholesale" min="0" step="any">
                            <label for="wholesale">Wholesale Price</label>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <div class="form-floating mb-3">
                            <input class="form-control mb-2" type="number" name="srp" id="srp" min="0" step="any">
                            <label for="srp">SRP</label>
                        </div>
                    </div>
                </div>
                
                







                <!-- -*-*-*-*-* -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
  </div>
</div>

