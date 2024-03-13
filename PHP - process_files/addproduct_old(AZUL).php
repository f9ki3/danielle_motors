<?php
// include "../database/database.php";
// // Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $dummy_delivered_to = $_POST['delivered_to'];
//     $date = date("F j,Y g:i A");
//     $sender = $_POST['from'];
//     $ref_no = $_POST['ref_no'];
//     // Loop through each submitted item
//     for ($i = 0; $i < count($_POST['sample_qty']); $i++) {
//         // Get the values from each input field
//         $quantity = $_POST['sample_qty'][$i];
//         $itemName = $_POST['sample_name'][$i];
//         $itemCode = $_POST['sample_itemcode'][$i];
//         $sku = $_POST['sample_itemdesc'][$i];
//         $category = $_POST['sample_category'][$i];
//         $brand = $_POST['sample_brand'][$i];
//         $model = $_POST['sample_model'][$i];
//         $amount = $_POST['sample_amount'][$i];

//         // Insert the data into your products table
//         $sql = "INSERT INTO products SET product_name = '$itemName', product_code = '$itemCode', unit_price = '$amount', qty = '$quantity', product_image = '', product_description = '$sku', product_category = '$category', product_brand = '$brand', product_model = '$model', product_availability = 'AVAILABLE', published_on = '$date', published_by = 'John Doe'";

//         // Execute the SQL query
//         if (mysqli_query($conn, $sql)) {
//             header("Location : ../Website/Manage-Inventory/?add=successful");
//         } else {
//             header("Location : ../Website/Manage-Inventory/?add=failed");
//         }
//     }
// }
?>
