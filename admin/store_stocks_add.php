
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
            <option value="<?php echo $product['id'] . ' - ' . $product['name'] . ' - ' . $product['models'] . ' - ' . $product['brand_name']; ?>"></option>
        <?php endforeach; ?>
    </datalist>
        
        
        <input type="text" class="form-control me-2" style="width: 20%" id="select_product" list="suggestions" placeholder="Search Item to Add">
        <input type="text" class="form-control me-2" style="width: 20%" id="based_price" placeholder="SRP" <?php echo isset($delivery_receipt_content['price']) ? 'value="' . $delivery_receipt_content['price'] . '"' : ''; ?>>
        <input type="text" class="form-control me-2" style="width: 20%" id="suggested_retail_price" placeholder="Selling Price" <?php echo isset($delivery_receipt_content['orig_price']) ? 'value="' . $delivery_receipt_content['orig_price'] . '"' : ''; ?>>
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
                            <th scope="col" width="10%">SRP</th>
                            <th scope="col" width="10%">Selling Price</th>
                            <th scope="col" width="10%">Quantity</th>
                            <th scope="col" width="10%" >Markup
                                <select id="markup">
                                    <option value="perC">%</option>
                                    <option value="inT">₱</option>
                                </select>
                            </th>
                            <th scope="col" width="10%" >Total
                                <select id="totalType">
                                    <option value="BasePrice">CostPrice</option>
                                    <option value="SellingPrice">SellingPrice</option>
                                </select>
                            </th>
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
                                <input type="text" class="form-control" placeholder="Material Invoice" style="width: 49%" id="materialInvoiceNo" value="" readonly>
                                    <input type="date" class="form-control" placeholder="Date" style="width: 49%" id="materialDate">
                                </div>
                               

                                <div style="display: flex; flex-direction: row; justify-content: space-between" >
                                <input type="text" class="form-control mb-2" aria-label="Default select example" placeholder="Cashier Name" style="width: 49%" id="cashierName" readonly required value="<?php echo $fname . ' ' . $lname; ?>">
                                <select class="form-select mb-2" aria-label="Default select example" style="width: 49%" id="receivedBy">
   
                                    </select>
                                <!-- <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="inspectedBy">
   
                                    </select>
                                <select class="form-select mb-2" aria-label="Default select example" style="width: 33%" id="verifiedBy">
     
                                    </select> -->
                                </div>

                                
                            </div>

                        </div>
                        <div style="width: 50%" class="p-2">
                            <div class="border rounded p-4">
                                <h3 class="fw-bolder">Summary</h3><hr>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Selling Price</h5>
                                    <h5 class="" id="SellingPrice">₱0.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Cost Price</h5>
                                    <h5 class="" id="BasePrice">₱0.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; width: 100%; justify-content: space-between">
                                    <h5 class="">Total Gross Profit</h5>
                                    <h5 class="" id="GrossProfit">₱0.00</h5>
                                </div>
                                <div style="display: flex; flex-direction: row; justify-content: space-between" class="mt-2">
                                <button id="cancelButton" class="btn text-primary border-primary" style="width: 49%">Cancel</button>
                                <button type="button" class="btn btn-primary" style="width: 49%" id="saveMaterialTransfer">Save</button>
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

var savedProductId; // Variable to store the productId
var savedQuantity; // Variable to store the quantity

function addItem() {
    var productInput = document.getElementById("select_product");
    var retailPriceInput = document.getElementById("suggested_retail_price");
    var basedPriceInput = document.getElementById("based_price");
    var quantityInput = document.getElementById("quantity");

    // Get the selected product value from the input field
    var selectedProduct = productInput.value.trim();

    // Split the selected product value to extract id, name, models, and brand_id
    var [productId, productName, models, brand_name] = selectedProduct.split(' - ');

    // Get the values from input fields
    var retailPrice = parseFloat(retailPriceInput.value.trim()); // Parse as float
    var basedPrice = parseFloat(basedPriceInput.value.trim()); // Parse as float
    var quantity = parseInt(quantityInput.value.trim()); // Parse as integer

    // Check if any input field is empty
    if (productName === '' || isNaN(retailPrice) || isNaN(basedPrice) || isNaN(quantity)) {
        alert("Please fill out all fields with valid numbers");
        return;
    }

    // Store productId and quantity
    savedProductId = productId;
    savedQuantity = quantity;

    // Calculate markup as percentage
    var markupPercent = ((retailPrice - basedPrice) / basedPrice) * 100;
    var markupInteger = Math.round(markupPercent); // Convert to real integer

    // Calculate amount
    var amount = quantity * basedPrice;

    // Create a new table row to display the submitted item
    
    var newRow = document.createElement("tr");
    newRow.setAttribute("data-product-id", productId); // Add data-product-id attribute to store the product ID
    newRow.innerHTML = `
        <td>${productName}</td>
        <td>${models}</td>
        <td>${brand_name}</td>
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

    updateSummary();
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

function fetchAdminData(adminId, adminData) {
    var admin = adminData.find(function (admin) {
        return admin.id == adminId;
    });
    return admin ? admin.fname + ' ' + admin.lname : '';
}

function generateAutogeneratedValue() {
    var prefix = "DMP";
    var randomNumber = Math.floor(Math.random() * 10000000);
    var autogeneratedValue = prefix + randomNumber;
  
    // Set the autogenerated value as the value of the hidden input element
    $('#materialInvoiceNo').val(autogeneratedValue);

  // Set the autogenerated value as the value of the hidden input element
  document.getElementById("materialInvoiceNo").value = autogeneratedValue;
}

// Call the function to generate the value when the page loads
window.onload = generateAutogeneratedValue;

function removeItem(button) {
    // Get the parent row of the button clicked
    var row = button.parentNode.parentNode;
    
    // Get the product ID from the data-product-id attribute
    var productId = row.getAttribute("data-product-id");
    
    // Use the product ID as needed
    console.log("Product ID:", productId);
    
    // Remove the row from the table
    row.parentNode.removeChild(row);
    
    // Update the summary
    updateSummary();
}


    document.getElementById("cancelButton").addEventListener("click", function() {
    // Remove all rows from the table
    var tableBody = document.getElementById("cartList");
    while (tableBody.firstChild) {
        tableBody.removeChild(tableBody.firstChild);
    }
    updateSummary();
});

document.getElementById("markup").addEventListener("change", function() {
    // Get the selected value from the dropdown
    var markup = this.value;

    // Get all table rows containing markup values
    var markupRows = document.querySelectorAll("#cartList tr td:nth-child(7)"); // Change child index to 7

    // Loop through each markup row and update the markup value based on the selected type
    markupRows.forEach(function(markupRow) {
        var markupValue = parseFloat(markupRow.textContent); // Get the current markup value

        // Check the selected markup type and update the markup value accordingly
        if (markup === "perC") {
            // Calculate markup as based price minus SRP and display it as a real integer
            var basedPrice = parseFloat(markupRow.previousElementSibling.previousElementSibling.previousElementSibling.textContent);
            var srp = parseFloat(markupRow.previousElementSibling.previousElementSibling.textContent);
            var markupPercent = ((srp - basedPrice) / basedPrice) * 100;
            markupRow.textContent = markupPercent.toFixed(2) + "%"; // Display markup as percentage
        } else if (markup === "inT") {
            // Calculate markup as based price minus SRP and display it as a real integer
            var basedPrice = parseFloat(markupRow.previousElementSibling.previousElementSibling.textContent);
            var srp = parseFloat(markupRow.previousElementSibling.previousElementSibling.previousElementSibling.textContent);
            var realMarkup = basedPrice - srp;
            markupRow.textContent = "₱"+ realMarkup.toFixed(2); // Display markup as a real integer
        }
    });
});


document.getElementById("totalType").addEventListener("change", function() {
    // Get the selected value from the dropdown
    var totalType = this.value;

    // Get all table rows containing total values
    var totalRows = document.querySelectorAll("#cartList tr");

    // Loop through each total row and update the total value based on the selected type
    totalRows.forEach(function(totalRow) {
        var basedPrice = parseFloat(totalRow.cells[3].textContent); // Based Price
        var retailPrice = parseFloat(totalRow.cells[4].textContent); // SRP
        var quantity = parseInt(totalRow.cells[5].textContent); // Quantity
        var markup = parseFloat(totalRow.cells[6].textContent); // Markup
        var amount = 0;

        // Calculate the total based on the selected type
        if (totalType === "BasePrice") {
            // Calculate total based on Based Price
            amount = basedPrice * quantity;
        } else if (totalType === "SellingPrice") {
            // Calculate total based on Selling Price (SRP)
            amount = retailPrice * quantity;
        }

        // Update the total value in the last column
        totalRow.cells[7].textContent = amount.toFixed(2);
    });
});


function updateSummary() {
    // Initialize variables for total selling price, total cost price, and total gross profit
    var totalSellingPrice = 0;
    var totalCostPrice = 0;
    var totalGrossProfit = 0;

    // Iterate through each row in the table
    document.querySelectorAll("#cartList tr").forEach(function(row) {
        // Extract the relevant values from the row
        var basedPrice = parseFloat(row.cells[3].textContent); // Based Price
        var retailPrice = parseFloat(row.cells[4].textContent); // SRP
        var quantity = parseInt(row.cells[5].textContent); // Quantity

        // Calculate the total cost price and total selling price for this row
        var amount = basedPrice * quantity;
        var markupPercent = ((retailPrice - basedPrice) / basedPrice) * 100;
        var totalMarkup = markupPercent * quantity;
        var sellingPrice = retailPrice * quantity;

        // Add the row's values to the running totals
        totalSellingPrice += sellingPrice;
        totalCostPrice += amount;
    });

    // Calculate the total gross profit
    totalGrossProfit = totalSellingPrice - totalCostPrice;
    // Update the corresponding elements in the Summary div
    document.getElementById("SellingPrice").textContent = "₱"+ totalSellingPrice.toFixed(2);
    document.getElementById("BasePrice").textContent = "₱"+totalCostPrice.toFixed(2);
    document.getElementById("GrossProfit").textContent = "₱"+ totalGrossProfit.toFixed(2);
}

// Call the updateSummary function whenever there is a change in the table values
document.getElementById("markup").addEventListener("change", updateSummary);
// Add any other event listeners here if needed


$(document).ready(function () {

    // Save Material Transfer
    $('#saveMaterialTransfer').click(function () {
        var materialInvoiceNo = $('#materialInvoiceNo').val();
        console.log(materialInvoiceNo); // You can use this value wherever you need it
// Iterate through each row in the table
        $('#cartList tr').each(function () {
            // Get the product ID from the data-product-id attribute
            var productId = $(this).attr('data-product-id');
            var materialInvoiceNo = $('#materialInvoiceNo').val();
    
            // Get the quantity from the table cell
            var inputSrp = parseFloat($(this).find('td:eq(3)').text()); // Assuming input SRP is in the fourth column
            var retailPrice = parseFloat($(this).find('td:eq(4)').text()); // Assuming SRP is in the fifth column
            var quantity = parseInt($(this).find('td:eq(5)').text()); // Assuming the quantity is in the sixth column

            
            // var markupPercent = parseFloat($('#markupPercent').val()); // Assuming you have an input field for markup amount
            var markupPeso = parseFloat($('#markupInteger').val()); // Assuming you have an input field for markup amount
            var SellingPrice = parseFloat($('#SellingPrice').val()); // Assuming you have an input field for markup amount
         // Make AJAX call to update product stocks
            $.ajax({
                url: '../php/add_product_stocks.php',
                method: 'POST',
                data: {
                    productId: productId,
                    stocksToAdd: quantity,
                    srp: retailPrice
                },
                success: function (response) {
                            // Here you can add another AJAX call to save the transaction details
                        $.ajax({
                            url: '../php/material_transaction.php',
                            method: 'POST',
                            data: {
                                productId: productId,
                                material_invoice_id: materialInvoiceNo, 
                                input_srp: inputSrp,
                                input_selling_price: retailPrice,
                                qty_added: quantity,
                                selling_price: SellingPrice,
                            },
                            success: function (response) {
                                console.log('Material transaction saved successfully');
                            },
                            error: function (xhr, status, error) {
                                console.error('Error saving material transaction:', error);
                            }
                        });
                    swal({
                        title: "Material Requested",
                        text: "Product has been requested",
                        icon: "success",
                        button: {
                            text: "OK",
                            closeModal: false, // Prevents closing the modal automatically after the button is clicked
                        },
                    }).then((value) => {
                        // Check if the button is clicked
                        if (value) {
                            // Redirect to the desired window location
                            window.location.href = "store_product.php?material_transaction=" + materialInvoiceNo;
                        }
                    });
                    console.log('Product stocks updated successfully for product ID ' + productId);
                    // Add any additional actions here after successful update of product stocks
                },
                error: function (xhr, status, error) {
                    console.error('Error updating product stocks for product ID ' + productId + ':', error);
                }
            });
        });


        var materialDate = $('#materialDate').val();
        var materialInvoiceNo = $('#materialInvoiceNo').val();
        var cashierName = $('#cashierName').val();
        var receivedById = $('#receivedBy').val();
        var inspectedById = $('#inspectedBy').val();
        var verifiedById = $('#verifiedBy').val();

        // Calculate total selling price, total cost price, and total gross profit
        var totalSellingPrice = 0;
        var totalCostPrice = 0;
        var totalGrossProfit = 0;

        // Iterate through each row in the table
        $('#cartList tr').each(function () {
            var basedPrice = parseFloat($(this).find('td:eq(3)').text());
            var retailPrice = parseFloat($(this).find('td:eq(4)').text());
            var quantity = parseInt($(this).find('td:eq(5)').text());

            var amount = basedPrice * quantity;
            var markupPercent = ((retailPrice - basedPrice) / basedPrice) * 100;
            var sellingPrice = retailPrice * quantity;

            totalSellingPrice += sellingPrice;
            totalCostPrice += amount;
        });

        totalGrossProfit = totalSellingPrice - totalCostPrice;


        // Fetch first name and last name based on the selected IDs
        $.ajax({
            url: '../php/fetch_admin_data.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                var receivedBy = fetchAdminData(receivedById, data);
                var inspectedBy = fetchAdminData(inspectedById, data);
                var verifiedBy = fetchAdminData(verifiedById, data);

                                // Save Material Transfer with total values
                                $.ajax({
                    url: '../php/store_stocks_save.php', // Your server-side script to save material transfer
                    method: 'POST',
                    data: {
                        materialDate: materialDate,
                        materialInvoiceNo: materialInvoiceNo,
                        cashierName: cashierName,
                        receivedBy: receivedBy,
                        inspectedBy: inspectedBy,
                        verifiedBy: verifiedBy,
                        totalSellingPrice: totalSellingPrice,
                        totalCostPrice: totalCostPrice,
                        totalGrossProfit: totalGrossProfit

                    },
                    success: function (response) {
                        console.log(response);
                        // window.location.href = "store_stocks_add.php";
                    },
                    error: function (xhr, status, error) {
                        console.error('Error saving data:', error);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error('Error fetching admin data:', error);
            }
        });
    });
});

</script>
