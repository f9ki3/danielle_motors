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
                <div class="row">
                    <?php include "product_list_tr.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "product_list_modal.php"; ?>
