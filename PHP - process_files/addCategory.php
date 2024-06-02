<?php
    include "../admin/session.php";
    require_once '../database/database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['category_name'])) {
            $category_name = $_POST['category_name'];
            $log_description = "Created new category: " . $category_name . ".";
            $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$user_id', audit_description = '$log_description', user_brn_code = '$branch_code', audit_date = '$currentTimestamp'";
            $conn->query($insert_into_logs);
            
            $query = 'INSERT INTO category 
                        (category_name, publish_by, status)
                    VALUES (?,?,?)';
            $author = 'admin';
            $status = 1;
            $stmt = $conn->prepare( $query);
            $stmt->bind_param('ssi', $category_name, $author, $status);
            $stmt->execute();
            $stmt->close();
            header('Location: ../Inventory/Category_Maintenance/');
            exit;
        }
    }
?>