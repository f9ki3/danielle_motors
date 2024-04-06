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
        <div class="col-lg-4">
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
                <form id="barcodeForm" action="action.php" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="barcodeInput" id="barcodeInput" value="">
                                <label for="">Barcode</label>
                            </div>
                        </div>
                        <input type="text" id="product_id" name="product_id">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-1">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" id="product_name" name="product_name">
                                <label for="floatingInput">Product Name</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-1">
                            <div class="form-floating mb-3">
                                <input type="text" id="item_code" name="item_code" class="form-control" >
                                <label for="product_name">Item Code</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                            <select class="form-select" id="category" id="category" name="category" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option select-disabled>Select a category</option>
                                <?php
                                    $query = 'SELECT id, category_name, status FROM category';
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute();
                                    $stmt->bind_result($id, $category_name, $status);
                                    while ($stmt->fetch()) {
                                        if ($status == 0) {
                                            continue;
                                        }

                                        echo '<option value="'.$id.'">'.$category_name.'</option>';
                                    }

                                    $stmt->close();
                                ?>
                            </select>

                        </div>


                        <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 mb-1">
                            <select  id="brand" name="brand" class="form-select mb-3" id="brand" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option select-disabled>Select a brand</option>
                                <?php
                                    $query = 'SELECT id, brand_name, status FROM brand';
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute();
                                    $stmt->bind_result($id, $brand_name, $status);
                                    while ($stmt->fetch()) {
                                        if ($status == 0) {
                                            continue;
                                        }

                                        echo '<option value="'.$id.'">'.$brand_name.'</option>';
                                    }

                                    $stmt->close();
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 mb-1">
                            <select class="form-select" id="unit" name="unit" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Select unit</option>
                            <?php
                                    $query = 'SELECT id, name, active FROM unit';
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute();
                                    $stmt->bind_result($id, $unit_name, $status);
                                    while ($stmt->fetch()) {
                                        if ($status == 0) {
                                            continue;
                                        }

                                        echo '<option value="'.$id.'">'.$unit_name.'</option>';
                                    }

                                    $stmt->close();
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 mb-1">
                            <select class="form-select" id="models" name="models[]" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option value="">Select model/s</option>
                                <?php
                                    $query = 'SELECT id, model_name, status FROM model';
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute();
                                    $stmt->bind_result($id, $model_name, $status);
                                    while ($stmt->fetch()) {
                                        if ($status == 0) {
                                            continue;
                                        }

                                        echo '<option value="'.$model_name.'">'.$model_name.'</option>';
                                    }

                                    $stmt->close();
                                ?>
                            </select>
                        </div>

                        <div class="col-lg-12 my-2 text-center">
                            <button class="btn btn-success">Save</button>
                        </div>
                        <!-- ---------- -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Sound effect -->
    <audio id="successSound">
        <source src="success.wav" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
</div>
