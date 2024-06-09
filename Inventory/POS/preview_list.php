<?php
include "../../admin/session.php";
include "../../database/database.php";
$transaction_id = $_SESSION['invoice'];
$file_name = "../../jsons/" . $user_id . "-Transaction.json";

    $item_query = "SELECT * FROM purchase_cart WHERE TransactionID = '$transaction_id' ORDER BY id DESC";
    $item_res = $conn->query($item_query);
    // Check if decoding was successful
    if ($item_res->num_rows>0) {
        // Iterate through each item in the data array
        while ($item = $item_res ->fetch_assoc()) {
            // Print the formatted HTML output for each item
?>
            <tr>
                <td><?php echo $item['ProductName']; ?></td>
                <td><?php echo $item['Model'];?></td>
                <td><?php echo $item['Brand'];?></td>
                <td><?php echo $item['Model'];?></td>
                <td><?php echo 0;//$item['model'];?></td>
                <td><?php echo $item['SRP'];?></td>
                <td><input class="form-control" style="max-width: 100px;" type="number" value="<?php echo $item['Quantity'];?>"></td>
                <td>
                    <div class="d-inline-flex">
                        <input class="form-control text-end" style="max-width: 100px;" type="number" value="0">
                        <select class="form-select p-1" style="max-width: 50px;" name="" id="">
                            <option value="%">%</option>
                            <option value="P">P</option>
                        </select>
                    </div>
                    
                </td>
                <td><input type="text" class="form-control" readonly></td>
                <td><button class="btn btn-danger"><span class="far fa-trash-alt"></span></button></td>
            </tr>
<?php
            
            
        }
    } else {
        echo "Error decoding JSON from file $file_name.";
    }
?>