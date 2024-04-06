
<?php include 'session.php'?>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="datatable.css">
    <?php include 'header.php'?>
    </head>
<body>
<div style="display: flex; flex-direction: row">
<?php
include 'navigation_bar.php';
include '../config/config.php';

// SQL query to fetch data from the table and sort by TransactionDate in descending order
$sql = "SELECT * FROM purchase_transactions WHERE TransactionType = 'Walk-in' ORDER BY TransactionDate DESC";
$result = $conn->query($sql);

?>

<!-- start inventory-->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Return</h5>
            <a href="warehouse_return.php" class="btn btn-sm border rounded mb-2">Return Warehouse</a>
            <a href="store_return.php" class="btn btn-primary btn-sm  border rounded mb-2">Return Store</a>
            <!-- <a href="purchase_terms" class="btn btn-sm border rounded mb-2">Purchase with Terms</a> -->
            
        </div>

        <div style="background-color: white; height: 83vh;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <h6>Store Return</h6>
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input  class="form-control form-control-sm" placeholder="Search">
                    </div>

                    <div>
                    <button id="addStocksBtn" class="btn border btn-sm rounded" data-bs-target="#add_stocks">+ Store Return</button>
                        <a href="store_stocks" class="btn btn-primary border btn-sm rounded" >Stocks</a>
                        <!-- <a href="store_product_list" class="btn border btn-sm rounded" >Product</a> -->
                    </div>
                </div>
            </div>


            
    <div style="height: 65vh; overflow: auto">
    <input type="hidden" class="form-control mb-2" placeholder="Material Invoice No." id="materialInvoiceNo">
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
                                    echo "<tr onclick=\"window.location='sales_receipt.php?transaction_code=" . $row["TransactionID"] . "';\" style=\"cursor: pointer;\">";
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
<!-- end purchase-->


</div>
<?php include 'footer.php'?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>


<script type="text/javascript">

function fetchAdminData(adminId, adminData) {
    var admin = adminData.find(function (admin) {
        return admin.id == adminId;
    });
    return admin ? admin.user_fname + ' ' + admin.user_lname : '';
}


 $(document).ready(function () {
  
     function fetchAdminData(selectElementId, role) {
         $.ajax({
             url: '../php/fetch_admin_data.php', // Your server-side script to fetch admin data
             method: 'GET',
             data: { role: role }, // Optional: send role if needed
             dataType: 'json',
             success: function (data) {
                 // Populate the dropdown options
                 var selectElement = $('#' + selectElementId);
                 selectElement.empty();
                 selectElement.append('<option selected>Select ' + role + '</option>');
                 $.each(data, function (index, admin) {
                     selectElement.append('<option value="' + admin.id + '">' + admin.user_fname + ' ' + admin.user_lname + '</option>');
                 });
             },
             error: function (xhr, status, error) {
                 console.error('Error fetching admin data:', error);
             }
         });
     }

     // Fetch data for receivedBy dropdown
     
     fetchAdminData('receivedBy', 'Recieved By');
     
     // Fetch data for inspectedBy dropdown
     fetchAdminData('inspectedBy', 'Inspected by');

     // Fetch data for verifiedBy dropdown
     fetchAdminData('verifiedBy', 'Verified By');
 });

document.getElementById('addStocksBtn').addEventListener('click', function() {
    window.location.href = 'store_stocks_return.php';
});


</script>