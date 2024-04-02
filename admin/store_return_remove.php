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
                        <input type="hidden" id="sessionID" value="<?php echo $user_id; ?>">
                        <input type="hidden" id="material_invoice" value="<?php echo $material_invoice; ?>">
                        <input type="hidden" id="user_brn_code" value="<?php echo $branch_code; ?>">
                     <div>
                            <!-- <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#add_stocks">+ Add Stocks</button> -->
                            <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#print">Print</button>
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

                    <div>
                        <!-- <input type="text" class="form-control mb-2 form-control-sm w-25" placeholder="Search"> -->
                    </div>
             </div>
        </div>
    </div>
             
<div style=" background-color: white;" class="p-3 rounded">
    <div style="height: 40vh; overflow: auto">
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
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                    
                    $comSellingPrice = 0;
                    $material_invoice_id = $material_transaction; // replace with your material_invoice_id
                    
                    $sql = "SELECT mt.product_id, mt.input_srp, mt.qty_added, mt.created_at, mt.status, p.name, p.models, p.code, p.image
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
                                    $status_text = 'Return';
                                    break;
                                case 6:
                                    $status_text = 'Partial Return';
                                    break;
                                default:
                                    $status_text = 'Unknown';
                                    break;
                            }
                            echo "<td>{$status_text}</td>";
                            echo "</tr>";
                    
                            // Only include rows with status other than 5 in the calculation
                            // if ($row['status'] == 3 || $row['status'] == 4) {
                            if ($row['status'] == 5 || $row['status'] == 6) {
                                // Calculate totalSellingPrice and totalCostPrice
                                $comSellingPrice += $row['input_srp'] * $row['qty_added'];
                                $qty_added = $row['qty_added'];
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

        <div>
                <div style="display: flex; flex-direction: row; justify-content: space-between" class="border rounded p-3 mb-4">
                    <div>
                        <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                            <h4 class="">Total Return Price ₱<?php echo number_format($comSellingPrice, 2); ?></h4>
                        </div>
                    </div>
                    <div style="width: 30%">
                        <!-- <button type="button" id="acceptMaterialTransfer" class="btn w-100 btn-primary mb-2">Accept</button> -->
                        <button type="button" id="returnMaterialTransfer" class="btn w-100 btn-outline-primary mb-2">Return</button>
                    </div>
                </div> 
            </div>
        </div>
</div>

</div>
<?php include 'footer.php'?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script>
    $(document).ready(function () {
        // Return Material Transfer
        $('#returnMaterialTransfer').click(function () {
            // Check if the button is enabled
            if ($(this).prop('disabled')) {
                return; // Do nothing if the button is disabled
            }

            var user_brn_code = $('#user_brn_code').val();
            var materialInvoiceNo = $('#material_invoice').val();
            var sessionID = $('#sessionID').val();
            var cashierName = $('#cashierName').val();

            // Send notification
            $.ajax({
                url: '../php/update_notification.php',
                method: 'POST',
                data: {
                    sessionID: sessionID,
                    type_id: materialInvoiceNo,
                    type: 'Material Transaction',
                    sender: cashierName,
                    message: 'The Store return the Material Transfer'
                },
                success: function (response) {
                    console.log('Notification sent successfully');

                    // Loop through checked checkboxes and update product stocks
                    $('input[name="product_checkbox[]"]:checked').each(function() {
                        var closestRow = $(this).closest('tr');
                        var productId = closestRow.find('input[name="product_id[]"]').val();
                        var qtytotal = parseInt(closestRow.find('td:eq(6)').attr('data-quantity-requested'));
                        var status = closestRow.find('td:eq(7)').text().trim();
                        var inputId = 'quantityInput_' + closestRow.attr('data-row-index');
                        var qtySent = $('#' + inputId).val(); // Retrieve input value

                        console.log('Status:', status);
                        console.log('Branch_code:', user_brn_code);
                        console.log('productId:', productId);
                        console.log('QtySent:', qtySent);

                        if (status === 'Return') {
                            // Only update product stocks if status is 'Return'
                            $.ajax({
                                url: '../php/return_product_stocks.php',
                                method: 'POST',
                                data: {
                                    productId: productId,
                                    qty_total: qtytotal,
                                    user_brn_code: user_brn_code,
                                    qty_sent: qtySent,
                                    input_id: inputId,
                                    materialInvoiceID: materialInvoiceNo,
                                    status: status
                                },
                                success: function (response) {
                                    console.log('Product stocks updated successfully for product ID ' + productId);
                                },
                                error: function (xhr, status, error) {
                                    console.error('Error updating product stocks for product ID ' + productId + ':', error);
                                }
                            });
                        } else {
                            console.log('Status is not "Return", skipping product ID ' + productId);
                            console.log('Status is:', status);
                            // Handle other statuses here
                            // You can add any desired behavior for statuses other than "Return"
                        }
                    });

                    swal("Material Returned", "Products have been returned", "error");
                },
                error: function (xhr, status, error) {
                    console.error('Error sending notification:', error);
                }
            });
        });

        // Function to update button status based on status value
        function updateButtonStatus() {
            console.log('Function updateButtonStatus() is running.');

            var allReturn = true;
            var anyChecked = false;

            $('input[name="product_checkbox[]"]').each(function () {
                var closestRow = $(this).closest('tr');
                var status = closestRow.find('td:eq(7)').text().trim();
                console.log('Status:', status);

                if ($(this).prop('checked')) {
                    anyChecked = true;

                    if (status !== 'Return') {
                        allReturn = false;
                    }
                } else {
                    closestRow.find('td:eq(6)').text(closestRow.find('td:eq(6)').attr('data-quantity-requested'));
                }
            });

            console.log('Any checkbox checked:', anyChecked);
            console.log('All return:', allReturn);

            if (allReturn && anyChecked) {
                $('#acceptMaterialTransfer').prop('disabled', false);
                $('#returnMaterialTransfer').prop('disabled', false);
            } else {
                $('#acceptMaterialTransfer').prop('disabled', true);
                $('#returnMaterialTransfer').prop('disabled', true);
            }
        }

        // Update input field when checkbox is clicked
        $('input[name="product_checkbox[]"]').click(function () {
            var closestRow = $(this).closest('tr');
            var qtyRequested = parseInt(closestRow.find('td:eq(6)').text());

            if ($(this).prop('checked')) {
                var inputField = $('<input type="number" class="form-control" min="0">');
                var inputId = 'quantityInput_' + closestRow.attr('data-row-index');
                inputField.attr('id', inputId);
                inputField.attr('max', qtyRequested);
                inputField.val(qtyRequested);
                closestRow.find('td:eq(6)').html(inputField);
            } else {
                closestRow.find('td:eq(6)').text(closestRow.find('td:eq(6)').attr('data-quantity-requested'));
            }

            updateButtonStatus();
        });

        // Initial update of button status
        updateButtonStatus();
    });
</script>

<!-- 

Backup code to working pang add at return

<script>
$(document).ready(function () {
    // Accept Material Transfer
    $('#acceptMaterialTransfer').click(function () {
        // Check if the button is enabled
        if ($(this).prop('disabled')) {
            return; // Do nothing if the button is disabled
        }
        var user_brn_code = $('#user_brn_code').val();
        var materialInvoiceNo = $('#material_invoice').val();
        var sessionID = $('#sessionID').val();
        var cashierName = $('#cashierName').val();
        // Define total values (replace with actual values)
        var comSellingPrice = '<?php echo $comSellingPrice; ?>';


        // Save Material Transfer with total values
        $.ajax({
            url: '../php/store_stocks_recompute.php',
            method: 'POST',
            data: {
                materialInvoiceID: materialInvoiceNo,
                totalSellingPrice: comSellingPrice
            },
            success: function (response) {
                console.log(response);
                // Send notification
                $.ajax({
                    url: '../php/update_notification.php',
                    method: 'POST',
                    data: {
                        sessionID: sessionID,
                        type_id: materialInvoiceNo,
                        type: 'Material Transaction',
                        sender: cashierName,
                        message: 'The Store accepted the Material Transfer'
                    },
                    success: function (response) {
                        console.log('Notification sent successfully');
                        // Loop through checked checkboxes and update product stocks
                        $('input[name="product_checkbox[]"]:checked').each(function() {
                            var productId = $(this).closest('tr').find('input[name="product_id[]"]').val();
                            var qtySent = $(this).closest('tr').find('td:eq(6)').text(); // Assuming qty sent is in the 7th column
                            var status = $(this).closest('tr').find('td:eq(7)').text(); // Assuming status is in the 8th column
                            
                            console.log('Status:', status); // Log the status value
                            console.log('Branch_code:', user_brn_code); // Log the status value
                            console.log('productId:', productId); // Log the status value
                            if (status === 'Approved') {
                                // Only update product stocks if status is 'Accepted'
                                $.ajax({
                                    url: '../php/add_product_stocks.php',
                                    method: 'POST',
                                    data: {
                                        productId: productId,
                                        qty_sent: qtySent,
                                        user_brn_code: user_brn_code,
                                        materialInvoiceID: materialInvoiceNo,
                                        status: status // Pass the status to the PHP script
                                    },
                                    success: function (response) {
                                        console.log('Product stocks updated successfully for product ID ' + productId);
                                    },
                                    error: function (xhr, status, error) {
                                        console.error('Error updating product stocks for product ID ' + productId + ':', error);
                                    }
                                });
                            } else {
                                console.log('Status is not "Accepted", skipping product ID ' + productId);
                                console.log('Status is not "status", status is ' + status);
                                // Handle other statuses here
                                // You can add any desired behavior for statuses other than "Accepted"
                            }
                        });

                        swal("Material Accepted", "Products have been accepted", "success");
                    },
                    error: function (xhr, status, error) {
                        console.error('Error sending notification:', error);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error('Error saving data:', error);
            }
        });
    });

    $(document).ready(function () {
    // Return Material Transfer
    $('#returnMaterialTransfer').click(function () {
        // Check if the button is enabled
        if ($(this).prop('disabled')) {
            return; // Do nothing if the button is disabled
        }
        
        var user_brn_code = $('#user_brn_code').val();
        var materialInvoiceNo = $('#material_invoice').val();
        var sessionID = $('#sessionID').val();
        var cashierName = $('#cashierName').val();
        
        // Send notification
        $.ajax({
            url: '../php/update_notification.php',
            method: 'POST',
            data: {
                sessionID: sessionID,
                type_id: materialInvoiceNo,
                type: 'Material Transaction',
                sender: cashierName,
                message: 'The Store return the Material Transfer'
            },
            success: function (response) {
                console.log('Notification sent successfully');
                
                // Loop through checked checkboxes and update product stocks
                $('input[name="product_checkbox[]"]:checked').each(function() {
                    var productId = $(this).closest('tr').find('input[name="product_id[]"]').val();
                    var qtySent = $(this).closest('tr').find('td:eq(6)').text(); // Assuming qty sent is in the 7th column
                    var status = $(this).closest('tr').find('td:eq(7)').text(); // Assuming status is in the 8th column
                    
                    console.log('Status:', status); // Log the status value
                    console.log('Branch_code:', user_brn_code); // Log the status value
                    console.log('productId:', productId); // Log the status value
                    
                    if (status === 'Approved') {
                        // Only update product stocks if status is 'Approved'
                        $.ajax({
                            url: '../php/return_product_stocks.php',
                            method: 'POST',
                            data: {
                                        productId: productId,
                                        qty_sent: qtySent,
                                        // user_brn_code: user_brn_code not needed because the value is 'WAREHOUSE'
                                        materialInvoiceID: materialInvoiceNo,
                                        status: status // Pass the status to the PHP script
                            },
                            success: function (response) {
                                console.log('Product stocks updated successfully for product ID ' + productId);
                            },
                            error: function (xhr, status, error) {
                                console.error('Error updating product stocks for product ID ' + productId + ':', error);
                            }
                        });
                    } else {
                        console.log('Status is not "Approved", skipping product ID ' + productId);
                        console.log('Status is:', status);
                        // Handle other statuses here
                        // You can add any desired behavior for statuses other than "Approved"
                    }
                });
                
                swal("Material Returned", "Products have been returned", "error");
            },
            error: function (xhr, status, error) {
                console.error('Error sending notification:', error);
            }
        });
    });
});



    $(document).ready(function () {
    // Update button status based on status value
    function updateButtonStatus() {
        console.log('Function updateButtonStatus() is running.'); // Log that the function is running
        
        var allApproved = true; // Flag to track if all selected products have status "Approved"
        
        // Loop through each selected checkbox
        $('input[name="product_checkbox[]"]:checked').each(function() {
            var closestRow = $(this).closest('tr');
            var status = closestRow.find('td:eq(7)').text().trim(); // Assuming status is in the 8th column
            console.log('Status:', status); // Log the status value
            
            // If status is null or not "Approved"
            if (status === 'Approved') { 
                allApproved = false; // Set the flag to false
                return true; // Exit the loop
            }
        });
        
        console.log('All approved:', allApproved); // Log the flag value
        
        // Update button status based on the flag value
        if (allApproved) {
            $('#acceptMaterialTransfer').prop('disabled', true); // Enable accept button
            $('#returnMaterialTransfer').prop('disabled', true); // Enable decline button
        } else {
            $('#acceptMaterialTransfer').prop('disabled', false); // Disable accept button
            $('#returnMaterialTransfer').prop('disabled', false); // Disable decline button
        }
    }

    // Update button status when a checkbox is clicked
    $('input[name="product_checkbox[]"]').click(function() {
        updateButtonStatus();
    });

    // Initial update of button status
    updateButtonStatus();
    });

});

</script> -->