<?php
include '../../config/config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the transaction code from the URL parameter and decode it
$transactionID = $_GET['material_transaction'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("SELECT * FROM material_transaction WHERE TransactionID = ?");
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
 <!-- <input type="hidden" class="form-control mb-2" placeholder="Material Invoice No." id="materialInvoiceNo"> -->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Return</h5>
            <a href="warehouse_return.php" class="btn btn-primary btn-sm border rounded mb-2">Return Warehouse</a>
            <a href="store_return.php" class="btn btn-sm border rounded mb-2">Return Store</a>
            <!-- <a href="purchase_terms" class="btn btn-sm border rounded mb-2">Purchase with Terms</a> -->
            
        </div>

        <div style="background-color: white; height: 83vh;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <h6>Warehouse Return</h6>
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <!-- <input  class="form-control form-control-sm" placeholder="Search"> -->
                    </div>

                    <div>
                    <!-- <button id="addStocksBtn" class="btn border btn-sm rounded" data-bs-target="#add_stocks">+ Add Return</button> -->
                        <a href="store_product_list" class="btn btn-primary border btn-sm rounded" >Returns</a>
                        <a href="store_stocks" class="btn border btn-sm rounded" >Transactions</a>
                    </div>
                </div>
            </div>


            
    <div style="height: 65vh; overflow: auto">
    <input type="hidden" class="form-control mb-2" placeholder="Material Invoice No." id="materialInvoiceNo">
    <table id="tabledataMaterial" class="table stripe hover order-column row-border ">
        <thead>
                        <tr>
                            <td scope="col" width="15%">Material Invoice No.</td>
                            <td scope="col" width="15%" >Date</td>
                            <td scope="col" width="15%">Cashier Name</td>
                            <td scope="col" width="15%">Recieved by</td>
                            <td scope="col" width="15%">Inspected by</td>
                            <td scope="col" width="15%">Verified by</td>
                            <td class="text-end" scope="col" width="10%">Action</td>
                        </tr>
        </thead>
        <tbody id="MaterialTableBody">
<!-- dynamic populate -->
        </tbody>
    </table>
</div>

