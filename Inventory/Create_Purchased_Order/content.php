<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;" data-list='{"valueNames":["name","category","brand", "unit", "models", "stock"],"page":10,"pagination":true}'>
    <div class="row g-3 mb-2">
        <div class="col-auto">
            <h2 class="mb-0">PRODUCTS</h2>
        </div>
    </div>
    <hr class="py-3">
    <div class="row">
        <div class="search-box mb-3 mt-3">
            <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
            </form>
        </div>
    </div>
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
        <!-- <form action="action.php" Method="POST"> -->
            
            <div class="d-flex align-items-center justify-content-end my-3">
                <div id="bulk-select-replace-element">
                    <!-- <button class="btn btn-phoenix-success btn-sm" type="button">
                        <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                        <span class="ms-1">New</span>
                    </button> -->
                </div>
                <div class="d-none ms-3" id="bulk-select-actions">
                    <div class="d-flex">
                        <!-- <select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="selected">Bulk actions</option>
                            <option value="Delete">Delete</option>
                            <option value="Archive">Archive</option>
                        </select> -->
                        <form action="../Create_Purchased_Order2/index.php" method="post">
                        <!-- <form action="action.php" method="post"> -->
                        <pre id="selectedRows" hidden></pre>
                        <button class="btn btn-phoenix-success btn-sm ms-2" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div  >
                <div class="table-responsive mx-n1 px-1">
                    <table class="table table-sm border-top border-200 mb-0">
                        <thead>
                            <tr>
                                <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                                    <div class="form-check mb-0 fs-0">
                                        <input class="form-check-input" id="bulk-select-example" type="checkbox" data-bulk-select='{"body":"bulk-select-body","actions":"bulk-select-actions","replacedElement":"bulk-select-replace-element"}' />
                                    </div>
                                </th>
                                <th></th>
                                <th class="sort" data-sort="name">Product Name</th>
                                <th class="sort" data-sort="category">Category</th>
                                <th class="sort" data-sort="brand">Brand</th>
                                <th class="sort" data-sort="unit">Unit</th>
                                <th class="sort" data-sort="models">Models</th>
                                <th class="sort" data-sort="stock">WH Stocks</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="bulk-select-body">
                            <?php include "product_list_tr.php"; ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex flex-between-center pt-3 mb-3">
                    <div class="pagination d-none"></div>
                    <p class="mb-0 fs--1">
                        <span class="d-none d-sm-inline-block" data-list-info="data-list-info"></span>
                        <span class="d-none d-sm-inline-block"> &mdash; </span>
                        <a id="viewAllButton" class="fw-semi-bold" href="#!" data-list-view="*">
                            View all
                            <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                        </a>
                        <a class="fw-semi-bold d-none" href="#!" data-list-view="less">
                            View Less
                            <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                        </a>
                    </p>
                    <div class="d-flex">
                        <button class="btn btn-sm btn-primary" type="button" data-list-pagination="prev"><span>Previous</span></button>
                        <button class="btn btn-sm btn-primary px-4 ms-2" type="button" data-list-pagination="next"><span>Next</span></button>
                    </div>
                </div>
            </div>
        <!-- </form> -->
    <!-- </div>
    <form action="test.php" method="post">
    <p class="mb-2">Click the button to get selected rows</p> -->
    <button id="btn_to_trigger" type="button" class="btn btn-warning d-none" data-selected-rows="data-selected-rows">Get Selected Rows</button>
    <!-- <pre id="selectedRows"></pre>
    <input type="submit" value="submit">
    </form> -->
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
        xhr.open('GET', '../Purchased-Order-Supplier/check_total_expense.php', true);
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