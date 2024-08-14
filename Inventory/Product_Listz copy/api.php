<?php
include "../../database/database.php";

$page = $_GET['page'];
$limit = 50; // Number of items to fetch per page
$offset = ($page - 1) * $limit;
if(!isset($_GET['search'])){
    $query = "SELECT * FROM product WHERE active = 1 ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $result = $conn->query($query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_id = $row['id'];
            $product_name = $row['name'];
            $product_code = $row['code'];
            $product_name_2 = strtoupper(preg_replace('/[^A-Z]/', '',$product_name));
            $product_models = $row['models'];
            $models = strtoupper(preg_replace('/[^A-Z]/', '', $product_models));
            $product_brand_id = $row['brand_id'];
            $product_category_id = $row['category_id'];
            $product_publisher_id = $row['publish_by'];
            if(!isset($row['image']) || empty($row['image'])){
                $product_image = "defaultproduct.png";
            } else {
                $product_image = $row['image'];
            }

            $brand_sql = "SELECT brand_name FROM brand WHERE id = '$product_brand_id' LIMIT 1";
            $brand_res = $conn->Query($brand_sql);
            if($brand_res->num_rows>0){
                $row = $brand_res->fetch_assoc();
                $brand_name = $row['brand_name'];
                $brand_name_2 = strtoupper(preg_replace('/[^A-Z]/', '', $brand_name));
            } else {
                $brand_name = "UNSET";
                $brand_name_2 = "UNSET";
            }

            $category_sql = "SELECT category_name FROM category WHERE id = '$product_category_id' LIMIT 1";
            $category_res = $conn->query($category_sql);
            if($category_res->num_rows>0){
                $row = $category_res -> fetch_assoc();
                $category_name = $row['category_name'];
                $category_name_2 = strtoupper(preg_replace('/[^A-Z]/', '', $category_name));
            } else {
                $category_name = "UNSET";
                $category_name_2 = "UNSET";
            }

            $publisher_sql = "SELECT user_lname, user_fname FROM user WHERE id = '$product_publisher_id' LIMIT 1";
            $publisher_res = $conn -> query($publisher_sql);
            if($publisher_res -> num_rows >0 ){
                $row = $publisher_res -> fetch_assoc();
                $publisher_name = $row['user_fname'] . " " . $row['user_lname'];
                $publisher_name_2 = strtoupper(preg_replace('/[^A-Z]/', '', $publisher_name ));
            } else {
                $publisher_name = "System";
            }

            $price_sql = "SELECT dealer, wholesale, srp from price_list WHERE product_id = '$product_id' LIMIT 1";
            $price_res = $conn-> query($price_sql);
            if($price_res->num_rows> 0){
                $row = $price_res -> fetch_assoc();
                $dealer = number_format($row['dealer'], 2, '.', ',');
                $wholesale = number_format($row['wholesale'], 2, '.', ',');
                $srp = number_format($row['srp'], 2, '.', ',');
            } else {
                $wholesale = "UNSET";
                $srp = "UNSET";
            }

            
            $data[] = array(
                'title' => '
                <tr class="position-static">
                    <td class="align-middle white-space-nowrap py-0">
                        <a class="d-block border rounded-2" href="../landing/product-details.html">
                            <img src="../../uploads/' . basename($product_image) . '" alt="" width="53" />
                        </a>
                    </td>
                    <td class="product align-middle ps-4 white-space-nowrap">
                        ' . $product_name . '
                    </td>
                    <td>' . $product_code . '</td>
                    <td>' . $dealer . '</td>
                    <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">' . $wholesale . '</td>
                    <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">' . $srp . '</td>
                    <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold">' . $brand_name . '</td>
                    <!--<td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">' . $category_name . '</td>-->
                    <td class="align-middle review fs-0 text-center ps-4"> piece </td>
                    <td class="vendor align-middle text-start fw-semi-bold ps-4">' . $product_models . '</td>
                    <td class="time align-middle white-space-nowrap text-600 ps-4">' . $publisher_name . '</td>
                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                        <div class="font-sans-serif btn-reveal-trigger position-static">
                            <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                <span class="fas fa-ellipsis-h fs--2"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end py-2">
                                <a class="dropdown-item" href="../Product_Listz copy/?white=' . $product_id . '" target="_blank">Edit</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#del_' . $product_id . '">Remove</a>
                            </div>
                        </div>
                    </td>
                </tr>
                
                <div class="modal fade" id="del_' . $product_id . '" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-700 lh-lg mb-0">Are you sure to delete ' . $product_name_2 . '? </h5>
                        </div>
                        <div class="modal-footer text-center">
                            <a class="btn btn-warning" href="../../PHP - process_files/delete_product.php?product_id='. $product_id .'">Yes</a>
                            <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                            
                        </div>
                        </div>
                    </div>
                </div>
                '
            );
        }
    }
} else {
    $search = $_GET['search'];

    $brand_check = "SELECT id FROM brand WHERE brand_name = '$search' LIMIT 1";
    $brand_check_result = $conn->query($brand_check);
    if ($brand_check_result->num_rows > 0) {
        $brand_ids = []; // Initialize an array to store brand IDs
    
        while($row = $brand_check_result->fetch_assoc()) {
            $brand_ids[] = $row['id']; // Collect all IDs into the array
        }
    
        $formatted_brand_ids = implode(' OR ', $brand_ids); // Convert array to comma-separated string
    
        
    }

    $category_check = "SELECT id FROM category WHERE category_name = '$search' LIMIT 1";
    $category_check_result = $conn->query($category_check);
    if ($category_check_result->num_rows > 0) {
        $category_ids = []; // Initialize an array to store brand IDs
    
        while($row = $category_check_result->fetch_assoc()) {
            $category_ids[] = $row['id']; // Collect all IDs into the array
        }
    
        $formatted_category_ids = implode(' OR ', $category_ids); // Convert array to comma-separated string
    
        
    }

    if(isset($brand_id)){
        $has_brand = $formatted_brand_ids;
    } else {
        $has_brand = "";
    }

    if(isset($category_id)){
        $has_category = $formatted_category_ids;
    } else {
        $has_category = "";
    }

    $query = "SELECT * FROM product WHERE active = 1 AND (`name` LIKE '%$search%' OR models LIKE '%$search%' $has_brand $has_category) ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $result = $conn->query($query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_id = $row['id'];
            $product_name = $row['name'];
            $product_code = $row['code'];
            $product_name_2 = strtoupper(preg_replace('/[^A-Z]/', '',$product_name));
            $product_models = $row['models'];
            $models = strtoupper(preg_replace('/[^A-Z]/', '', $product_models));
            $product_brand_id = $row['brand_id'];
            $product_category_id = $row['category_id'];
            $product_publisher_id = $row['publish_by'];
            if(!isset($row['image']) || empty($row['image'])){
                $product_image = "defaultproduct.png";
            } else {
                $product_image = $row['image'];
            }

            $brand_sql = "SELECT brand_name FROM brand WHERE id = '$product_brand_id' LIMIT 1";
            $brand_res = $conn->Query($brand_sql);
            if($brand_res->num_rows>0){
                $row = $brand_res->fetch_assoc();
                $brand_name = $row['brand_name'];
                $brand_name_2 = strtoupper(preg_replace('/[^A-Z]/', '', $brand_name));
            } else {
                $brand_name = "UNSET";
                $brand_name_2 = "UNSET";
            }

            $category_sql = "SELECT category_name FROM category WHERE id = '$product_category_id' LIMIT 1";
            $category_res = $conn->query($category_sql);
            if($category_res->num_rows>0){
                $row = $category_res -> fetch_assoc();
                $category_name = $row['category_name'];
                $category_name_2 = strtoupper(preg_replace('/[^A-Z]/', '', $category_name));
            } else {
                $category_name = "UNSET";
                $category_name_2 = "UNSET";
            }

            $publisher_sql = "SELECT user_lname, user_fname FROM user WHERE id = '$product_publisher_id' LIMIT 1";
            $publisher_res = $conn -> query($publisher_sql);
            if($publisher_res -> num_rows >0 ){
                $row = $publisher_res -> fetch_assoc();
                $publisher_name = $row['user_fname'] . " " . $row['user_lname'];
                $publisher_name_2 = strtoupper(preg_replace('/[^A-Z]/', '', $publisher_name ));
            } else {
                $publisher_name = "System";
            }

            $price_sql = "SELECT dealer, wholesale, srp from price_list WHERE product_id = '$product_id' LIMIT 1";
            $price_res = $conn-> query($price_sql);
            if($price_res->num_rows> 0){
                $row = $price_res -> fetch_assoc();
                $dealer = number_format($row['dealer'], 2, '.', ',');
                $wholesale = number_format($row['wholesale'], 2, '.', ',');
                $srp = number_format($row['srp'], 2, '.', ',');
            } else {
                $wholesale = "UNSET";
                $srp = "UNSET";
            }

            
                $data[] = array(
                    'title' => '
                    <tr class="position-static">
                        <td class="align-middle white-space-nowrap py-0">
                            <a class="d-block border rounded-2" href="../landing/product-details.html">
                                <img src="../../uploads/' . basename($product_image) . '" alt="" width="53" />
                            </a>
                        </td>
                        <td class="product align-middle ps-4 white-space-nowrap">
                            ' . $product_name . '
                        </td>
                        <td>' . $product_code . '</td>
                        <td>' . $dealer . '</td>
                        <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">' . $wholesale . '</td>
                        <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">' . $srp . '</td>
                        <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold">' . $brand_name . '</td>
                        <!--<td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">' . $category_name . '</td>-->
                        <td class="align-middle review fs-0 text-center ps-4"> piece </td>
                        <td class="vendor align-middle text-start fw-semi-bold ps-4">' . $product_models . '</td>
                        <td class="time align-middle white-space-nowrap text-600 ps-4">' . $publisher_name . '</td>
                        <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                            <div class="font-sans-serif btn-reveal-trigger position-static">
                                <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                    <span class="fas fa-ellipsis-h fs--2"></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end py-2">
                                    <a class="dropdown-item" href="../Product_Listz copy/?white=' . $product_id . '" target="_blank">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal" data-bs-target="#del_' . $product_id . '">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    <div class="modal fade" id="del_' . $product_id . '" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                            </div>
                            <div class="modal-body">
                                <h5 class="text-700 lh-lg mb-0">Are you sure to delete ' . $product_name_2 . '? </h5>
                            </div>
                            <div class="modal-footer text-center">
                                <a class="btn btn-warning" href="../../PHP - process_files/delete_product.php?product_id='. $product_id .'">Yes</a>
                                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                    '
                );
        }
    }
}
// Return the data as a JSON response
echo json_encode($data);

// Close the database connection
$conn->close();
exit;
?>
