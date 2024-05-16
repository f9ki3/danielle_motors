<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <div class="row g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">PRODUCTS</h2>
        </div>
    </div>
    <!-- <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span class="text-700 fw-semi-bold" id="total_product">(68817)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><span>Archived </span><span class="text-700 fw-semi-bold">(70348)</span></a></li>
    </ul> -->
    <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time","publish"],"page":5,"pagination":true}'>
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-3">
            <div class="search-box">
                <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                    <input class="form-control search-input search" type="search" placeholder="Search" aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
                </form>
            </div>
            
            <div class="ms-xxl-auto">
                <button class="btn btn-link text-900 me-4 px-0"><span class="fa-solid fa-file-export fs--1 me-2"></span>Export</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#add_product"><span class="fas fa-plus me-2"></span>Add product</button>
            </div>
            </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
            <div class="table-responsive scrollbar mx-n1 px-1">
                <table class="table mb-0">
                    <thead>
                    <tr>
                        <!-- <th class="white-space-nowrap align-middle ps-0" style="max-width:20px; width:18px;">
                        <div class="form-check mb-0 fs-0">
                            <input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox"/>
                        </div>
                        </th> -->
                        <th class="sort white-space-nowrap align-middle" scope="col"></th>
                        <th class="sort white-space-nowrap align-middle ps-4" scope="col" data-sort="product">PRODUCT NAME</th>
                        <th class="sort align-middle text-start ps-4" scope="col" data-sort="price">WHOLESALE</th>
                        <th class="sort align-middle text-start ps-4" scope="col" data-sort="price">SRP</th>
                        <th class="sort align-middle text-start ps-4" scope="col" data-sort="price">ITEM CODE</th>
                        <th class="sort align-middle text-start ps-4" scope="col" data-sort="category">SUPPLIER CODE</th>
                        <th class="sort align-middle text-start ps-3" scope="col" data-sort="tags">CATEGORY</th>
                        <th class="sort align-middle text-start ps-4" scope="col" data-sort="vendor">BRAND</th>
                        <th class="sort align-middle text-start ps-4" scope="col" data-sort="time">UNIT</th>
                        <th class="sort align-middle text-start ps-4" scope="col" data-sort="time">MODEL</th>
                        <th class="sort align-middle text-start ps-4" scope="col" data-sort="time">STATUS</th>
                        <th class="sort align-middle text-start ps-4" scope="col" data-sort="publish">PUBLISH BY</th>
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
                    <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
                <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                    <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "product_list_modal.php"; ?>
