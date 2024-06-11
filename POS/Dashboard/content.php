<div>
    <div class=" p-3 mb-3 w-100">
        <div class="row">
            <h1 class="p-0 m-2"><?php echo $branch_name_insession?></h1>
            <p class="p-0 m-2"><?php echo $branch_address_insession ; echo ' | ';echo '+63',$branch_telephone_insession; echo ' | '; echo $branch_email_insession;?></p>
            <hr>
            <div class="col-12 col-md-6 p-2">
                    <h6 class="fw-bolder">Today Sales</h6>
                    <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                    <h1 class="fw-bolder text-center text-primary mt-4" id="total_sales">₱ 0</h1>
                </div>
            </div>
            <div class="col-12 col-md-6 p-2">
                    <h6 class="fw-bolder">Date and Time</h6>
                    <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                <div style="display: flex; flex-direction: row; justify-content: center" >
                    <h1 class="fw-bolder text-center text-primary mt-4 realtime-time">time</h1>
                    <h1 class="fw-bolder text-center text-primary mt-4">&nbsp|&nbsp</h1>
                    <h1 class="fw-bolder text-center text-primary mt-4 realtime-date">date</h1>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 p-2">
                    <h6 class="fw-bolder">Today Customers</h6>
                    <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                    <h1 class="fw-bolder text-center text-primary mt-4" id="total_customer"> 0</h1>
                    </div>
            </div>
            <div class="col-6 col-md-3 p-2">
                    <h6 class="fw-bolder">Today Deliveries</h6>
                    <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                    <h1 class="fw-bolder text-center text-primary mt-4" id="total_delivery"> 0</h1>
                </div>
            </div>
            <div class="col-6 col-md-3 p-2">
                    <h6 class="fw-bolder">Total Products</h6>
                    <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                    <h1 class="fw-bolder text-center text-primary mt-4" id="total_product"> 0</h1>
                </div>
            </div>
            <div class="col-6 col-md-3 p-2">
                    <h6 class="fw-bolder">Total Supplier</h6>
                    <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                    <h1 class="fw-bolder text-center text-primary mt-4" id="total_supplier"> 0</h1>
                </div>
            </div>
        </div>
        
    </div>
<hr>
    <div class="row">
        <div class="col-12 col-md-6 p-2">
            <div id="pos_bar">

            </div>
        </div>
        <div class="col-12 col-md-6 p-2">
            <div id="line">

            </div>
        </div>
    </div>
    <div  class=" p-3 mb-3 w-100">
        <div class="row">
            <div class="col-12 col-md-6 p-2">
                    <h6 class="fw-bolder">Sales Transactions</h6>
                    <div class="border rounded p-2 table-responsive scrollbar mx-n1 px-1" style="height: 500px">
                        <table class="table table-hover mt-3">
                            <tbody>
                            <?php include 'walkin_transaction.php'?>
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="col-12 col-md-6 p-2">
                <h6 class="fw-bolder">Delivery Transactions</h6>
                <div class="border rounded p-2 table-responsive scrollbar mx-n1 px-1" style="height: 500px">
                    <table class="table table-hover mt-3">
                                <tbody>
                                <?php include 'delivery_transaction.php'?>
                                    
                                </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>


</div>


<script src="../../jquery/date_time.js"></script>