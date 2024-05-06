<div id="spinner" style="height: 80vh; display: flex; justify-content: center; align-items: center;">
<!-- <iframe src="https://giphy.com/embed/3oz8xzJjbG2Etm0f04" width="480" height="270" frameBorder="0" class="giphy-embed rounded rounded-5" allowFullScreen></iframe><p></p> -->
    <div class="spinner-grow text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div id="content" style="display: none">
    <div id="products" data-list="{&quot;valueNames&quot;:[&quot;product&quot;,&quot;price&quot;,&quot;category&quot;,&quot;tags&quot;,&quot;vendor&quot;,&quot;unit&quot;, &quot;model&quot;, &quot;status&quot;],&quot;page&quot;:10,&quot;pagination&quot;:true}">
        <div class="mb-4">
            <div class="d-flex flex-wrap gap-3">
            <h2 class="mb-0">Personnel List</h2>
            
            <div class="ms-xxl-auto">
                <button href="../Purchase_Warehouse" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add_personnel"><span class="fas fa-plus me-2"></span> Add Personnel</button>
            </div>
            </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
            <div class="table-responsive scrollbar mx-n1 px-1">
                <table class="table mb-0">
                    <thead>
                    <tr>
                        <th class="sort white-space-nowrap align-middle " style="width: 5%" scope="col">IMG</th>
                        <th class="sort white-space-nowrap align-middle " style="width: 15%" scope="col" data-sort="product">PRODUCT NAME</th>
                        <th class="sort align-middle text-start " style="width: 10%" scope="col" data-sort="price">ITEM CODE</th>
                        <th class="sort align-middle text-start " style="width: 10%" scope="col" data-sort="tags">CATEGORY</th>
                        <th class="sort align-middle text-start " style="width: 10%" scope="col" data-sort="vendor">BRAND</th>
                        <th class="sort align-middle text-start " style="width: 5%" scope="col" data-sort="unit">UNIT</th>
                        <th class="sort align-middle text-start " style="width: 15%" scope="col" data-sort="model">MODEL</th>
                        <th class="sort align-middle text-start " style="width: 10%" scope="col" data-sort="status">STATUS</th>
                        <th class="sort align-middle text-start " style="width: 10%" scope="col" data-sort="tags">SRP</th>
                        <th class="sort align-middle text-start " style="width: 10%" scope="col" data-sort="tags">STOCKS</th>
                        <th class="sort text-end align-middle" style="width: 10%" scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list" id="products-table-body">
                        <?php include 'personnel.php'?>
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                <div class="col-auto d-flex">
                    <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info">1 to 10 <span class="text-600"> Items of </span>1825</p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<svg class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)"><g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" transform="translate(-128 -256)"></path></g></g></svg><!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<svg class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)"><g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" transform="translate(-128 -256)"></path></g></g></svg><!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a>
                </div>
                <div class="col-auto d-flex"><button class="page-link disabled" data-list-pagination="prev" disabled=""><svg class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"></path></svg><!-- <span class="fas fa-chevron-left"></span> Font Awesome fontawesome.com --></button>
                    <ul class="mb-0 pagination"><li class="active"><button class="page" type="button" data-i="1" data-page="10">1</button></li><li><button class="page" type="button" data-i="2" data-page="10">2</button></li><li><button class="page" type="button" data-i="3" data-page="10">3</button></li><li class="disabled"><button class="page" type="button">...</button></li></ul><button class="page-link pe-0" data-list-pagination="next"><svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path></svg><!-- <span class="fas fa-chevron-right"></span> Font Awesome fontawesome.com --></button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal mt-5 fade" id="add_personnel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="fw-bold" id="exampleModalLabel">ADD PERSONNEL</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
            <div class="form-floating mb-3">
                <input class="form-control" id="approved_by" name="approved_by" type="text" placeholder="Enter full name" required/>
                <label for="floatingInput">Personnel Name</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-control" id="type">
                    <option selected="" value="">Inspector</option>
                    <option selected="" value="">Receiver</option>
                    <option selected="" value="">Verifier</option>
                </select>
                <label for="type">Personnel Type</label>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
