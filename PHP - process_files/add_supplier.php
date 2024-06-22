<?php
// Include necessary files
include "../admin/session.php";
require "../database/database.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if all required fields are filled
    if (isset($_POST['supplier_name']) && isset($_POST['address']) && isset($_POST['supplier_email']) && isset($_POST['phone'])) {
        
        // Get form data and sanitize if necessary
        $supplier_name = $_POST['supplier_name'];
        $address = $_POST['address'];
        $email = $_POST['supplier_email'];
        $phone = $_POST['phone'];
        
        // Initialize filename for the supplier logo
        $filename = '';

        // Process the uploaded logo file if present
        if (isset($_FILES['supplier_logo']) && $_FILES['supplier_logo']['error'] == UPLOAD_ERR_OK) {
            $upload_dir = '../uploads/'; // Directory to upload files
            $unique_number = uniqid(); // Generate a unique ID
            $filename = 'dmpsupplierlogo' . $unique_number . '_' . $_FILES['supplier_logo']['name']; // Generate unique filename
            $destination = $upload_dir . $filename;
            $tempname = $_FILES['supplier_logo']['tmp_name'];
            move_uploaded_file($tempname, $destination);
        }
        
        // Check if all fields are filled including the logo filename
        if (!empty($supplier_name) && !empty($filename) && !empty($email) && !empty($address) && !empty($phone)) {
            
            // Assuming $conn is your mysqli connection object from database.php
            
            // Prepare the INSERT statement using placeholders
            $insert_supplier_sql = "INSERT INTO supplier (supplier_name, supplier_logo, supplier_email, supplier_address, phone, status) VALUES (?, ?, ?, ?, ?, '1')";
            
            // Prepare the statement
            $stmt = $conn->prepare($insert_supplier_sql);
            
            if ($stmt === false) {
                die('Error preparing supplier insertion statement: ' . $conn->error);
            }
            
            // Bind parameters
            $stmt->bind_param("sssss", $supplier_name, $filename, $email, $address, $phone);
            
            // Execute the supplier insertion statement
            if ($stmt->execute()) {
                
                // Check if user_id is valid
                if ($user_id !== null) {
                    
                    // Prepare the audit log INSERT statement
                    $log_description = "Added a supplier: " . $supplier_name . ".";
                    $insert_into_logs = "INSERT INTO audit (audit_user_id, audit_description, user_brn_code, audit_date) VALUES (?, ?, ?, ?)";
                    $stmt_logs = $conn->prepare($insert_into_logs);
                    
                    if ($stmt_logs === false) {
                        die('Error preparing audit log statement: ' . $conn->error);
                    }
                    
                    // Bind parameters for the audit log
                    $stmt_logs->bind_param("isss", $user_id, $log_description, $branch_code, $currentTimestamp);
                    
                    // Execute the audit log statement
                    if ($stmt_logs->execute()) {
                        // Close the prepared statement
                        $stmt_logs->close();
                        
                        // Close the connection
                        $conn->close();
                        
                        // Redirect to success page
                        header("Location: ../Inventory/Suppliers/?successful=TRUE");
                        exit();
                    } else {
                        echo "Error inserting audit log: " . $stmt_logs->error;
                    }
                    
                } else {
                    echo "User ID is missing or invalid.";
                }
                
            } else {
                echo "Error inserting supplier data: " . $stmt->error;
            }
            
            // Close the supplier insertion statement
            $stmt->close();
            
        } else {
            echo "All fields are required!";
        }
        
    } else {
        echo "All fields are required!";
    }
} else {
    echo "Form submission error!";
}
?>
