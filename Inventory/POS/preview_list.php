<?php
include "../../admin/session.php";
include "../../database/database.php";
$file_name = "../../jsons/" . $user_id . "-Transaction.json";

// Check if the file exists
if (file_exists($file_name)) {
    // Read the JSON file
    $json_content = file_get_contents($file_name);
    
    // Decode JSON content
    $data = json_decode($json_content, true);

    // Check if decoding was successful
    if ($data !== null) {
        // Iterate through each item in the data array
        foreach ($data as $item) {
            // Print the formatted HTML output for each item
?>
            <tr>
                <td><?php echo $item['product_name']; ?></td>
                <td><?php echo $item['model'];?></td>
                <td><?php echo $item['brand'];?></td>
                <td><?php echo $item['model'];?></td>
                <td><?php echo 0;//$item['model'];?></td>
                <td><?php echo $item['srp'];?></td>
                <td><input class="form-control" style="max-width: 100px;" type="number" value="<?php echo $item['qty'];?>"></td>
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
} else {
    echo "File $file_name not found.";
}
?>