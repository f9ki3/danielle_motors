<?php
include '../../config/config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the transaction code from the URL parameter and decode it
$transactionID = $_GET['material_transaction'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("SELECT * FROM material_transaction WHERE material_invoice_id = ?");
$stmt->bind_param("s", $transactionID);

// Execute the statement
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Fetch the first row (assuming there's only one row for a given transaction ID)
    $transactionDetails = $result->fetch_assoc();
} else {
    echo "0 results";
}

// Close statement
$stmt->close();

?>
 <input type="hidden" class="form-control" placeholder="Material Invoice No." id="materialInvoiceNo">

 <?php

// Check if the material_transaction parameter is set and not empty
if(isset($_GET['material_transaction']) && !empty($_GET['material_transaction'])) {
    // Retrieve the value of material_transaction
    $material_transaction = $_GET['material_transaction'];
    
    // Prepare and execute SQL query (using prepared statement to prevent SQL injection)
    $sql = "SELECT id, material_invoice, material_date, material_cashier, material_recieved_by, 
    material_inspected_by, material_verified_by, active, totalSellingPrice FROM material_transfer WHERE material_invoice = ?";
    
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
        $totalSellingPrice = $row['totalSellingPrice'];;

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

    

<!-- <div style="width: 100%" class="content p-3"> -->
    <div>
        <!-- <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
        <h5 class="fw-bolder">Return</h5>
            <a href="warehouse_return.php" class="btn btn-primary btn-sm border rounded mb-2">Return Warehouse</a>
            <a href="store_return.php" class="btn btn-sm border rounded mb-2">Return Store</a>
            
        </div> -->
        <div style="background-color: white; height: auto;" class="rounded border p-3 mb-2 w-100">
                <div class=" rounded mt-1 ">
                    <div class="mb-1" style="display: flex; flex-direction: row; justify-content: space-between">
                        <div class="p-2">
                            <?php
                            // Output the Material Invoice, Date, and Cashier using PHP
                            echo "<h4>Material Invoice: ".$row['material_invoice']."</h4>";
                            echo "<h4>Date: ".$row['material_date']."</h4>";
                            ?>
                        </div>
                        <input type="hidden" id="sessionID" value="<?php echo $user_id; ?>">
                        <input type="hidden" id="material_invoice" value="<?php echo $material_invoice; ?>">
                        <input type="hidden" id="user_brn_code" value="<?php echo $branch_code; ?>">
                     <div>
                            <!-- <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#add_stocks">+ Add Stocks</button> -->
                            <button class="btn border btn-sm rounded me-1" data-bs-toggle="modal" data-bs-target="#print">Print</button>
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

                    <!-- <div> -->
                        <!-- <input type="text" class="form-control mb-2 form-control-sm w-25" placeholder="Search"> -->
                    <!-- </div> -->
             </div>
        </div>
    <!-- </div> -->
             
<div style=" background-color: white;" class="p-3">
    <div class="container" style="height: 450px; overflow-y: auto;">
        <table class="table">
            <thead>
            <tr> 
                <th>Checkbox</th>
                <th>Image</th>
                <th>Name</th>
                <th>Models</th>
                <th>Code</th>
                <th>SRP</th>
                <th>Quantity Request</th>
                <th>Quantity Store</th>
                <th>Quantity Return</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $totalReturnAmount = 0;
            $totalSellingPrice = 0;
                    $material_invoice_id = $material_transaction; // replace with your material_invoice_id
                    
                    $sql = "SELECT mt.product_id, mt.input_srp, mt.qty_added, mt.qty_receive,mt.qty_warehouse, mt.created_at, mt.status, p.name, p.models, p.code, p.image
                                FROM material_transaction mt
                                JOIN product p ON mt.product_id = p.id
                                WHERE material_invoice_id = ? AND (status = 5 OR status = 6)";
                    
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $material_invoice_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            if ($row['status'] == 5) {
                                echo "<td><input type='checkbox' name='product_checkbox[]' value='{$row['product_id']}' style='max-width: 50px; height: 50px'></td>";
                            } else {
                                echo "<td></td>"; // Empty cell if status is 4, 5, or 6
                            }
                            echo "<input type='hidden' name='product_id[]' value='{$row['product_id']}'>";
                            echo "<td><img src='{$row['image']}' alt='Product Image' style='max-width: 50px; height: 50px'></td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['models']}</td>";
                            echo "<td>{$row['code']}</td>";
                            echo "<td>{$row['input_srp']}</td>";
                            echo "<td>{$row['qty_added']}</td>";
                            echo "<td data-quantity-added='{$row['qty_receive']}'>{$row['qty_receive']}</td>";
                            echo "<td>{$row['qty_warehouse']}</td>";
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
                                    $status_text = 'Request Return';
                                    break;
                                case 6:
                                    $status_text = 'Returned';
                                    break;
                                default:
                                    $status_text = 'Unknown';
                                    break;
                            }
                            echo "<td>{$status_text}</td>";
                            echo "</tr>";
                            
                            // Only include rows with status 5 or 6 in the calculation
                            if ($row['status'] == 5 || $row['status'] == 6) {
                                // Calculate total return price
                                $totalReturnAmount += $row['input_srp'] * $row['qty_warehouse'];
                                $totalSellingPrice += $row['input_srp'] * $row['qty_receive'];
                            }                            
                        }
                    } else {
                        echo "0 results";
                    }


                // Calculate total gross profit
           
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div> 

    <div style="display: flex; flex-direction: row; justify-content: space-between" class="border rounded p-3 mt-2">
        <div>
            <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                <h4 id="totalSellingPrice" class="ms-2 me-4">Total Selling Amount: ₱<?php echo number_format($totalSellingPrice, 2); ?></h4>
                <h4 id="totalReturnAmount" class="ms-2">Total Return Amount ₱<?php echo number_format($totalReturnAmount, 2); ?></h4>
                <input type="text" id="Reason" class="form-control" placeholder="Enter Reason to return">
            </div>
        </div>
        <div style="width: 30%">
            <button type="button" id="returnMaterialTransfer" class="btn w-100 btn-outline-primary mb-2">Return</button>
        </div>
    </div> 
<!-- End of Footer -->


</div> <!-- Closing tag for the main container div -->

</body>
</html>
