
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?php 
include '../config/config.php';

// SQL query to fetch data from the table and sort by TransactionDate in descending order
$sql = "SELECT * FROM purchase_transactions WHERE TransactionType = 'Delivery' ORDER BY TransactionDate DESC";
$result = $conn->query($sql);

?>

<!-- start sales-->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Sales</h5>
            <button class="btn btn-sm border rounded mb-2 btn-primary">Warehouse Sales</button>
            <button class="btn btn-sm border rounded mb-2 ">Purchase Terms Sales</button>
            <button class="btn btn-sm border rounded mb-2 ">Store Sales</button>
            <button class="btn btn-sm border rounded mb-2">Online Sales</button>
            
        </div>

        <div style="background-color: white; height: 80vh;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input  class="form-control form-control-sm" placeholder="Search">
                    </div>

                    <div>
                        <a href="sales" class="btn border btn-sm rounded">Warehouse Walk-in Sales</a>
                        <a href="#" class="btn border btn-sm rounded btn-primary">Warehouse Delivery Sales</a>
                    </div>
                </div>
                <div class="p-1 mt-3" style="height: 700px; overflow: auto;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="10%" >Transaction Code</th>
                                <th scope="col" width="10%" >Transaction Date</th>
                                <th scope="col" width="10%">Customer Name</th>
                                <th scope="col" width="10%">Payment Method </th>
                                <th scope="col" width="5%">Subtotal</th>
                                <th scope="col" width="5%">Tax</th>
                                <th scope="col" width="5%">Discount</th>
                                <th scope="col" width="5%">Total</th>
                                <th scope="col" width="5%">Payment</th>
                                <th scope="col" width="5%">Change</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            // Fetch and display data from the table
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<a href='purchase_receipt.php?transaction_code=" . $row["TransactionID"] . "'>";
                                    echo "<tr onclick=\"window.location='sales_receipt_delivery.php?transaction_code=" . $row["TransactionID"] . "';\" style=\"cursor: pointer;\">";
                                    echo "<td>".$row["TransactionID"]."</td>";
                                    echo "<td>".$row["TransactionDate"]."</td>";
                                    echo "<td>".$row["CustomerName"]."</td>";
                                    echo "<td>".$row["TransactionType"]."</td>";

                                    // Format currency fields to pesos
                                    echo "<td> ₱ ".number_format($row["Subtotal"], 2, '.', ',')."</td>";
                                    echo "<td> ₱ ".number_format($row["Tax"], 2, '.', ',')."</td>";
                                    echo "<td> ₱ ".number_format($row["Discount"], 2, '.', ',')."</td>";
                                    echo "<td> ₱ ".number_format($row["Total"], 2, '.', ',')."</td>";
                                    echo "<td> ₱ ".number_format($row["Payment"], 2, '.', ',')."</td>";
                                    echo "<td> ₱ ".number_format($row["ChangeAmount"], 2, '.', ',')."</td>";
                                    echo "</tr>";
                                    echo "</a>";
                                }
                            } else {
                                echo "<tr><td colspan='10'>No transactions found.</td></tr>";
                            }
                        ?>



                            
                        </tbody>
                    </table>
                </div>



                
            </div>
            
        </div>





<!-- end sales-->


</div>
<?php include 'footer.php'?>
</body>
</html>