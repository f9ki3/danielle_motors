<div id="spinner" style="height: 80vh; display: flex; justify-content: center; align-items: center;">
<!-- <iframe src="https://giphy.com/embed/3oz8xzJjbG2Etm0f04" width="480" height="270" frameBorder="0" class="giphy-embed rounded rounded-5" allowFullScreen></iframe><p></p> -->
    <div class="spinner-grow text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div id="content" style="display: none">
    <div class="row g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">Sales Warehouse</h2>
        </div>
    </div>
    <div id="transactions" class="transaction-table" data-list='{"valueNames":["transaction-code","transaction-date","customer-name","payment-method","subtotal","tax","discount","total","payment","change"],"page":10,"pagination":true}'>
       <div class="mb-4">
            <div class="d-flex flex-wrap gap-3">
                <div class="search-box">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search" placeholder="Search" aria-label="Search">
                        <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path></svg>
                    </form>
                </div>

                <div class="ms-xxl-auto">
                    <a href="../Sales_Warehouse" class="btn btn-primary"><span class="fas fa-plus me-2"></span> Walkin</a>
                    <a href="../Sales_Warehouse_Delivery" class="btn border text-primary border-primary position-relative"><span class="fas fa-car-side me-2"></span> Delivery</a>
                </div>
            </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
            <div class="table-responsive scrollbar mx-n1 px-1">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="sort white-space-nowrap align-middle" style="width: 5%;" scope="col" data-sort="transaction-code">TRANSACTION CODE</th>
                            <th class="sort white-space-nowrap align-middle" style="width: 15%;" scope="col" data-sort="transaction-date">TRANSACTION DATE</th>
                            <th class="sort align-middle text-start" style="width: 10%;" scope="col" data-sort="customer-name">CUSTOMER NAME</th>
                            <th class="sort align-middle text-start" style="width: 10%;" scope="col" data-sort="payment-method">PAYMENT METHOD</th>
                            <th class="sort align-middle text-start" style="width: 10%;" scope="col" data-sort="subtotal">SUBTOTAL</th>
                            <th class="sort align-middle text-start" style="width: 5%;" scope="col" data-sort="tax">TAX</th>
                            <th class="sort align-middle text-start" style="width: 15%;" scope="col" data-sort="discount">DISCOUNT</th>
                            <th class="sort align-middle text-start" style="width: 10%;" scope="col" data-sort="total">TOTAL</th>
                            <th class="sort align-middle text-start" style="width: 10%;" scope="col" data-sort="payment">PAYMENT</th>
                            <th class="sort align-middle text-start" style="width: 10%;" scope="col" data-sort="change">CHANGE</th>
                            <th class="sort text-end align-middle" style="width: 10%;" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="products-table-body">
                        <?php include 'sales_warehouse.php'; ?>
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                <div class="col-auto d-flex">
                    <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info">1 to 10 <span class="text-600">Items of</span> 0</p>
                    <a class="fw-semi-bold" href="#!" data-list-view="*">View all<svg class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)"><g transform="translate(0, 32) scale(1, 1) rotate(0 0 0)"><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" transform="translate(-128 -256)"></path></g></g></svg></a>
                    <a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<svg class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)"><g transform="translate(0, 32) scale(1, 1) rotate(0 0 0)"><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" transform="translate(-128 -256)"></path></g></g></svg></a>
                </div>
                <div class="col-auto d-flex">
                    <button class="page-link disabled" data-list-pagination="prev" disabled=""><svg class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"></path></svg></button>
                    <ul class="mb-0 pagination">
                        <li class="active"><button class="page" type="button" data-i="1" data-page="10">1</button></li>
                        <li><button class="page" type="button" data-i="2" data-page="10">2</button></li>
                        <li><button class="page" type="button" data-i="3" data-page="10">3</button></li>
                        <li class="disabled"><button class="page" type="button">...</button></li>
                    </ul>
                    <button class="page-link pe-0" data-list-pagination="next"><svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path></svg></button>
                </div>
            </div>
        </div>
    </div>
</div>
