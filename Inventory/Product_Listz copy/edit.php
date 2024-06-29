<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
<!-- -------------- -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="text-center p-3">
                <h3>Edit Product</h3>
            </div>
            <?php
            $product_id = $_GET['white'];
            $info_query = "SELECT 
                product.name, 
                product.code,
                product.supplier_code,
                product.image,
                product.models,
                product.barcode,
                category.category_name,
                brand.brand_name,
                unit.name AS unit_name,
                product.active,
                user.user_fname,
                user.user_lname,
                price_list.wholesale,
                price_list.srp
            FROM product
            LEFT JOIN category ON category.id = product.category_id
            LEFT JOIN brand ON brand.id = product.brand_id
            LEFT JOIN unit ON unit.id = product.unit_id
            LEFT JOIN user ON user.id = product.publish_by
            LEFT JOIN price_list ON price_list.product_id = product.id
            WHERE product.id = '$product_id' LIMIT 1";
            $info_res = $conn -> query($info_query);
            if($info_res->num_rows>0){
                $row=$info_res->fetch_assoc();
                $product_name = $row['name'];
                $product_code = $row['code'];
                $supplier_code = $row['supplier_code'];
                $product_image = $row['image'];
                $product_models = $row['models'];
                $product_barcode = $row['barcode'];
                $category_name = $row['category_name'];
                $brand_name = $row['brand_name'];
                $unit_name = $row['unit_name'];
                $active_status = $row['active'];
                $publisher_fname = $row['user_fname'];
                $publisher_lname = $row['user_lname'];
                $wholesale_price = $row['wholesale'];
                $srp_price = $row['srp'];

            }
            ?>
            <div class="card-content p-2">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Image</th>
                            <td><img src="../../uploads/<?php echo basename($product_image);?>" class="img img-fluid" style="max-width: 50px; max-height: 50px;" alt=""></td>
                            <td class="text-end p-2">
                                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-bs-target="#update_image">Edit</button>
                            </td>
                        </tr>
                        <form action="../../PHP - process_files/update_product.php?edit=image" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="update_image" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="product_id" value="<?php echo $product_id;?>" hidden>
                                    <input type="file" name="product_img" id="product_img" class="form-control">
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="submit">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                                </div>
                            </div>
                        </div>
                        </form>

                        <tr>
                            <th>Product Name</th>
                            <td><?php echo $product_name;?></td>
                            <td class="text-end p-2">
                                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-bs-target="#update_product_name">Edit</button>
                            </td>
                        </tr>
                        <form action="../../PHP - process_files/update_product.php?edit=product_name" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="update_product_name" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Product Name</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="product_id" value="<?php echo $product_id;?>" hidden>
                                    <input type="text" class="form-control" name="product_name" value="<?php echo $product_name;?>">
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="submit">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                                </div>
                            </div>
                        </div>
                        </form>

                        <tr>
                            <th>Product Code</th>
                            <td><?php echo $product_code;?></td>
                            <td class="text-end p-2">
                                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-bs-target="#update_product_code">Edit</button>
                            </td>
                        </tr>
                        <form action="../../PHP - process_files/update_product.php?edit=product_code" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="update_product_code" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Product Code</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="product_id" value="<?php echo $product_id;?>" hidden>
                                    <input type="text" class="form-control" name="product_code" value="<?php echo $product_code;?>">
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="submit">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                                </div>
                            </div>
                        </div>
                        </form>

                        <tr>
                            <th>Barcode</th>
                            <td><?php echo $product_barcode;?></td>
                            <td class="text-end p-2">
                                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-bs-target="#update_barcode">Edit</button>
                            </td>
                        </tr>
                        <form action="../../PHP - process_files/update_product.php?edit=barcode" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="update_barcode" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Barcode</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="product_id" value="<?php echo $product_id;?>" hidden>
                                    <input type="text" class="form-control" name="barcode" value="<?php echo $product_barcode;?>">
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="submit">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                                </div>
                            </div>
                        </div>
                        </form>


                        <tr>
                            <th>Category</th>
                            <td><?php echo $category_name;?></td>
                            <td class="text-end p-2">
                                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-bs-target="#update_category">Edit</button>
                            </td>
                        </tr>
                        <form action="../../PHP - process_files/update_product.php?edit=category" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="update_category" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Category</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="product_id" value="<?php echo $product_id;?>" hidden>
                                    <select name="category_id" class="form-select" id="">
                                        <?php 
                                        $category_query = "SELECT * FROM category ORDER BY category_name ASC";
                                        $category_res = $conn->query($category_query);
                                        if($category_res->num_rows>0){
                                            while($row = $category_res->fetch_assoc()){
                                                echo '<option value="' . $row['id'] . '">' . $row['category_name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="submit">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                                </div>
                            </div>
                        </div>
                        </form>


                        <tr>
                            <th>Brand</th>
                            <td><?php echo $brand_name; ?></td>
                            <td class="text-end p-2">
                                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-bs-target="#update_brand">Edit</button>
                            </td>
                        </tr>
                        <form action="../../PHP - process_files/update_product.php?edit=brand" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="update_brand" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Brand</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="product_id" value="<?php echo $product_id;?>" hidden>
                                    <select name="brand_id" class="form-select" id="">
                                        <?php 
                                        $brand_query = "SELECT * FROM brand ORDER BY brand_name ASC";
                                        $brand_res = $conn->query($brand_query);
                                        if($brand_res->num_rows>0){
                                            while($row = $brand_res->fetch_assoc()){
                                                echo '<option value="' . $row['id'] . '">' . $row['brand_name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="submit">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                                </div>
                            </div>
                        </div>
                        </form>


                        <tr>
                            <th>Model</th>
                            <td><?php echo $product_models;?></td>
                            <td class="text-end p-2">
                                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-bs-target="#update_models">Edit</button>
                            </td>
                        </tr>
                        <form action="../../PHP - process_files/update_product.php?edit=models" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="update_models" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Models</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="product_id" value="<?php echo $product_id;?>" hidden>
                                    <input type="text" class="form-control" value="<?php echo $product_models;?>" name="model">
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="submit">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                                </div>
                            </div>
                        </div>
                        </form>


                        <tr>
                            <th>Unit</th>
                            <td><?php echo $unit_name;?></td>
                            <td class="text-end p-2">
                                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-bs-target="#update_unit">Edit</button>
                            </td>
                        </tr>
                        <form action="../../PHP - process_files/update_product.php?edit=unit" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="update_unit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Unit</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="product_id" value="<?php echo $product_id;?>" hidden>
                                    <select name="unit_id" class="form-select" id="">
                                        <?php 
                                        $unit_query = "SELECT * FROM unit ORDER BY `name` ASC";
                                        $unit_res = $conn->query($unit_query);
                                        if($unit_res->num_rows>0){
                                            while($row = $unit_res->fetch_assoc()){
                                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="submit">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                                </div>
                            </div>
                        </div>
                        </form>


                        <tr>
                            <th>Wholesale Price</th>
                            <td class="text-end">₱ <?php echo $wholesale_price;?></td>
                            <td class="text-end p-2">
                                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-bs-target="#update_wholesale">Edit</button>
                            </td>
                        </tr>
                        <form action="../../PHP - process_files/update_product.php?edit=wholesale" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="update_wholesale" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Wholesale Price</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="product_id" value="<?php echo $product_id;?>" hidden>
                                    <input class="form-control" type="number" min="0" step="0.01" name="wholesale" value="<?php echo $wholesale_price;?>">
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="submit">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                                </div>
                            </div>
                        </div>
                        </form>


                        <tr>
                            <th>Suggested Retail Price</th>
                            <td class="text-end">₱ <?php echo $srp_price;?></td>
                            <td class="text-end p-2">
                                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-bs-target="#update_srp">Edit</button>
                            </td>
                        </tr>
                        <form action="../../PHP - process_files/update_product.php?edit=srp" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="update_srp" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Suggested Retail Price</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="product_id" value="<?php echo $product_id;?>" hidden>
                                    <input type="number" min="0" step="0.01" class="form-control" name="srp" value="<?php echo $srp_price;?>">
                                </div>
                                <div class="modal-footer"><button class="btn btn-primary" type="submit">Submit</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                                </div>
                            </div>
                        </div>
                        </form>

                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- -------------- -->
</div>