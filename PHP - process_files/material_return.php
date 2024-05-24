<?php
include "../database/database.php";
include "../admin/session.php";
if(isset($_GET['angtabanidane'])){
    $mt_Id = $_GET['angtabanidane'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_id = $_POST['product_id'];
        $product_qty = $_POST['qty'];
        $location_name =  $_POST['rack_id'];

        $check_product_Stocks = "SELECT id, rack_loc_id, stocks FROM stocks WHERE product_id = '$product_id' AND branch_code = '$branch_code' LIMIT 1";

        $check_product_result = $conn->query($check_product_Stocks);
        if($check_product_result->num_rows>0){
            $row=$check_product_result->fetch_assoc();
            $current_rackname = $row['rack_loc_id'];
            $stock_id = $row['id'];
            $current_stock = $row['stocks'];
            $new_stocks = $current_stock + $product_qty;
            if(strpos($current_rackname, $location_name) !== false){
                $update_stock = "UPDATE stocks SET stocks = '$new_stocks' WHERE id = '$stock_id'";
                $conn->query($update_stock);
            } else{
                $new_Rack = $current_rackname . ", " . $location_name; 
                $update_stock = "UPDATE stocks SET stocks = '$new_stocks', rack_loc_id = '$new_Rack' WHERE id = '$stock_id'";
                $conn->query($update_stock);
            }

        } else {
            $insert_stock = "INSERT INTO stocks (product_id, branch_code, rack_loc_id, stocks) VALUES ('$product_id', '$branch_code', '$location_name', '$product_qty')";
            $conn->query($insert_stock);


        }
    }

    $update = "UPDATE material_transaction SET return_status = 1 WHERE id = '$mt_Id'";
    if($conn->query($update) === TRUE ){
        header("Location: ../Inventory/Material_transaction/");
        $conn->close();
        exit;
    }
} elseif(isset($_GET['angtabanidanegrabe'])){
    $mt_Id = $_GET['angtabanidanegrabe'];
    $update = "UPDATE material_transaction SET return_status = 2 WHERE id = '$mt_Id'";
    if($conn->query($update) === TRUE ){
        header("Location: ../Inventory/Material_transaction/");
        $conn->close();
        exit;
    }
} else {
    echo "ang taba mo grabe!";
}