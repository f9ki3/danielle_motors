<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <div class="row g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">PRODUCT PRICELIST</h2>
        </div>
    </div>
    <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-3">
                <div class="search-box">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search products" aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
                
                <div class="ms-xxl-auto">
                    <button class="btn btn-link text-900 me-4 px-0"><span class="fa-solid fa-file-export fs--1 me-2"></span>Export</button>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#add_pricelist"></span>Add New Price</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-4">
                <div class="table-responsive scrollbar mx-n1 px-1">
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th class="sort white-space-nowrap align-middle" scope="col">IMAGE</th>
                                <th class="sort white-space-nowrap align-middle " scope="col" data-sort="product">PRODUCT NAME</th>
                                <th class="sort align-middle " scope="col" data-sort="price">SUPPLIER CODE</th>
                                <th class="sort align-middle " scope="col" data-sort="category">MODEL/s</th>
                                <th class="sort align-middle" scope="col" data-sort="tags">DEALER</th>
                                <th class="sort align-middle " scope="col" data-sort="vendor">WHOLESALE</th>
                                <th class="sort align-middle " scope="col" data-sort="time">SRP</th>
                                <th class="sort align-middle " scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id="products-table-body">
                            <?php include "price_list_tr.php"; ?>
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
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body table-responsive">
                        <h2 class="card-title">Cart</h2>
                        <hr class="mt-3 mb-3">
                        <table id="rightTable" class="table table-sm fs--1">
                            <thead>
                                <th>Name</th>
                                <th>Models</th>
                                <th>Stocks</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                                <th>QTY</th>
                                <th>Discount(%)</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="cart-body">

                            </tbody>
                        </table>

                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="text-start"><button class="btn btn-danger reset-cart">RESET</button></h2>
                                <h2 class="text-start"><button class="btn btn-primary print">PRINT</button></h2>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="text-end" id="cart-total">Total: ₱0</h2>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include "modal.php"; ?>


