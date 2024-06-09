<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#input_qty">Enter Custom Quantity</button>
    <div class="modal fade" id="input_qty" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enter Custom Quantity</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
        </div>
        <div class="modal-body">
            <input class="form-control" type="number" id="update_qty" min="0" max="9999" value="1">
            
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
    <form action="test.php" method="POST" id="barcode_form">
        <input type="text" name="barcode_value" id="barcode_value" hidden>
        <input type="number" name="qty" id="current_qty" value="1" hidden>
    </form>
    
<script>
    let inputElement = document.getElementById('barcode_value');
    let qtyElement = document.getElementById('current_qty');
    let inputData = '';
    let inputTimer = null;

    // Function to reset values of update_qty and current_qty
    function resetInputValues() {
        document.getElementById('update_qty').value = '1';
        document.getElementById('current_qty').value = '1';
    }

    // Listen for keydown events on the document
    document.addEventListener('keydown', function(event) {
        // List of non-character keys to ignore
        const nonCharacterKeys = [
            'Control', 'Shift', 'Alt', 'Meta', 'Tab', 'ArrowLeft', 
            'ArrowUp', 'ArrowRight', 'ArrowDown', 'Enter', 'Backspace', 
            'Escape', 'CapsLock', 'F1', 'F2', 'F3', 'F4', 'F5', 'F6', 
            'F7', 'F8', 'F9', 'F10', 'F11', 'F12'
        ];

        // Ignore non-character keys
        if (nonCharacterKeys.includes(event.key)) {
            return;
        }

        // Add character to inputData
        inputData += event.key;

        // If a timer is already running, reset it
        if (inputTimer) {
            clearTimeout(inputTimer);
        }

        // Set a timer to check the length of inputData after 1 second
        inputTimer = setTimeout(() => {
            if (inputData.length > 7) {
                // Set barcode_value and submit form
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

                // Reset inputData for the next input sequence
                inputData = '';

                // Reset input values
                resetInputValues();
            } else {
                // Reset inputData and inputTimer if input length is not sufficient
                inputData = '';
                clearTimeout(inputTimer);
            }
        }, 1000);
    });

    let updateQtyInput = document.getElementById('update_qty');
    let currentQtyInput = document.getElementById('current_qty');

    updateQtyInput.addEventListener('input', function() {
        // Update current_qty based on update_qty
        currentQtyInput.value = this.value;
    });

    // Listen for form submission
    document.getElementById('barcode_form').addEventListener('submit', function(event) {
        // Prevent form submission if barcode_value is empty
        if (inputElement.value === '') {
            event.preventDefault();
        } else {
            // Reset input values if form is submitted
            resetInputValues();
        }
    });
</script>
<script>
        // Second script: Updates current_qty based on update_qty
        let updateQtyInput = document.getElementById('update_qty');
        let currentQtyInput = document.getElementById('current_qty');

        updateQtyInput.addEventListener('input', function() {
            currentQtyInput.value = this.value;
        });
    </script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
<!-- <script>
    // Get reference to the update_qty input field
    let updateQtyInput = document.getElementById('update_qty');

    // Add event listener to prevent typing more than 5 digits
    updateQtyInput.addEventListener('keydown', function(event) {
        // Check if the current input length is 5 and the key is a digit
        if (this.value.length === 5 && event.key >= '0' && event.key <= '9') {
            // Prevent default action
            event.preventDefault();
            // Show SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter a maximum of 5 digits.',
                timer: 2000, // Set the timer for the alert to automatically close after 2 seconds
                timerProgressBar: true,
                showConfirmButton: false
            });
        }
    });
</script> -->

