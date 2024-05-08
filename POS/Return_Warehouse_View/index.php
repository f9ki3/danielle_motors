@ -0,0 +1,285 @@
<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include "../../page_properties/header_pos.php" ?>
  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <!-- navigation -->
      <?php include "../../page_properties/navbar_pos.php";?>
      <!-- /navigation -->
      <div class="content bg-white">
        <?php 
        include "content.php";
        ?>
        <!-- <div class="d-flex flex-center content-min-h">
          <div class="text-center py-9"><img class="img-fluid mb-7 d-dark-none" src="../../assets/img/spot-illustrations/2.png" width="470" alt="" /><img class="img-fluid mb-7 d-light-none" src="../../assets/img/spot-illustrations/dark_2.png" width="470" alt="" />
            <h1 class="text-800 fw-normal mb-5"><?php echo $current_folder;?></h1><a class="btn btn-lg btn-primary" href="../../documentation/getting-started.html">Getting Started</a>
          </div>
        </div> -->
        <!-- footer -->
        <?php include "../../page_properties/footer.php"; ?>
        <!-- /footer -->
      </div>
      <!-- chat-container -->
      <!-- <?php include "../../page_properties/chat-container.php"; ?> -->
      <!-- /chat container -->
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- theme customizer -->
    <?php include "../../page_properties/theme-customizer.php"; ?>
    <!-- /theme customizer -->

    <?php include "../../page_properties/footer_main.php"; ?>
  </body>


<!-- Mirrored from prium.github.io/phoenix/v1.13.0/pages/starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Aug 2023 05:15:14 GMT -->
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

// datatables

<?php
include '../config/config.php';

$output = array();
$columns = array(
    0 => 'id',
    1 => 'material_invoice',
    2 => 'material_date',
    3 => 'material_cashier',
    4 => 'material_recieved_by',
    5 => 'material_inspected_by',
    6 => 'material_verified_by'
);


$sql = "SELECT `id`, `material_invoice`, `material_date`, `material_cashier`, `material_recieved_by`, `material_inspected_by`, `material_verified_by`, `active` FROM `material_transfer` WHERE `active` = 1 AND `declined` = 2" ;

// Filter by search value
if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " AND (";
    foreach ($columns as $index => $column) {
        $sql .= "`$column` LIKE '%$search_value%' OR ";
    }
    $sql = rtrim($sql, "OR "); // Remove the last 'OR'
    $sql .= ")";
}

// Order by specific column
if (isset($_POST['order'])) {
    $column_index = $_POST['order'][0]['column'];
    $column_name = $columns[$column_index];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY `$column_name` $order";
} else {
    // Default ordering by id in descending order
    $sql .= " ORDER BY `id` DESC";
}

$query = mysqli_query($conn, $sql);
$total_all_rows = mysqli_num_rows($query);

$data = array();

while ($row = mysqli_fetch_assoc($query)) {
    $sub_array = array();
    $sub_array[] = $row['material_invoice'];
    $sub_array[] = $row['material_date'];
    $sub_array[] = $row['material_cashier'];
    $sub_array[] = !empty($row['material_recieved_by']) ? $row['material_recieved_by'] : 'Pending';
    $sub_array[] = !empty($row['material_inspected_by']) ? $row['material_inspected_by'] : 'Pending';
    $sub_array[] = !empty($row['material_verified_by']) ? $row['material_verified_by'] : 'Pending';
    $sub_array[] = '<a class="btn btn-sm border view" href="warehouse_return_remove.php?material_transaction=' . $row['material_invoice'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/></svg></a>
                    <button class="btn btn-sm border delete" id="' . $row['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/></svg></button>';

    $data[] = $sub_array;
}
$output = array(
    "draw"              => intval($_POST["draw"]),
    "recordsTotal"      => $total_all_rows,
    "recordsFiltered"   => $total_all_rows,
    "data"              => $data
);

echo json_encode($output);
?>
</script>