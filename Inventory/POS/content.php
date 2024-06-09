<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#input_qty">Enter Custom Quantity</button>
    <button class="btn btn-secondary" type="button" id="manual_button">Manual Entry</button>
    <button id="modal_for_manual" type="button" data-bs-toggle="modal" data-bs-target="#manual_modal" style="display:none;">burat</button>
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
    let inputData = '';
    let inputTimer = null;
    let keydownListenerActive = true;

    function resetInputValues() {
        document.getElementById('update_qty').value = '1';
        document.getElementById('current_qty').value = '1';
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
        })
        .catch(error => {
            showToast('Error submitting form: ' + error); // Display error message on the toast
            console.error('Error submitting form:', error);
        });
        
    }

    // Function to handle keydown events
    function handleKeydown(event) {
        if (!keydownListenerActive) return;

        const nonCharacterKeys = [
            'Control', 'Shift', 'Alt', 'Meta', 'Tab', 'ArrowLeft',
            'ArrowUp', 'ArrowRight', 'ArrowDown', 'Enter', 'Backspace',
            'Escape', 'CapsLock', 'F1', 'F2', 'F3', 'F4', 'F5', 'F6',
            'F7', 'F8', 'F9', 'F10', 'F11', 'F12'
        ];

        if (nonCharacterKeys.includes(event.key)) {
            return;
        }

        inputData += event.key;

        if (inputTimer) {
            clearTimeout(inputTimer);
        }

        inputTimer = setTimeout(() => {
            if (inputData.length > 7) {
                inputElement.value = inputData;

                const formData = new FormData();
                formData.append('barcode_value', inputData);
                formData.append('qty', qtyElement.value);

                fetch('../../PHP - process_files/barcode_pos.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    showToast(data); // Display server response on the toast
                    console.log('Form submitted successfully:', data);
                })
                .catch(error => {
                    showToast('Error submitting form: ' + error); // Display error message on the toast
                    console.error('Error submitting form:', error);
                });

                inputData = '';
                resetInputValues();
            } else {
                inputData = '';
                clearTimeout(inputTimer);
            }
        }, 1000);
    }

    document.addEventListener('keydown', handleKeydown);

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
            const character = event.key;
            handleBarcodeInput(character);
        });
    }

    // Call the function to start listening for barcode scanner input
    listenForBarcodeScanner();

    let updateQtyInput = document.getElementById('update_qty');
    let currentQtyInput = document.getElementById('current_qty');

    updateQtyInput.addEventListener('input', function() {
        currentQtyInput.value = this.value;
    });

    document.getElementById('barcode_form').addEventListener('submit', function(event) {
        if (inputElement.value === '') {
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
