
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>
<?php include '../config/config.php';

// Assuming your database connection code is already present
// Fetch category data from the database
$categoryQuery = "SELECT `id`, `category_name` FROM `category`";
$categoryResult = $conn->query($categoryQuery);

$brandQuery = "SELECT `id`, `brand_name` FROM `brand`";
$brandResult = $conn->query($brandQuery);

// Check if the query was successful
if ($categoryResult) {
    $categories = $categoryResult->fetch_all(MYSQLI_ASSOC);
} else {
    // Handle the error appropriately
    die("Error fetching categories: " . $conn->error);
}
if ($brandResult) {
    $brands = $brandResult->fetch_all(MYSQLI_ASSOC);
} else {
    // Handle the error appropriately
    die("Error fetching brand: " . $conn->error);
}
$brandResult->close();
$categoryResult->close();

// Close the connection
$conn->close();
?>

<style>
    /* Adjust the min-width value according to your preference */
    .select2-container--default .select2-selection--single {
        min-width: 150px;
    }
</style>
<!-- start inventory-->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Purchase</h5>
            <button class="btn btn-sm btn-primary border rounded mb-2">Purchase Walk-in</button>
            <button class="btn btn-sm border rounded mb-2">Purchase Delivery</button>
            <button class="btn btn-sm border rounded mb-2">Purchase Online</button>
            <button class="btn btn-sm border rounded mb-2">Purchase with Terms</button>
            <button class="btn btn-sm border rounded mb-2">Store Stocks</button>
            
        </div>

        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input id="searchInput" class="form-control form-control-sm" placeholder="Search" oninput="filterItems()">
                    </div>

                    <!-- <div class="row">
        <div style="display: flex; justify-content: space-between; align-items: center;"> 
            <div style="width: 50%">
                <input id="searchInput" class="form-control form-control-sm" placeholder="Search" oninput="filterItems()">
            </div> -->


                    <div style="display: flex; flex-direction: row">
                        <select id="brandSelect" class="form-select form-select-sm me-1" aria-label="Default select example" style="width: 50%">
                            <option selected>Select Brand</option>
                             <?php foreach ($brands as $brand): ?>
                            <option value="<?php echo $brand['id']; ?>"><?php echo $brand['brand_name']; ?></option>
                             <?php endforeach; ?>
                        </select>
                        <select id="categorySelect" class="form-select form-select-sm me-1" aria-label="Default select example" style="width: 50%">
                            <option selected>Select Category</option>
                             <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                             <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                    <a href="purchase" class="btn border btn-sm me-1 rounded">
    <img src="cart.php" alt="Shopping Cart" style="width: 20px; height: 20px; margin-right: 5px;">
    Purchase
</a>
                     <a href="purchase_cart" class="btn border btn-sm rounded btn-primary">Cart</a>
                    </div>
                </div>
                </div>
                <div class="p-3">
                    <div class="row">
                        <div class="col-6 col-md-3 mb-4">
                            <div class=" p-3 position-relative product-hover">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/suzuki_trottle_cable.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Suzuki Trottle Cable</h6>
                                    <h5 class="fw-bolder">PHP 150.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/handle_bar.png" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Suzuki Hand Bar</h6>
                                    <h5 class="fw-bolder">PHP 200.00 | 150pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/tires.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Suzuki Tires</h6>
                                    <h5 class="fw-bolder">PHP 1000.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/break_pad.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Suzuki Break Pads</h6>
                                    <h5 class="fw-bolder">PHP 200.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/oil.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Oil Filter</h6>
                                    <h5 class="fw-bolder">PHP 250.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/spark.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Spark Plug</h6>
                                    <h5 class="fw-bolder">PHP 200.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/chain.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Chain adn Sprocket</h6>
                                    <h5 class="fw-bolder">PHP 1000.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/batteries.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Batteries</h6>
                                    <h5 class="fw-bolder">PHP 650.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/suzuki_helmet.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Suzuki Helmet</h6>
                                    <h5 class="fw-bolder">PHP 2150.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/gloves.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Gear Gloves</h6>
                                    <h5 class="fw-bolder">PHP 50.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/clutch_cable.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Suzuki clutch Cable</h6>
                                    <h5 class="fw-bolder">PHP 150.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/speedometer.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Suzuki Speedometer Cable</h6>
                                    <h5 class="fw-bolder">PHP 180.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-hover p-3 position-relative">
                                <div style="height: 200px; width: auto">
                                    <img style="object-fit: cover; width: 100%; height: 100%" src="../uploads/break.jpeg" alt="">
                                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn position-absolute bottom-0 end-0 mb-3 me-3 rounded-5 btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                            </svg>
                                    </button>
                                </div>
                                <div>
                                    <h6>Suzuki Break Cable</h6>
                                    <h5 class="fw-bolder">PHP 180.00 | 100pcs</h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                
            </div>
            
        </div>





<!-- end purchase-->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add to Cart</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center">
        <img class="border mb-2" src="../uploads/suzuki_trottle_cable.jpeg" alt="">
        <input class="form-control mb-2" disabled type="text" value="Product Code: PROD1034">
        <input class="form-control mb-2" disabled type="text" value="Product Name: Trottle Cable">
        <textarea name="" class="form-control form-control-sm mb-2 py-3" style="text-align: justify" placeholder="The throttle cable is a vital component in a vehicle's engine system, responsible for regulating the flow of air and fuel to the engine. It connects the accelerator pedal to the throttle body, allowing the driver to control engine speed. Proper maintenance and adjustment of the throttle cable are crucial for smooth and efficient engine performance." id="" cols="30" rows="5" disabled></textarea>
        <input class="form-control mb-2" disabled type="text" value="Price: 150.00">
        <input class="form-control mb-2" disabled type="text" value="Stocks: 100pcs">
        
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->


</div>
<?php include 'footer.php'?>
</body>
</html>

<script>
function filterItems() {
    var input, filter, selectBrand, selectCategory, items, option, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    selectBrand = document.getElementById("brandSelect"); // Corrected ID
    selectCategory = document.getElementById("categorySelect"); // Corrected ID
    items = [selectBrand, selectCategory];

    for (i = 0; i < items.length; i++) {
        option = items[i].options; // Use .options to get the options of the <select> element
        for (var j = 0; j < option.length; j++) {
            txtValue = option[j].textContent || option[j].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                option[j].style.display = "";
            } else {
                option[j].style.display = "none";
            }
        }
    }
}

// Apply Select2 to the brandSelect dropdown
$(document).ready(function() {
    $('#brandSelect').select2();
    $('#categorySelect').select2();
});
</script>
