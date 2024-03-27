<?php include 'session.php'; ?>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'; ?>
<?php include '../config/config.php'; ?>
<?php
// Start output buffering
ob_start();

// Check if the material_transaction parameter is set and not empty
if(isset($_GET['material_transaction']) && !empty($_GET['material_transaction'])) {
    // Retrieve the value of material_transaction
    $material_transaction = $_GET['material_transaction'];
    
    // Prepare and execute SQL query (using prepared statement to prevent SQL injection)
    $sql = "SELECT id, material_invoice, material_date, material_cashier, material_recieved_by, 
    material_inspected_by, material_verified_by, active, totalSellingPrice, 
    totalCostPrice, totalGrossProfit FROM material_transfer WHERE material_invoice = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $material_transaction);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Fetch associative array
        $row = $result->fetch_assoc();

        // Assign each field to a variable
        $id = $row['id'];
        $material_invoice = $row['material_invoice'];
        $material_date = $row['material_date'];
        $material_cashier = $row['material_cashier'];
        $material_received_by = $row['material_recieved_by'];
        $material_inspected_by = $row['material_inspected_by'];
        $material_verified_by = $row['material_verified_by'];
        $active = $row['active'];
        $totalSellingPrice = $row['totalSellingPrice'];
        $totalCostPrice = $row['totalCostPrice'];
        $totalGrossProfit = $row['totalGrossProfit'];

        // Now you can use these variables anywhere in your PHP page
    } else {
        echo "No records found";
    }
    
} else {
    // If material_transaction parameter is not set or empty, redirect
    header("Location: /store_stocks"); // Redirect to error page
    exit(); // Stop further execution
}

?>

    

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Purchase</h5>
            <a href="purchase" class="btn btn-sm  border rounded mb-2">Purchase Walk-in</a>
            <a href="purchase_delivery" class="btn btn-sm border rounded mb-2">Purchase Delivery</a>
            <a href="purchase_online" class="btn btn-sm border rounded mb-2">Purchase Online</a>
            <a href="purchase_terms" class="btn btn-sm border rounded mb-2">Purchase with Terms</a>
            <a href="store_stocks" class="btn btn-sm border btn-primary rounded mb-2">Store Stocks</a>
            
        </div>

        <div style="background-color: white; height: auto;" class="rounded border p-3 mb-3 w-100">
                <div class="border rounded mt-2 p-3">
                    <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <div>
                            <?php
                            // Output the Material Invoice, Date, and Cashier using PHP
                            echo "<h4>Material Invoice: ".$row['material_invoice']."</h4>";
                            echo "<h4>Date: ".$row['material_date']."</h4>";
                            ?>
                        </div>
                        <input type="hidden" id="sessionID" value="<?php echo $user_id; ?>">
                        <input type="hidden" id="material_invoice" value="<?php echo $material_invoice; ?>">
                     <div>
                            <!-- <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#add_stocks">+ Add Stocks</button> -->
                            <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#print">Print</button>
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-3">
                        <div class="form-floating" style="width: 32%; margin: 0px 5px 0px 5px" >
                            <input type="text" id="cashierName" value="<?php echo $row['material_cashier']; ?>" class="form-control" placeholder="" readonly>
                            <label for="cashierName">Cashier Name</label>
                        </div>
                        <div class="form-floating" style="width: 32%; margin: 0px 5px 0px 5px" >
                            <input type="text" id="receivedBy" value="<?php echo $row['material_recieved_by']; ?>" class="form-control" placeholder="" readonly>
                            <label for="receivedBy">Received by:</label>
                        </div>
                        <div class="form-floating" style="width: 32%; margin: 0px 5px 0px 5px" >
                        <input type="text" id="InspectedBy" value="<?php echo !empty($row['material_inspected_by']) ? $row['material_inspected_by'] : 'Pending'; ?>" class="form-control" placeholder="" readonly>
                        <label for="InspectedBy">Inspected by:</label>
                    </div>
                    <div class="form-floating" style="width: 32%; margin: 0px 5px 0px 5px" >
                        <input type="text" id="VerifiedBy" value="<?php echo !empty($row['material_verified_by']) ? $row['material_verified_by'] : 'Pending'; ?>" class="form-control" placeholder="" readonly>
                        <label for="VerifiedBy">Verified by:</label>
                    </div>
                    </div>

                    <div>
                        <!-- <input type="text" class="form-control mb-2 form-control-sm w-25" placeholder="Search"> -->
                    </div>
             </div>
        </div>
    </div>
             
<div style=" background-color: white;" class="p-3 rounded">
    <div style="height: 40vh; overflow: auto">
        <table class="table">
            <thead>
            <tr> 
                <th>Image</th>
                <th>Name</th>
                <th>Models</th>
                <th>Code</th>
                <th>Based Price</th>
                <th>Selling Price</th>
                <th>Quantity Request</th>
                <th>Quantity Received</th>
                <th>Markup</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                    $material_invoice_id = $material_transaction; // replace with your material_invoice_id

                    $sql = "SELECT mt.product_id, mt.input_srp, mt.input_selling_price, mt.qty_added, mt.qty_sent, mt.markup_peso, mt.created_at, mt.status, p.name, p.models, p.code, p.image
                                FROM material_transaction mt
                                JOIN product p ON mt.product_id = p.id
                                WHERE material_invoice_id = ?";
                                
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $material_invoice_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $totalSellingPrice = 0;
                    $totalCostPrice = 0;
                    
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<input type='hidden' name='product_id[]' value='{$row['product_id']}'>";
                            echo "<td><img src='{$row['image']}' alt='Product Image' style='max-width: 50px; height: 50px'></td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['models']}</td>";
                            echo "<td>{$row['code']}</td>";
                            echo "<td>{$row['input_srp']}</td>";
                            echo "<td>{$row['input_selling_price']}</td>";
                            echo "<td>{$row['qty_added']}</td>";
                            echo "<td>{$row['qty_sent']}</td>";
                            echo "<td>{$row['markup_peso']}</td>";
                            $status_text = '';
                            switch ($row['status']) {
                                case 1:
                                    $status_text = 'Pending';
                                    break;
                                case 2:
                                    $status_text = 'Reviewed';
                                    break;
                                case 3:
                                    $status_text = 'Approved';
                                    break;
                                case 4:
                                    $status_text = 'Received';
                                    break;
                                case 5:
                                    $status_text = 'Declined';
                                    break;
                                default:
                                    $status_text = 'Unknown';
                                    break;
                            }
                            echo "<td>{$status_text}</td>";
                            echo "</tr>";
                    
                            // Only include rows with status other than 5 in the calculation
                            if ($row['status'] != 5) {
                                // Calculate totalSellingPrice and totalCostPrice
                                $totalSellingPrice += $row['input_selling_price'] * $row['qty_added'];
                                $totalCostPrice += $row['input_srp'] * $row['qty_added'];
                                $qty_receive = $row['qty_sent'];
                                $input_selling_price = $row['input_selling_price'];
                            }
                        }
                    } else {
                        echo "0 results";
                    }


                // Calculate total gross profit
                $totalGrossProfit = $totalSellingPrice - $totalCostPrice;
                ?>
            </tbody>
        </table>
    </div>

        <div>
                <div style="display: flex; flex-direction: row; justify-content: space-between" class="border rounded p-3 mb-4">
                    <div>
                        <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                            <h4 class="">Total Cost Price ₱<?php echo number_format($totalCostPrice, 2); ?></h4>
                        </div>
                        
                        <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                            <h4 class="">Total Selling Price ₱<?php echo number_format($totalSellingPrice, 2); ?></h4>
                        </div>
                        
                        <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                            <h4 class="">Total Gross Profit ₱<?php echo number_format($totalGrossProfit, 2); ?></h4>
                        </div>
                    </div>
                    <div style="width: 30%">
                        <button type="button" id="acceptMaterialTransfer" class="btn w-100 btn-primary mb-2">Accept</button>
                        <button type="button" class="btn w-100 btn-outline-primary mb-2">Decline</button>
                    </div>
                </div> 
            </div>
        </div>
</div>

</div>
<?php include 'footer.php'?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script>
$(document).ready(function () {
    // Accept Material Transfer
    $('#acceptMaterialTransfer').click(function () {
        var materialInvoiceNo = $('#material_invoice').val();
        var sessionID = $('#sessionID').val();
        var cashierName = $('#cashierName').val();
        // Define total values (replace with actual values)
        var totalSellingPrice = '<?php echo $totalSellingPrice; ?>';
        var totalCostPrice = '<?php echo $totalCostPrice; ?>';
        var totalGrossProfit = '<?php echo $totalGrossProfit; ?>';

        var quantity = '<?php echo $qty_receive; ?>';
        var input_selling_price = '<?php echo $input_selling_price; ?>';
        
        // Your existing JavaScript code for accepting the transfer goes here
        $.ajax({
            url: '../php/fetch_admin_data.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Save Material Transfer with total values
                $.ajax({
                    url: '../php/store_stocks_recompute.php',
                    method: 'POST',
                    data: {
                        totalSellingPrice: totalSellingPrice,
                        totalCostPrice: totalCostPrice,
                        totalGrossProfit: totalGrossProfit
                    },
                    success: function (response) {
                        console.log(response);
                        $.ajax({
                            url: '../php/update_notification.php',
                            method: 'POST',
                            data: {
                                sessionID : sessionID,
                                type_id: materialInvoiceNo,
                                type: 'Material Transaction',
                                sender: cashierName,
                                message: 'The Store accept the Material Transfer'
                            },
                            success: function (response) {
                                console.log('Notification sent successfully');
                                // Make AJAX call to update product stocks
                                $.each(data, function(index, row) {
                                    $.ajax({
                                        url: '../php/add_product_stocks.php',
                                        method: 'POST',
                                        data: {
                                            productId: row.product_id,
                                            qty_sent: row.qty_sent,
                                            srp: row.input_selling_price
                                        },
                                        success: function (response) {
                                            console.log('Product stocks updated successfully for product ID ' + row.product_id);
                                            swal("File Save", "Record has been saved", "success");
                                        },
                                        error: function (xhr, status, error) {
                                            console.error('Error updating product stocks for product ID ' + row.product_id + ':', error);
                                        }
                                    });
                                });
                                swal("Material Added", "Product has been added", "success");
                            },
                            error: function (xhr, status, error) {
                                console.error('Error sending notification:', error);
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Error saving data:', error);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error('Error fetching admin data:', error);
            }
        });
    });
});

</script>