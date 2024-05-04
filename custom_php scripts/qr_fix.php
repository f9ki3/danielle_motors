<?php
// Including the database connection file
include "../database/database.php";
require_once "../assets/phpqrcode/qrlib.php";
$response = ""; // Initialize response variable

$qr_sql = "SELECT * FROM product WHERE qr_code =''";
$qr_result = $conn->query($qr_sql);
if($qr_result->num_rows>0){
    while($qr = $qr_result->fetch_assoc()){
        $product_id = $qr['id'];
        $barcode = $qr['barcode'];
        $product_name = $qr['name'];
        if(isset($barcode)||!empty($barcode)){
            // Generate unique QR code filename
            $qrFilename = $barcode . "_" . uniqid() . ".png";
            $qrImagePath = "../uploads/" . $qrFilename;

            // Define the desired size of the QR code (in pixels)
            $qrCodeSize = 600; // Adjust this value as needed

            // Generate QR code with the specified size
            QRcode::png($barcode, $qrImagePath, QR_ECLEVEL_H, $qrCodeSize);

            // Update qrimage column with the image file name
            $updateQuery = "UPDATE product SET qr_code = '$qrFilename' WHERE id = '$product_id'";
            if (mysqli_query($conn, $updateQuery)) {
                // Check if files were uploaded
                // header("Location: ../TruckInventory/");
                $response = "successfully generated qrcode for product : " . $product_name;
                break;
            } else {
                $respone =  "Error updating QR code image: " . mysqli_error($conn);
                break;
            }
        }
    }
}

echo json_encode($response);

$conn->close();
exit;
?>
