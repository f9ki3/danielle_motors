
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?php include '../config/config.php';
?>

<style>
    /* Adjust the min-width value according to your preference */
    .select2-container--default .select2-selection--single {
        min-width: 150px;
    }
</style>
<!-- start inventory-->

<div style="width: 100%" class="content p-3">
    <div>

        <div style="background-color: white;" class="rounded border p-3 w-100">
            <div class="row">
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 100%">
                        
                       <div class="border rounded p-3">
                            <h5 class="fw-bolder ">Add Stocks</h5>
                            <datalist id="suggestions">
                                <?php foreach ($products as $product): ?>
                                    <option><?php echo $product['id']; echo "-"?><?php echo $product['name']; ?><?php echo " - "?><?php echo $product['models']; ?></option>
                                <?php endforeach; ?>
                            </datalist>
                            <div style="display: flex; flex-direction: row">
                                <input type="text" class="form-control me-2" style="width: 20%" id="select_product" list="suggestions" placeholder="Search Item to Add">
                                <input type="text" class="form-control me-2" style="width: 20%" placeholder="Suggested Retail Price">
                                <input type="text" class="form-control me-2" style="width: 20%" placeholder="Based Price">
                                <input type="text" class="form-control me-2" style="width: 20%" placeholder="Qty">
                                <button class="btn btn-primary">Submit</button>
                            </div>

                       </div>
                    
                    </div>
                </div>
                </div>
                <div style="height: 80vh;">
                    <hr>
                    <div style="height: 50vh; overflow: auto">
                        <table class="table">
                            <thead class="sticky-top">
                                <tr>
                                <th scope="col" width="15%">Product Name</th>
                                <th scope="col" width="10%">Model</th>
                                <th scope="col" width="10%">Brand</th>
                                <th scope="col" width="10%"> Based Price</th>
                                <th scope="col" width="10%"> SRP</th>
                                <th scope="col" width="10%"> Markup</th>
                                <th scope="col" width="10%"> Stocks</th>
                                <th scope="col" width="10%">Amount</th>
                                <th scope="col" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="cartItemsList" >
                                <!-- Cart items will be populated here -->
                            </tbody>
                        </table>
                        
                    </div>
                    <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                        <div style="width: 49%" class="py-2 mb-2">
                            <div class="border rounded p-4 pb-5">
                            <h3 class="fw-bolder">Material Transfer</h3>
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-3">
                                    <input type="text" class="form-control" placeholder="Material Invoice" style="width: 49%">
                                    <input type="date" class="form-control" placeholder="Date" style="width: 49%" id="dateInput">
                                </div>
                                <input type="text" class="form-control mb-2" placeholder="Cashier Name">

                                <div style="display: flex; flex-direction: row; justify-content: space-between" >
                                    <select class="form-select" style="width: 32%" aria-label="Default select example">
                                        <option selected>Verified by</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" style="width: 32%" aria-label="Default select example">
                                        <option selected>Inspected by</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <select class="form-select" style="width: 32%" aria-label="Default select example">
                                        <option selected>Recieved by</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                
                            </div>

                        </div>
                        <div style="width: 50%" class="p-2">
                            <div class="border rounded p-4">
                                <h3 class="fw-bolder">Summary</h3><hr>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Selling Price</h5>
                                    <h5 class="" id="subtotal">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Cost Price</h5>
                                    <h5 class="" id="tax">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Gross Profit</h5>
                                    <h5 class="" id="subtotal_discount">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mt-2">
                                    <button class="btn text-primary border-primary " style="width: 49%">Cancel</button>
                                    <button class="btn btn-primary " style="width: 49%">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            
        </div>





<!-- end purchase cart-->



</div>
<?php include 'footer.php'?>



</body>
</html>
