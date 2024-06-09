<?php 
if(isset($_SESSION['invoice'])){
    $transaction_id = $_SESSION['invoice'];
} else {
    header("Location: ../Purchase-Warehouse");
}
?>
<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
<div class="row g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">Purchase Warehouse <?php echo $transaction_id; ?></h2>
        </div>
    </div>
    <div id="products" data-list="{&quot;valueNames&quot;:[&quot;product&quot;,&quot;price&quot;,&quot;category&quot;,&quot;tags&quot;,&quot;vendor&quot;,&quot;unit&quot;, &quot;model&quot;, &quot;status&quot;],&quot;page&quot;:10,&quot;pagination&quot;:true}">
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-3">
            <div class="search-box">
                <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                    <input class="form-control search-input search" type="search" placeholder="Search" aria-label="Search">
                <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path></svg><!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->
                </form>
            </div>
            
            <div class="ms-xxl-auto">
                <a href="../Purchase_Warehouse" class="btn border text-primary border-primary" ><span class="fas fa-plus me-2"></span> Purchase</a>
                <a href="../Purchase_Warehouse_Cart" class="btn text-primary border-primary border boder-primary position-relative">
                    <span class="fas fa-shopping-cart me-2"></span> Cart
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-circle" id="counter"></span>
                </a>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#input_qty">Enter Custom Quantity</button>
                <button class="btn btn-secondary" type="button" id="manual_button">Manual Entry</button>
                <button id="modal_for_manual" type="button" data-bs-toggle="modal" data-bs-target="#manual_modal" style="display:none;">burat</button>

            </div>
            </div>
        </div>
        <div class="pt-3 mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1" style="height: 35vh;">
        <div style="height: 35vh;" class="table-responsive scrollbar mx-n1 px-1">
            <table class="table">
                <thead class="sticky-top bg-white">
                    <tr>
                        <th scope="col" width="15%">Product Name</th>
                        <th scope="col" width="15%">Model</th>
                        <th scope="col" width="8%">Brand</th>
                        <th scope="col" width="8%">Unit</th>
                        <th scope="col" width="8%">Stocks</th>
                        <th scope="col" width="8%">Price</th>
                        <th scope="col" width="15%">QTY</th>
                        <th scope="col" width="10%">Discount</th>
                        <th scope="col" width="10%">Amount</th>
                        <th scope="col" width="5%">Action</th>
                    </tr>
                </thead>
                <tbody id="cartTableBody" >
                    
                </tbody>
            </table>
        </div>
    </div>

        <div class="pt-5 mx-n4 pb-5 px-4 mx-lg-n6 px-lg-6 bg-white d-flex flex-row position-relative top-1 justify-content-between">
                        <div style="width: 49%">
                            <div class="border rounded p-4">
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-2" >
                                    <div class="form-floating" style="width: 32%;">
                                        <input type="text" id="transaction_customer_name" class="form-control" placeholder="">
                                        <label for="transaction_customer_name">Customer Name</label>
                                    </div>
                                    <div class="form-floating" style="width: 32%;">
                                        <input type="text" id="transaction_address" class="form-control mb-2" placeholder="Address">
                                        <label for="transaction_address">Address</label>
                                    </div>
                                    <div class="form-floating" style="width: 32%;">
                                        <input type="date" id="transaction_date" class="form-control" placeholder="Date" >
                                        <label for="transaction_date">Date</label>
                                    </div>
                                    
                                </div>
                                
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-3">
                                    <div class="form-floating" style="width: 32%;">
                                        <select class="form-select mb-2" aria-label="Default select example" style="width: 100%" id="transaction_verified">

                                        </select>
                                        <label for="transaction_verified">Verified by</label>
                                    </div>
                                    <div class="form-floating" style="width: 32%;">
                                        <select class="form-select mb-2" aria-label="Default select example" style="width: 100%" id="transaction_inspected">

                                        </select>
                                        <label for="transaction_inspected">Inspected by</label>
                                    </div>
                                    <div class="form-floating" style="width: 32%;">
                                    <select class="form-select mb-2" aria-label="Default select example" style="width: 100%" id="transaction_received">
                                        
                                        </select>
                                        <label for="transaction_received">Recieved by</label>
                                    </div>
                                </div>

                                <div style="display: flex; flex-direction: row; justify-content: space-between"  class="mb-3">
                                    <div class="form-floating" style="width: 49%">
                                        <select id="transaction_payment" class="form-select" aria-label="Default select example" >
                                            <option selected value="Cash">Cash</option>
                                            <option value="G-Cash">G-Cash</option>
                                            <option value="PDC">Post-Dated Check</option>
                                        </select>
                                        <label for="transaction_payment">Payment Type</label>
                                    </div>
                                    <div class="form-floating" style="width: 49%">
                                        <select id="transaction_type" class="form-select" aria-label="Default select example">
                                            <option selected value="Walk-in">Walk-in</option>
                                            <option value="Delivery">Delivery</option>
                                        </select>
                                        <label for="transaction_type">Transaction Type</label>
                                    </div>
                                </div>

                                <div style="display: flex; flex-direction: row; justify-content: space-between" >
                                    <div class="form-floating" style="width: 49%;">
                                        <input type="text" id="subtotal_discount_percentage" class="form-control" placeholder="" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); if(parseFloat(this.value) < 0) this.value = 0;" maxlength="3" value="0">
                                        <label for="subtotal_discount_percentage">Subtotal Discount (%)</label>
                                    </div>
                                    <div class="form-floating" style="width: 49%;">
                                        <input type="text" id="amount_payment" class="form-control" placeholder="Enter Payment" maxlength="10">
                                        <label for="amount_payment">Payment</label>
                                    </div>
                                    
                                </div>
                                
                            </div>

                        </div>
                        <div style="width: 49%">
                            <div class="border rounded p-4 pt-5">
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Subtotal</h5>
                                    <h5 class="fw-bolder" id="subtotal">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder d-none">Tax (12%)</h5>
                                    <h5 class="fw-bolder d-none" id="tax">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Discount</h5>
                                    <h5 class="fw-bolder" id="subtotal_discount">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Total</h5>
                                    <h5 class="fw-bolder" id="total">PHP 100.00</h5>
                                </div>
                                
                                <hr>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Payment</h5>
                                    <h5 class="fw-bolder" id="payment">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="fw-bolder">Change</h5>
                                    <h5 class="fw-bolder" id="change">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between;" class="mt-5 pb-2">
                                    <button style="flex: 0 0 49%;" id="resetBtn" class="btn btn-lg mt-3 border border-primary text-primary" onclick="resetCart()">Reset</button>
                                    <button style="flex: 0 0 49%;" id="purchase_btn" class="btn btn-lg mt-3 btn-primary" onclick="purchase()">Purchase</button>
                                    <button style="flex: 0 0 49%; display: none;" id="loading" disabled class="btn btn-lg mt-3 btn-primary">
                                        <div class="spinner-grow spinner-grow-sm m-1" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
    </div>
</div>

<!-- Modal for input quantity -->
<div class="modal fade" id="input_qty" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter Custom Quantity</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="fas fa-times fs--1"></span>
                </button>
            </div>
            <div class="modal-body">
                <input class="form-control" type="number" id="update_qty" min="0" max="9999" value="0">
                <div class="form-check text-start mt-2">
                    <input class="form-check-input" id="flexCheckDefault" type="checkbox" value="" />
                    <label class="form-check-label" for="flexCheckDefault">Please close the modal before scanning the barcode!</label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal" disabled>Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for manual entry -->
<div class="modal fade" id="manual_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../PHP - process_files/barcode_pos.php" method="POST" id="manual_form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter Custom Quantity</h5>
                    <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span class="fas fa-times fs--1"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="manual_barcode_input" name="barcode_value">
                    <input type="number" name="qty" min="0" max="10000" id="manual_qty">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Okay</button>
                    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal" disabled>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Form for barcode submission -->
<form action="../../PHP - process_files/barcode_pos.php" method="POST" id="barcode_form">
    <input type="text" name="barcode_value" id="barcode_value" hidden>
    <input type="number" name="qty" id="current_qty" value="1" hidden>
</form>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
    <div class="toast fade" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Server Response</strong>
            <small class="text-800">Just now</small>
            <button class="btn ms-2 p-0" type="button" data-bs-dismiss="toast" aria-label="Close"><span class="fas fa-times fs-1"></span></button>
        </div>
        <div class="toast-body"></div>
    </div>
</div>

<!-- Script for barcode submission -->
<script>
    let inputElement = document.getElementById('barcode_value');
    let qtyElement = document.getElementById('current_qty');
    let keydownListenerActive = true;
    let isTypingQty = false; // Flag to indicate if the user is typing in #update_qty
    let processingBarcode = false; // Flag to indicate if barcode processing is already in progress

    function resetInputValues() {
        document.getElementById('update_qty').value = '1';
        document.getElementById('current_qty').value = '1';
        document.getElementById('barcode_value').value = '';
        document.getElementById('manual_barcode_input').value = '';
        document.getElementById('manual_qty').value = '';
    }

    // Function to show toast with message
    function showToast(message) {
        // Select the toast element
        let toastElement = document.getElementById('liveToast');
        // Set the toast body content to the message
        toastElement.querySelector('.toast-body').textContent = message;
        // Create a new Bootstrap Toast instance
        let toast = new bootstrap.Toast(toastElement);
        // Show the toast
        toast.show();
    }

    // Function to handle barcode scanner input
    function handleBarcodeScan(barcode) {
        if (!keydownListenerActive || isTypingQty || processingBarcode) return;
        processingBarcode = true; // Set the flag to indicate processing has started
        // Update the value of #barcode_value to the scanned barcode
        document.getElementById('barcode_value').value = barcode;

        const formData = new FormData();
        formData.append('barcode_value', barcode);
        formData.append('qty', document.getElementById('current_qty').value);

        fetch('../../PHP - process_files/barcode_pos.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            showToast(data); // Display server response on the toast
            console.log('Form submitted successfully:', data);
            resetInputValues(); // Reset input values after successful submission
            processingBarcode = false; // Reset the flag after processing is done
        })
        .catch(error => {
            showToast('Error submitting form: ' + error); // Display error message on the toast
            console.error('Error submitting form:', error);
            processingBarcode = false; // Reset the flag after processing is done
        });
    }

    // Function to listen for barcode scanner input
    function listenForBarcodeScanner() {
        let barcodeData = '';
        let barcodeTimer = null;

        // Function to handle barcode scanner input
        function handleBarcodeInput(data) {
            barcodeData += data;

            if (barcodeTimer) {
                clearTimeout(barcodeTimer);
            }

            barcodeTimer = setTimeout(() => {
                handleBarcodeScan(barcodeData);
                barcodeData = '';
            }, 100); // Adjust this delay as per your barcode scanner's input speed
        }

        // Event listener for keypress events
        document.addEventListener('keypress', function(event) {
            const character = String.fromCharCode(event.which);
            handleBarcodeInput(character);
        });

        // Event listener for keydown events (some barcode scanners may trigger keydown events)
        document.addEventListener('keydown', function(event) {
            const key = event.key;
            // Check if the key pressed is a character key (a-z or 0-9)
            if (key.length === 1 && /^[a-zA-Z0-9]$/.test(key)) {
                handleBarcodeInput(key);
            }
        });
    }

    // Call the function to start listening for barcode scanner input
    listenForBarcodeScanner();

    let updateQtyInput = document.getElementById('update_qty');
    let currentQtyInput = document.getElementById('current_qty');

    updateQtyInput.addEventListener('input', function() {
        currentQtyInput.value = this.value;
    });

    updateQtyInput.addEventListener('focus', function() {
        isTypingQty = true;
    });

    updateQtyInput.addEventListener('blur', function() {
        isTypingQty = false;
    });

    document.getElementById('barcode_form').addEventListener('submit', function(event) {
        if (inputElement.value === '' || isTypingQty) {
            event.preventDefault();
        } else {
            resetInputValues();
        }
    });

    document.getElementById('manual_button').addEventListener('click', function() {
        keydownListenerActive = false;
        document.getElementById('modal_for_manual').click();
    });

    document.getElementById('manual_modal').addEventListener('hidden.bs.modal', function() {
        keydownListenerActive = true;
    });

    document.getElementById('manual_form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('../../PHP - process_files/barcode_pos.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            showToast(data); // Display server response on the toast
            console.log('Manual form submitted successfully:', data);
            resetInputValues(); // Reset input values after successful submission
        })
        .catch(error => {
            showToast('Error submitting form: ' + error); // Display error message on the toast
            console.error('Error submitting manual form:', error);
        });

        const modal = bootstrap.Modal.getInstance(document.getElementById('manual_modal'));
        modal.hide();
    });
</script>

<!-- Second script: Updates current_qty based on update_qty -->
<script>
    let updateQtyInput = document.getElementById('update_qty');
    let currentQtyInput = document.getElementById('current_qty');

    updateQtyInput.addEventListener('input', function() {
        currentQtyInput.value = this.value;
    });
</script>

<script>
$(document).ready(function() {
    function loadContent() {
        $('#cartTableBody').load('preview_list.php');
    }

    // Load content when the page loads
    loadContent();

    
});
</script>
