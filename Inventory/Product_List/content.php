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
        <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span class="text-700 fw-semi-bold" id="total_product">(68817)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><span>Archived </span><span class="text-700 fw-semi-bold">(70348)</span></a></li>
        </ul>
        <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time","publish"],"page":10,"pagination":true}'>
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


    <!-- Include your modal PHP file -->
    <?php include "product_list_modal.php"; ?>
<!-- 
    <script src="path/to/jquery.js"></script>
    <script src="path/to/bootstrap.bundle.js"></script>
    <script src="path/to/lz-string.js"></script>
    <script src="path/to/your/custom.js"></script> -->

  <!-- Include jQuery if not already included -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    // Function to fetch products from product_list_tr.php and display them
    function displayProductsFromServer() {
        $.ajax({
            url: 'product_list_tr.php',
            type: 'GET',
            dataType: 'json',
            success: function(products) {
                let html = '';

                if (products && products.length > 0) {
                    products.forEach(function(product) {
                        let status = product.active === 'Active' ? 'Active' : 'Inactive';

                        html += `
                            <tr>
                                <td class="product align-middle ps-4">${product.name}</td>
                                <td class="product align-middle ps-4">₱${parseFloat(product.wholesale).toFixed(2)}</td>
                                <td class="product align-middle ps-4">₱${parseFloat(product.srp).toFixed(2)}</td>
                                <td class="price align-middle white-space-nowrap text-start ps-4"><span class="badge badge-phoenix badge-phoenix-primary">${product.code}</span></td>
                                <td class="category align-middle white-space-nowrap ps-4 text-start"><span class="badge badge-phoenix badge-phoenix-secondary">${product.supplier_code}</span></td>
                                <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">${product.category_name}</td>
                                <td class="vendor align-middle text-start fw-semi-bold ps-4">${product.brand_name}</td>
                                <td class="time align-middle white-space-nowrap text-600 ps-4">${product.unit_name}</td>
                                <td class="time align-middle white-space-nowrap text-600 ps-4">${product.models}</td>
                                <td class="time align-middle white-space-nowrap text-600 ps-4"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">${status}</span><span class="ms-1" data-feather="check" style="height:12.8px;width:12.8px;"></span></span></td>
                                <td class="publish align-middle white-space-nowrap text-600 ps-4">${product.publish_by}</td>
                                <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                    <div class="font-sans-serif btn-reveal-trigger position-static">
                                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                            <span class="fas fa-ellipsis-h fs--2"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end py-2">
                                            <a class="dropdown-item edit_product" data-product-id="${product.id}">Edit</a>
                                            <!-- <a class="dropdown-item" href="print_barcode.php?barcode=${product.barcode}">Export</a> -->
                                            <div class="dropdown-divider"></div>
                                            <!-- <a class="dropdown-item text-danger" href="#!">Remove</a> -->
                                        </div>
                                    </div>
                                </td>
                            </tr>`;
                    });
                } else {
                    // Handle case where no products are found
                    html += `<tr><td colspan="13">No products found</td></tr>`;
                }

                // Update the table body with generated HTML
                $('#product-table-body').html(html);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching products:', error);
                // Handle error scenario
            }
        });
    }

    // Call the function to display products when the page loads
    $(document).ready(function() {
        displayProductsFromServer();
    });
</script>

<!-- Your HTML structure for the table -->
<div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
    <div class="table-responsive scrollbar mx-n1 px-1">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th class="sort white-space-nowrap align-middle ps-4" scope="col">PRODUCT NAME</th>
                    <th class="sort align-middle text-start ps-4" scope="col">WHOLESALE</th>
                    <th class="sort align-middle text-start ps-4" scope="col">SRP</th>
                    <th class="sort align-middle text-start ps-4" scope="col">ITEM CODE</th>
                    <th class="sort align-middle text-start ps-4" scope="col">SUPPLIER CODE</th>
                    <th class="sort align-middle text-start ps-3" scope="col">CATEGORY</th>
                    <th class="sort align-middle text-start ps-4" scope="col">BRAND</th>
                    <th class="sort align-middle text-start ps-4" scope="col">UNIT</th>
                    <th class="sort align-middle text-start ps-4" scope="col">MODEL</th>
                    <th class="sort align-middle text-start ps-4" scope="col">STATUS</th>
                    <th class="sort align-middle text-start ps-4" scope="col">PUBLISH BY</th>
                    <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                </tr>
            </thead>
            <tbody id="product-table-body">
                <!-- Table rows will be dynamically populated here -->
            </tbody>
        </table>
    </div>
</div>
