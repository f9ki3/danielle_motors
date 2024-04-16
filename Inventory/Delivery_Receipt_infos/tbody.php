<?php
// session_start();
include_once "../../database/database.php";
// $dr_id = $_SESSION['dr_id'];
$dr_id = $_GET['id'];
// $servername = "sql.freedb.tech";
// $username = "freedb_dmp_master";
//  $password = "8@YASU8ypbA2uA%";
//   $dbname = "freedb_dmp_db";

// $servername = "156.67.222.117";
// $username = "u450836125_dmp_intern"; 
// $password = "DMPInterns123!"; 
// $dbname = "u450836125_dmp_office";
// =======
// $servername = "localhost";
// $username = "root"; 
// $password = ""; 
// $dbname = "updatd";

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
            $row_product=$product_res->fetch_assoc();
            $product_name = $row_product['name'];
            $product_model = $row_product['models'];
            $unit_id = $row_product['unit_id'];
            $brand_id = $row_product['brand_id'];
            $category_id = $row_product['category_id'];
            echo '<tr>
                <td class="ps-3"><a class="me-1 mb-1" href="delete.php?id='. $drc_id .'" onclick="handleLinkClick(event)"><span class="text-danger fas fa-trash-alt"></span></a></td>
                <td>' . $qty . '</td>
                <td>' . $product_name . ' ' . $product_model . ' ' . $brand_id . ' ' . $category_id . ' ' . $unit_id . '</td>
                <td class="text-end">' . number_format((float)$orig_price, 2) . '</td>
                <td class="text-end">' . number_format((float)$price, 2) . '</td>
                <td class="text-end"> % ' . $discount . '</td>
                <td class="text-end">' . number_format((float)$total, 2) . '</td>
            </tr>';
        } else {
            
        }

    }

    $conn->close();
    exit();
} else {
    echo '<tr><td colspan="7" class="text-center"><b>No data</b></td></tr>';
}
?>
