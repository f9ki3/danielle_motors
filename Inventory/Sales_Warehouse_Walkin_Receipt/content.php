<?php
include '../../config/config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the transaction code from the URL parameter and decode it
$transactionID = $_GET['transaction_code'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("SELECT * FROM purchase_transactions WHERE TransactionID = ?");
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



<div style="width: 100%;" class="print_hide" >
    <div>

        <div style=" height: auto" class=" w-100 transact">
            <h2 class="mb-3">Purchase Warehouse</h2>
            <div class="row">
                <div>
                <div class="w-100 border rounded p-3 mb-3">
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <div class="w-50 p-1">
                                <h6 class="fw-bolder">Customer Name: <?php echo $transactionDetails["CustomerName"]; ?></h6>
                                <p>Address: <?php echo $transactionDetails["TransactionAddress"]; ?></p>
                            </div>
                            <div class=" w-50 p-1">
                                <div style="display: flex; flex-direction: row; justify-content: space-between">
                                    <h6 class="fw-bolder">Receipt No: <?php  echo preg_replace('/[^0-9]/', '', $transactionID)?></h6>
                                    <div>
                                    <button id="originalBtn" class="btn btn-light border border-primary text-primary btn-sm print" onclick="printDocument()">Print</button>
                                    <a href="../Sales_Warehouse" class="btn btn-primary btn-sm back">Back</a>
                                    </div>
                                </div>
                                <p>Date: <?php echo $transactionDetails["TransactionDate"]; ?></p>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;" class="border-top">
                            <div style="width: 35%">Payment Type: <?php echo $transactionDetails["TransactionPaymentMethod"]; ?></div>
                            <div style="width: 35%">Transaction Type: <?php echo $transactionDetails["TransactionType"]; ?></div>
                            <div style="width: 35%">Recieved by: <?php echo $transactionDetails["TransactionReceivedBy"]; ?></div>
                            <div style="width: 35%">Inspected by: <?php echo $transactionDetails["TransactionInspectedBy"]; ?></div>
                            <div style="width: 35%">Verified by: <?php echo $transactionDetails["TransactionVerifiedBy"]; ?></div>
                        </div>
                        
                            <table class="table ">
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
                                        echo "<td>₱ " . $row["SRP"] . "</td>";
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
                            <h6 class="fw-bolder">₱ <?php echo $transactionDetails["Subtotal"]; ?></h6>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder d-none">VAT( d-none%)</h6>
                            <h6 class="fw-bolder d-none">₱ <?php echo $transactionDetails["Tax"]; ?></h6>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">Discount</h6>
                            <h6 class="fw-bolder">₱ <?php echo $transactionDetails["Discount"]; ?></h6>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">Total Amount</h>
                            <h6 class="fw-bolder">₱ <?php echo $transactionDetails["Total"]; ?></h6>
                        </div>
                        <hr>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">Payment</h6>
                            <h6 class="fw-bolder">₱ <?php echo $transactionDetails["Payment"]; ?></h6>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">Change</h6>
                            <h6 class="fw-bolder">₱ <?php echo $transactionDetails["ChangeAmount"]; ?></h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>                           

</div>

<!-- //print by fyke -->
<div id="printable" style="margin-top: -90px">
   <div>
   <!-- <div class="d-flex flex-row justify-content-between">
        <div>
            <h4 class="m-0 fw-bolder">Danielle Motors Parts</h4>
            <p class="m-0" style="font-size: 9px">Prenza 2, 3019 Marilao, Bulacan, Philippines</p>
            <p class="m-0" style="font-size: 9px">dmp@gmail.com | 09120987768</p>
        </div>
        <img src="../../static/img/dmp_logo.png" style="width: 150px; margin-right: 60px;" alt="">
    </div> -->
    <div>
    <!-- <hr style="margin: 0px; margin-top: 5px; margin-bottom: 5px"> -->
        
            <div>
                <p class="fw-bolder" style="font-size: 12px; margin: 0px">Purchase Receipt</p>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 9px">Customer: <?php echo $transactionDetails["CustomerName"]; ?></p>
                </div>
                <div style="width: 30%">
                <p class="m-0" style="font-size: 9px">Invoice No: 
                    <?php 
                    // Remove all non-numeric characters
                    echo preg_replace('/[^0-9]/', '', $transactionID); 
                    ?>
                </p>

                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 9px">Address: <?php echo $transactionDetails["TransactionAddress"]; ?></p>
                </div>
                <div style="width: 30%">
                    <p class="m-0" style="font-size: 9px">Date: <?php echo $transactionDetails["TransactionDate"]; ?></p>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 70%">
                    <p class="m-0" style="font-size: 9px">Payment Type: <?php echo $transactionDetails["TransactionPaymentMethod"]; ?></p>
                </div>
                <div style="width: 30%">
                    <p class="m-0" style="font-size: 9px">Transaction Type: <?php echo $transactionDetails["TransactionType"]; ?></p>
                </div>
            </div>
    </div>
   </div>
    <div>
        
        <!-- Cart details -->
        <div class="w-100 p-2 mb-3 rounded border mt-3 cart">
                        
            <table class="table">
                <tr>
                    <th width=35%" style="font-size: 9px; padding-top: 0px; padding-bottom: 0px;">Product name</th>
                    <th width="5%" style="font-size: 9px; padding-top: 0px; padding-bottom: 0px;">Qty</th>
                    <th width="5%" style="font-size: 9px; padding-top: 0px; padding-bottom: 0px;">SRP</th>
                    <th width="5%" style="font-size: 9px; padding-top: 0px; padding-bottom: 0px;">Discount</th>
                    <th width="10%" style="font-size: 9px; padding-top: 0px; padding-bottom: 0px;">Amount</th>
                </tr>
                <!-- make a loop data here from data set -->
                
                <?php 
                // SQL query to retrieve cart items for the given transaction ID
                $sql = "SELECT * FROM purchase_cart WHERE TransactionID = '$transactionID'";
                $result = $conn->query($sql);

                // Check if any rows were returned
                if ($result->num_rows > 0) {

                    $count = 1; // Initialize the counter outside the loop
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='font-size: 9px; padding: 2px; padding-left: 10px'>". $count .". ". $row["ProductName"] .", ". $row["Brand"] .", ". $row["Model"] .", ".$row["Unit"] . "</td>";
                        echo "<td style='font-size: 9px; padding: 2px; padding-left: 10px'>" . $row["Quantity"] . "</td>";
                        echo "<td style='font-size: 9px; padding: 2px; padding-left: 10px'>₱ " . number_format($row["SRP"], 2) . "</td>";
                        echo "<td style='font-size: 9px; padding: 2px; padding-left: 10px'>";
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

                        echo "<td style='font-size: 9px; padding: 2px; padding-left: 10px'>₱ " . number_format($row["TotalAmount"], 2) . "</td>"; // Format TotalAmount as currency
                        echo "</tr>";
                        $count++;
                    }
                } else {
                    echo "0 results";
                }
                ?>
                <!-- end loop -->
            </table>
                        
        </div>
        
        <div class="border rounded p-3">
            <div>
            <div class="d-flex flex-row justify-content-between">
                    <div style="width: 55%">
                        <p class="fw-bolder" style="font-size: 12px; margin: 0px">Summary</p>
                    </div>
                    <div style="width: 45%">
                        <p class="fw-bolder" style="font-size: 12px; margin: 0px">Validated Personnel</p>
                    </div>
                </div>
            </div>
            <!-- Summary details -->
            <?php
            function formatCurrency($amount) {
                return '₱ ' . number_format($amount, 2);
            }
            ?>
            <div class="d-flex flex-row justify-content-between">
                <div style="width: 30%">
                    <div class="d-flex flex-row justify-content-between">
                        <div style="width: 30%">
                            <p class="m-0" style="font-size: 9px">Subtotal </p>
                        </div>
                        <div style="width: 30%">
                            <p class="m-0" style="font-size: 9px"><?php echo formatCurrency($transactionDetails["Subtotal"]); ?></p>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <div style="width: 70%">
                            <p class="m-0 d-none" style="font-size: 9px">Tax </p>
                        </div>
                        <div style="width: 30%">
                            <p class="m-0 d-none" style="font-size: 9px"><?php echo formatCurrency($transactionDetails["Tax"]); ?></p>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <div style="width: 70%">
                            <p class="m-0" style="font-size: 9px">Discount </p>
                        </div>
                        <div style="width: 30%">
                            <p class="m-0" style="font-size: 9px"><?php echo formatCurrency($transactionDetails["Discount"]); ?></p>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <div style="width: 70%">
                            <p class="m-0" style="font-size: 9px">Total </p>
                        </div>
                        <div style="width: 30%">
                            <p class="m-0" style="font-size: 9px"><?php echo formatCurrency($transactionDetails["Total"]); ?></p>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div style="width: 70%">
                            <p class="m-0" style="font-size: 9px">Payment </p>
                        </div>
                        <div style="width: 30%">
                            <p class="m-0" style="font-size: 9px"><?php echo formatCurrency($transactionDetails["Payment"]); ?></p>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <div style="width: 70%">
                            <p class="m-0" style="font-size: 9px">Change </p>
                        </div>
                        <div style="width: 30%">
                            <p class="m-0" style="font-size: 9px"><?php echo formatCurrency($transactionDetails["ChangeAmount"]); ?></p>
                        </div>
                    </div>
                </div>
                <div style="width: 70%; padding-left: 150px">
                    <!-- Signatures -->
        
                    <div class="d-flex flex-row justify-content-between p-3 mt-5">
                        <div class="">
                            <p style="font-size: 9px; text-align: center; margin-bottom: 0px"><?php echo $transactionDetails["TransactionReceivedBy"]; ?></p>
                            <hr class="m-0">
                            <p style="font-size: 9px; text-align: center">Received By</p>
                        </div>
                        <!-- Other signature details -->
                        <div class="">
                            <p style="font-size: 9px; text-align: center; margin-bottom: 0px"><?php echo $transactionDetails["TransactionInspectedBy"]; ?></p>
                            <hr class="m-0">
                            <p style="font-size: 9px; text-align: center">Inspected By</p>
                        </div>
                        <div class="">
                            <p style="font-size: 9px; text-align: center; margin-bottom: 0px"><?php echo $transactionDetails["TransactionVerifiedBy"]; ?></p>
                            <hr class="m-0">
                            <p style="font-size: 9px; text-align: center">Verified By</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>

