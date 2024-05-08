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


<table class="table table-sm">
    <thead>
        <th></th>
        <th>QTY</th>
        <th>PRODUCT NAME</th>
        <th class="text-end">ORIG PRICE</th>
        <th class="text-end">PRICE</th>
        <th class="text-end">DISCOUNT</th>
        <th class="text-end">AMOUNT</th>
    </thead>
    <tbody>
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
            $product_image= $row_product['image'];
            ?>
            <tr>
                <td class="ps-3"><a class="me-1 mb-1" onclick="handleLinkClick(event, 'delete.php?id=<?php echo $drc_id?>')"><span class="text-danger fas fa-trash-alt"></span></a></td>
                <td><?php echo $qty; ?></td>
                <td><!--<img src="../../uploads/<?php // echo basename($product_image);?>" class="img img-fluid" height="43" alt="">--><?php echo $product_name . ' ' . $product_model . ' ' . $brand_id . ' ' . $category_id . ' ' . $unit_id;?></td>
                <td class="text-end"><?php echo number_format((float)$orig_price, 2);?></td>
                <td class="text-end"><?php echo number_format((float)$price, 2);?></td>
                <td class="text-end"> % <?php echo $discount; ?></td>
                <td class="text-end"><?php echo number_format((float)$total, 2);?></td>
            </tr>
            <?php
        } else {
            
        }

    }

    $conn->close();
    exit();
} else {
    echo '<tr><td colspan="7" class="text-center"><b>No data</b></td></tr>';
}
?>
    </tbody>
</table>
