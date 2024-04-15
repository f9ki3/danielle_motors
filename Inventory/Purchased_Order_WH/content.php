<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
  <div class="row">
    <div class="col-lg-12">
      <div class="card p-3">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-2">
              <img src="../../uploads/<?php echo $logo;?>" class="img img-fluid" alt="">
            </div>
            <div class="col-lg-10 text-end">
              <p class="mb-0 ms-0 me-0 mt-5"><?php echo $branch_name_insession;?></p>
              <p class="m-0"><?php echo $branch_telephone_insession;?></p>
              <p class="m-0"><?php echo $branch_address_insession;?></p>
            </div>
            <div class="col-lg-12">
              <h3 class="text-center mb-5">PURCHASED ORDER</h3>
            </div>
            <div class="col-lg-12 text-end">
              <span class="text-danger">PO #: <?php echo $po_id;?></span>
            </div>
            <div class="col-lg-12 text-center">
              <table class="table text-white">
                <tr class="bg-primary">
                  <td>Order to: <b><?php echo $_SESSION['po_supplier_name'];?></b></td>
                </tr>
                <tr>
                  <td class="text-dark">Date : <b><?php echo $_SESSION['po_publish_on'];?></b></td>
                </tr>
              </table>
            </div>
          </div>
          <hr class="my-3">
          <?php 
          $po_content_sql = "SELECT poc.*, p.name, p.models, b.brand_name, c.category_name, u.name AS unit_name
                              FROM purchased_order_content_wh poc 
                              LEFT JOIN product p ON p.id = poc.product_id
                              LEFT JOIN brand b ON b.id = p.brand_id
                              LEFT JOIN category c ON c.id = p.category_id
                              LEFT JOIN unit u ON u.id = p.unit_id
                              WHERE poc.po_id = '$po_id'
                              ORDER BY c.category_name"; // Order by category name
          $po_content_res = $conn -> query($po_content_sql);
          $prev_category = null; // Initialize previous category
          if($po_content_res->num_rows > 0){
            while($po_row = $po_content_res->fetch_assoc()){
              $category_name = $po_row['category_name'];
              // If category changes, print category name and start a new table
              if ($category_name !== $prev_category) {
                // Close previous table if it's not the first category
                if ($prev_category !== null) {
                  echo '</tbody></table>';
                }
                echo '<h3 class="text-center">' . htmlspecialchars($category_name) . '</h3>'; // Print category name
                echo '<div class="table-responsive"><table class="table table-bordered p-1"><thead><tr><th>Brand</th><th>Name</th><th>Unit</th><th>Model</th><th>Qty</th></tr></thead><tbody>';
                $prev_category = $category_name; // Update previous category
              }
              // Print item row
          ?>
          <tr>
            <td class="p-1"><?php echo htmlspecialchars($po_row['brand_name']);?></td>
            <td class="p-1"><?php echo htmlspecialchars($po_row['name']);?></td>
            <td class="p-1"><?php echo htmlspecialchars($po_row['unit_name']);?></td>
            <td class="p-1"><?php echo htmlspecialchars($po_row['models']);?></td>
            <td class="p-1"><?php echo htmlspecialchars($po_row['order_qty']);?></td>
          </tr>
          <?php
            }
            echo '</tbody></table></div>'; // Close last table
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
