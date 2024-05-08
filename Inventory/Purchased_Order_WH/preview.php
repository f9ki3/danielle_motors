<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <div class="row">
        <div class="col-auto">
            <a class="btn btn-primary mb-3" href="../Purchased_Order_WH/?DR=POakOnBGHtgqg<?php echo $po_id;?>NKnlHAiBkaqI"><span class="icon" data-feather="file-text"></span> Receive P.O as D.R</a>
            <button class="btn btn-outline-secondary mb-3"><span class="icon" data-feather="printer"></span> Print</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-3">
                <div class="card-body">
                    <div class="row">








































                    
                        <div class="col-xl-12 col-lg-12 text-center">
                            <img src="../../uploads/header.png" class="img img-fluid" alt="">
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <h3 class="text-center mb-5">PURCHASED ORDER</h3>
                        </div>
                        <div class="col-lg-12 text-end">
                            <span class="text-danger">PO #: <?php echo $po_id;?></span>
                        </div>
                        <div class="col-lg-12 text-center">
                            <table class="table">
                                <tr>
                                    <td class="text-start"><b>Order to: </b></td>
                                    <td><b><?php echo $_SESSION['po_supplier_name'];?></b></td>
                                </tr>
                                <tr>
                                    <td class="text-start"><b>Date : </b></td>
                                    <td><b><?php echo $_SESSION['po_publish_on'];?></b></td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Unit</th>
                                        <th>QTY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $category_sql = "SELECT purchased_order_content_wh.*,
                                                            product.name,
                                                            category.category_name,
                                                            category.id,
                                                            brand.brand_name,
                                                            unit.name AS unit_name,
                                                            product.models
                                                        FROM purchased_order_content_wh
                                                        LEFT JOIN product ON product.id = purchased_order_content_wh.product_id
                                                        LEFT JOIN category ON category.id = product.category_id
                                                        LEFT JOIN brand ON brand.id = product.brand_id
                                                        LEFT JOIN unit ON unit.id = product.unit_id
                                                        WHERE purchased_order_content_wh.po_id = '$po_id'";
                                    $category_res = $conn->query($category_sql);
                                    if($category_res->num_rows > 0){
                                        $prev_category = null;
                                        while($cat_row = $category_res->fetch_assoc()){
                                            $product_name = $cat_row['name'];
                                            $brand_name = $cat_row['brand_name'];
                                            $category_name = $cat_row['category_name'];
                                            $unit_name = $cat_row['unit_name'];
                                            $models = $cat_row['models'];
                                            $qty = $cat_row['order_qty'];

                                            // Display category name only if it's different from the previous one
                                            if($category_name !== $prev_category){
                                                echo '<tr>';
                                                echo '<td colspan="5" class="text-center p-2"><b>' . $category_name . '</b></td>';
                                                echo '</tr>';
                                                $prev_category = $category_name;
                                            }

                                            // Display product details
                                            echo '<tr>';
                                            echo '<td class="p-2">' . $product_name . '</td>';
                                            echo '<td class="p-2">' . $brand_name . '</td>';
                                            echo '<td class="p-2">' . $models . '</td>';
                                            echo '<td class="p-2">' . $unit_name . '</td>';
                                            echo '<td class="p-2">' . $qty . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
