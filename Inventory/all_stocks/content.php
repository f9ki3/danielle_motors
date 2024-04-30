<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <div class="row g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">Stocks</h2>
        </div>
    </div>

    <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
                <span>All </span>
                <span class="text-700 fw-semi-bold" id="total_product">(68817)</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span>Archived </span>
                <span class="text-700 fw-semi-bold">(70348)</span>
            </a>
        </li>
    </ul>

    <div id="products" data-list='{"valueNames":["product","itemcode", "location", "category", "brand", "unit", "model", "qty", "status", "publishby", "branch"],"page":10,"pagination":true}'>
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-3">
                <div class="search-box">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search" placeholder="Search" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>

                <div class="ms-xxl-auto mb-4">
                    <div class="btn-group dropstart" role="group">
                        <div class="btn-group mt-2">
                            <div class="btn-group dropstart" role="group">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">+ Add</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="../barcode_scanner/">Existing Product</a>
                                    <a class="dropdown-item" href="../barcode_scanner copy/">New Product</a>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="button"> Add</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
                <div class="table-responsive scrollbar mx-n1 px-1">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="sort white-space-nowrap align-middle" scope="col"></th>
                                <th class="sort white-space-nowrap align-middle ps-4" scope="col" data-sort="product">PRODUCT NAME</th>
                                <th class="sort align-middle text-start ps-4" scope="col" data-sort="location">LOCATION</th>
                                <th class="sort align-middle text-start ps-3" scope="col" data-sort="category">CATEGORY</th>
                                <th class="sort align-middle text-start ps-4" scope="col" data-sort="brand">BRAND</th>
                                <th class="sort align-middle text-start ps-4" scope="col" data-sort="unit">UNIT</th>
                                <th class="sort align-middle text-start ps-4" scope="col" data-sort="model">MODEL</th>
                                <th class="sort align-middle text-start ps-4" scope="col" data-sort="qty">QTY</th>
                                <th class="sort align-middle text-start ps-4" scope="col" data-sort="status">STATUS</th>
                                <th class="sort align-middle text-start ps-4" scope="col" data-sort="publishby">PUBLISH BY</th>
                                <th class="sort align-middle text-start ps-4" scope="col" data-sort="branch">BRANCH</th>
                                <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id="products-table-body">
                            <?php include "product_list_tr.php"; ?>
                        </tbody>
                    </table>
                </div>

                <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                    <div class="col-auto d-flex">
                        <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p>
                        <a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        <a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                    <div class="col-auto d-flex">
                        <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                        <ul class="mb-0 pagination"></ul>
                        <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "product_list_modal.php"; ?>
