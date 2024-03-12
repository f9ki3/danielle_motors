<div class="mb-9">
    <div class="row g-3 mb-4">
        <div class="col-auto">
            <h2 class="mb-0">Products/ Items</h2>
        </div>
    </div>
    <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span class="text-700 fw-semi-bold">(69)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><span>Archived </span><span class="text-700 fw-semi-bold">(69)</span></a></li>
    </ul>
    <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-3">
                <div class="search-box">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search" placeholder="Search products" aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
                <div class="ms-xxl-auto">
                    <button class="btn btn-link text-900 me-4 px-0">
                        <span class="fa-solid fa-print fs--1 me-2"></span>Print
                    </button>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#add-product">
                        <span class="fas fa-plus me-2"></span>Add product
                    </button>
                </div>
            </div>
            <!-- show when a checkbox was selected -->
            <div class="mt-2 d-flex flex-wrap row justify-content-end d-none bulkTransfer">
              <div class="input-group flex-nowrap" style="width: 250px;">
                  <span class="input-group-text" id="addon-wrapping">Transfer to: </span>
                  <select  id="transfer-select"  class="form-control" type="text"aria-label="Username" aria-describedby="addon-wrapping" style="width: 100px;">
                    <option value="" selected="">Choose option</option>
                    <option value="">Rack A-1-1</option>
                    <option value="">Rack A-1-2</option>
                    <option value="">Rack A-1-3</option>
                    <option value="">Rack A-1-4</option>
                    <option value="">Rack A-1-5</option>
                    <option value="">Palette B-1-1</option>
                    <option value="">Palette B-1-2</option>
                    <option value="">Palette B-1-3</option>
                    <option value="">Palette B-1-4</option>
                    <option value="">Palette B-1-5</option>
                  </select>
              </div>
              <button id="submit-btn"  class="btn btn-primary" style="width: 125px;" disabled>Submit</button>
            </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
            <div class="table-responsive scrollbar mx-n1 px-1">
                <table class="table fs--1 mb-0">
                    <thead>
                        <tr>
                            <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                                <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input itemCheckbox" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' />
                                </div>
                            </th>
                            <th class="sort white-space-nowrap align-middle fs--2" scope="col" style="width:70px;"></th>
                            <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">PRODUCT NAME</th>
                            <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="vendor">ITEM CODE/ SKU</th>
                            <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">UNIT PRICE</th>
                            <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">UNIT PRICE</th>
                            <th class="sort white-space-nowrap align-middle ps-4 d-none" scope="col" style="width:350px;" data-sort="tags">DESCRIPTION</th>
                            <th class="sort align-middle ps-4" scope="col" data-sort="category" style="width:150px;">CATEGORY</th>
                            <th class="sort align-middle ps-4" scope="col" data-sort="category" style="width:150px;">BRAND</th>
                            <th class="sort align-middle ps-4" scope="col" data-sort="category" style="width:150px;">MODEL</th>
                            <th class="sort align-middle ps-4" scope="col" data-sort="time" style="width:50px;">PUBLISHED ON</th>
                            <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="products-table-body">
                        <!-- start of dummy data -->
                        <?php 
                        include "../../database/database.php";
                        $sql = "SELECT * FROM products";
                        $res = $conn->query($sql);
                        if($res -> num_rows > 0 ){
                            while($row = $res -> fetch_assoc()){
                        
                        ?>
                        <tr class="position-static">
                            <td class="fs--1 align-middle">
                                <div class="form-check mb-0 fs-0">
                                    <input class="form-check-input itemCheckbox" id="itemCheckbox" type="checkbox" data-bulk-select-row='{"product":"Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management & Skin Temperature Trends, Carbon/Graphite, One Size (S & L Bands...","productImage":"/products/1.png","price":"$39","category":"Plants","tags":["Health","Exercise","Discipline","Lifestyle","Fitness"],"star":false,"vendor":"Blue Olive Plant sellers. Inc","publishedOn":"Nov 12, 10:45 PM"}' />
                                </div>
                            </td>
                            <td class="align-middle white-space-nowrap py-0">
                                <a class="d-block border rounded-2" href="../landing/product-details.html">
                                    <img src="../../assets/img/products/1.png" alt="" width="53" />
                                </a>
                            </td>
                            <!-- pili ka lang sa naka comment sa baba pre -->
                            <td class="product align-middle ps-4 fw-semi-bold line-clamp-3 mb-0">
                                <?php echo $row['product_name'];?>
                            </td>
                            <!-- eto pre kung gusto mo naoopen yung product parang sa ecommerce uncomment mo na lang if mas trip mo 
                            <td class="product align-middle ps-4">
                                <a class="fw-semi-bold line-clamp-3 mb-0" href="../landing/product-details.html">Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management &amp; Skin Temperature Trends, Carbon/Graphite, One Size (S &amp; ...</a>
                            </td> -->

                            <td class="product align-middle ps-4"><?php echo $row['product_code'];?></td>
                            <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">Php <?php echo $row['unit_price'];?></td>
                            <td class="product align-middle ps-4 line-clamp-3 d-none"><?php echo $row['product_description'];?></td>
                            <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold"><?php echo $row['product_category'];?></td>
                            <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold"><?php echo $row['product_brand'];?></td>
                            <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold"><?php echo $row['product_model'];?></td>
                            <!-- <td class="vendor align-middle text-start fw-semi-bold ps-4"><a href="#!">Blue Olive Plant sellers. Inc</a></td> -->
                            <td class="time align-middle white-space-nowrap text-600 ps-4"><?php echo $row['published_on'];?></td>
                            <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                <div class="font-sans-serif btn-reveal-trigger position-static">
                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                        <span class="fas fa-ellipsis-h fs--2"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                        <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#barcode_<?php echo $row['product_code'];?>">View barcode</a>
                                        <a class="dropdown-item text-danger" href="#!">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- modal for barcode -->
                        <div class="modal fade" id="barcode_<?php echo $row['product_code'];?>" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sample Barcode</h5>
                                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                                  <svg class="svg-inline--fa fa-xmark fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                                  </svg>
                                  <!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com -->
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-12 text-start">
                                    <h5><b>Item name: </b> Mfflrwthaslkjdn </h5>
                                  </div>
                                </div>
                                <img alt='barcode' class="img-fluid" src='../../assets/php-barcode-master/barcode.php?codetype=Code128&size=100&text=<?php echo $row['product_code'];?>&print=true'/>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-primary" type="button"><span class="fas fa-print"></span> Print</button>
                                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /barcode modal -->
                        <?php 
                            }
                        }
                        ?>



                        <!-- end of dummy data -->
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

<?php 
  // same folder lang to pre
  include "add-product-modal.php";
?>

<script>
    // Get all elements with the class 'bulkCheckbox'
    const bulkCheckboxes = document.querySelectorAll('.bulkCheckbox');

    // Get all elements with the class 'itemCheckbox'
    const itemCheckboxes = document.querySelectorAll('.itemCheckbox');

    // Get all elements with the class 'bulkTransfer'
    const divElements = document.querySelectorAll('.bulkTransfer');

    // Function to toggle the visibility of the div
    function toggleDivVisibility() {
        // Check if any of the checkboxes are checked
        let anyChecked = false;
        bulkCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                anyChecked = true;
            }
        });
        itemCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                anyChecked = true;
            }
        });

        // Toggle the visibility of the div based on checkbox state
        if (anyChecked) {
            divElements.forEach(div => {
                div.classList.remove('d-none');
            });
        } else {
            divElements.forEach(div => {
                div.classList.add('d-none');
            });
        }
    }

    // Add event listeners to bulkCheckboxes for change events
    bulkCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', toggleDivVisibility);
    });

    // Add event listeners to itemCheckboxes for change events
    itemCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', toggleDivVisibility);
    });
</script>




<!-- sa pag add ng  new item sa add-product-modal na modal -->
<script>
document.getElementById("newItem").addEventListener("click", function() {
  var tbody = document.querySelector("#itemTable tbody");

  var newRow = document.createElement("tr");
  newRow.innerHTML = `
    <td><input class="form-control" name="sample_qty[]" type="number" placeholder="Quantity" style="width: 100px;" min="0" max="99999999"></td>
    <td><input class="form-control" name="sample_name[]" placeholder="Item name" type="text"></td>
    <td><input class="form-control" name="sample_itemcode[]" placeholder="Item code" type="text"></td>
    <td><input class="form-control" name="sample_itemdesc[]" placeholder="SKU" type="text"></td>
    <td>
      <select class="form-control" name="sample_category[]" placeholder="Description">
        <option value="">chooise category</option>
        <option value="">Oil</option>
        <option value="">Muffler</option>
      </select>
    </td>
    <td>
      <select class="form-control" name="sample_brand[]">
        <option value="">chooise brand</option>
        <option value="">T1000</option>
        <option value="">Muggsy</option>
      </select>
    </td>
    <td>
      <select class="form-control" name="sample_model[]">
        <option value="">chooise model</option>
        <option value="">Honda Click(v2)</option>
        <option value="">N-max</option>
      </select>
    </td>
    <td><input class="form-control" name="sample_amount[]" type="text"></td>
  `;
  tbody.appendChild(newRow);
});
</script>

