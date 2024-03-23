
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?php 
include '../config/config.php';

// SQL query to fetch data from the table and sort by TransactionDate in descending order
$sql = "SELECT * FROM purchase_transactions ORDER BY TransactionDate DESC";
$result = $conn->query($sql);
?>

<!-- start sales-->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Sales</h5>
            <button class="btn btn-sm border rounded mb-2 btn-primary">Walk-in Sales</button>
            <button class="btn btn-sm border rounded mb-2">Delivery Sales</button>
            <button class="btn btn-sm border rounded mb-2">Online Sales</button>
            <button class="btn btn-sm border rounded mb-2">Balance Account</button>
            
        </div>

        <div style="background-color: white; height: 80vh;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input  class="form-control form-control-sm" placeholder="Search">
                    </div>

                    <div>
                        <!-- <button class="btn border btn-sm rounded">Purchase</button>
                        <button class="btn border btn-sm rounded">Cart</button> -->
                    </div>
                </div>
                <div class="p-1" style="height: 700px; overflow: auto;">
                    <table class="table mt-3">
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
                                    echo "<tr>";
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
                                }
                            } else {
                                echo "<tr><td colspan='15'>No transactions found.</td></tr>";
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