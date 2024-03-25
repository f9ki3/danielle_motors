<?php
$material_transaction_sql = "SELECT * FROM material_transaction WHERE material_invoice_id = '$invoice'";
$material_transaction_res = $conn->query($material_transaction_sql);
if($material_transaction_res->num_rows>0){
    while($row=$material_transaction_res->fetch_assoc()){
?>
<tr>
    <td></td>
    <td>lorem ipsum</td>
    <td>Hanz</td>
    <td>Yoshji</td>
    <td>12</td>
    <td>12-12-12</td>
    <td>1000</td>
    <td>100</td>
    <td>200</td>
</tr>
<?php
    }
}