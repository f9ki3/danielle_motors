<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <div class="row g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">Purchased Order(s)</h2>
        </div>
    </div>
    <div id="products" data-list='{"valueNames":["supplier","po","status","requestedby","publishon"],"page":10,"pagination":true}'>
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-3">
                <div class="search-box">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search products" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
                
                <div class="ms-xxl-auto">
                    <button class="btn btn-link text-900 me-4 px-0"><span class="fa-solid fa-file-export fs--1 me-2"></span>Export</button>
                    <a class="btn btn-primary" id="addBtn" href="../Create_Purchased_Order/"><span class="fas fa-plus me-2"></span>Create Purchased Order</a>
                </div>
            </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
            <div class="table-responsive scrollbar mx-n1 px-1">
                <table class="table fs--1 mb-0">
                    <thead>
                        <tr>
                            <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                            <div class="form-check mb-0 fs-0"><input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' /></div>
                            </th>
                            <th class="sort" scope="col" style="width:70px;"></th>
                            <th class="sort text-start" scope="col" data-sort="supplier">SUPPLIER</th>
                            <th class="sort text-start" scope="col" data-sort="po">P.0 #</th>
                            <th class="sort text-start" scope="col" data-sort="status">STATUS</th>
                            <th class="sort text-start" scope="col" data-sort="requestedby">REQUESTED BY</th>
                            <th class="sort text-start" scope="col" data-sort="publishon">PUBLISHED ON</th>
                            <th class="sort" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="products-table-body">
                        <?php include "po_tr.php"; ?>
                        
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                <div class="col-auto d-flex">
                    <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
                <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                    <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="successToast" class="toast hide bg-warning text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-warning text-white">
            <strong class="me-auto">Warning!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-white">
            Your monthly expenses are nearing your limit, so please request purchase orders wisely.
        </div>
    </div>

    <div id="errorToast" class="toast hide bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto">Caution</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-danger text-white">
            You've reached your monthly expense limit!
        </div>
    </div>
</div>

<script>
    // Function to make AJAX request every 5 seconds
    function checkExpenses() {
        // Make AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_total_expense.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Parse response as JSON
                    var response = JSON.parse(xhr.responseText);

                    // Log response to console
                    console.log(response);

                    // Handle different responses
                    if (response === 'limit') {
                        console.log('Expense limit reached!');
                        // Add code to handle limit condition
                        var toast = document.getElementById('errorToast');
                        toast.classList.toggle('show');

                        var toast = document.getElementById('successToast');
                        toast.classList.toggle('hide');
                    } else if (response === 'warning') {
                        console.log('Approaching expense limit!');
                        // Add code to handle warning condition
                        var toast = document.getElementById('successToast');
                        toast.classList.toggle('show');
                    } else {
                        console.log('Expenses within limits.');
                        // Add code to handle other conditions
                    }
                } else {
                    console.error('Error: ' + xhr.status);
                }
            }
        };
        xhr.send();
    }

    // Call the function initially
    // checkExpenses();

    // Set interval to call the function every 5 seconds
    setInterval(checkExpenses, 10000);
</script>


