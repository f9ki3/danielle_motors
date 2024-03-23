<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?php include '../config/config.php'?>
<?PHP Include '../php/product_dropdown.php'?>

<?php
// Retrieve the material_id from the URL
if (isset($_GET['material_id'])) {
    $materialId = $_GET['material_id'];
    // Now you can use $materialId to fetch the corresponding data from the database
    // Fetch data based on $materialId...
} else {
    // Handle case where material_id is not provided
    echo "Material ID not provided!";
}
?>


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

        <div style="background-color: white; height: auto;" class="rounded border p-3 mb-3 w-100">
             <div class="border rounded mt-2 p-3" >
                    <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <div>
                            <h4 id="materialInvoice">Material Invoice:</h4>
                            <h4 id="materialDate">Date:</h4>
                        </div>
                        <div>
                            <!-- <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#add_stocks">+ Add Stocks</button> -->
                            <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#print">Print</button>
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-3">
                        <div class="form-floating" style="width: 32%;">
                            <select id="cashierName" class="form-select" aria-label="Default select example"></select>
                            <label for="Cashier">Cashier By</label>
                        </div>
                        <div class="form-floating" style="width: 32%;">
                            <select id="receivedBy" class="form-select" aria-label="Default select example"></select>
                            <label for="transaction_received">Received by</label>
                        </div>
                        <div class="form-floating" style="width: 32%;">
                            <select id="inspectedBy" class="form-select" aria-label="Default select example"></select>
                            <label for="transaction_inspected">Inspected by</label>
                        </div>
                        <div class="form-floating" style="width: 32%;">
                            <select id="verifiedBy" class="form-select" aria-label="Default select example"></select>
                            <label for="transaction_verified">Verified by</label>
                        </div>
                    </div>
                    <div>
                        <!-- <input type="text" class="form-control mb-2 form-control-sm w-25" placeholder="Search"> -->
                    </div>
             </div>
        </div>
    </div>
             

             <div style="overflow-y: auto; height: 450px">
        <table id="deliverydataMaterial" class="table mt-1 stripe hover order-column row-border">
            <thead>
                <tr>
                    <th scope="col" width="10%">Product id</th>
                    <th scope="col" width="10%">Date</th>
                    <th scope="col" width="15%">Product Name</th>
                    <th scope="col" width="15%">Stocks</th>
                    <th scope="col" width="15%">Current Price</th>
                    <th scope="col" width="15%">Selling Price</th>
                    <th scope="col" width="10%">Markup</th>
                    <th class="text-end" scope="col" width="20%">Action</th>
                </tr>
            </thead>
           <tbody id="MaterialTableBody"class="table table-bordered stripe hover order-column row-border" >
            </tbody>
        </table>
    </div>
            <div class="border rounded mt-2 p-3" >
                    <div style="display: flex; flex-direction: row; justify-content: space-between">
                        <div>
                            <h4>Net : PHP 100.00</h4>
                            <h4>Gross: PHP 100.00</h4>

                        </div>
                        <div style="width: 30%">
                            <button type="button" class="btn w-100 btn-primary mb-2">Save</button>
                            <button type="button" class="btn w-100 btn-outline-primary mb-2">Cancel</button>
                        </div>
                    </div>

                    
                    
             </div>
            
        </div>




<!-- end purchase-->

<!-- Modal -->
<div class="modal fade" id="add_stocks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Stocks</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body " style="display: flex; flex-direction: column; align-items: center; justify-content: center">

        <datalist id="suggestions">
            <?php foreach ($products as $product): ?>
                <option><?php echo $product['id']; echo "-"?><?php echo $product['name']; ?><?php echo " - "?><?php echo $product['models']; ?></option>
            <?php endforeach; ?>
        </datalist>

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">Select Product </span>
            <input type="text" id="select_product" class="form-control" list="suggestions" placeholder="Search Here">
        </div>

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">Net Price</span>
            <input type="text" class="form-control" id="price" value="100">
        </div>

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">Net Price</span>
            <input type="text" class="form-control" >
        </div>

        <div class="input-group mb-2">
            <span class="input-group-text w-25" id="basic-addon1">QTY</span>
            <input type="text" class="form-control" >
        </div>
            
        
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
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
});

$(document).ready(function() {
    // Initialize DataTable
    var table = $('#deliverydataMaterial').DataTable({
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
            'url': '../php/delivery_stock_fetch.php',
            'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [] // Adjust the index to match the actual number of columns
        }]
    });
});
</script>
