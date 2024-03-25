
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?php
include '../config/config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the transaction code from the URL parameter
$transactionID = $_GET['transaction_code'];

// SQL query to retrieve transaction details
$sql = "SELECT * FROM purchase_transactions WHERE TransactionID = '$transactionID'";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Fetch the first row (assuming there's only one row for a given transaction ID)
    $transactionDetails = $result->fetch_assoc();
} else {
    echo "0 results";
}

?>


<div style="width: 100%" class="content p-3" >
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100 purchase_header">
            <h5 class="fw-bolder">Purchase</h5>
            <button class="btn btn-sm border btn-primary rounded mb-2">Purchase Walk-in</button>
            <button class="btn btn-sm border rounded mb-2">Purchase Delivery</button>
            <button class="btn btn-sm border rounded mb-2">Purchase Online</button>
            <button class="btn btn-sm border rounded mb-2">Purchase with Terms</button>
            <button class="btn btn-sm border rounded mb-2">Store Stocks</button>
        </div>

        <div style="background-color: white; height: 82vh" class="rounded border p-3 mb-3 w-100 transact">
            <h5 class="fw-bolder">Delivery Receipt</h5>
            <div class="row">
                <div>
                <div class="w-100 border rounded p-3 mb-3">
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <div class=" w-50 p-1">
                                <h6 class="fw-bolder">Customer Name: <?php echo $transactionDetails["CustomerName"]; ?></h6>
                                <p>Address: <?php echo $transactionDetails["TransactionAddress"]; ?></p>
                            </div>
                            <div class=" w-50 p-1">
                                <div style="display: flex; flex-direction: row; justify-content: space-between">
                                    <h6 class="fw-bolder">Receipt No: <?php echo $transactionID?></h6>
                                    <div>
                                    <button id="originalBtn" class="btn btn-light border border-primary text-primary btn-sm print" onclick="printDocument()">Print</button>
                                    <a href="purchase" class="btn btn-primary btn-sm back">Back</a>
                                    </div>
                                </div>
                                <p>Date: <?php echo $transactionDetails["TransactionDate"]; ?></p>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;" class="border-top pt-2">
                            <div style="width: 35%">Payment Type: <?php echo $transactionDetails["TransactionPaymentMethod"]; ?></div>
                            <div style="width: 35%">Transaction Type: <?php echo $transactionDetails["TransactionType"]; ?></div>
                            <div style="width: 35%">Recieved by: <?php echo $transactionDetails["TransactionReceivedBy"]; ?></div>
                            <div style="width: 35%">Inspected by: <?php echo $transactionDetails["TransactionInspectedBy"]; ?></div>
                            <div style="width: 35%">Verified by: <?php echo $transactionDetails["TransactionVerifiedBy"]; ?></div>
                        </div>
                </div>
                <div class="w-100 border rounded p-3 mb-3 cart" style="overflow: auto; height: 300px">
                        
                            <table class="table table-striped">
                                <tr>
                                    <th width="10%">Product name</th>
                                    <th width="5%">Brand</th>
                                    <th width="10%">Model</th>
                                    <th width="5%">Qty</th>
                                    <th width="5%">Unit</th>
                                    <th width="5%">SRP</th>
                                    <th width="5%">Discount Type</th>
                                    <th width="5%">Discount</th>
                                    <th width="5%">Total Amount</th>
                                </tr>
                                <!-- make a loop data here from data set -->
                                
                                <?php 
                                // SQL query to retrieve cart items for the given transaction ID
                                $sql = "SELECT * FROM purchase_cart WHERE TransactionID = '$transactionID'";
                                $result = $conn->query($sql);

                                // Check if any rows were returned
                                if ($result->num_rows > 0) {
            
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["ProductName"] . "</td>";
                                        echo "<td>" . $row["Brand"] . "</td>";
                                        echo "<td>" . $row["Model"] . "</td>";
                                        echo "<td>" . $row["Quantity"] . "</td>";
                                        echo "<td>" . $row["Unit"] . "</td>";
                                        echo "<td>" . $row["SRP"] . "</td>";
                                        echo "<td>" . $row["DiscountType"] . "</td>";
                                        echo "<td>" . $row["Discount"] . "</td>";
                                        echo "<td>₱ " . number_format($row["TotalAmount"], 2) . "</td>"; // Format TotalAmount as currency
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                                <!-- end loop -->
                            </table>
                        
                    </div>

                    
                    <div class="w-100 border rounded p-4 mb-3">
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">Subtotal</h6>
                            <h6 class="fw-bolder"><?php echo $transactionDetails["Subtotal"]; ?></h6>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">VAT(12%)</h6>
                            <h6 class="fw-bolder"><?php echo $transactionDetails["Tax"]; ?></h6>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">Discount</h6>
                            <h6 class="fw-bolder"><?php echo $transactionDetails["Discount"]; ?></h6>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">Total Amount</h>
                            <h6 class="fw-bolder"><?php echo $transactionDetails["Total"]; ?></h6>
                        </div>
                        <hr>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">Payment</h6>
                            <h6 class="fw-bolder"><?php echo $transactionDetails["Payment"]; ?></h6>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">Change</h6>
                            <h6 class="fw-bolder"><?php echo $transactionDetails["ChangeAmount"]; ?></h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>                           

</div>
<?php include 'footer.php'?>
<script>
    function printDocument() {
    window.print();
}

</script>

</body>
</html>