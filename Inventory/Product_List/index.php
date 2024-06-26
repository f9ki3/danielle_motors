<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

 <?php include "../../page_properties/header.php" ?>
 

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <!-- navigation -->
      <?php include "../../page_properties/nav.php";?>
      <!-- /navigation -->
      <div class="content">
        <?php 
        include "content.php";
        ?>
        <!-- <div class="d-flex flex-center content-min-h">
          <div class="text-center py-9"><img class="img-fluid mb-7 d-dark-none" src="../../assets/img/spot-illustrations/2.png" width="470" alt="" /><img class="img-fluid mb-7 d-light-none" src="../../assets/img/spot-illustrations/dark_2.png" width="470" alt="" />
            <h1 class="text-800 fw-normal mb-5"><?php echo $current_folder;?></h1><a class="btn btn-lg btn-primary" href="../../documentation/getting-started.html">Getting Started</a>
          </div>
        </div> -->
        <!-- footer -->
        <?php include "../../page_properties/footer.php"; ?>
        <!-- /footer -->
      </div>
      <!-- chat-container -->
      <?php include "../../page_properties/chat-container.php"; ?>
      <!-- /chat container -->
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- theme customizer -->
    <?php include "../../page_properties/theme-customizer.php"; ?>
    <!-- /theme customizer -->

    <?php include "../../page_properties/footer_main.php"; ?>
    <!-- Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("Document is ready");

            // Open IndexedDB
            let request = indexedDB.open("cachedContentDB", 1);

            request.onupgradeneeded = function(event) {
                let db = event.target.result;
                let objectStore = db.createObjectStore("contents", { keyPath: "id" });
            };

            request.onsuccess = function(event) {
                let db = event.target.result;
                console.log("IndexedDB opened successfully");

                // Function to add data to IndexedDB
                function addDataToIndexedDB(id, data) {
                    let transaction = db.transaction(["contents"], "readwrite");
                    let objectStore = transaction.objectStore("contents");
                    let request = objectStore.add({ id: id, data: data });
                    request.onsuccess = function(event) {
                        console.log("Data added to IndexedDB");
                    };
                    request.onerror = function(event) {
                        console.error("Error adding data to IndexedDB", event);
                    };
                }

                // Function to store metadata in localStorage with error handling
                function addMetadataToLocalStorage(key, metadata) {
                    try {
                        localStorage.setItem(key, JSON.stringify(metadata));
                    } catch (e) {
                        if (e.name === 'QuotaExceededError') {
                            console.error('LocalStorage quota exceeded. Clearing old metadata...');
                            localStorage.clear();
                            localStorage.setItem(key, JSON.stringify(metadata)); // Retry setting the item
                        } else {
                            console.error('Error adding metadata to localStorage', e);
                        }
                    }
                }

                // Function to fetch content from server
                function fetchContentFromServer() {
                    console.log("Fetching content from server...");
                    $.ajax({
                        url: 'content_loader.php',
                        method: 'GET',
                        success: function(data) {
                            console.log("Content fetched from server");

                            // Compress and store full content in IndexedDB
                            let compressedData = LZString.compress(data);
                            addDataToIndexedDB('cachedContent', compressedData);

                            // Store metadata in localStorage
                            let metadata = { timestamp: Date.now() };
                            addMetadataToLocalStorage('cachedContentMetadata', metadata);

                            // Load content into the page
                            $('#actualContent').html(data);
                            $('#initialContent').hide();
                            $('#actualContent').show();
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching content from server:", xhr.responseText);
                        }
                    });
                }

                // Initialize the lastHash variable
                let lastHash = '';

                // Function to fetch and update product count
                function fetchTableContent() {
                    $.ajax({
                        url: 'total_products.php',
                        success: function(response) {
                            console.log("Product count fetched", response);

                            // Calculate hash of the response
                            var currentHash = hash(response);

                            // If hash has changed, update content
                            if (currentHash !== lastHash) {
                                // Update lastHash
                                lastHash = currentHash;

                                // Extract the number from the response
                                var match = response.match(/\((\d+)\)/);
                                if (match) {
                                    var newNumber = parseInt(match[1]);

                                    // Get the current number inside the span
                                    var currentNumber = parseInt($('#total_product').text());

                                    // Animate the change
                                    $('#total_product').prop('Counter', currentNumber).animate({
                                        Counter: newNumber
                                    }, {
                                        duration: 1000, // Animation duration in milliseconds
                                        step: function (now) {
                                            // Update the displayed number with the animation
                                            $(this).text('(' + Math.ceil(now) + ')');
                                        }
                                    });
                                } else {
                                    console.error("Number not found in response:", response);
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching product count:", xhr.responseText);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Function to calculate hash
        function hash(str) {
            var hash = 0, i, chr;
            if (str.length === 0) return hash;
            for (i = 0; i < str.length; i++) {
                chr = str.charCodeAt(i);
                hash = ((hash << 5) - hash) + chr;
                hash |= 0; // Convert to 32bit integer
            }
            return hash;
        }
                // Call the function initially
                fetchTableContent();

                // Call the function every 5 seconds (adjust the interval as needed)
                setInterval(fetchTableContent, 5000); // 5000 milliseconds = 5 seconds

                function getProduct(product_id) {
                    console.log("Fetching product data for ID:", product_id);
                    $.ajax({
                        url: '../../PHP - process_files/get-product.php',
                        method: 'POST',
                        data: {
                            product_id: product_id
                        },
                        dataType: 'json',
                        success: function(json) {
                            console.log("Product data fetched", json);
                            $('#edit_product_name').text(json.name);
                            $('#new_product_name').val(json.name);
                            $('#edit_product_id').val(json.id);
                            $('#new_item_code').val(json.code);
                            $('#new_supplier_code').val(json.supplier_code);
                            $('#new_barcode').val(json.barcode);
                            $('#old_image').val(json.image);

                            if (json.models !== null) {
                                var models = json.models.split(', ');
                            }
                            $('#edit_model').val(models);

                            $('#edit_unit').val(json.unit);
                            $('#edit_category').val(json.category);
                            $('#edit_brand').val(json.brand);

                            $('#edit_dealer').val(json.dealer);
                            $('#edit_wholesale').val(json.wholesale);
                            $('#edit_srp').val(json.srp);

                            $('#edit_product').modal('show');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching product data:", xhr.responseText);
                        }
                    });
                }
            });
        }
                $('#brand').select2({
                    dropdownParent: $('#add_product'),
                    tags: true,
                    height: '100%',
                    width: '100%',
                    theme: 'bootstrap-5',
                    placeholder: 'Select Brand',
                });

                $('#category').select2({
                    dropdownParent: $('#add_product'),
                    tags: true,
                    height: '100%',
                    width: '100%',
                    theme: 'bootstrap-5',
                    placeholder: 'Select Category',
                });

                $('#unit').select2({
                    dropdownParent: $('#add_product'),
                    tags: true,
                    height: '100%',
                    width: '100%',
                    theme: 'bootstrap-5',
                    placeholder: 'Select Unit',
                });

                $('#model').select2({
                    placeholder: 'Select model/s',
                    dropdownParent: $('#add_product'),
                    tags: true,
                    height: '100%',
                    width: '100%',
                    theme: 'bootstrap-5',
                });

                $('#edit_model').select2({
                    placeholder: 'Select model/s',
                    dropdownParent: $('#edit_product'),
                    tags: true,
                    width: '100%',
                    theme: 'bootstrap-5',
                });

                $(document).on('click', '.edit_product', function() {
                    var product_id = $(this).data('product-id');
                    console.log("Edit product button clicked, Product ID:", product_id);
                    getProduct(product_id);
                });

                $('#edit_unit').select2({
                    dropdownParent: $('#edit_product'),
                    tags: true,
                    height: '100%',
                    width: '100%',
                    theme: 'bootstrap-5',
                    placeholder: 'Select Unit',
                });

                $('#edit_category').select2({
                    dropdownParent: $('#edit_product'),
                    tags: true,
                    height: '100%',
                    width: '100%',
                    theme: 'bootstrap-5',
                    placeholder: 'Select Category',
                });

                $('#edit_brand').select2({
                    dropdownParent: $('#edit_product'),
                    tags: true,
                    height: '100%',
                    width: '100%',
                    theme: 'bootstrap-5',
                    placeholder: 'Select Brand',
                });

                $('#edit_product').on('shown.bs.modal', function() {
                    $("#edit_model").trigger('change');
                    $('#edit_unit').trigger('change');
                    $('#edit_category').trigger('change');
                    $('#edit_brand').trigger('change');
                });

                $('#add_product').on('shown.bs.modal', function() {
                    $("#model").trigger('change');
                });

                // Fetch content from server on initial load
                fetchContentFromServer();
            };

            request.onerror = function(event) {
                console.error("IndexedDB error:", event);
            };
        });
    </script>
</body>
</html>