
<?php include 'session.php'?>
<html lang="en">
<?php include 'header.php'?>
<body>
<div style="display: flex; flex-direction: row">
<?php include 'navigation_bar.php'?>

<!-- start inventory-->

<div style="width: 100%" class="content p-3">
    <div>
        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <h5 class="fw-bolder">Purchase</h5>
            <button class="btn btn-sm btn-primary border rounded mb-2">Purchase Walk-in</button>
            <button class="btn btn-sm border rounded mb-2">Purchase Delivery</button>
            <button class="btn btn-sm border rounded mb-2">Purchase Online</button>
            
        </div>

        <div style="background-color: white;" class="rounded border p-3 mb-3 w-100">
            <div class="row">
                <div style="display: flex; justify-content: space-between; align-items: center;"> 
                    <div style="width: 50%">
                        <input  class="form-control form-control-sm" placeholder="Search">
                    </div>

                    <div>
                        <a href="purchase" class="btn border btn-sm rounded btn-primary">Purchase</a>
                        <a href="purchase_cart" class="btn border btn-sm rounded">Cart</a>
                    </div>
                </div>
                <div class="p-3">
                    <div class="row">
                        <div class="col-6 col-md-3 mb-4">
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
                            <div class="border p-3 position-relative">
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
        
        <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Select Discount</label>
        <select class="form-select" id="inputGroupSelect01">
            <option selected>None</option>
            <option value="1">5%</option>
            <option value="1">10%</option>
            <option value="1">20%</option>
            
        </select>
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text">QTY</span>
        <input type="number" class="form-control" placeholder="Enter a Quantity">
        </div>

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