<?php
$invoice_id = $_SESSION['invoice'];
$material_transfer_sql = "SELECT mt.material_date, mt.material_cashier, mt.material_recieved_by, mt.material_inspected_by, mt.material_verified_by, mt.active, mt.totalSellingPrice, mt.totalCostPrice, mt.totalGrossProfit, m.status 
FROM material_transfer AS mt 
LEFT JOIN material_transaction AS m ON mt.material_invoice = m.material_invoice_id 
WHERE mt.material_invoice = '$invoice_id' 
LIMIT 1";
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
$unformatted_status = $row['status'];
if($unformatted_status === '1' || $unformatted_status === '2'){
    $formatted_stats = '<b class="text-primary"> Pending</b>';
} elseif($unformatted_status === '3'){
    $formatted_stats = '<b class="text-success"> Verified</b>';
} elseif($unformatted_status === '4'){
    $formatted_stats = '<b class="text-danger"> Denied</b>';
} elseif($unformatted_status === '5'){
    $formatted_stats = '<b class="text-success"> Accepted</b>';
}

$user_id = "Christian Azul";//on session

?>

<div class="row">
    <h1 class="mb-2">Material Transfer : <?php echo $invoice_id; ?></h1>
</div>
<ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
    <li class="nav-item"><a class="nav-link active" aria-current="page" href="../Material_transaction-For-Assemble/"><span>For Assemble Sheet Document</a></li>
    <li class="nav-item"><a class="nav-link" href="../Material_transaction">Material Transfer Document</a></li>
</ul>

<div class="row fs--1 mb">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="../../PHP - process_files/material_transfer_verification.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6 text-start">
                            <h6>Material Invoice : <b><?php echo $invoice_id; ?></b></h6>
                            <input type="text" name="invoice_id" value="<?php echo $invoice_id; ?>" hidden>
                        </div>
                        <div class="col-lg-3">
                            <h6>Status : <?php echo $formatted_stats; ?></h6>
                        </div>
                        <div class="col-lg-3 text-end">
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
                                            <td><input name="inspected_by" type="text" class="form-control" value="<?php echo $user_id;?>" hidden><?php echo $material_inspected_by; ?></td>
                                            <td><input name="verified_by" type="text" class="form-control" value="<?php echo $user_id;?>" hidden><?php echo $material_verified_by; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="min-height: 350px;">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="p-0"></th>
                                            <th>Name</th>
                                            <th>Models</th>
                                            <th>Code</th>
                                            <th>WH Location</th>
                                            <th>take QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php include "material_transaction_tr.php"; ?> -->
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

                                                $stocks_sql = "SELECT qty, ware_loc_id FROM stocks WHERE product_id = '$product_id'";
                                                $stocks_res = $conn->query($stocks_sql);
                                                
                                                if ($stocks_res) {
                                                    // Check if there are rows returned
                                                    if ($stocks_res->num_rows > 0) {
                                                        // Fetch the result row
                                                        $row = $stocks_res->fetch_assoc();
                                                        // Get the product count
                                                        $product_count = $row['product_count'];
                                                    } else {
                                                        // No rows matched the condition, set count to 0
                                                        $product_count = 0;
                                                    }
                                                } else {
                                                    // Error handling if query fails
                                                    echo "Error: " . $conn->error;
                                                }
                                                
                                                // Now $product_count contains the count of rows where product_id = $product_id
                                                
                                        ?>
                                        <tr>
                                            <td class="text-center p-0"><img src="../../uploads/<?php echo basename($product_img); ?>" class="img-fluid" style="height: 50px;"></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td><?php echo $product_model; ?></td>
                                            <td><?php echo $product_count;?></td>
                                            <td></td>
                                            <td></td>
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

