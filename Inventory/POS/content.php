<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#input_qty">Enter Custom Quantity</button>
    <button class="btn btn-secondary" type="button" id="manual_button">Manual Entry</button>
    <button id="modal_for_manual" type="button" data-bs-toggle="modal" data-bs-target="#manual_modal" style="display:none;">burat</button>
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

    <!-- modal for manual entry -->
    <div class="modal fade" id="manual_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="test_2.php" method="POST" id="manual_form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Custom Quantity</h5>
                        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span class="fas fa-times fs--1"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="manual_barcode_input" name="manual_barcode">
                        <input type="number" name="manual_qty" id="manual_qty">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Okay</button>
                        <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal" disabled>Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form action="test.php" method="POST" id="barcode_form">
        <input type="text" name="barcode_value" id="barcode_value" hidden>
        <input type="number" name="qty" id="current_qty" value="1" hidden>
    </form>
</div>

<script>
    let inputElement = document.getElementById('barcode_value');
    let qtyElement = document.getElementById('current_qty');
    let inputData = '';
    let inputTimer = null;
    let keydownListenerActive = true;

    // Function to reset values of update_qty and current_qty
    function resetInputValues() {
        document.getElementById('update_qty').value = '1';
        document.getElementById('current_qty').value = '1';
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

                fetch('test.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    console.log('Form submitted successfully:', data);
                })
                .catch(error => {
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

    // Re-enable keydown listener when manual_modal is closed
    document.getElementById('manual_modal').addEventListener('hidden.bs.modal', function() {
        keydownListenerActive = true;
    });

    // Handle manual form submission with AJAX
    document.getElementById('manual_form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('test_2.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log('Manual form submitted successfully:', data);
        })
        .catch(error => {
            console.error('Error submitting manual form:', error);
        });

        // Close the modal after submission
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
