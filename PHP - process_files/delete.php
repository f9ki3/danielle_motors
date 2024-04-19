<?php
include "../admin/session.php";
include "../database/database.php";

if(isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $document_id = $_GET['id'];

    if($type === 'rack') {
        // Prepare and execute the delete statement using prepared statements
        $delete_Sql = "DELETE FROM ware_location WHERE id = ?";
        $stmt = $conn->prepare($delete_Sql);
        if(!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("i", $document_id); // Assuming 'id' is an integer
        $result = $stmt->execute();
        if(!$result) {
            die("Error executing statement: " . $stmt->error);
        }

        // Check if any rows were affected
        if($stmt->affected_rows > 0) {
            header("Location: ../Inventory/Rack_Maintenance/?successful=true");
            $conn->close();
            exit;
        } else {
            header("Location: ../Inventory/Rack_Maintenance/?duplicate=false");
            $conn->close();
            exit;
        }

        // Close statement and database connection
        $stmt->close();
        $conn->close();
    }
}
?>
