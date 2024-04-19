<?php 
include "../../admin/session.php";
include "../../database/database.php";
?>

    <div class="table-responsive">
        <table class="table ">
            <thead>
                <tr>
                    <th></th>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Model</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Date added</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stock_draft_sql = "SELECT stocks_draft.*, 
                                product.id AS product_id, 
                                product.name AS product_name, 
                                product.image AS product_image,
                                product.models AS product_models,
                                category.category_name AS category_name,
                                brand.brand_name AS brand_name,
                                unit.name AS unit_name,
                                product.active AS product_active,
                                stocks_draft.id AS draft_id,
                                stocks_draft.date_added AS date_added,
                                stocks_draft.product_qty AS product_qty
                            FROM stocks_draft
                            INNER JOIN product ON product.id = stocks_draft.product_id
                            INNER JOIN category ON category.id = product.category_id
                            INNER JOIN brand ON brand.id = product.brand_id
                            INNER JOIN unit ON unit.id = product.unit_id
                            WHERE stocks_draft.branch_code = '$branch_code'";
                $stock_draft_res = $conn->query($stock_draft_sql);
                if($stock_draft_res->num_rows > 0){
                    while($sd_row = $stock_draft_res->fetch_assoc()){
                        $product_name = $sd_row['product_name'];
                        $product_img = $sd_row['product_image'];
                        $category_name = $sd_row['category_name'];
                        $brand_name = $sd_row['brand_name'];
                        $unit_name = $sd_row['unit_name'];
                        $product_model = $sd_row['product_models'];
                        $stock_draft_id = $sd_row['draft_id'];
                        $date_added = $sd_row['date_added'];
                        $product_qty = $sd_row['product_qty'];
                        echo '<tr>
                                    <td><a class="btn btn-outline-primary" href="../../PHP - process_files/delete_draft.php?id=' . $stock_draft_id . '">delete</a></td>
                                    <td>' . $product_name . '</td>
                                    <td>' . $brand_name . '</td>
                                    <td>' . $category_name . '</td>
                                    <td>' . $product_model . '</td>
                                    <td>' . $unit_name . '</td>
                                    <td>' . $product_qty . '</td>
                                    <td>' . $date_added . '</td>
                                </tr>';
                    }

                } else {
                    echo '<tr>
                        <td colspan="7">Empty!!</td>
                    </tr>';
                }
                ?>
                
            </tbody>
        </table>
    </div>

    <div class="text-end mt-3">
        <a class="btn btn-primary" type="submit" href="../../PHP - process_files/save_to_stocks.php">Save</a>
    </div>
    