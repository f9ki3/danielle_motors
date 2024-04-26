<?php
session_start();
require_once "../phpqrcode/qrlib.php";
include "../db/database.php";



$email = $_SESSION['user_email'];
$sql = "SELECT * FROM gtecnica_users WHERE user_email='$email'";
$result = $conn->query($sql);


while ($row = $result->fetch_assoc()) {
    $userId = $row['user_id'];
    $brn_code = $row['brn_code'];
    $brn_sql = "SELECT brn_name FROM branches WHERE brn_code = '$brn_code'";
    $brn_res = $conn->query($brn_sql);

    if ($brn_res->num_rows > 0) {
        while ($brn_row = $brn_res->fetch_assoc()) {
            $location = $brn_row['brn_name'];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $truck_code = $_POST["truck_code"];
    $prod_type = $_POST["prod_type"];
    $cabin_type = $_POST["cabin_type"];
    $cabin_type2 = $_POST['cabin_type2'];
    $cabin_height = $_POST["cabin_height"];
    $chrome_type = $_POST["chrome_type"];
    $year_model = $_POST["year_model"];
    $chassis_num = $_POST["chassis_num"];
    $chassis_series = $_POST["chassis_series"];
    $color = $_POST["color"];
    $truck_type = $_POST["truck_type"];
    $truck_images = $_FILES["truck_images"];
    $engine_name = $_POST["engine_name"];
    $engine_num = $_POST["engine_num"];
    $engine_specs = $_POST["engine_specs"];
    $differential = $_POST["differential"];
    $transmission = $_POST["transmission"];
    $transmission_speed = $_POST["transmission_speed"];
    $body_type = $_POST["body_type"];
    $body_length = $_POST["body_length"];
    $front_tiresize = $_POST["front_tiresize"];
    $front_tirebrand = $_POST["front_tirebrand"];
    $front_tirecondition = $_POST["front_tirecondition"];
    $front_tiretype = $_POST["front_tiretype"];
    $tire_qty = $_POST["tire_qty"];
    $rim = $_POST["rim"];
    $capacity = $_POST["capacity"];
    $reg_name = $_POST["reg_name"];
    $plate_num = $_POST["plate_num"];
    $res_amount = $_POST['res_amount'];
    // $display_img = $_POST['truck_displayimage'];
    // $post = $_POST['post'];
    $truck_type = $_POST['truck_type'];
    $truck_brand = $_POST['truck_brand'];
    $chassis_type = $_POST['chassis_type'];
    

    if ($body_type === "none") {
        $body_height = "";
        $body_width = "";
        $body_code = "";
        $body_condition = "";
    } else {
        $body_height = mysqli_real_escape_string($conn, $_POST['body_height']);
        $body_width = mysqli_real_escape_string($conn, $_POST['body_width']);
        $body_code = mysqli_real_escape_string($conn, $_POST['body_code']);
        $body_condition = mysqli_real_escape_string($conn, $_POST['body_condition']);
    }

    $checktruckcode = "SELECT truck_code FROM truckInventory WHERE truck_code = '$truck_code'";
    $checkresult = mysqli_query($conn, $checktruckcode);

    if (mysqli_num_rows($checkresult) > 0) {
        header("Location: ../add.LCV/?error=LKhas12bA912basjbnasd91jntrcodeexist");
        exit;
    } else {

        
        // Set the timezone to your desired timezone
        date_default_timezone_set('Asia/Manila');

        // Get the current date and time in the desired format
        $date = date('M d, Y h:i A', time());

        $truck_sql = "INSERT INTO truckInventory SET truck_code = '$truck_code', truck_title = '$title', truck_desc = '$description', truck_location = '$location', truck_status = 'Available', truck_brand = '$truck_brand', truck_category = '$truck_type', vehicle_type = '$prod_type', chassis_series = '$chassis_series', chassis_type = '$chassis_type', chassis_length = '$body_length', chassis_num = '$chassis_num', truck_color = '$color', year_model = '$year_model', front_panel = '$cabin_type', cabin_type = '$cabin_type2', cabin_height = '$cabin_height', chrome_type = '$chrome_type', transmission = '$transmission', transmission_speed = '$transmission_speed', cabchassis_differential = '$differential', studs_num = '$rim', tire_num = '$tire_qty', tire_brand = '$front_tirebrand', tire_size = '$front_tiresize', tire_condition = '$front_tirecondition', tire_type = '$front_tiretype', gross_vw = '$capacity', registered_name = '$reg_name', plate_num = '$plate_num', date_added = '$date', reservation_amount = '$res_amount', user_id = '$userId'";
                                                   

        if (mysqli_query($conn, $truck_sql)) {

            if(isset($engine_name)){
                $engine_sql = "INSERT INTO engine_inventory (engine_num, truck_code, engine_status, engine_name, engine_fi, engineinventory_remarks, user_id, engine_location)
                                                            VALUES ('$engine_num', '$truck_code', 'Mounted', '$engine_name', '$engine_specs', '', '$userId', '$location')";
                if(mysqli_query($conn, $engine_sql)){

                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }

            if($body_type !== "none"){
                $body_sql = "INSERT INTO body_inventory (body_code, truck_code, body_status, body_type, body_length, body_width, body_height, user_id, body_condition, body_location)
                    VALUES ('$body_code','$truck_code', 'Mounted', '$body_type', '$body_length', '$body_width', '$body_height', '$userId', '$body_condition', '$location')";
                if(mysqli_query($conn, $body_sql)){

                } else {
                echo "Error: " . mysqli_error($conn);
                }
            }
            // Check if the 'accessory' checkbox array exists in the POST data
            if (isset($_POST["accessory"])) {
                // Loop through the selected accessories and display them
                foreach ($_POST["accessory"] as $selectedAccessory) {
                    $accessory_sql = "INSERT INTO partInventory (truck_code, status, part_location, part_category, part_brand, part_name, part_num, part_condition, part_type, part_length, part_height, part_width, part_qty, remarks, user_id) VALUES ('$truck_code', 'Mounted', '$brn_code','Accessories', 'Undefined', '$selectedAccessory', '', '', '', '', '', '', '1', '', '$userId')";

                    // Assuming $conn is your database connection
                    if (mysqli_query($conn, $accessory_sql)) {
                       
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            }

            if (!empty($_FILES['truck_images']['name'][0])) {
                $filePaths = [];
    
                // Loop through each uploaded file
                foreach ($_FILES['truck_images']['tmp_name'] as $key => $tmpName) {
                    $originalFilename = $_FILES['truck_images']['name'][$key];
                    $fileExtension = pathinfo($originalFilename, PATHINFO_EXTENSION);
    
                    // Generate a unique filename
                    $uniqueFilename = uniqid() . '_' . time() . '.' . $fileExtension;
    
                    $destination = '../assets/trucks/' . $uniqueFilename;
    
                    // Move the uploaded file to the destination
                    if (move_uploaded_file($tmpName, $destination)) {
                        // Store the file path in the database
                        $conn->query("INSERT INTO truckinventoryimg (truck_code, ti_img) VALUES ('$truck_code', '$destination')");
                        if ($conn->affected_rows > 0) {
                        } else {
                            // Handle database insertion error
                        }
                    } else {
                        // Handle file upload error
                        echo "walang naupload";
                    }
                }
    
                // Optionally, you can do something with $filePaths if needed
            }

            if (!empty($_FILES['truck_displayimage']['tmp_name'])) {
                $originalFilename2 = $_FILES['truck_displayimage']['name'];
                $fileExtension2 = pathinfo($originalFilename2, PATHINFO_EXTENSION);
            
                $uniqueFilename2 = uniqid() . ' ' . time() . '.' . $fileExtension2;
                $destination2 = '../assets/trucks/' . $uniqueFilename2;
            
                // Move the uploaded file to the destination folder
                if (move_uploaded_file($_FILES['truck_displayimage']['tmp_name'], $destination2)) {
                    // Update the database with the new file path
                    $sql32 = "UPDATE truckInventory SET display_img = '$destination2' WHERE truck_code = '$truck_code'";
            
                    // Execute the query
                    if (mysqli_query($conn, $sql32)) {
                        echo "File uploaded and database updated successfully.";
                    } else {
                        echo "Error updating the database.";
                    }
                } else {
                    echo "Error moving the uploaded file.";
                }
            } else {
                echo "No file was uploaded.";
            }
            

            if(isset($_POST['post'])){
                $posting = $_POST['post'];
                $updatepost = "UPDATE truckInventory SET post = '$posting' WHERE truck_code = '$truck_code'";
                if(mysqli_query($conn, $updatepost)){

                } else {
                    echo "error posting truck <br> " . mysqli_error($conn);
                }
            }

            // Generate unique QR code filename
            $qrFilename = $truck_code . "_" . uniqid() . ".png";
            $qrImagePath = "../assets/qruploads/" . $qrFilename;

            // Define the desired size of the QR code (in pixels)
            $qrCodeSize = 600; // Adjust this value as needed

            // Generate QR code with the specified size
            QRcode::png($truck_code, $qrImagePath, QR_ECLEVEL_H, $qrCodeSize);

            // Update qrimage column with the image file name
            $updateQuery = "UPDATE truckInventory SET qrcode = '$qrImagePath' WHERE truck_code = '$truck_code'";
            if (mysqli_query($conn, $updateQuery)) {
                // Check if files were uploaded
                header("Location: ../TruckInventory/");
                
            } else {
                echo "Error updating QR code image: " . mysqli_error($conn);
            }
        }
    }
}
?>
