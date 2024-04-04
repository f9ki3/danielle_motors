<div class="row">
    <div class="col-lg-12 mb-5">
        <h1>BRANDS</h1>
    </div>
    <hr class="mb-5">
    <div class="col-lg-12">
        <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
            <div class="mb-4">
                <div class="d-flex flex-wrap gap-3">
                    <div class="search-box">
                        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search  " aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                    </div>
                    <div class="ms-xxl-auto">
                        <button class="btn btn-link text-900 me-4 px-0"><span class="fa-solid fa-file-export fs--1 me-2"></span>Export</button>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#add_brand"><span class="fas fa-plus me-2"></span>Add brand</button>
                    </div>
                </div>
            </div>
            <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
                <div class="table-responsive scrollbar mx-n1 px-1">
                <table class="table mb-0">
                    <thead>
                    <tr>
                        <th class="white-space-nowrap align-middle ps-0">
                        <div class="form-check"><input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox"/></div>
                        </th>
                        <th class="sort white-space-nowrap align-middle" scope="col" data-sort="product">BRAND NAME</th>
                        <th class="sort align-middle text-start ps-4" scope="col" data-sort="price" >PUBLISHED BY</th>
                        <th class="sort align-middle" scope="col" data-sort="category" >DATE ADDED</th>
                        <th class="sort align-middle text-center" scope="col" data-sort="tags">STATUS</th>
                        <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list" id="products-table-body">
                        <?php include "brand_tr.php"; ?>
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
</div>
<?php include "add_brand_modal.php"; include 'update_brand_modal.php'; ?>

