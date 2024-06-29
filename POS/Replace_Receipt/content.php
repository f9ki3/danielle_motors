<?php
include '../../config/config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the transaction code from the URL parameter and decode it
$transactionID = $_GET['transaction_code'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("SELECT * FROM purchase_transactions WHERE TransactionID = ? AND status NOT IN ('1', '2', '3')");
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
    exit;
}

// Close statement
$stmt->close();
?>


<input type="hidden" name="productIDs[]" id="productIDs">
<input type="hidden" name="user_brn_code" id="user_brn_code">
    <!-- Add more hidden inputs if needed -->

<div style="width: 100%;" class="print_hide" >
    <div>
        <div style="height: auto" class="w-100 transact">
            <h2 class="mb-3">Replace Items</h2>
            <div class="row">
                <div>
                    <div class="w-100 border rounded p-3 mb-3">
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <div class="w-50 p-1">
                                <h6 class="fw-bolder">Customer Name: <?php echo $transactionDetails["CustomerName"]; ?></h6>
                                <p>Address: <?php echo $transactionDetails["TransactionAddress"]; ?></p>
                            </div>
                            <div class="w-50 p-1">
                                <div style="display: flex; flex-direction: row; justify-content: space-between">
                                    <h6 class="fw-bolder">Receipt No: <?php echo $transactionID?></h6>
                                    <div>
                                        <a href="../Replace_Store" class="btn btn-primary btn-sm back">Back</a>
                                    </div>
                                </div>
                                <p>Date: <?php echo $transactionDetails["TransactionDate"]; ?></p>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;" class="border-top pt-2">
                            <div style="width: 35%">Payment Type: <?php echo $transactionDetails["TransactionPaymentMethod"]; ?></div>
                            <div style="width: 35%">Transaction Type: <?php echo $transactionDetails["TransactionType"]; ?></div>
                            <div style="width: 35%">Received by: <?php echo $transactionDetails["TransactionReceivedBy"]; ?></div>
                            <div style="width: 35%">Inspected by: <?php echo $transactionDetails["TransactionInspectedBy"]; ?></div>
                            <div style="width: 35%">Verified by: <?php echo $transactionDetails["TransactionVerifiedBy"]; ?></div>
                            <div style="width: 35%">Refunded by: <?php echo $transactionDetails["TransactionVerifiedBy"]; ?></div>
                        </div>
                    </div>
                    <div class="container" style="height: 500px; overflow-y: auto;">
                        <table class="table">
                            <tr>
                                <th width="5%">Checkbox</th>
                                <th width="15%">Product name</th>
                                <th width="10%">Brand</th>
                                <th width="15%">Model</th>
                                <th width="5%">Qty</th>
                                <th width="10%">Return Qty</th>
                                <th width="10%">Status</th>
                            </tr>
                            <tbody class="list" id="products-table-body">
                                <?php include 'replace_receipt.php'?>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-100 d-flex justify-content-end">
                            <hr>
                            <div class="d-flex flex-row mt-3 w-30">
                            <button id="refundBtn" class="w-100 me-2 mt-2 mb-3 btn btn-primary border border-primary btn-sm print" onclick="submitRefundForm(event)">Replacement</button>
                            </div>   
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>                           
</div>

<div id="printable" class="p-3 w-100">
    <div class="d-flex flex-row justify-content-between rounded border p-3">
        <div>
            <h4 class="m-0 fw-bolder">Danielle Motors Parts</h4>
            <p class="m-0">Prenza 2, 3019 Marilao, Bulacan, Philippines</p>
            <p class="m-0">dmp@gmail.com | 09120987768</p>
        </div>
        <img src="../static/img/dmp_logo.png" alt="">
    </div>
    <div>
        <div class="border rounded p-3 mt-3">
            <div>
                <h4 class="fw-bolder">Purchase Receipt</h4>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 12px">Customer: <?php echo $transactionDetails["CustomerName"]; ?></p>
                </div>
                <div style="width: 30%">
                    <p class="m-0" style="font-size: 12px">Invoice No: <?php echo $transactionID; ?></p>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 12px">Address: <?php echo $transactionDetails["TransactionAddress"]; ?></p>
                </div>
                <div style="width: 30%">
                    <p class="m-0" style="font-size: 12px">Date: <?php echo $transactionDetails["TransactionDate"]; ?></p>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 12px">Payment Type: <?php echo $transactionDetails["TransactionPaymentMethod"]; ?></p>
                </div>
                <div style="width: 30%">
                    <p class="m-0" style="font-size: 12px">Transaction Type: <?php echo $transactionDetails["TransactionType"]; ?></p>
                </div>
            </div>
        </div>
        
        <!-- Cart details -->
        <div class="w-100 p-2 mb-3 rounded border mt-3 cart">
            <table class="table">
                <tr>
                    <th width="35%" style="font-size: 12px">Product name</th>
                    <th width="5%" style="font-size: 12px">Qty</th>
                    <th width="5%" style="font-size: 12px">Paid Amount</th>
                    <th width="5%" style="font-size: 12px">Discount</th>
                    <th width="10%" style="font-size: 12px">Amount</th>
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
                        $paidAmount = $row["TotalAmount"] / $row["Quantity"]; // Calculate PaidAmount
                        echo "<tr>";
                        echo "<td style='font-size: 12px'>" . $row["ProductName"] .", ". $row["Brand"] .", ". $row["Model"] .", ".$row["Unit"] . "</td>";
                        echo "<td style='font-size: 12px'>" . $row["Quantity"] . "</td>";
                        echo "<td>₱ " . number_format($paidAmount, 2) . "</td>"; // Display PaidAmount
                        echo "<td style='font-size: 12px'>";
                        if ($row["Discount"] == 0.00) {
                            echo "-";
                        } else {
                            $discount = $row["Discount"];
                            if (is_int($discount) || floor($discount) == $discount) {
                                echo (int)$discount;
                            } else {
                                echo number_format($discount, 2);
                            }
                            echo " " . $row["DiscountType"];
                        }
                        echo "</td>";
                        echo "<td style='font-size: 12px'>₱ " . number_format($row["TotalAmount"], 2) . "</td>"; // Format TotalAmount as currency
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
                <!-- end loop -->
            </table>
        </div>
        
        <div class="border rounded p-3 mt-9">
            <div>
                <h4 class="fw-bolder">Summary</h4>
            </div>
            <!-- Summary details -->
            <?php
            function formatCurrency($amount) {
                return '₱ ' . number_format($amount, 2);
            }
            ?>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 12px">Subtotal </p>
                </div>
                <div style="width: 30%">
                    <p class="m-0" style="font-size: 12px"><?php echo formatCurrency($transactionDetails["Subtotal"]); ?></p>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 12px">Tax </p>
                </div>
                <div style="width: 30%">
                    <p class="m-0" style="font-size: 12px"><?php echo formatCurrency($transactionDetails["Tax"]); ?></p>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 12px">Discount </p>
                </div>
                <div style="width: 30%">
                    <p class="m-0" style="font-size: 12px"><?php echo formatCurrency($transactionDetails["Discount"]); ?></p>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 12px">Total </p>
                </div>
                <div style="width: 30%">
                    <p class="m-0" style="font-size: 12px"><?php echo formatCurrency($transactionDetails["Total"]); ?></p>
                </div>
            </div>
            <hr class="m-0">
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 12px">Payment </p>
                </div>
                <div style="width: 30%">
                    <p class="m-0" style="font-size: 12px"><?php echo formatCurrency($transactionDetails["Payment"]); ?></p>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 12px">Change </p>
                </div>
                <div style="width: 30%">
                    <p class="m-0" style="font-size: 12px"><?php echo formatCurrency($transactionDetails["ChangeAmount"]); ?></p>
                </div>
            </div>
        </div>

        <!-- Signatures -->
        <div class="d-flex flex-row justify-content-between p-3 mt-5">
            <div class="w-25">
                <p style="font-size: 12px; text-align: center; margin-bottom: 0px"><?php echo $transactionDetails["TransactionReceivedBy"]; ?></p>
                <hr class="m-0">
                <p style="font-size: 12px; text-align: center">Received By</p>
            </div>
            <div class="w-25">
                <p style="font-size: 12px; text-align: center; margin-bottom: 0px"><?php echo $transactionDetails["TransactionInspectedBy"]; ?></p>
                <hr class="m-0">
                <p style="font-size: 12px; text-align: center">Inspected By</p>
            </div>
            <div class="w-25">
                <p style="font-size: 12px; text-align: center; margin-bottom: 0px"><?php echo $transactionDetails["TransactionVerifiedBy"]; ?></p>
                <hr class="m-0">
                <p style="font-size: 12px; text-align: center">Verified By</p>
            </div>
        </div>
    </div>
</div>

<script>
    function submitReplacementForm(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        
        // Submit the form with the ID 'replacementForm'
        document.getElementById('replacementForm').submit();
    }
</script>