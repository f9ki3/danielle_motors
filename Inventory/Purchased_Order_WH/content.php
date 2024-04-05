<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
<!-- iget ang supplier_name, supplier_logo mamaya-->
<div class="card mb-3">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-2">
                <img src="../../uploads/<?php echo $supplier_logo; ?>" class="img-fluid" alt="">
              </div>
              <div class="col-lg-8 text-start pt-3">
                <h1><?php echo $supplier_name; ?></h1>
              </div>
              <div class="col-lg-2 text-end">
                <button class="btn btn-phoenix-secondary text-end ms-sm-2 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#supplier_<?php echo $supplier_id; ?>" aria-expanded="false" aria-controls="collapseExample">
                  view
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 text-center m-2">
                <h3>Purchased Order</h3>
              </div>
            </div>
            <div class="collapse" id="supplier_<?php echo $supplier_id; ?>">
              <?php
              // Check if the form is submitted
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if any checkboxes are selected
                if (isset($_POST['product_id']) && is_array($_POST['product_id'])) {
                  // Initialize variable to keep track of the current category
                  $currentCategory = null;

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
                    $qty = $_POST['qty'][$product_key];

                    $price_sql = "SELECT orig_price FROM supplier_product WHERE product_id = '$product_id' AND supplier_id = '$supplier_id' LIMIT 1";
                    $price_res = $conn->query($price_sql);
                    if($price_res->num_rows > 0 ){
                      $price_row = $price_res->fetch_assoc();
                      $per_piece = number_format($price_row['orig_price'], 2);
                      $amount = $price_row['orig_price'] * $qty;
                      $formatted_amount = number_format($amount, 2);
                      $count_existing += 1;

                      // Add amount to total amount
                      $totalAmount += $amount;
                    } else {
                      $per_piece = "-";
                      $amount = "-";
                      $formatted_amount = "-";
                      $count +=1;
                    }
                    

                    // Display category header if it's different from the current category
                    if ($category !== $currentCategory) {
                      // Close previous table if not the first category
                      if ($currentCategory !== null) {
                        echo '</tbody></table>';
                      }
                      // Display new category header
                      echo '<div class="text-center"><h4>' . $category . '</h4></div>';
                      echo '<table class="table" border="1">
                                <thead>
                                    <tr>
                                        <th class-"text-start">Brand</th>
                                        <th class-"text-start">Product Name</th>
                                        <th class-"text-start">Unit</th>
                                        <th class-"text-start">Models</th>
                                        <th class-"text-start">Qty</th>
                                        <th class="tex-end">Amount</th>
                                        <th class-"text-end">Total Summary</th>
                                    </tr>
                                </thead>
                                <tbody>';

                      // Update current category
                      $currentCategory = $category;
                    }

                    // Display the data in the table row
                    echo '<tr>
                            <td class="text-start ps-2"><input type="checkbox" name="product_id[]" value="' . $product_id . '" checked hidden>' . $brand . '</td>
                            <td class="text-start ps-2">' . $productName . '</td>
                            <td class="text-start ps-2">' . $unit . '</td>
                            <td class="text-start ps-2">' . $models . '</td>
                            <td class="text-start ps-2"><input type="text" name="order_qty[]" value="'. $qty . '" hidden>' . $qty . '</td>
                            <td class="text-end">' . $per_piece . '</td>
                            <td class="text-end pe-2"><input type="text" name="est_amount[]" value="' . $amount . '" hidden>' . $formatted_amount . '</td>
                        </tr>';
                        
                  }

                  // Close the final table
                  echo '</tbody></table>';
                } else {
                  // No checkboxes selected
                  echo "No checkboxes selected.";
                }
              } else {
                // Form not submitted
                echo "Form not submitted.";
              }
              $total_items = $count + $count_existing;
              ?>

            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-lg-2">
                <button id="submitBTN_<?php echo $supplier_id; ?>" class="btn btn-primary" type="submit">Select</button>
              </div>
              <div class="col-lg-6 text-end">Estimated Total Amount:</div>
              <div class="col-lg-4 text-end"><input type="text" name="est_total_amount" value="<?php echo $totalAmount;?>" hidden><b>Php <?php echo number_format($totalAmount, 2); ?></b></div>
              <div class="col-lg-8 text-end">Items without specified amounts</div>
              <div class="col-lg-4 text-end"><b><?php echo $count . " out of " . $total_items;?></b></div>
            </div>
          </div>
        </div>
</div>