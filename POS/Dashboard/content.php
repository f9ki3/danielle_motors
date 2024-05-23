<div>
    <div class=" p-3 mb-3 w-100">
        <div class="row">
            <h1 class="p-0 m-2"><?php echo $branch_name_insession?></h1>
            <p class="p-0 m-2"><?php echo $branch_address_insession ; echo ' | ';echo '+63',$branch_telephone_insession; echo ' | '; echo $branch_email_insession;?></p>
            <hr>
            <div class="col-12 col-md-6 p-2">
                    <h6 class="fw-bolder">Today Sales</h6>
                    <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                    <?php
                        $sql = "SELECT SUM(Total) AS TotalAmount
                        FROM purchase_transactions
                        WHERE TransactionType = 'Walk-in'
                        AND DATE(TransactionDate) = CURDATE()
                        ";

                        // Execute the query
                        $result = $conn->query($sql);

                        // Check if there are any results
                        if ($result->num_rows > 0) {
                        // Fetch the result and store it in a variablex 
                        $row = $result->fetch_assoc();
                        $totalAmount = $row["TotalAmount"];
                        } else {
                        // If no results found, set totalAmount to 0 or handle as needed
                        $totalAmount = 0;
                        }

                        // Construct the SQL query
                        $sql = "SELECT COUNT(*) AS TransactionCount
                        FROM purchase_transactions
                        WHERE TransactionType = 'Walk-in'
                        AND DATE(TransactionDate) = CURDATE()";

                        // Execute the query
                        $result = $conn->query($sql);

                        // Check if there are any results
                        if ($result->num_rows > 0) {
                        // Fetch the result and store it in a variable
                        $row = $result->fetch_assoc();
                        $transactionCount = $row["TransactionCount"];
                        } else {
                        // If no results found, set transactionCount to 0 or handle as needed
                        $transactionCount = 0;
                        }


                        
                    ?>

                    
                    <h1 class="fw-bolder text-center text-primary mt-4">PHP <?php echo $totalAmount?></h1>
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
                    <h1 class="fw-bolder text-center text-primary mt-4"><?php echo $transactionCount?></h1>
                    </div>
            </div>
            <div class="col-6 col-md-3 p-2">
                    <h6 class="fw-bolder">Today Deliveries</h6>
                    <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                    <h1 class="fw-bolder text-center text-primary mt-4">100</h1>
                </div>
            </div>
            <div class="col-6 col-md-3 p-2">
                    <h6 class="fw-bolder">Total Products</h6>
                    <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                    <h1 class="fw-bolder text-center text-primary mt-4">332</h1>
                </div>
            </div>
            <div class="col-6 col-md-3 p-2">
                    <h6 class="fw-bolder">Total Supplier</h6>
                    <div class="border bg-light border-primary rounded p-2" style="height: 120px;">
                    <h1 class="fw-bolder text-center text-primary mt-4">7</h1>
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
                    <div class="border rounded p-2">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                <th scope="col" width="25%" class="product_id">Purchase ID</th>
                                <th scope="col" width="50%">Customer Name</th>
                                <th scope="col" width="25%">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                <tr>
                                    <td scope="row" class="product_id">PROD001</td>
                                    <td >Fyke Lleva</td>
                                    <td>php 100.00</td>
                                
                                </tr>
                                
                                
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="col-12 col-md-6 p-2">
                <h6 class="fw-bolder">Delivery Transactions</h6>
                <div class="border rounded p-2">
                    <table class="table mt-3">
                                <thead>
                                    <tr>
                                    <th scope="col" width="25%" class="product_id">Delivery ID</th>
                                    <th scope="col" width="50%">Customer Name</th>
                                    <th scope="col" width="25%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    <tr>
                                        <td scope="row" class="product_id">PROD001</td>
                                        <td >Fyke Lleva</td>
                                        <td>php 100.00</td>
                                    
                                    </tr>
                                    
                                </tbody>
                    </table>
                </div>
            </div>



            
        </div>
        
    </div>


</div>


<script src="../../jquery/date_time.js"></script>