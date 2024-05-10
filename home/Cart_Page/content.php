<!-- <section> begin ============================-->
<section class="pt-5 pb-9">
  <div class="container-small cart">
    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
        <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
        <li class="breadcrumb-item active" aria-current="page">Default</li>
      </ol>
    </nav>
    <h2 class="mb-6">Cart</h2>
    <div class="row g-5">
      <div class="col-12 col-lg-8">
        <div id="cartTable" data-list='{"valueNames":["products","color","size","price","quantity","total"],"page":10}'>
          <div class="table-responsive scrollbar mx-n1 px-1">
            <table class="table fs--1 mb-0 border-top border-200">
              <thead>
                <tr>
                  <th class="sort white-space-nowrap align-middle fs--2" scope="col"></th>
                  <th class="sort white-space-nowrap align-middle" scope="col" style="min-width:250px;">PRODUCTS</th>
                  <th class="sort align-middle" scope="col" style="width:80px;">COLOR</th>
                  <th class="sort align-middle" scope="col" style="width:150px;">SIZE</th>
                  <th class="sort align-middle text-end" scope="col" style="width:300px;">PRICE</th>
                  <th class="sort align-middle ps-5" scope="col" style="width:200px;">QUANTITY</th>
                  <th class="sort align-middle text-end" scope="col" style="width:250px;">TOTAL</th>
                  <th class="sort text-end align-middle pe-0" scope="col"></th>
                </tr>
              </thead>
              <tbody class="list" id="cart-table-body">
                <tr class="cart-table-row btn-reveal-trigger">
                  <td class="align-middle white-space-nowrap py-0"><a class="d-block border rounded-2" href="product-details.html"><img src="../../../assets/img/products/1.png" alt="" width="53" /></a></td>
                  <td class="products align-middle"><a class="fw-semi-bold mb-0 line-clamp-2" href="product-details.html">Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management &amp; Skin Temperature Trends, Carbon/Graphite, One Size (S &amp; L Bands)</a></td>
                  <td class="color align-middle white-space-nowrap fs--1 text-900">Glossy black</td>
                  <td class="size align-middle white-space-nowrap text-700 fs--1 fw-semi-bold">XL</td>
                  <td class="price align-middle text-900 fs--1 fw-semi-bold text-end">$199</td>
                  <td class="quantity align-middle fs-0 ps-5">
                    <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity"><button class="btn btn-sm px-2" data-type="minus">-</button><input class="form-control text-center input-spin-none bg-transparent border-0 px-0" type="number" min="1" value="2" aria-label="Amount (to the nearest dollar)" /><button class="btn btn-sm px-2" data-type="plus">+</button></div>
                  </td>
                  <td class="total align-middle fw-bold text-1000 text-end">$398</td>
                  <td class="align-middle white-space-nowrap text-end pe-0 ps-3"><button class="btn btn-sm text-500 hover-text-600 me-2"><span class="fas fa-trash"></span></button></td>
                </tr>
                <!-- Add more table rows for additional products if needed -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-between-center mb-3">
              <h3 class="card-title mb-0">Summary</h3><a class="btn btn-link p-0" href="#!">Edit cart </a>
            </div>
            <select class="form-select mb-3" aria-label="delivery type">
              <option value="cod">Cash on Delivery</option>
              <option value="card">Card</option>
              <option value="paypal">Paypal</option>
            </select>
            <div>
              <div class="d-flex justify-content-between">
                <p class="text-900 fw-semi-bold">Items subtotal :</p>
                <p class="text-1100 fw-semi-bold">$691</p>
              </div>
              <!-- Additional summary details can be added here -->
            </div>
            <!-- Remaining summary details and checkout button goes here -->
          </div>
        </div>
      </div>
    </div>
  </div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->

<!-- Support Chat Widget -->
<div class="support-chat-container">
  <div class="container-fluid support-chat">
    <!-- Remaining HTML for the support chat section goes here -->
  </div>
</div>
