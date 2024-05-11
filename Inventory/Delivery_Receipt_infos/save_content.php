<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <div class="row">
        <div class="col-auto">
            <h1>Enter Delivery Receipt<i class="text-success">#<?php echo str_pad($_SESSION['dr_id'], 6, '0', STR_PAD_LEFT); ?></i> Products Received</h1>
        </div>
    </div>
    <hr class="mb-5">
    <div class="mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6 col-xxs-6 mb-3 text-end">
                <div class="dropdown font-sans-serif d-inline-block">
                    <button class="btn btn-phoenix-secondary mt-2" id="printButton">Print</button>
                </div>
            </div>
  
  
            
            <div class="col-lg-12 bg-white mt-5 m-2 fs--1" id="printContent">
                <?php include "delivery_receipt_preview.php"; ?>
            </div>
        </div>
    </div>
</div>



<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="successToast" class="toast hide bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-white">
            Submission successful!
        </div>
    </div>

    <div id="errorToast" class="toast hide bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-danger text-white">
            Kindly fill up missing fields
        </div>
    </div>

    <div id="errorToast2" class="toast hide bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-danger text-white">
            Kindly fill up missing fields
        </div>
    </div>
</div>

<script>
    document.getElementById('new_location').addEventListener('click', function() {
        var dynamicLocations = document.getElementById('dynamicLocations');

        var locationDiv = document.createElement('div');
        locationDiv.className = 'col-lg-6 mb-2';

        var selectLocation = document.createElement('select');
        selectLocation.className = 'form-select mt-2';
        selectLocation.id = 'rack[]';
        selectLocation.name = 'rack[]';
        selectLocation.setAttribute('data-choices', 'data-choices');
        selectLocation.setAttribute('data-options', '{"removeItemButton":true,"placeholder":true}');

        var optionDefault = document.createElement('option');
        optionDefault.value = '';
        optionDefault.textContent = 'Select location';
        selectLocation.appendChild(optionDefault);
        <?php 
        $wareloc_sql = "SELECT id, location_name FROM ware_location WHERE status = '1'";
        $wareloc_res = $conn->query($wareloc_sql);
        if($wareloc_res->num_rows>0){
            while($row=$wareloc_res->fetch_assoc()){
                $wr_id = $row['id'];
                $loc_name = $row['location_name'];
        ?>
        var option<?php echo $wr_id; ?> = document.createElement('option');
        option<?php echo $wr_id; ?>.value = '<?php echo $loc_name; ?>';
        option<?php echo $wr_id; ?>.textContent = '<?php echo $loc_name; ?>';
        selectLocation.appendChild(option<?php echo $wr_id; ?>);
        <?php 
            }
        }
        ?>

        locationDiv.appendChild(selectLocation);

        var quantityDiv = document.createElement('div');
        quantityDiv.className = 'col-lg-6 mb-2 form-floating';

        var inputQuantity = document.createElement('input');
        inputQuantity.className = 'form-control';
        inputQuantity.id = 'qty[]';
        inputQuantity.name = 'qty[]';
        inputQuantity.type = 'number';
        inputQuantity.min = '1';

        var labelQuantity = document.createElement('label');
        labelQuantity.htmlFor = 'floatingInput';
        labelQuantity.textContent = 'Quantity';

        quantityDiv.appendChild(inputQuantity);
        quantityDiv.appendChild(labelQuantity);

        dynamicLocations.appendChild(locationDiv);
        dynamicLocations.appendChild(quantityDiv);
    });
</script>


<script>
    $(document).ready(function() {
        $('#printButton').click(function() {
            var content = $('#printContent').html();
            var originalContent = $('body').html();

            $('body').html(content);

            window.print();
            $('body').html(originalContent);
        });
    });
</script>

<div class="modals_container" id="modals_container"></div>