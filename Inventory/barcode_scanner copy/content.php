<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <div class="row">
        <div class="col-auto">
            <h1>Stocks-in</h1>
        </div>
    </div>
    <hr class="my-3">
    <div class="row">
        <div class="col-lg-5">
            <div class="text-end my-2">
                <button class="btn btn-outline-primary" id="startButton" type="button" data-bs-toggle="collapse" data-bs-target="#videofeed" aria-expanded="false" aria-controls="collapseExample">
                    <span data-feather="eye"></span> Camera
                </button>
            </div>

            <div class="row collapse bg-dark mb-3 rounded-1" id="videofeed">

                <div class="col-lg-12 p-2">
                    <video id="video" class="img img-fluid rounded-pill"></video>
                </div>
                <div class="col-auto">
                    <button class="btn btn-warning m-1" id="resetButton" type="button" data-bs-toggle="collapse" data-bs-target="#videofeed" aria-expanded="false" aria-controls="collapseExample">Reset camera source</button>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3" id="sourceSelectPanel" style="display:none">
                        <select class="form-select" id="sourceSelect"></select>
                        <label for="sourceSelect">Change video source:</label>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <label hidden>Result:</label>
                <pre hidden><code id="result"></code></pre>
                <form id="barcodeForm" action="../../PHP - process_files/add_stocks_draft.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="barcodeInput" id="barcodeInput" value="">
                                <label for="">Barcode</label>
                            </div>
                        </div>

                        

                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="product_name">
                                <label for="">Product Name</label>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="brand_name" id="" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Brand</option>
                                    <?php include "../../PHP - process_files/brand_sql.php";?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="category_name" id="" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Category</option>
                                    <?php include "../../PHP - process_files/category_sql.php";?>
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-5 mb-3">
                                <input class="form-control" type="file" name="product_image" id="product_image">
                        </div>


                        <div class="col-lg-7">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="unit_name" id="" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Unit</option>
                                    <?php include "../../PHP - process_files/unit_sql.php";?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="models[]" id="" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Model</option>
                                    <?php include "../../PHP - process_files/model_sql.php";?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="dealer">
                                <label for="">Dealer Price</label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="whole_sale">
                                <label for="">Wholesale Price</label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="srp">
                                <label for="">Serial Rate Price</label>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="rack_id" id="" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}' required>
                                    <option value="">Rack Location</option>
                                    <?php 
                                    $location_sql = "SELECT * FROM ware_location WHERE branch_code = '$branch_code' AND `status`= 1";
                                    $location_res = $conn->query($location_sql);

                                    if ($location_res->num_rows > 0) {
                                        while ($loc_row = $location_res->fetch_assoc()) {
                                            $loc_id = $loc_row['id'];
                                            $location_name = $loc_row['location_name'];
                                            echo '<option value="' . $location_name . '">' . $location_name . '</option>';
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="number" name="qty" class="form-control" min="1" max="10000" required>
                                <label for="">Qty</label>
                            </div>
                        </div>

                        
                        



                        

                        <div class="col-lg-12 my-2 text-center">
                            <button class="btn btn-success" id="submitBtn" type="submit">Save</button>
                        </div>
                        <!-- ---------- -->
                    </div>
                </form>
            </div>
        </div>












        <!-- ------------------- -->
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h1>Products</h1>
                </div>
                <div class="card-body">
                    <div id="stock_in_preview">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sound effect -->
    <audio id="successSound">
        <source src="success.wav" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <!-- Sound effect -->
    <audio id="errorSound">
        <source src="error-3-125761.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <!-- Sound effect -->
    <audio id="productfoundSound">
        <source src="Filipino meme Sound effect.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
</div>
