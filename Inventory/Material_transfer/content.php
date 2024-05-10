<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <div class="row g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">MATERIAL TRANSFER</h2>
        </div>
    </div>
    <!-- <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span class="text-700 fw-semi-bold">(68817)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><span>Published </span><span class="text-700 fw-semi-bold">(70348)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><span>Drafts </span><span class="text-700 fw-semi-bold">(17)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><span>On discount </span><span class="text-700 fw-semi-bold">(810)</span></a></li>
    </ul> -->
    <div id="products" data-list='{"valueNames":["invoice","status","date","publishby"],"page":10,"pagination":true, "filter":{"key":"status"}}'>
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-3">
                <div class="search-box">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search products" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            
                <div class="ms-xxl-auto"><button class="btn btn-link text-900 me-4 px-0"><span class="fa-solid fa-file-export fs--1 me-2"></span>Export</button></div>
                <div class="col-3">
                    <select class="form-select form-select-sm mb-3" data-list-filter="data-list-filter" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                        <option selected="" value="">STATUS</option>
                        <option value="Pending">Pending</option>
                        <option value="Verified">Verified</option>
                        <option value="Received">Received</option>
                        <option value="Declined">Declined</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
            <div class="table-responsive scrollbar mx-n1 px-1">
                <table id="productsTable" class="table mb-0">
                    <thead>
                    <tr>
                        <!-- <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                        <div class="form-check mb-0 fs-0"><input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' /></div>
                        </th> -->
                        <th class="sort white-space-nowrap align-middle fs--2" scope="col"></th>
                        <th class="sort white-space-nowrap  text-start" scope="col" data-sort="invoice">INVOICE #</th>
                        <th class="sort text-start" scope="col" data-sort="status">STATUS</th>
                        <th class="sort text-start" scope="col" data-sort="date" >DATE</th>
                        <th class="sort text-start" scope="col" data-sort="publishby" >PUBLISH BY</th>
                        <th class="sort text-end" scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list" id="products-table-body">
                        <?php include "material_transfer_tr.php"; ?>
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