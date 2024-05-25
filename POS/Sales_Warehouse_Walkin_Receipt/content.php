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

// Fetch the status
$status = $transactionDetails["status"];

// Close statement
$stmt->close();
// Fetch the refund adjustment from the returns_customer table
$refundAdjustment = 0; // Default value
$returnsQuery = $conn->prepare("SELECT total_refund_real FROM returns_customer WHERE transactionID = ?");
$returnsQuery->bind_param("s", $transactionID);
$returnsQuery->execute();
$returnsResult = $returnsQuery->get_result();
if ($returnsResult->num_rows > 0) {
    $refundDetails = $returnsResult->fetch_assoc();
    $refundAdjustment = $refundDetails["total_refund_real"];
}
$returnsQuery->close();

// Format the refund adjustment as currency
$formattedRefundAdjustment = ' ' . number_format($refundAdjustment, 2);

// Add the formatted refund adjustment to the transaction details array
$transactionDetails["RefundAdjustment"] = $formattedRefundAdjustment;
?>

<script>
// Pass the status to JavaScript
var purchaseStatus = <?php echo $status; ?>;
</script>



<div style="width: 100%;" class="print_hide" >
    <div>
        <div style=" height: auto" class=" w-100 transact">
            <h2 class="mb-3">Purchase Store</h2>
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
                                        <button id="returnBtn" class="btn btn-light border border-primary text-primary btn-sm print" onclick="ReturnStatus()">Return</button>
                                        <button id="replaceBtn" class="btn btn-light border border-primary text-primary btn-sm print" onclick="ReplaceStatus()">Replace</button>
                                        <button id="originalBtn" class="btn btn-light border border-primary text-primary btn-sm print" onclick="printDocument()">Print</button>
                                        <a href="../Sales_Warehouse" class="btn btn-primary btn-sm back">Back</a>
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
                <div class="container" style="height: 350px; overflow-y: auto;"> <!-- Adjusted height and added overflow-y: auto; -->
                    <!-- <div class="w-100 border rounded p-3 mb-1 cart table-responsive">
                        <table class="table table-bordered table-striped"> -->
                            <table class="table ">
                                <tr>
                                    <th width="10%">Product name</th>
                                    <th width="5%">Brand</th>
                                    <th width="10%">Model</th>
                                    <th width="5%">Qty</th>
                                    <th width="5%">Unit</th>
                                    <th width="5%">SRP</th>
                                    <th width="5%">Item Amount</th>
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
                                        $paidAmount = $row["TotalAmount"] / $row["Quantity"]; // Calculate PaidAmount
                                        echo "<tr>";
                                        echo "<td>" . $row["ProductName"] . "</td>";
                                        echo "<td>" . $row["Brand"] . "</td>";
                                        echo "<td>" . $row["Model"] . "</td>";
                                        echo "<td>" . $row["Quantity"] . "</td>";
                                        echo "<td>" . $row["Unit"] . "</td>";
                                        echo "<td>" . $row["SRP"] . "</td>";
                                        echo "<td>₱ " . number_format($paidAmount, 2) . "</td>"; // Display PaidAmount
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
                            <h6 class="fw-bolder">VAT(12%)</h6>
                            <h6 class="fw-bolder">₱ <?php echo $transactionDetails["Tax"]; ?></h6>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">Discount</h6>
                            <h6 class="fw-bolder">₱ <?php echo $transactionDetails["Discount"]; ?></h6>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between">
                            <h6 class="fw-bolder">Refund Adjustment</h6>
                            <h6 class="fw-bolder"><?php echo $transactionDetails["RefundAdjustment"]; ?></h6> <!-- Add this line -->
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
                    $count = 1;
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
                            <p class="m-0" style="font-size: 9px">Tax </p>
                        </div>
                        <div style="width: 30%">
                            <p class="m-0" style="font-size: 9px"><?php echo formatCurrency($transactionDetails["Tax"]); ?></p>
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

<script>
    // Disable the buttons if the status is not 1
    if (purchaseStatus != 1) {
        document.getElementById("returnBtn").disabled = true;
        document.getElementById("replaceBtn").disabled = true;
    }

    function ReturnStatus() {
        // Get the transaction code from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const transactionID = urlParams.get('transaction_code');

        // Display confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action will mark the return status as pending. Do you want to proceed?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, mark as pending',
            cancelButtonText: 'No, cancel',
            reverseButtons: true 
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms, execute the update_status.php script
                $.ajax({
                    url: 'update_status.php',
                    type: 'POST',
                    data: { transaction_code: transactionID },
                    success: function(response) {
                            // Handle the response from update_status.php
                            if (response.success) { // Check if response exists and contains success property
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Return status marked as pending.',
                                    icon: 'success',
                                    showConfirmButton: false  // Remove the "OK" button
                                    });
                                // Refresh the page after showing the success message
                                setTimeout(function() {
                                    window.location.href = '../Return_Receipt/?transaction_code=<?php echo $transactionID; ?>';
                                }, 2000); // 2000 milliseconds = 2 seconds delay
                            } else {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Return status marked as pending.',
                                    icon: 'success',
                                    showConfirmButton: false  // Remove the "OK" button
                                    });
                                // Swal.fire('Error!', 'Failed to mark return status as pending.', 'error');
                                setTimeout(function() {
                                    window.location.href = '../Return_Receipt/?transaction_code=<?php echo $transactionID; ?>';
                                }, 2000); // 2000 milliseconds = 2 seconds delay
                            }
                        },
                    error: function(xhr, status, error) {
                        // Handle any errors that occurred during the request
                        console.error('AJAX Error:', status, error);
                        Swal.fire('Error!', 'Failed to mark return status as pending.', 'error');
                    }
                });
            }
        });
    }

    function ReplaceStatus() {
        // Get the transaction code from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const transactionID = urlParams.get('transaction_code');

        // Display confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action will mark the replace status as pending. Do you want to proceed?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, mark as pending',
            cancelButtonText: 'No, cancel',
            reverseButtons: true 
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms, execute the update_status_replace.php script
                $.ajax({
                    url: 'update_status_replace.php', // Change the URL to your PHP script for updating status to "Replace"
                    type: 'POST',
                    data: { transaction_code: transactionID },
                    success: function(response) {
                            // Handle the response from update_status_replace.php
                            if (response.success) { // Check if response exists and contains success property
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Return status marked as pending.',
                                    icon: 'success',
                                    showConfirmButton: false  // Remove the "OK" button
                                    });
                                // Refresh the page after showing the success message
                                setTimeout(function() {
                                    window.location.href = '../Replace_Receipt/?transaction_code=<?php echo $transactionID; ?>';
                                }, 2000); // 2000 milliseconds = 2 seconds delay
                            } else {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Return status marked as pending.',
                                    icon: 'success',
                                    showConfirmButton: false  // Remove the "OK" button
                                    });
                                // Swal.fire('Error!', 'Failed to mark replace status as pending.', 'error');
                                setTimeout(function() {
                                    window.location.href = '../Replace_Receipt/?transaction_code=<?php echo $transactionID; ?>';
                                }, 2000); // 2000 milliseconds = 2 seconds delay
                            }
                        },
                    error: function(xhr, status, error) {
                        // Handle any errors that occurred during the request
                        console.error('AJAX Error:', status, error);
                        Swal.fire('Error!', 'Failed to mark replace status as pending.', 'error');
                    }
                });
            }
        });
    }
</script>
