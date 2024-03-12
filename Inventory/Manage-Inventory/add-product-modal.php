<div class="modal fade" id="add-product" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-xl-down modal-xl">
    <div class="modal-content">
      <form action="../../PHP - process_files/addproduct.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="verticallyCenteredModalLabel">ADD PRODUCT</h5>
          
          <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span class="fas fa-times fs--1"></span>
          </button>
        </div>
        <div class="modal-body">
          <div class="title-container text-center">
            <h3 class="mb-4">DELIVERY RECIEPT</h3>
          </div>
          <table class="table">
            <tr>
              <th>DELIVERED TO:</th>
              <td><input class="form-control" name="delivered_to" type="text"></td>
              <th>DATE ISSUED:</th>
              <td><input class="form-control" name="date_issued" type="text" disabled></td>
            </tr>
            <tr>
              <th>FROM:</th>
              <td><input class="form-control" name="from" type="text"></td>
              <th>REFERENCE NO.:</th>
              <td><input class="form-control" name="ref_no" type="text"></td>
            </tr>
          </table>
          <div class="text-end">
            <button class="btn fs--6" id="newItem" type="button"><span class="fas fa-plus-square text-success"></span> New item</button>
          </div>
          <hr>
          <table class="table" id="itemTable">
            <thead>
              <tr>
                <th>QTY</th>
                <th>ITEM NAME</th>
                <th>ITEM CODE</th>
                <th>ITEM DESCRIPTION</th>
                <th>CATEGORY</th>
                <th>BRAND</th>
                <th>MODEL</th>
                <th>UNIT PRICE</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input class="form-control" name="sample_qty[]" class="form-control" type="number" placeholder="Quantity" style="width: 100px;" min="0" max="99999999"/>
                </td>
                <td>
                  <input class="form-control" name="sample_name[]" placeholder="Item name" type="text">
                </td>
                <td>
                  <input class="form-control" name="sample_itemcode[]" placeholder="Item code" type="text">
                </td>
                <td>
                  <input class="form-control" name="sample_itemdesc[]" placeholder="SKU" type="text">
                </td>
                <td>
                  <select class="form-control" name="sample_category[]" placeholder="Description" name="" id="">
                    <option value="">chooise category</option>
                    <option value="Oil">Oil</option>
                    <option value="Muffler">Muffler</option>
                  </select>
                </td>
                <td>
                  <select class="form-control" name="sample_brand[]" id="">
                    <option value="">chooise brand</option>
                    <option value="T1000">T1000</option>
                    <option value="Muggsy">Muggsy</option>
                  </select>
                </td>
                <td>
                  <select class="form-control" name="sample_model[]" id="">
                    <option value="">chooise model</option>
                    <option value="Honda Click(v2)">Honda Click(v2)</option>
                    <option value="N-max">N-max</option>
                  </select>
                </td>
                <td>
                  <input class="form-control" name="sample_amount[]" type="text">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Submit</button>
          <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
