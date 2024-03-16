
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?php include '../config/config.php';

// // Assuming your database connection code is already present
// // Fetch category data from the database
// $categoryQuery = "SELECT `id`, `category_name` FROM `category`";
// $categoryResult = $conn->query($categoryQuery);

// $brandQuery = "SELECT `id`, `brand_name` FROM `brand`";
// $brandResult = $conn->query($brandQuery);

// // Check if the query was successful
// if ($categoryResult) {
//     $categories = $categoryResult->fetch_all(MYSQLI_ASSOC);
// } else {
//     // Handle the error appropriately
//     die("Error fetching categories: " . $conn->error);
// }
// if ($brandResult) {
//     $brands = $brandResult->fetch_all(MYSQLI_ASSOC);
// } else {
//     // Handle the error appropriately
//     die("Error fetching brand: " . $conn->error);
// }
// $brandResult->close();
// $categoryResult->close();

// // Close the connection
// $conn->close();
// ?>

<style>
    /* Adjust the min-width value according to your preference */
    .select2-container--default .select2-selection--single {
        min-width: 150px;
    }
</style>
<!-- start inventory-->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Purchase</h5>
            <a href="purchase" class="btn btn-primary btn-sm  border rounded mb-2">Purchase Walk-in</a>
            <a href="purchase_delivery" class="btn btn-sm border rounded mb-2">Purchase Delivery</a>
            <a href="purchase_online" class="btn btn-sm border rounded mb-2">Purchase Online</a>
            <a href="purchase_terms" class="btn btn-sm border rounded mb-2">Purchase with Terms</a>
            <a href="store_stocks" class="btn btn-sm border  rounded mb-2">Store Stocks</a>
            
        </div>

        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input class="form-control form-control-sm" id="searchInput" placeholder="Search by Product Name">
                    </div>
                    <!-- <div style="display: flex; flex-direction: row">
                        <select id="brandSelect"  class="form-select form-select-sm " aria-label="Default select example" style="width:100%">
                            <option selected>Select Brand</option>
                             <?php foreach ($brands as $brand): ?>
                            <option value="<?php echo $brand['id']; ?>"><?php echo $brand['brand_name']; ?></option>
                             <?php endforeach; ?>
                        </select>
                        <select id="categorySelect"  class="form-select form-select-sm " aria-label="Default select example" style="width: 100%">
                            <option selected>Select Category</option>
                             <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                             <?php endforeach; ?>
                        </select>
                    </div> -->
                    <div>
                        <a href="purchase" class="btn border btn-primary btn-sm me-1 rounded ">Purchase</a>
                        <a href="purchase_cart" class="btn border btn-sm rounded">Cart</a>
                    </div>
                </div>
                </div>
                <table class="mt-2 table" id="productTable">
                    <thead>
                        <tr>
                        <th scope="col" width="5%">CODE.</th>
                        <th scope="col" width="15%">Product Name</th>
                        <th scope="col" width="5%">IMG</th>
                        <th scope="col" width="10%"> Model</th>
                        <th scope="col" width="10%">Brand</th>
                        <th scope="col" width="5%">SRP</th>
                        <th scope="col" width="5%">Unit</th>
                        <th scope="col" width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody >
                    <?php include '../php/purchase_list.php'?>
                    
                    </tbody>
                    </table>


                
            </div>
            
        </div>





<!-- end purchase-->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add to Cart</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center">
        <img class="border mb-2" src="../uploads/suzuki_trottle_cable.jpeg" alt="">
        <input class="form-control mb-2" disabled type="text" value="Product Code: PROD1034">
        <input class="form-control mb-2" disabled type="text" value="Product Name: Trottle Cable">
        <textarea name="" class="form-control form-control-sm mb-2 py-3" style="text-align: justify" placeholder="The throttle cable is a vital component in a vehicle's engine system, responsible for regulating the flow of air and fuel to the engine. It connects the accelerator pedal to the throttle body, allowing the driver to control engine speed. Proper maintenance and adjustment of the throttle cable are crucial for smooth and efficient engine performance." id="" cols="30" rows="5" disabled></textarea>
        <input class="form-control mb-2" disabled type="text" value="Price: 150.00">
        <input class="form-control mb-2" disabled type="text" value="Stocks: 100pcs">
        
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->


</div>
<?php include 'footer.php'?>
</body>
</html>
