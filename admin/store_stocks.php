
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php
include 'navigation_bar.php';
include '../config/config.php';

?>
<link href="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.css" rel="stylesheet">
<!-- start inventory-->

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

        <div style="background-color: white; height: 90vh;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <h6>Store Stocks</h6>
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input  class="form-control form-control-sm" placeholder="Search">
                    </div>

                    <div>
                        <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#add_stocks">+ Material Transfer</button>
                        <a heref="store_stocks" class="btn btn-primary border btn-sm rounded" >Stocks</a>
                        <a heref="purchase" class="btn border btn-sm rounded" >Product</a>
                    </div>
                </div>
            </div>


            
<div>
    <table id="tabledataMaterial" class="table table-bordered">
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

<!-- Modal -->
<div class="modal fade" id="add_stocks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Material Transfer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body " style="display: flex; flex-direction: column; align-items: center; justify-content: center">


<input type="date" class="form-control mb-2" id="materialDate">
<input type="text" class="form-control mb-2" placeholder="Material Invoice No." id="materialInvoiceNo">
<input type="text" class="form-control mb-2" placeholder="Cashier Name" id="cashierName" pattern="[A-Za-z ]{1,}" required>
<div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
    <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="receivedBy">
   
    </select>
    <select class="form-select mb-2" placeholder="Inspected by" aria-label="Default select example" style="width: 33%" id="inspectedBy">
    
    </select>
    <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="verifiedBy">
      
    </select>
</div>
        
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="saveMaterialTransfer">Save</button>
        </div>
    </div>
  </div>
</div>
<!-- End Modal -->


</div>
<?php include 'footer.php'?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>

<script type="text/javascript">
 $(document).ready(function () {
    $('#tabledataMaterial').DataTable({
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
    $(nRow).attr('id', aData[0]);
    },
      'serverSide': 'true',
      'processing': 'true',
      'paging': 'true',
      'order': [],
      'ajax': {
        'url': 'store_stocks_fetch.php',
        'type': 'post',
      },
      "aoColumnDefs": [{
        "bSortable": false,
        "aTargets": [4]
      },

      ]
    });
  });

  $(document).ready(function () {
     // ... Your existing DataTable initialization code ...

     // Save Material Transfer
     $('#saveMaterialTransfer').click(function () {
         var materialDate = $('#materialDate').val();
         var materialInvoiceNo = $('#materialInvoiceNo').val();
         var cashierName = $('#cashierName').val();
         var receivedBy = $('#receivedBy').val();
         var inspectedBy = $('#inspectedBy').val();
         var verifiedBy = $('#verifiedBy').val();


         $.ajax({
             url: 'store_stocks_save.php',
             method: 'POST',
             data: {
                 materialDate: materialDate,
                 materialInvoiceNo: materialInvoiceNo,
                 cashierName: cashierName,
                 receivedBy: receivedBy,
                 inspectedBy: inspectedBy,
                 verifiedBy: verifiedBy
             },
             success: function (response) {    
                 console.log(response);
                 $('#add_stocks').modal('hide');
             },
             error: function (xhr, status, error) {
                 console.error('Error saving data:', error);
             }
         });
     });
 });


 $(document).ready(function () {
     // ... Your existing DataTable initialization code ...

     // Fetch data for dropdowns
     function fetchAdminData(selectElementId, role) {
         $.ajax({
             url: 'fetch_admin_data.php', // Your server-side script to fetch admin data
             method: 'GET',
             data: { role: role }, // Optional: send role if needed
             dataType: 'json',
             success: function (data) {
                 // Populate the dropdown options
                 var selectElement = $('#' + selectElementId);
                 selectElement.empty();
                 selectElement.append('<option selected>Select ' + role + '</option>');
                 $.each(data, function (index, admin) {
                     selectElement.append('<option value="' + admin.id + '">' + admin.fname + ' ' + admin.lname + '</option>');
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

     // ... Your existing DataTable initialization code ...
     
     // Your existing Save Material Transfer click event handler
     $('#saveMaterialTransfer').click(function () {
         // ... Existing code ...
     });
 });
</script>