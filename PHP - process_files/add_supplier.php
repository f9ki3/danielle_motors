<?php
require "../database/database.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['supplier_name']) && isset($_POST['address']) && isset($_POST['supplier_email']) && isset($_POST['phone'])) {
        
        // Get form data
        $supplier_name = $_POST['supplier_name'];
        $address = $_POST['address'];
        $email = $_POST['supplier_email'];
        $phone = $_POST['phone'];
        
        $filename = ''; // Initialize filename
        
        // Process the uploaded logo file if present
        if (isset($_FILES['supplier_logo']) && $_FILES['supplier_logo']['error'] == UPLOAD_ERR_OK) {
            $upload_dir = '../uploads/'; // Directory to upload files
            $unique_number = uniqid(); // Generate a unique ID
            $filename = 'dmpsupplierlogo' . $unique_number . $_FILES['supplier_logo']['name']; // Assuming the uploaded file is a JPG image
            $destination = $upload_dir . $filename;
            $tempname = $_FILES['supplier_logo']['tmp_name'];
            move_uploaded_file($tempname, $destination);
        }
        
        $insert_supplier_sql = "INSERT INTO supplier (supplier_name, supplier_logo, supplier_email, supplier_address, phone, status) VALUES ('$supplier_name', '$filename', '$email', '$address', '$phone', '1')";
        if($conn->query($insert_supplier_sql) === TRUE){
            $conn->close();
            header("Location: ../Inventory/Supplier_Maintenance/?successful=TRUE");
            exit();
        } else {
            echo "Error inserting data: " . $conn->error;
        }
    } else {
        echo "All fields are required!";
    }
} else {
    // If the form is not submitted, redirect or display an error message
    // Example: header("Location: error.php");
    echo "Form submission error!";
}
?>
