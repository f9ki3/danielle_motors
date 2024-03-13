
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

        <div style="background-color: white; height: auto;" class="rounded border p-3 pb-5 mb-3 w-100">
        <div class="row">
                <h6>Store Stocks</h6>
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input  class="form-control form-control-sm" placeholder="Search">
                    </div>

                    <div>
                        <button class="btn border btn-sm rounded" data-bs-toggle="modal" data-bs-target="#add_stocks">+ Material Transfer</button>
                        <a href="store_stocks" class="btn border btn-sm rounded" >Stocks</a>
                        <a href="store_product_list" class="btn border btn-primary btn-sm rounded" >Product</a>
                    </div>
                </div>
                <div class="p-1" style="overflow: auto; height: 70vh">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <td scope="col">Product Id</td>
                                <td scope="col">Image</td>
                                <td scope="col">Product Name</td>
                                <td scope="col">Brand</td>
                                <td scope="col">Models</td>
                                <td scope="col">unit</td>
                                <td scope="col">Stocks</td>
                                <td scope="col">Selling Price</td>
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
    var table = $('#tabledataMaterial').DataTable({
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
            "aTargets": [6] // Adjust the index to match the actual number of columns
        }]
    });
});
</script>