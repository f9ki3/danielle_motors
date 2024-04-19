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
        <div class="col-lg-12">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link text-dark" aria-current="page" href="#"><b>Existing product stock-in</b></a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="#">New product stock-in</a></li>
            </ul>
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
                <form id="barcodeForm" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="barcodeInput" id="barcodeInput" value="">
                                <label for="">Barcode</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="product_id" name="product_id" >
                                    <option value="">Select product</option>
                                    <?php
                                    $product_id_query = 'SELECT 
                                                            product.id, 
                                                            product.name AS product_name, 
                                                            product.code,
                                                            product.supplier_code,
                                                            product.image,
                                                            product.models,
                                                            category.category_name,
                                                            brand.brand_name,
                                                            unit.name,
                                                            product.active
                                                        FROM product
                                                        INNER JOIN category ON category.id = product.category_id
                                                        INNER JOIN brand ON brand.id = product.brand_id
                                                        INNER JOIN unit ON unit.id = product.unit_id
                                                        ORDER BY product.name ASC
                                                        ';
                                    $product_id_result = $conn->query($product_id_query);
                                    if($product_id_result -> num_rows>0){
                                        while($pid_row = $product_id_result -> fetch_assoc()){
                                            echo '<option value="' . $pid_row['id'] . '">' . $pid_row['id'] . $pid_row['brand_name'] . ' ' . $pid_row['category_name'] . ' ' . $pid_row['product_name'] . ' ' . $pid_row['models'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No Data</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="rack_id" id="" required>
                                    <option value=""></option>
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
                                <label for="">Warehouse Location</label>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating">
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
                    <h3>Log</h3>
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

