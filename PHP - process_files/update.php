
<?php
include "../admin/session.php";
include "../database/database.php";

if(isset($_GET['brand'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate input
        $brand_name = filter_input(INPUT_POST, 'brand_name', FILTER_SANITIZE_STRING);
        $brand_id = filter_input(INPUT_POST, 'brand_id', FILTER_VALIDATE_INT);
    
        if ($brand_name && $brand_id) {
    
            // Prepare and bind
            $stmt = $conn->prepare("UPDATE brand SET brand_name = ? WHERE id = ?");
            $stmt->bind_param("si", $brand_name, $brand_id);
    
            // Execute the statement
            if ($stmt->execute()) {
                echo "Record updated successfully";
                header("Location: ../Inventory/Brand_Maintenance/?success=true");
                $conn->close();
                exit;
            } else {
                echo "Error updating record: " . $stmt->error;
                header("Location: ../Inventory/Brand_Maintenance/?success=false");
                $conn->close();
                exit;
            }
    
            // Close the statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Invalid input.";
        }
    } else {
        echo "Invalid request method.";
    }
} elseif(isset($_GET['category'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate input
        $brand_name = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING);
        $brand_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    
        if ($brand_name && $brand_id) {
    
            // Prepare and bind
            $stmt = $conn->prepare("UPDATE category SET category_name = ? WHERE id = ?");
            $stmt->bind_param("si", $brand_name, $brand_id);
    
            // Execute the statement
            if ($stmt->execute()) {
                echo "Record updated successfully";
                header("Location: ../Inventory/Category_Maintenance/?success=true");
                $conn->close();
                exit;
            } else {
                echo "Error updating record: " . $stmt->error;
                header("Location: ../Inventory/Category_Maintenance/?success=false");
                $conn->close();
                exit;
            }
    
            // Close the statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Invalid input.";
        }
    } else {
        echo "Invalid request method.";
    }
} elseif(isset($_GET['unit'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate input
        $brand_name = filter_input(INPUT_POST, 'unit_name', FILTER_SANITIZE_STRING);
        $brand_id = filter_input(INPUT_POST, 'unit_id', FILTER_VALIDATE_INT);
    
        if ($brand_name && $brand_id) {
    
            // Prepare and bind
            $stmt = $conn->prepare("UPDATE unit SET `name` = ? WHERE id = ?");
            $stmt->bind_param("si", $brand_name, $brand_id);
    
            // Execute the statement
            if ($stmt->execute()) {
                echo "Record updated successfully";
                header("Location: ../Inventory/Unit_Maintenance/?success=true");
                $conn->close();
                exit;
            } else {
                echo "Error updating record: " . $stmt->error;
                header("Location: ../Inventory/Unit_Maintenance/?success=false");
                $conn->close();
                exit;
            }
    
            // Close the statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Invalid input.";
        }
    } else {
        echo "Invalid request method.";
    }
} elseif(isset($_GET['rack'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate input
        $brand_name = filter_input(INPUT_POST, 'rack_name', FILTER_SANITIZE_STRING);
        $brand_id = filter_input(INPUT_POST, 'rack_id', FILTER_VALIDATE_INT);
    
        if ($brand_name && $brand_id) {
    
            // Prepare and bind
            $stmt = $conn->prepare("UPDATE ware_location SET location_name = ? WHERE id = ?");
            $stmt->bind_param("si", $brand_name, $brand_id);
    
            // Execute the statement
            if ($stmt->execute()) {
                echo "Record updated successfully";
                header("Location: ../Inventory/Rack_Maintenance/?success=true");
                $conn->close();
                exit;
            } else {
                echo "Error updating record: " . $stmt->error;
                header("Location: ../Inventory/Rack_Maintenance/?success=false");
                $conn->close();
                exit;
            }
    
            // Close the statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Invalid input.";
        }
    } else {
        echo "Invalid request method.";
    }
}