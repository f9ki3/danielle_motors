<?php
session_start();
$dr_id = $_SESSION['dr_id'];

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "updatd";

// $servername = "156.67.222.117";
// $username = "u450836125_dmp_intern"; 
// $password = "DMPInterns123!"; 
// $dbname = "u450836125_dmp_office";



// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);


$dr_content_sql = "SELECT id, price, quantity FROM delivery_receipt_content WHERE delivery_receipt_id ='$dr_id'";
$dr_content_res = $conn->query($dr_content_sql);
$Main_total = 0;

if($dr_content_res->num_rows > 0){
    while($row = $dr_content_res->fetch_assoc()){
        // Access data from the result set
        $drc_id = $row['id'];
        $price = $row['price'];
        $qty = $row['quantity'];
        $total = $price * $qty;
        
        $Main_total += $total;
    

    }
    echo '
    <div class="row">
        <div class="col-lg-6 text-start">
            <p><b>TOTAL:</b></p>
        </div>
        <div class="col-lg-6 text-end">
            <p><b>₱ ' . number_format((float)$Main_total, 2) . '</b></p>
        </div>
    </div>';

    $conn->close();
    exit();
} else {
    echo '<tr><td colspan="7" class="text-center"><b>No data</b></td></tr>';
    $conn->close();
    exit();
}