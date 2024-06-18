<?php
include "../admin/session.php";
include "../database/database.php";

if(isset($_GET['id'])){
    $draft_id = $_GET['id'];
    $query = "DELETE FROM stocks_draft WHERE id='$draft_id' AND branch_code = '$branch_code'";
    if($conn->query($query)===TRUE){
        echo "deleted successfully";
    }
}
$conn->close();
exit;