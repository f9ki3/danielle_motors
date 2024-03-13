<?php

$supplier_sql = "SELECT * FROM supplier ORDER BY id DESC";
$supplier_res = $conn->query($supplier_sql);
if($supplier_res->num_rows>0){
    while($row = $supplier_res -> fetch_assoc()){
        echo '<option value="' . $row['id'] . '">' . $row['supplier_name'] . ' - ' . $row['supplier_address'] . '</option>';
    }
}