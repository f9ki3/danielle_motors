
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

?>
<!-- start inventory-->

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
<!-- end purchase-->


</div>
<?php include 'footer.php'?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>


<script type="text/javascript">
$(document).ready(function () {
    // Initialize DataTable
    var table = $('#tabledataMaterial').DataTable({
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
            'url': '../php/warehouse_stocks_return.php',
            'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [6] // Adjust the index to match the actual number of columns
        }]
    });

    // Define click event handler for view button
    $('#tabledataMaterial tbody').on('click', '.view', function () {
        // Handle button click event here
        var rowData = table.row($(this).closest('tr')).data();
        window.location.href = "warehouse_return_remove";
        console.log('View button clicked for row:', rowData);
    });

$('#tabledataMaterial tbody').on('click', '.delete', function () {
    // Get the data associated with the clicked row
    var rowData = table.row($(this).closest('tr')).data();
        // Perform any action you want based on the row data
        // For example, you can open a modal with the row data for viewing
        console.log('View button clicked for row:', rowData);
    
    // Populate modal with row data
    // $('#id').val(rowData[0]); // Assuming date is in the firsts column
    $('#materialInvoiceNo').val(rowData[0]); // Assuming material invoice number is in the second column
    $('#materialDate').val(rowData[1]); // Assuming date is in the third column
    $('#cashierName').val(rowData[2]); // Assuming cashier name is in the fourth column

    // Set selected options for dropdowns
    $('#receivedBy').val(rowData[3]); // Assuming received by is in the fifth column
    $('#inspectedBy').val(rowData[4]); // Assuming inspected by is in the sixth column
    $('#verifiedBy').val(rowData[5]); // Assuming verified by is in the seventh column

});

$('#tabledataMaterial tbody').on('click', '.delete', function () {
    var rowData = table.row($(this).closest('tr')).data();
    console.log('Delete button clicked for row:', rowData);

    // Get other updated values from the modal inputs
    var materialDate = $('#materialDate').val();
    var materialInvoiceNo = $('#materialInvoiceNo').val();
    var cashierName = $('#cashierName').val();
    var receivedById = $('#receivedBy').val();
    var inspectedById = $('#inspectedBy').val();
    var verifiedById = $('#verifiedBy').val();

    // Fetch first name and last name based on the selected IDs
    $.ajax({
        url: '../php/fetch_admin_data.php', // Your server-side script to fetch admin data
        method: 'GET',
        dataType: 'json',
        success: function (data) {    
            var receivedBy = fetchAdminData(receivedById, data);
            var inspectedBy = fetchAdminData(inspectedById, data);
            var verifiedBy = fetchAdminData(verifiedById, data);    
            swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to see the record",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    // Perform AJAX request to update the active column
    $.ajax({
        url: '../php/store_stocks_archive.php', // Change the URL to your PHP script that updates the active column
        method: 'POST',
        data: {     materialDate: materialDate,
                    materialInvoiceNo: materialInvoiceNo,
                    cashierName: cashierName,
                    receivedBy: receivedBy,
                    inspectedBy: inspectedBy,
                    verifiedBy: verifiedBy
        
        },
        success: function (response) {
            // Handle the response from the server
            console.log(response);
            // Reload or update the DataTable if needed
            table.ajax.reload();
        },
        error: function (xhr, status, error) {
            // Handle errors
            console.error(error);
        }
    });
    swal("Record has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your Record file is safe!");
  }
});
        },
        error: function (xhr, status, error) {
            console.error('Error fetching admin data:', error);
        }
    });
    });
});


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