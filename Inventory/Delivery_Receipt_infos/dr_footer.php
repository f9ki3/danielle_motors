<?php
session_start();
$dr_id = $_SESSION['dr_id'];
// include_once "../../database/database.php";
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "hostinger";

// $servername = "156.67.222.117";
// $username = "u450836125_dmp_intern"; 
// $password = "DMPInterns123!"; 
// $dbname = "u450836125_dmp_office";



// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);


$dr_content_sql = "SELECT id, price, quantity FROM delivery_receipt_content WHERE delivery_receipt_id ='$dr_id'";
$dr_content_res = $conn->query($dr_content_sql);
$Main_total = 0;
$Qty_total = 0;
if($dr_content_res->num_rows > 0){
    while($row = $dr_content_res->fetch_assoc()){
        // Access data from the result set
        $drc_id = $row['id'];
        $price = $row['price'];
        $qty = $row['quantity'];
        $total = $price * $qty;
        
        $Main_total += $total;
        $Qty_total += $qty;
    

    }
    echo '
    <div class="row">
        <div class="col-lg-6 text-start">
            <p class="mb-0"><b class="mb-0">Total QTY: ' . $Qty_total . '</b></p><br>
            <p class="mt-0"><b class="mt-0">Received the above articles in good order and condition</b></p>
        </div>
        <div class="col-lg-6 text-end">
            <div class="row">
                <div class="col-lg-6">
                    <b>SUBTOTAL    :</b>
                </div>
                <div class="col-lg-6 text-end">
                    <b>' . number_format((float)$Main_total, 2) . '<b>
                </div>
            </div>
            <hr class="mx-3">
            <div class="row">
                <div class="col-lg-6">
                    <b>NET TOTAL    : ₱</b>
                </div>
                
                <div class="col-lg-6 text-end">
                    <b>' . number_format((float)$Main_total, 2) . '<b>
                </div>
            </div>
        </div>
    </div>';
    $conn->close();
    exit();
} else {
    echo '<tr><td colspan="7" class="text-center"><b>No data</b></td></tr>';
    $conn->close();
    exit();
}