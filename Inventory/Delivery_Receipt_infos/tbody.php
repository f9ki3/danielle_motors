<?php
session_start();
$dr_id = $_SESSION['dr_id'];

// local
$servername = "localhost";
$username = "root";
$password = "";
// $dbname = "dms_db";
$dbname = "dms_4";


// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);


$dr_content_sql = "SELECT * FROM delivery_receipt_content WHERE delivery_receipt_id ='$dr_id'";
$dr_content_res = $conn->query($dr_content_sql);

if($dr_content_res->num_rows > 0){
    while($row = $dr_content_res->fetch_assoc()){
        // Access data from the result set
        $drc_id = $row['id'];
        $drc_dr_id = $row['delivery_receipt_id'];
        $product_id = $row['product_id'];
        $product_code = $row['product_code'];
        $orig_price = $row['orig_price'];
        $price = $row['price'];
        $discount = $row['discount'];
        $qty = $row['quantity'];
        $total = $price * $qty;
        
        $product_sql = "SELECT * FROM product WHERE id = '$product_id'";
        $product_res = $conn->query($product_sql);
        if($product_res->num_rows>0){
            $row=$product_res->fetch_assoc();
            $product_name = $row['name'];
            $product_model = $row['models'];
            $unit_id = $row['unit_id'];
            $brand_id = $row['brand_id'];
            $category_id = $row['category_id'];
            echo '<tr>
                <td>' . $qty . '</td>
                <td>' . $product_name . ' ' . $product_model . ' ' . $brand_id . ' ' . $category_id . ' ' . $unit_id . '</td>
                <td>' . $orig_price . '</td>
                <td>' . $price . '</td>
                <td>' . $discount . '</td>
                <td>' . $total . '</td>
            </tr>';
        } 

    }
} else {
    echo '<tr><td colspan="7" class="text-center"><b>No data</b></td></tr>';
}