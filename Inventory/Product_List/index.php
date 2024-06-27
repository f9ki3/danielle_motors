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
            let db; // Variable to hold the IndexedDB database reference

            // Handle errors during database open
            request.onerror = function (event) {
                console.error("IndexedDB error:", event.target.errorCode);
            };

            // Setup database schema if needed
            request.onupgradeneeded = function (event) {
                db = event.target.result;

                // Create object stores if they don't exist
                if (!db.objectStoreNames.contains("contents")) {
                    db.createObjectStore("contents", { keyPath: "id" });
                }
                if (!db.objectStoreNames.contains("metadata")) {
                    db.createObjectStore("metadata", { keyPath: "id" });
                }
            };

            // Handle successful database open
            request.onsuccess = function (event) {
                db = event.target.result;
                console.log("IndexedDB initialized successfully");

                // Fetch initial data
                fetchContent();
                fetchProducts();

                // Set interval to periodically update data
                setInterval(function () {
                    fetchContent();
                    fetchProducts();
                }, 60000); // Update every 60 seconds
            };

            function fetchContent() {
                let transaction = db.transaction(["contents"]);
                let objectStore = transaction.objectStore("contents");
                let request = objectStore.get("cachedContent");

                request.onsuccess = function (event) {
                    if (request.result) {
                        let decompressedData = LZString.decompressFromUTF16(request.result.data);
                        $('#actualContent').html(decompressedData);
                        $('#initialContent').hide();
                        $('#actualContent').show();
                        console.log("Content loaded from IndexedDB");
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
                        displayProducts(products);
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

            function displayProducts(products) {
                let html = "<table><thead><tr><th>ID</th><th>Name</th><th>Code</th><th>Supplier Code</th><th>Barcode</th><th>QR Code</th><th>Image</th><th>Models</th><th>Unit ID</th><th>Brand ID</th><th>Category ID</th><th>Active</th><th>Publish By</th></tr></thead><tbody>";

                products.forEach(function (product) {
                    html += "<tr><td>" + product.id + "</td><td>" + product.name + "</td><td>" + product.code + "</td><td>" + product.supplier_code + "</td><td>" + product.barcode + "</td><td>" + product.qr_code + "</td><td>" + product.image + "</td><td>" + product.models + "</td><td>" + product.unit_id + "</td><td>" + product.brand_id + "</td><td>" + product.category_id + "</td><td>" + product.active + "</td><td>" + product.publish_by + "</td></tr>";
                });

                html += "</tbody></table>";
                $('#productTable').html(html);
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

            function compareItemCounts(serverCount) {
                fetchMetadataFromIndexedDB('cachedContentMetadata', function (metadata) {
                    if (metadata && metadata.itemCount < serverCount) {
                        console.log("Server has more items, updating IndexedDB...");
                        fetchProductsFromServer();
                    } else {
                        console.log("Server count matches or is less, loading from IndexedDB...");
                        fetchProducts();
                    }
                });
            }

            function fetchServerItemCount() {
                $.ajax({
                    url: 'total_products.php',
                    success: function (response) {
                        console.log("Product count fetched", response);
                        var match = response.match(/\((\d+)\)/);

                        if (match) {
                            var serverCount = parseInt(match[1]);
                            compareItemCounts(serverCount);
                        } else {
                            console.error("Number not found in response:", response);
                        }
                    },

                    error: function (xhr, status, error) {
                        console.error("Error fetching product count:", xhr.responseText);
                    }
                });
            }

            fetchServerItemCount();
            setInterval(fetchServerItemCount, 5000);

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

                        if (json.models                         !== null) {
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
                    error: function (xhr, status, error) {
                        console.error("Error fetching product data:", xhr.responseText);
                    }
                });
            }

            // Select2 initialization
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

            $(document).on('click', '.edit_product', function () {
                var product_id = $(this).data('product_id');
                getProduct(product_id);
            });

            // Function to add data to IndexedDB
            function addDataToIndexedDB(key, data) {
                let transaction = db.transaction(["contents"], "readwrite");
                let objectStore = transaction.objectStore("contents");
                objectStore.put({
                    id: key,
                    data: data
                });
            }

            // Function to add metadata to IndexedDB
            function addMetadataToIndexedDB(key, metadata) {
                let transaction = db.transaction(["metadata"], "readwrite");
                let objectStore = transaction.objectStore("metadata");
                objectStore.put({
                    id: key,
                    value: metadata
                });
            }

        });
    </script>
</body>

</html>
