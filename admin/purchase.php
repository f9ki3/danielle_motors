
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?php include '../config/config.php'; ?>

<style>
    /* Adjust the min-width value according to your preference */
    .select2-container--default .select2-selection--single {
        min-width: 150px;
    }

    .button-container {
    position: relative;
    }

    .badge-container {
        position: absolute;
        top: 0;
        right: 0;
    }

    .badge {
        position: absolute;
        top: -10px;
        right: -10px;
    }

</style>
<!-- start inventory-->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Purchase</h5>
            <a href="purchase" class="btn btn-primary btn-sm  border rounded mb-2">Purchase Walk-in</a>
            <a href="purchase_online" class="btn btn-sm border rounded mb-2">Purchase Online</a>
            <a href="purchase_terms" class="btn btn-sm border rounded mb-2">Purchase with Terms</a>
            <a href="store_stocks" class="btn btn-sm border  rounded mb-2">Store Stocks</a>
            
        </div>

        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100" >
            <div class="row">
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input class="form-control form-control-sm" id="searchInput" placeholder="Search by Product Name">
                    </div>
                    <!-- <div style="display: flex; flex-direction: row">
                        <select id="brandSelect"  class="form-select form-select-sm " aria-label="Default select example" style="width:100%">
                            <option selected>Select Brand</option>
                             <?php foreach ($brands as $brand): ?>
                            <option value="<?php echo $brand['id']; ?>"><?php echo $brand['brand_name']; ?></option>
                             <?php endforeach; ?>
                        </select>
                        <select id="categorySelect"  class="form-select form-select-sm " aria-label="Default select example" style="width: 100%">
                            <option selected>Select Category</option>
                             <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                             <?php endforeach; ?>
                        </select>
                    </div> -->
                    <div class="button-container">
                        <a href="purchase" class="btn border btn-primary btn-sm me-5 rounded">Purchase</a>
                        <div class="badge-container">
                            <a href="purchase_cart" class="btn border btn-sm rounded">Cart</a>
                            <span class="badge text-bg-danger" id="counter"></span>
                        </div>
                    </div>


                </div>
                </div>
                <div style="height: 75vh;">
                    <div style="overflow: auto; height: 710px;">
                        <table class="mt-2 table" id="productTable">
                            <thead class="sticky-top">
                                <tr>
                                <th scope="col" width="5%">CODE.</th>
                                <th scope="col" width="15%">Product Name</th>
                                <th scope="col" width="5%">IMG</th>
                                <th scope="col" width="10%"> Model</th> 
                                <th scope="col" width="10%">Brand</th>
                                <th scope="col" width="5%">SRP</th>
                                <th scope="col" width="5%">Unit</th>
                                <th scope="col" width="5%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php include '../php/purchase_list.php'?>
                            
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            
        </div>





<!-- end purchase-->

</div>
<?php include 'footer.php'?>
</body>
</html>