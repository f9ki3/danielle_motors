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
<link href="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.css" rel="stylesheet">
<!-- start inventory-->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Purchase</h5>
            <a href="purchase" class="btn btn-sm  border rounded mb-2">Purchase Walk-in</a>
            <a href="purchase_online" class="btn btn-sm border rounded mb-2">Purchase Online</a>
            <a href="purchase_terms" class="btn btn-sm border rounded mb-2">Purchase with Terms</a>
            <a href="store_stocks" class="btn btn-sm border btn-primary rounded mb-2">Store Stocks</a>
            
        </div>

        <div style="background-color: white; height: auto;" class="rounded border p-3 pb-5 mb-3 w-100">
        <div class="row">
                <h6>Store Stocks</h6>
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input  class="form-control form-control-sm" placeholder="Search">
                    </div>

                    <div>
                        <!-- <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#add_stocks">+ Material Transfer</button> -->
                        <a href="store_stocks" class="btn border btn-sm rounded" >Stocks</a>
                        <a href="store_product_list" class="btn border btn-primary btn-sm rounded" >Product</a>
                    </div>
                </div>
                <div class="p-1" style="overflow: auto; height: 70vh">
                    <table id="ProductdataMaterial" class="table table-bordered stripe hover order-column compact row-border ">
                        <thead>
                            <tr>
                                <td scope="col">Image</td>
                                <td scope="col">Product Name</td>
                                <td scope="col">Model</td>
                                <td scope="col">Brand</td>
                                <td scope="col">Supplier Code</td>
                                <td scope="col">Unit ID</td>
                                <td scope="col">Stocks</td>
                                <td scope="col">Barcode</td>
                                <td scope="col">Availability</td>
                                <td scope="col">Action</td>
                            </tr>
                        </thead>
                        <tbody id="MaterialTableBody">
                            <!-- dynamic populate -->
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>


        <!-- Add Modal -->
        <div class="modal fade mt-5" id="add_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control form-control-sm mb-2" placeholder="SR NO.">
                <input type="text" class="form-control form-control-sm mb-2" placeholder="Product Name">
                <textarea name="" class="form-control form-control-sm mb-2" placeholder="Description" id="" cols="30" rows="5"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">+ Add</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- end inventory-->

</div>
<?php include 'footer.php'?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    // Initialize DataTable
    var table = $('#ProductdataMaterial').DataTable({
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
            'url': '../php/product_list_fetch.php',
            'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [8] // Adjust the index to match the actual number of columns
        }]
    });

    // Define click event handler for view button
    $('#ProductdataMaterial tbody').on('click', '.view', function () {
        // Get the data associated with the clicked row
        var rowData = table.row($(this).closest('tr')).data();
        window.location.href = "store_product_list";
        // Perform any action you want based on the row data
        // For example, you can open a modal with the row data for viewing
        console.log('View button clicked for row:', rowData);
    });

// Define click event handler for delete button
$('#ProductdataMaterial tbody').on('click', '.delete', function () {
    var rowData = table.row($(this).closest('tr')).data();
    console.log('Delete button clicked for row:', rowData);

    // Extract relevant data from the row
    var code = rowData[7];

    // Confirm deletion with a warning message
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            // Perform AJAX request to update the active column
            $.ajax({
                url: '../php/archive_product.php', // Change the URL to your PHP script that updates the active column
                method: 'POST',
                data: {     
               
                    code: code
                },
                success: function (response) {
                    // Handle the response from the server
                    console.log(response);
                    // Reload or update the DataTable if needed
                    table.ajax.reload();
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                },
                error: function (xhr, status, error) {
                    // Handle errors
                    console.error(error);
                }
            });
        } else {
            swal("Your imaginary file is safe!");
        }
    });
});

});

</script>
