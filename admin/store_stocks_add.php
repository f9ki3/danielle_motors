<?php include 'session.php'; ?>
<html lang="en">
<?php include 'header.php'; ?>
<body>
    <div style="display: flex; flex-direction: row">
        <?php include 'navigation_bar.php'; ?>
        <?php include '../config/config.php'; ?>
        <?php include '../php/product_dropdown.php'; ?>

        <!-- start inventory-->
        <div style="width: 100%;" class="content p-3">
            <div>
                <div style="background-color: white;" class="rounded border p-3 w-100">
                    <div class="row">
                        <div style="display: flex; justify-content: space-between; align-items: center;"> 
                            <div style="width: 100%">
                                <div class="border rounded p-3" id="add_stocks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <h5 class="fw-bolder">Add Stocks</h5>
                                    <div style="display: flex; flex-direction: row;">
                                        <input type="text" class="form-control me-2" style="width: 20%" id="select_product" list="suggestions" placeholder="Search Item to Add">
                                        <input type="text" class="form-control me-2" style="width: 20%" id="suggested_retail_price" placeholder="Suggested Retail Price" <?php echo isset($delivery_receipt_content['orig_price']) ? 'value="' . $delivery_receipt_content['orig_price'] . '"' : ''; ?>>
                                        <input type="text" class="form-control me-2" style="width: 20%" id="quantity" placeholder="Qty">
                                        <button class="btn btn-primary" onclick="addItem()">Submit</button>
                                    </div>
                                    <!-- List to display submitted items -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 mb-3">
                        <div style="height: 50vh; overflow: auto" class="rounded border">
                            <table class="table">
                                <thead class="sticky-top">
                                    <tr>
                                        <th scope="col" width="15%">Product Name</th>
                                        <th scope="col" width="10%">Model</th>
                                        <th scope="col" width="10%">Brand</th>
                                        <th scope="col" width="10%">SRP</th>
                                        <th scope="col" width="10%">Unit</th>
                                        <th scope="col" width="10%">QTY</th>
                                        <th scope="col" width="10%">Amount</th>
                                        <th scope="col" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="cartItemsList">
                                    <!-- <?php 
                                        for ($x = 0; $x <= 100; $x++) {
                                            echo '<tr>
                                                <th scope="col" width="15%">Product Name</th>
                                                <th scope="col" width="10%">Model</th>
                                                <th scope="col" width="10%">Brand</th>
                                                <th scope="col" width="10%">Price</th>
                                                <th scope="col" width="5%">Unit</th>
                                                <th scope="col" width="10%">QTY</th>
                                                <th scope="col" width="10%">Discount</th>
                                                <th scope="col" width="10%">Amount</th>
                                                <th scope="col" width="5%">Action</th>
                                            </tr>';
                                        }
                                    ?> -->

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between; background-color: white">
                        <div style="width: 49%" class="py-2 mb-2">
                            <div class="border rounded p-4 pb-5">
                                <h3 class="fw-bolder">Material Transfer</h3>
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-3">
                                    <input type="text" class="form-control" placeholder="Material Invoice" style="width: 49%" id="materialInvoiceNo">
                                    <input type="date" class="form-control" placeholder="Date" style="width: 49%" id="materialDate">
                                </div>
                                <input type="text" class="form-control mb-2" placeholder="Cashier Name" id="cashierName" pattern="[A-Za-z ]{1,}" required>
                                <div style="display: flex; flex-direction: row; justify-content: space-between">
                                    <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="receivedBy">
                                        <option value="Alexander Inciong">Alexander Inciong</option>
                                        <option value="Alexander Inciong">Alexander Inciong</option>
                                        <option value="Alexander Inciong">Alexander Inciong</option>
                                    </select>
                                    <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="inspectedBy">
                                        <option value="Alexander Inciong">Alexander Inciong</option>
                                        <option value="Alexander Inciong">Alexander Inciong</option>
                                        <option value="Alexander Inciong">Alexander Inciong</option>
                                    </select>
                                    <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="verifiedBy">
                                        <option value="Alexander Inciong">Alexander Inciong</option>
                                        <option value="Alexander Inciong">Alexander Inciong</option>
                                        <option value="Alexander Inciong">Alexander Inciong</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="width: 50%" class="p-2">
                            <div class="border rounded p-4">
                                <h3 class="fw-bolder">Summary</h3><hr>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Selling Price</h5>
                                    <h5 class="" id="SellingPrice">₱0.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Cost Price</h5>
                                    <h5 class="" id="BasePrice">₱0.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Gross Profit</h5>
                                    <h5 class="" id="GrossProfit">₱0.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mt-2">
                                    <button id="cancelButton" class="btn text-primary border-primary" style="width: 49%">Cancel</button>
                                    <button type="button" class="btn btn-primary" style="width: 49%" id="saveMaterialTransfer">Request</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
    </html>