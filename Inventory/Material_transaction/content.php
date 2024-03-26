<?php
$invoice_id = $_SESSION['invoice'];
$material_transfer_sql = "SELECT material_date, material_cashier, material_recieved_by, material_inspected_by, material_verified_by, active, totalSellingPrice, totalCostPrice, totalGrossProfit FROM material_transfer WHERE material_invoice = '$invoice_id' LIMIT 1";
$material_transfer_res = $conn->query($material_transfer_sql);
$row = $material_transfer_res->fetch_assoc();
$date = $row['material_date'];
$cashier = $row['material_cashier'];
$material_recieved_by = $row['material_recieved_by'];
$material_inspected_by = $row['material_inspected_by'];
$material_verified_by = $row['material_verified_by'];
$status = $row['active'];
$totalSellingPrice = $row['totalSellingPrice'];
$totalCostPrice = $row['totalCostPrice'];
$totalGrossProfit = $row['totalGrossProfit'];

?>
<div class="row">
    <div class="col-auto">
        <h1>TEST</h1>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="../../PHP - process_files/material_transfer_verification.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6 text-start">
                            <h6>Material Invoice : <b><?php echo $invoice_id; ?></b></h6>
                            <input type="text" name="invoice_id" value="<?php echo $invoice_id; ?>" hidden>
                        </div>
                        <div class="col-lg-6 text-end">
                            <button class="btn btn-outline-secondary">Print</button>
                        </div>
                        <div class="col-lg-12">
                            <h6>Date: <b>2024-02-24</b></h6>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Cashier</th>
                                            <th>Received by</th>
                                            <th>Inspected by</th>
                                            <th>Verified by</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $cashier; ?></td>
                                            <td><?php echo $material_recieved_by; ?></td>
                                            <td><input name="inspected_by" type="text" class="form-control" value="<?php echo "USER ON SESSION";?>" hidden></td>
                                            <td><input name="verified_by" type="text" class="form-control" value="<?php echo "USER ON SESSION";?>" hidden></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="p-0"></th>
                                            <th>Name</th>
                                            <th>Models</th>
                                            <th>Code</th>
                                            <th>Based Price</th>
                                            <th>Requested QTY</th>
                                            <th>Sent QTY</th>
                                            <th>Markup</th>
                                            <th>Status</th></th>
                                            <th>Selling Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php // include "material_transaction_tr.php"; ?>
                                        <?php
                                        $sql = "SELECT mt.*, p.name AS product_name, p.models AS product_model, p.image, p.code, c.category_name, b.brand_name, u.name AS unit_name
                                                FROM material_transaction mt
                                                LEFT JOIN product p ON mt.product_id = p.id
                                                LEFT JOIN category c ON p.category_id = c.id
                                                LEFT JOIN brand b ON p.brand_id = b.id
                                                LEFT JOIN unit u ON p.unit_id = u.id
                                                WHERE mt.material_invoice_id = '$invoice'";
                                        $res = $conn->query($sql);

                                        if ($res->num_rows > 0) {
                                            while ($row = $res->fetch_assoc()) {
                                                $id = $row['id'];
                                                $product_id = $row['product_id'];
                                                $input_srp = $row['input_srp'];
                                                $input_selling_price = $row['input_selling_price'];
                                                $qty_added = $row['qty_added'];
                                                $qty_sent = $row['qty_sent'];
                                                $markup_peso = $row['markup_peso'];
                                                $created_at = $row['created_at'];
                                                $status = $row['status'];
                                                $product_name = $row['product_name'];
                                                $product_model = $row['product_model'];
                                                $category_name = $row['category_name'];
                                                $brand_name = $row['brand_name'];
                                                $unit_name = $row['unit_name'];
                                                $product_img = $row['image'];
                                                $product_code = $row['code'];
                                                if($status === '3' || $status === '4' || $status === '5' ){
                                                    $hidden = "hidden";
                                                    $class="d-none";
                                                } else {
                                                    $hidden = "";
                                                    $class= "";
                                                }
                                        ?>
                                        <tr>
                                            <td class="text-center p-0"><img src="../../uploads/<?php echo basename($product_img); ?>" class="img-fluid" style="height: 50px;"></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td><?php echo $product_model; ?></td>
                                            <td><?php echo $product_code; ?></td>
                                            <td class="text-end"><?php echo number_format($input_srp, 2);?></td>
                                            <td><?php echo $qty_added;?></td>
                                            <td class="text-end"><input name="transaction_id[]" type="text" value="<?php echo $id; ?>" hidden><input name="qty_sent[]" type="number" class="form-control" min="0" max="10000" value="<?php echo $qty_added;?>" <?php echo $hidden;?>></td>
                                            <td class="text-end"><?php echo number_format($markup_peso, 2);?></td>
                                            <td><?php echo $status; ?></td>
                                            <td class="text-end"><?php echo number_format($input_selling_price, 2);?></td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <h6 class="mb-1">Total Selling Price:  ₱<span> <?php echo number_format($totalSellingPrice, 2); ?></span></h6>
                            <h6 class="mb-1">Total Cost Price:  ₱<span> <?php echo number_format($totalCostPrice, 2);?></span></h6>
                            <h6 class="mb-1">Total Gross Profit:  ₱ <span> <?php echo number_format($totalGrossProfit, 2); ?></span></h6>
                        </div>
                        <div class="col-lg-3 text-start <?php echo $class;?>">
                            <div class="row">
                                <div class="form-check">
                                <input class="form-check-input" id="flexCheckDefault" type="checkbox" value="" required/>
                                <label class="form-check-label" for="flexCheckDefault">As I approve this transaction, I hereby confirm that I inspected the items before they left the warehouse.</label>
                                </div>
                                <button type="submit" class="btn btn-primary col-12 mb-2">Approve</button>
                                <button class="btn btn-secondary col-12">Decline</button>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

