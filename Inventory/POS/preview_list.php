<?php
include "../../admin/session.php";
include "../../database/database.php";
$transaction_id = $_SESSION['invoice'];
// $file_name = "../../jsons/" . $user_id . "-Transaction.json";

    $item_query = "SELECT * FROM purchase_cart WHERE TransactionID = '$transaction_id' ORDER BY id DESC";
    $item_res = $conn->query($item_query);
    // Check if decoding was successful
    if ($item_res->num_rows>0) {
        // Iterate through each item in the data array
        while ($item = $item_res ->fetch_assoc()) {
            
?>
            <tr>
                <td><?php echo $item['ProductName']; ?></td>
                <td><?php echo $item['Model'];?></td>
                <td><?php echo $item['Brand'];?></td>
                <td><?php echo $item['Model'];?></td>
                <td><?php echo 0;//$item['model'];?></td>
                <td><?php echo $item['SRP'];?></td>
                <td><?php echo $item['Quantity'];?></td>
                <td>
                    <?php
                    if(isset($item['Discount'])){
                    ?>
                    <a class="text-primary" id="burat_na_maliit_<?php echo $item['ProductID'];?>" type="button" data-bs-toggle="modal" data-bs-target="#data_<?php echo $item['ProductID'];?>">
                        <?php 
                        if($item['DiscountType'] === "%"){
                            echo $item['Discount'] . $item['DiscountType'];
                        } else {
                            echo $item['DiscountType'] . $item['Discount'];
                        }
                        ?>
                    </a>
                    <?php 
                    } else {
                    ?>
                    <button id="burat_na_maliit_<?php echo $item['ProductID'];?>" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#data_<?php echo $item['ProductID'];?>">Add discount</button>
                    <?php
                    }
                    ?>
                    <div class="modal fade" id="data_<?php echo $item['ProductID'];?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="" id="update_discount_form" method="POST">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Discount</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="solution" id="solution">
                                                        <option value="-">Discount</option>
                                                        <option value="+">Mark up</option>
                                                    </select>
                                                    <label for="discount_type">Discount Type</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="text" name="product_id" value="<?php echo $item['ProductID'];?>" hidden>
                                                <div class="form-floating mb-3">
                                                    
                                                    <input type="number" min="0" max="100" class="form-control tite" name="discount" required>
                                                    <label for="discount">Discount</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="discount_type" id="discount_type">
                                                        <option value="₱">₱</option>
                                                        <option value="%">%</option>
                                                    </select>
                                                    <label for="discount_type">Discount Type</label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-primary" type="submit">Okay</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </td>
                <td>
                    <?php
                    $product_id = $item['ProductID'];
                    if(isset($item['Discount'])){
                    ?>
                        <?php 
                        if($item['DiscountType'] === "%"){
                            $percentage_val = ($item['SRP'] * $item['Discount']) / 100;
                            // Print the formatted HTML output for each item
                            if($item['Solution'] === "-"){
                                $per_item_total = $item['SRP'] - $percentage_val;
                            } elseif($item['Solution'] === "+"){
                                $per_item_total = $item['SRP'] + $percentage_val;
                            }
                            
                            $total_value = $item['Quantity'] * $per_item_total;
                            if($item['TotalAmount'] !== $total_value){
                                $update_product_total = "UPDATE purchase_cart SET TotalAmount = '$total_value' WHERE TransactionID = '$transaction_id' AND ProductID = '$product_id'";
                                $conn->query($update_product_total);
                                echo $total_value;
                            } else {
                                echo $total_value;
                            }
                        } else {
                            // Print the formatted HTML output for each item
                            if($item['Solution'] === "-"){
                                $per_item_total = $item['SRP'] - $item['Discount'];
                            } elseif($item['Solution'] === "+"){
                                $per_item_total = $item['SRP'] + $item['Discount'];
                            }
                            $total_value = $item['Quantity'] * $per_item_total;
                            if($item['TotalAmount'] !== $total_value){
                                $update_product_total = "UPDATE purchase_cart SET TotalAmount = '$total_value' WHERE TransactionID = '$transaction_id' AND ProductID = '$product_id'";
                                $conn->query($update_product_total);
                                echo $total_value;
                            } else {
                                echo $total_value;
                            }
                        }
                        ?>
                    <?php 
                    } else {
                    ?>
                    <?php
                    }
                    ?>
                </td>
                <td><button class="btn btn-danger" id="delete_tite_<?php echo $item['ProductID']; ?>"><span class="far fa-trash-alt"></span></button></td>
            </tr>
            
<?php
            
            
        }


    } else {
        echo    '<tr>
                    <td class="text-center py-10" colspan="10"><h2>No Data!</h2></td>
                </tr>';
        // echo "Error decoding JSON from file $file_name.";
    }

    
?>
<script>
    // Event delegation to handle clicks on dynamically generated elements
    document.body.addEventListener('click', function(event) {
        // Check if the clicked element is one of the targeted anchor elements for burat_na_maliit_
        if (event.target.id.startsWith('burat_na_maliit_')) {
            // Extract the number part of the ID (if needed)
            let idNumber = event.target.id.split('_').pop();
            keydownListenerActive = false;
            // Perform your desired action here
            // console.log('Anchor clicked with ID:', event.target.id);
        }
        
        // Check if the clicked element is one of the targeted anchor elements for delete_tite_
        if (event.target.id.startsWith('delete_tite_')) {
            let idNumber = event.target.id.split('_').pop();
            // console.log('Delete ID:', event.target.id);

            // Make a GET request to /example
            fetch(`../../PHP - process_files/delete_purchase_cart.php?product_id=${encodeURIComponent(idNumber)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.text();
                })
                .then(data => {
                    // Parse and use the response
                    // console.log(data);
                    showToast(data);
                    loadContent();
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        }
    });


    // Event delegation to handle modal hidden event
    document.body.addEventListener('hidden.bs.modal', function(event) {
        // Check if the hidden modal is one of the targeted modals
        if (event.target.id.startsWith('data_')) {
            // Extract the number part of the ID (if needed)
            let idNumber = event.target.id.split('_').pop();
            keydownListenerActive = true;
            // Perform your desired action here
            // console.log('Modal hidden with ID:', event.target.id);
        }
    });

    // Event listener for form submission
    document.querySelectorAll('#update_discount_form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('../../PHP - process_files/update_pos_discount.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                showToast(data); // Display server response on the toast
                console.log('Manual form submitted successfully:', data);
                resetInputValues(); // Reset input values after successful submission
                loadContent();

                // Close the modal that is currently open
                const modal = bootstrap.Modal.getInstance(this.closest('.modal'));
                modal.hide();
                keydownListenerActive = true;
            })
            .catch(error => {
                showToast('Error submitting form: ' + error); // Display error message on the toast
                console.error('Error submitting manual form:', error);
                
            });
        });
    });

</script>

<?php 
$conn->close();
exit;
?>