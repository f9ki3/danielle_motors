<?php 
$suppliers_sql = "SELECT supplier_name FROM supplier";
$suppliers_res = $conn->query($suppliers_sql);
if($suppliers_res->num_rows>0){
    while($row=$suppliers_res->fetch_assoc()){
        $supplier_name = $row['supplier_name'];
        echo '<option value="' . $supplier_name . '">' . $supplier_name . '</option>';
    }
}
?>