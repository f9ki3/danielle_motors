<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
  <div class="row g-3 mb-4">
    <div class="col-auto">
      <h2 class="mb-0">Products</h2>
    </div>
  </div>
  
  <div id="products" data-list='{"valueNames":["product","brand","category","unit","model","stocks"],"page":10,"pagination":true}'>
    <!-- <div class="mb-4">
      <div class="d-flex flex-wrap gap-3">
        <div class="search-box">
          <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
            <input class="form-control search-input search" type="search" placeholder="Search products" aria-label="Search" />
            <span class="fas fa-search search-box-icon"></span>
          </form>
        </div>
      </div>
    </div> -->
  <form action="../Create_Purchased_Order3/index.php" method="post">
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
      <div class="table-responsive scrollbar mx-n1 px-1">
        <table class="table fs--1 mb-0">
          <thead>
            <tr>
              <th class="sort white-space-nowrap align-middle fs--2" scope="col"></th>
              <th class="sort" scope="col" data-sort="product">PRODUCT NAME</th>
              <th class="sort" scope="col" data-sort="price">BRAND</th>
              <th class="sort" scope="col" data-sort="category">CATEGORY</th>
              <th class="sort" scope="col" data-sort="tags">UNIT</th>
              <th class="sort" scope="col">MODEL</th>
              <th class="sort" scope="col" data-sort="vendor">STOCKS</th>
              <th class="sort" scope="col" data-sort="time">QTY ORDER</th>
            </tr>
          </thead>
          <tbody class="list" id="products-table-body">
            <?php
            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if any checkboxes are selected
                if (isset($_POST['product_id']) && is_array($_POST['product_id'])) {
                    // Loop through each selected checkbox
                    foreach ($_POST['product_id'] as $selectedProductId) {
                        // Retrieve data associated with the selected product id
                        $product_key = array_search($selectedProductId, $_POST['product_id']);
                        $product_id = $_POST['product_id'][$product_key];
                        $productName = $_POST['product_name'][$product_key];
                        $category = $_POST['category'][$product_key];
                        $brand = $_POST['brand'][$product_key];
                        $unit = $_POST['unit'][$product_key];
                        $models = $_POST['models'][$product_key];
                        $current_stock = $_POST['current_stock'][$product_key];
                        ?>
                        <input type="checkbox" name="product_id[]" value="<?php echo $product_id;?>" checked hidden>
                        <input type="text" name="product_name[]" value="<?php echo $productName;?>" hidden>
                        <input type="text" name="category[]" value="<?php echo $category;?>" hidden>
                        <input type="text" name="brand[]" value="<?php echo $brand;?>" hidden>
                        <input type="text" name="unit[]" value="<?php echo $unit;?>" hidden>
                        <input type="text" name="models[]" value="<?php echo $models;?>" hidden >
                        <tr class="position-static">
                          <td class="align-middle white-space-nowrap py-0">
                            <a class="d-block border rounded-2" href="../landing/product-details.html">
                              <img src="../../assets/img/products/1.png" alt="" width="53" />
                            </a>
                          </td>
                          <td class="product"><?php echo $productName ?></td>
                          <td class="price"><?php echo $category ?></td>
                          <td class="category"><?php echo $brand ?></td>
                          <td class="tags"><?php echo $unit ?></td>
                          <td class=""><?php echo $models ?></td>
                          <td class="vendor"><?php echo $current_stock ?></td>
                          <td class="time"><input type="number" name="qty[]" class="form-control" min="0" max="9999" required></td>
                        </tr>
                    <?php
                    }
                } else {
                    // No checkboxes selected
                    echo "<tr><td colspan='9'>No checkboxes selected.</td></tr>";
                }
            } else {
                // Form not submitted
                echo "<tr><td colspan='9'>Form not submitted.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
        <div class="col-auto d-flex">
          <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Save & Submit</button>
    </div>
  </div>
  </form>
  
</div>
