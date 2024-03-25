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
                     <div>
                            <!-- <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#add_stocks">+ Add Stocks</button> -->
                            <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#print">Print</button>
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-3">
                        <div class="form-floating" style="width: 32%;">
                            <select id="cashierName" class="form-select" aria-label="Default select example" disabled>
                                <option value="" selected><?php echo $row['material_cashier']; ?></option>
                            </select>
                            <label for="Cashier">Cashier By</label>
                        </div>
                        <div class="form-floating" style="width: 32%;">
                            <select id="Receiver" class="form-select" aria-label="Default select example" disabled>
                                <option value="<?php echo $row['material_recieved_by']; ?>"><?php echo $row['material_recieved_by']; ?></option>
                                <!-- Add more options if needed -->
                            </select>
                            <label for="Receiver">Received by</label>
                        </div>
                        <div class="form-floating" style="width: 32%; margin: 0px 5px 0px 5px" >
                            <input type="text" id="transaction_customer_name" value="<?php echo !empty($row['material_inspected_by']) ? $row['material_inspected_by'] : 'Pending'; ?>" class="form-control" placeholder="" readonly>
                            <label for="transaction_customer_name">Inspected by:</label>
                        </div>
                        <div class="form-floating" style="width: 32%; margin: 0px 5px 0px 5px" >
                            <input type="text" id="transaction_customer_name" value="<?php echo !empty($row['material_verified_by']) ? $row['material_verified_by'] : 'Pending'; ?>" class="form-control" placeholder="" readonly>
                            <label for="transaction_customer_name">Verified by:</label>
                        </div>
                    </div>

                    <div>
                        <!-- <input type="text" class="form-control mb-2 form-control-sm w-25" placeholder="Search"> -->
                    </div>
             </div>
        </div>
    </div>
             
<div style="height: 50vh; overflow: auto">
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
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><img src='{$row['image']}' alt='Product Image' style='max-width: 50px; height: 50px'></td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['models']}</td>";
                        echo "<td>{$row['code']}</td>";
                        echo "<td>{$row['input_srp']}</td>";
                        echo "<td>{$row['input_selling_price']}</td>";
                        echo "<td>{$row['qty_added']}</td>";
                        echo "<td>{$row['qty_sent']}</td>";
                        echo "<td>{$row['markup_peso']}</td>";
                        // echo "<td>{$row['status']}</td>";
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
                    }
                } else {
                    echo "0 results";
                }
            } else {
                echo "0 results";
            }
            ?>
        </tbody>
    </table>
</div>
            <div class="border rounded mt-2 p-3 bg-light">
                    <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <div>
                        <?php
                            // Output the Material Invoice, Date, and Cashier using PHP
                            echo "<h5 class='fw-bolder'>Total Selling Price: ₱" . number_format($totalSellingPrice, 2) . "</h5>";
                            echo "<h5 class='fw-bolder'>Total Cost Price: ₱" . number_format($totalCostPrice, 2) . "</h5>";
                            echo "<h5 class='fw-bolder'>Total Gross Profit: ₱" . number_format($totalGrossProfit, 2) . "</h5>";

                            ?>
                        </div>
                        <div style="width: 30%">
                            <button type="button" class="btn w-100 btn-primary mb-2">Save</button>
                            <button type="button" class="btn w-100 btn-outline-primary mb-2">Cancel</button>
                        </div>
                    </div> 
             </div>
        </div>
<!-- end purchase-->


</div>
<?php include 'footer.php'?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
