<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function handleLinkClick(event, endpoint) {
        event.preventDefault(); // Prevent the default behavior of the link (page reload)
        console.log("Link clicked:", endpoint);

        // Display confirmation dialog with "Yes" and "No" buttons
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            reverseButtons: true // To keep "Yes" on the left and "No" on the right
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed deletion, send AJAX request
                sendDeleteRequest(endpoint);
            }
        });
    }

    function sendDeleteRequest(endpoint) {
        // Make an AJAX request
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = xhr.responseText.trim(); // Trim whitespace from the response
                    console.log("Server Response:", response);
                    handleServerResponse(response);
                } else {
                    console.error("Request failed:", xhr.status);
                    showAlert("Error", "Failed to make request. Please try again later.");
                }
            }
        };
        xhr.open('GET', endpoint, true);
        xhr.send();
    }

    function handleServerResponse(response) {
        if (response === "Record deleted successfully") {
            tbody();
            showAlert("Success", "Record deleted successfully.");
        } else if (response.startsWith("Error deleting record")) {
            showAlert("Error", response);
        } else if (response === "ID parameter not provided") {
            showAlert("Error", "ID parameter not provided.");
        } else {
            console.log("Unhandled server response:", response);
        }
    }

    function showAlert(title, message) {
        Swal.fire({
            title: title,
            text: message,
            icon: "error",
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownToggle = document.querySelector('.dropdown-toggle');
        var label = document.querySelector('label[for="supplier_code"]');

        dropdownToggle.addEventListener('click', function() {
            label.style.display = 'none';
        });
    });
</script>

<?php 
// session_start();
include_once "../../database/database.php";
// $dr_id = $_SESSION['dr_id'];
$dr_id = $_GET['id'];
$select_dr_Status_1 = "SELECT `status` FROM delivery_receipt WHERE id = '$dr_id'";
$select_dr_res_1 = $conn->query($select_dr_Status_1);
if($select_dr_res_1->num_rows>0){
    $row=$select_dr_res_1->fetch_assoc();
    $status_of_dr = $row['status'];
}
?>


<table class="table table-sm">
    <thead>
        <?php 
        if($status_of_dr !=1){
        ?>
        <th></th>
        <?php 
        }
        ?>
        <th>QTY</th>
        <th>PRODUCT NAME</th>
        <th class="text-end">ORIG PRICE</th>
        <th class="text-end">PRICE</th>
        <th class="text-end">DISCOUNT</th>
        <th class="text-end">AMOUNT</th>
    </thead>
    <tbody>
<?php


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

$dr_content_sql = "SELECT dc.*, p.name AS product_name, p.models AS product_model, p.unit_id, p.brand_id, p.category_id, p.image AS product_image, b.brand_name, c.category_name, u.name AS unit_name
                    FROM delivery_receipt_content AS dc
                    LEFT JOIN product AS p ON dc.product_id = p.id
                    LEFT JOIN brand AS b ON b.id = p.brand_id
                    LEFT JOIN category AS c ON c.id = p.category_id
                    LEFT JOIN unit AS u ON u.id = p.unit_id
                    WHERE dc.delivery_receipt_id = '$dr_id'";
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
        $product_name = $row['product_name'];
        $product_model = $row['product_model'];
        $unit_id = $row['unit_name'];
        $brand_id = $row['brand_name'];
        $category_id = $row['category_name'];
        $product_image= $row['product_image'];
        // $status_of_dr = $row['status'];
            ?>
            <tr>
                <?php 
                if($status_of_dr !=1){
                ?>
                <td class="ps-3">
                    
                    <a class="btn btn-outline-danger me-1 mb-1" onclick="handleLinkClick(event, 'delete.php?id=<?php echo $drc_id?>')"><span class="text-danger fas fa-trash-alt"></span></a><button class="btn btn-outline-primary me-1 mb-1" type="button" data-bs-toggle="modal" data-bs-target="#product_<?php echo $product_id;?>"><span class="far fa-edit"></span></button>
                    
                </td>
                <?php 
                }
                ?>
                <td><?php echo $qty; ?></td>
                <td><!--<img src="../../uploads/<?php // echo basename($product_image);?>" class="img img-fluid" height="43" alt="">--><?php echo $product_name . ' ' . $product_model . ' ' . $brand_id . ' ' . $category_id . ' ' . $unit_id;?></td>
                <td class="text-end"><?php echo number_format((float)$orig_price, 2);?></td>
                <td class="text-end"><?php echo number_format((float)$price, 2);?></td>
                <td class="text-end"> % <?php echo $discount; ?></td>
                <td class="text-end"><?php echo number_format((float)$total, 2);?></td>
            </tr>
            <?php

    }

    $conn->close();
    exit();
} else {
    echo '<tr><td colspan="7" class="text-center"><b>No data</b></td></tr>';
}
?>
    </tbody>
</table>
