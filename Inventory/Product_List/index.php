<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php include "../../page_properties/header.php"; ?>

<body>
    <main class="main" id="top">
        <?php include "../../page_properties/nav.php"; ?>
        <div class="content">
            <?php include "content.php"; ?>
            <div id="initialContent">
                <!-- Initial content placeholder -->
                <!-- <p>Loading content...</p> -->
            </div>
            <div id="actualContent" style="display: none;">
                <!-- Actual content will be populated dynamically -->
            </div>
            <div id="productTable">
                <!-- Product table will be populated dynamically -->
            </div>
            <?php include "../../page_properties/footer.php"; ?>
        </div>
        <?php include "../../page_properties/chat-container.php"; ?>
    </main>

    <?php include "../../page_properties/theme-customizer.php"; ?>
    <?php include "../../page_properties/footer_main.php"; ?>

    <!-- Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lz-string/1.4.4/lz-string.min.js"></script>
    <script>
        $(document).ready(function () {
            console.log("Document is ready");

            let request = indexedDB.open("cachedContentDB", 1);
            let db;

            request.onerror = function (event) {
                console.error("IndexedDB error:", event.target.errorCode);
            };

            request.onupgradeneeded = function (event) {
                db = event.target.result;

                if (!db.objectStoreNames.contains("contents")) {
                    db.createObjectStore("contents", { keyPath: "id" });
                }
                if (!db.objectStoreNames.contains("metadata")) {
                    db.createObjectStore("metadata", { keyPath: "id" });
                }
            };

            request.onsuccess = function (event) {
                db = event.target.result;
                console.log("IndexedDB initialized successfully");

                fetchContent();
                fetchProducts();

                setInterval(function () {
                    fetchContent();
                    fetchProducts();
                }, 600000);
            };

            function fetchContent() {
            let transaction = db.transaction(["contents"]);
            let objectStore = transaction.objectStore("contents");
            let request = objectStore.get("cachedContent");

            request.onsuccess = function (event) {
                if (request.result) {
                    let decompressedData = LZString.decompressFromUTF16(request.result.data);

                    // Check if the content is in JSON format (assuming it's JSON)
                    try {
                        let parsedData = JSON.parse(decompressedData);
                        
                        // Display the data in a table format
                        displayProducts(parsedData.products); // Assuming parsedData contains an array named products
                        
                        console.log("Content loaded from IndexedDB");
                    } catch (error) {
                        console.error("Error parsing JSON data:", error);
                        fetchContentFromServer(); // Fallback to fetch from server if parsing fails
                    }
                } else {
                    console.log("No content found in IndexedDB, fetching from server...");
                    fetchContentFromServer();
                }
            };

            request.onerror = function (event) {
                console.error("Error fetching content from IndexedDB", event);
                fetchContentFromServer();
            };
        }

            function fetchProducts() {
                let transaction = db.transaction(["contents"]);
                let objectStore = transaction.objectStore("contents");
                let request = objectStore.getAll();

                request.onsuccess = function (event) {
                    let products = request.result;
                    if (products && products.length > 0) {
                        console.log("Products loaded from IndexedDB:", products);
                        fetchServerItemCount(products.length);
                    } else {
                        console.log("No products found in IndexedDB, fetching from server...");
                        fetchProductsFromServer();
                    }
                };

                request.onerror = function (event) {
                    console.error("Error fetching products from IndexedDB:", event);
                    fetchProductsFromServer();
                };
            }

            function fetchContentFromServer() {
                console.log("Fetching content from server...");
                $.ajax({
                    url: 'content_loader.php',
                    method: 'GET',
                    success: function (data) {
                        console.log("Content fetched from server");
                        let compressedData = LZString.compressToUTF16(JSON.stringify(data));
                        addDataToIndexedDB('cachedContent', compressedData);
                        let metadata = {
                            timestamp: Date.now(),
                            itemCount: $(data).find('.product-item').length
                        };
                        addMetadataToIndexedDB('cachedContentMetadata', metadata);
                        $('#actualContent').html(data);
                        $('#initialContent').hide();
                        $('#actualContent').show();
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching content from server:", xhr.responseText);
                    }
                });
            }

            function fetchProductsFromServer() {
                console.log("Fetching products from server...");
                $.ajax({
                    url: 'product_loader.php', // Adjust the URL as per your setup
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log("Products fetched from server:", data);
                        addProductsToIndexedDB(data);
                        displayProducts(data);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching products from server:", xhr.responseText);
                    }
                });
            }

            function addProductsToIndexedDB(products) {
                let transaction = db.transaction(["contents"], "readwrite");
                let objectStore = transaction.objectStore("contents");

                products.forEach(function (product) {
                    objectStore.put(product);
                });

                console.log("Products added to IndexedDB");
            }

            function addDataToIndexedDB(key, data) {
                let transaction = db.transaction(["contents"], "readwrite");
                let objectStore = transaction.objectStore("contents");
                objectStore.put({
                    id: key,
                    data: data
                });
            }

            function addMetadataToIndexedDB(key, metadata) {
                let transaction = db.transaction(["metadata"], "readwrite");
                let objectStore = transaction.objectStore("metadata");
                objectStore.put({
                    id: key,
                    value: metadata
                });
            }

function displayProducts() {
    $.ajax({
        url: 'product_list_tr.php',
        type: 'GET',
        success: function(response) {
            $('#products-table-body').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching products:', error);
            // Handle error scenario
        }
    });
}


            function fetchMetadataFromIndexedDB(key, callback) {
                let transaction = db.transaction(["metadata"]);
                let objectStore = transaction.objectStore("metadata");
                let request = objectStore.get(key);

                request.onsuccess = function (event) {
                    callback(request.result ? request.result.value : null);
                };

                request.onerror = function (event) {
                    console.error("Error fetching metadata from IndexedDB", event);
                    callback(null);
                };
            }

            function fetchServerItemCount(indexedDBProductCount) {
    $.ajax({
        url: 'total_products.php',
        success: function (response) {
            console.log("Product count fetched", response);

            // Try to parse the response as an integer directly
            var serverCount = parseInt(response.trim());

            if (!isNaN(serverCount)) {
                if (serverCount !== indexedDBProductCount) {
                    console.log("Product counts differ. Fetching and updating products from server...");
                    fetchProductsFromServer();
                } else {
                    console.log("Product counts match. No update needed.");
                }
            } else {
                console.error("Invalid number format in response:", response);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error fetching product count:", xhr.responseText);
        }
    });
}


            function getProduct(product_id) {
                console.log("Fetching product data for ID:", product_id);
                $.ajax({
                    url: '../../PHP - process_files/get-product.php',
                    method: 'POST',
                    data: {
                        product_id: product_id
                    },
                    dataType: 'json',
                    success: function (json) {
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
                        $('#edit_wholesale_price').val(json.wholesale_price);
                        $('#edit_retail_price').val(json.retail_price);
                        $('#edit_vat_rate').val(json.vat_rate);
                        $('#edit_critical_level').val(json.critical_level);
                        $('#edit_active').val(json.active);
                        $('#edit_purchased').val(json.purchased);
                        $('#edit_vendor').val(json.vendor);
                        $('#edit_location').val(json.location);
                        $('#edit_stock_code').val(json.stock_code);
                        $('#edit_quantity').val(json.quantity);
                        $('#edit_supplier').val(json.supplier);

                        $('#edit_product').modal('show');
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching product data:", xhr.responseText);
                    }
                });
            }

            function editProduct(product_id) {
                console.log("Editing product with ID:", product_id);
                getProduct(product_id);
            }

            function deleteProduct(product_id) {
                console.log("Deleting product with ID:", product_id);
                $.ajax({
                    url: 'delete_product.php',
                    method: 'POST',
                    data: {
                        product_id: product_id
                    },
                    success: function (response) {
                        console.log("Product deleted successfully:", response);
                        fetchProductsFromServer(); // Refresh products after deletion
                    },
                    error: function (xhr, status, error) {
                        console.error("Error deleting product:", xhr.responseText);
                    }
                });
            }

            $('#edit_product_form').submit(function (event) {
                event.preventDefault();
                var form = $(this).serialize();

                $.ajax({
                    url: '../../PHP - process_files/edit_product.php',
                    method: 'POST',
                    data: form,
                    success: function (response) {
                        console.log("Product edited successfully:", response);
                        $('#edit_product').modal('hide');
                        fetchProductsFromServer(); // Refresh products after editing
                    },
                    error: function (xhr, status, error) {
                        console.error("Error editing product:", xhr.responseText);
                    }
                });
            });

            $('#delete_product_form').submit(function (event) {
                event.preventDefault();
                var form = $(this).serialize();

                $.ajax({
                    url: '../../PHP - process_files/delete_product.php',
                    method: 'POST',
                    data: form,
                    success: function (response) {
                        console.log("Product deleted successfully:", response);
                        $('#delete_product').modal('hide');
                        fetchProductsFromServer(); // Refresh products after deletion
                    },
                    error: function (xhr, status, error) {
                        console.error("Error deleting product:", xhr.responseText);
                    }
                });
            });

            $('#add_new_product_form').submit(function (event) {
                event.preventDefault();
                var form = $(this).serialize();

                $.ajax({
                    url: 'add_new_product.php',
                    method: 'POST',
                    data: form,
                    success: function (response) {
                        console.log("Product added successfully:", response);
                        $('#add_new_product').modal('hide');
                        fetchProductsFromServer(); // Refresh products after adding
                    },
                    error: function (xhr, status, error) {
                        console.error("Error adding product:", xhr.responseText);
                    }
                });
            });
        });

        //select2 initialization

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
                    console.log(product_id);
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
        
    </script>
</body>

</html>