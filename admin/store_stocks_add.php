
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?php include '../config/config.php';
?>
<?PHP Include '../php/product_dropdown.php'?>

<style>
    /* Adjust the min-width value according to your preference */
    .select2-container--default .select2-selection--single {
        min-width: 150px;
    }
</style>
<!-- start inventory-->

<div style="width: 100%" class="content p-3">
    <div>

        <div style="background-color: white;" class="rounded border p-3 w-100">
            <div class="row">
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 100%">
<div class="border rounded p-3"  id="add_stocks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <h5 class="fw-bolder">Add Stocks</h5>
    <div style="display: flex; flex-direction: row;">
        <datalist id="suggestions">
            <?php foreach ($products as $product): ?>
                <option value="<?php echo $product['id'] . ' - ' . $product['name'] . ' - ' . $product['models']; ?>"></option>
            <?php endforeach; ?>
        </datalist>
        
 
        <input type="text" class="form-control me-2" style="width: 20%" id="select_product" list="suggestions" placeholder="Search Item to Add">
        <input type="text" class="form-control me-2" style="width: 20%" id="based_price" placeholder="Based Price">
        <input type="text" class="form-control me-2" style="width: 20%" id="suggested_retail_price" placeholder="Suggested Retail Price">
        <input type="text" class="form-control me-2" style="width: 20%" id="quantity" placeholder="Qty">
        <button class="btn btn-primary" onclick="addItem()">Submit</button>
    </div>
    <!-- List to display submitted items -->
 
</div>
</div>
                    
                    </div>
                </div>
                </div>
                <div style="height: 80vh;">
                    <hr>
                    <div style="height: 50vh; overflow: auto">
                    <table class="table">
                    <thead class="sticky-top">
                        <tr>
                            <th scope="col" width="15%">Product Name</th>
                            <th scope="col" width="10%">Model</th>
                            <th scope="col" width="10%">Brand</th>
                            <th scope="col" width="10%">Based Price</th>
                            <th scope="col" width="10%">SRP</th>
                            <th scope="col" width="10%">Stocks</th>
                            <th scope="col" width="10%" >Markup
                                <select id="markup">
                                    <option value="perC">(%)</option>
                                    <option value="inT">(₱)</option>
                                </select>
                            </th>
                            <!-- <th scope="col" width="10%" >total
                                <select id="totalType">
                                    <option value="BasePrice">(BasePrice)</option>
                                    <option value="SellingPrice">(SellingPrice)</option>
                                </select>
                            </th> -->
                            <th scope="col" width="10%">Amount</th>
                            <th scope="col" width="5%">Action</th>
                        </tr>
                    </thead>
                        <tbody id="cartList">
                        <!-- Cart items will be populated here -->
                    </tbody>
                    </table>
                        
                    </div>
                    <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                        <div style="width: 49%" class="py-2 mb-2">
                            <div class="border rounded p-4 pb-5">
                            <h3 class="fw-bolder">Material Transfer</h3>
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mb-3">
                                    <input type="text" class="form-control" placeholder="Material Invoice" style="width: 49%">
                                    <input type="date" class="form-control" placeholder="Date" style="width: 49%" id="dateInput">
                                </div>
                                <input type="text" class="form-control mb-2" placeholder="Cashier Name">

                                <div style="display: flex; flex-direction: row; justify-content: space-between" >
                                <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="receivedBy">
   
                                    </select>
                                <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="inspectedBy">
   
                                    </select>
                                <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="verifiedBy">
     
                                    </select>
                                </div>

                                
                            </div>

                        </div>
                        <div style="width: 50%" class="p-2">
                            <div class="border rounded p-4">
                                <h3 class="fw-bolder">Summary</h3><hr>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Selling Price</h5>
                                    <h5 class="" id="subtotal">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Cost Price</h5>
                                    <h5 class="" id="tax">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Gross Profit</h5>
                                    <h5 class="" id="subtotal_discount">PHP 100.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mt-2">
                                    <button class="btn text-primary border-primary " style="width: 49%">Cancel</button>
                                    <button class="btn btn-primary " style="width: 49%">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            
        </div>





<!-- end purchase cart-->



</div>
<?php include 'footer.php'?>



</body>
</html>

<script type="text/javascript">

function addItem() {
        var productInput = document.getElementById("select_product");
        var retailPriceInput = document.getElementById("suggested_retail_price");
        var basedPriceInput = document.getElementById("based_price");
        var quantityInput = document.getElementById("quantity");

        // Get the selected product value from the input field
        var selectedProduct = productInput.value.trim();

        // Split the selected product value to extract id, name, models, and brand_id
        var [productId, productName, models, brand_id] = selectedProduct.split(' - ');

        // Get the values from input fields
        var retailPrice = parseFloat(retailPriceInput.value.trim()); // Parse as float
        var basedPrice = parseFloat(basedPriceInput.value.trim()); // Parse as float
        var quantity = parseInt(quantityInput.value.trim()); // Parse as integer

        // Check if any input field is empty
        if (productName === '' || isNaN(retailPrice) || isNaN(basedPrice) || isNaN(quantity)) {
            alert("Please fill out all fields with valid numbers");
            return;
        }

        // Calculate markup as percentage
        var markupPercent = ((retailPrice - basedPrice) / basedPrice) * 100;
        var markupInteger = Math.round(markupPercent); // Convert to real integer

        // Calculate amount
        var amount = quantity * basedPrice;

        // Create a new table row to display the submitted item
        var newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${productName}</td>
            <td>${models}</td>
            <td>${brand_id}</td>
            <td>${basedPrice}</td>
            <td>${retailPrice}</td>
            <td>${quantity}</td>
            <td>${markupInteger}%</td>
            <td>${amount}</td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="removeItem(this)">Remove</button>
            </td>
        `;

        // Append the new table row to the table body
        document.getElementById("cartList").appendChild(newRow);

        // Clear input fields after submission
        productInput.value = '';
        retailPriceInput.value = '';
        basedPriceInput.value = '';
        quantityInput.value = '';
    }

$(document).ready(function () {
  
  function fetchAdminData(selectElementId, role) {
      $.ajax({
          url: '../php/fetch_admin_data.php', // Your server-side script to fetch admin data
          method: 'GET',
          data: { role: role }, // Optional: send role if needed
          dataType: 'json',
          success: function (data) {
              // Populate the dropdown options
              var selectElement = $('#' + selectElementId);
              selectElement.empty();
              selectElement.append('<option selected>Select ' + role + '</option>');
              $.each(data, function (index, admin) {
                  selectElement.append('<option value="' + admin.id + '">' + admin.fname + ' ' + admin.lname + '</option>');
              });
          },
          error: function (xhr, status, error) {
              console.error('Error fetching admin data:', error);
          }
      });
  }

  // Fetch data for receivedBy dropdown
  
  fetchAdminData('receivedBy', 'Recieved By');
  
  // Fetch data for inspectedBy dropdown
  fetchAdminData('inspectedBy', 'Inspected by');

  // Fetch data for verifiedBy dropdown
  fetchAdminData('verifiedBy', 'Verified By');
});

function removeItem(button) {
        // Remove the parent row of the clicked button
        button.closest("tr").remove();
    }

document.getElementById("markup").addEventListener("change", function() {
        // Get the selected value from the dropdown
        var markup = this.value;

        // Get all table rows containing markup values
        var markupRows = document.querySelectorAll("#cartList tr td:nth-child(7)"); // Change child index to 7 and 6

        // Loop through each markup row and update the markup value based on the selected type
        markupRows.forEach(function(markupRow) {
            var markupValue = parseFloat(markupRow.textContent); // Get the current markup value

            // Check the selected markup type and update the markup value accordingly
            if (markup === "perC") {
                // Display markup as percentage
                markupRow.textContent = markupValue + "%";
            } else if (markup === "inT") {
                // Calculate markup as based price minus SRP and display it as a real integer
                var basedPrice = parseFloat(markupRow.previousElementSibling.textContent);
                var srp = parseFloat(markupRow.previousElementSibling.previousElementSibling.textContent);
                var realMarkup = basedPrice - srp;
                markupRow.textContent = realMarkup.toFixed(2); // Display markup as a real integer
            }
        });
    });

//     document.getElementById("totalType").addEventListener("change", function() {
//     // Get the selected value from the dropdown
//     var totalType = this.value;
    
//     // Get all table rows containing total values
//     var totalRows = document.querySelectorAll("#cartItemsList tr td:nth-child(8)"); // Change child index to 8
    
//     // Loop through each total row and update the total value based on the selected type
//     totalRows.forEach(function(totalRow) {
//         var totalValue = parseFloat(totalRow.textContent); // Get the current total value
        
//         // Check the selected total type and update the total value accordingly
//         if (totalType === "BasePrice") {
//             // Display total as BasePrice
//             totalRow.textContent = totalValue.toFixed(2) + " (BasePrice)";
//         } else if (totalType === "SellingPrice") {
//             // Display total as SellingPrice
//             var markupPercent = parseFloat(totalRow.previousElementSibling.textContent);
//             var basedPrice = parseFloat(totalRow.previousElementSibling.previousElementSibling.textContent);
//             var retailPrice = (basedPrice * (1 + (markupPercent / 100))).toFixed(2);
//             totalRow.textContent = retailPrice + " (SellingPrice)";
//         }
//     });
// });

</script>
