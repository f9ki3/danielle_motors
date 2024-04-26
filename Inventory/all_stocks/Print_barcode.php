<?php
// Include QR code generation library
require_once "../../assets/phpqrcode/qrlib.php";

// Define the value for the QR code
$barcode = $truck_code;

// Set the appropriate headers to indicate that the content is an image
header("Content-type: image/png");

// Generate QR code with the specified value and output it directly to the browser
QRcode::png($barcode, NULL, QR_ECLEVEL_H);
