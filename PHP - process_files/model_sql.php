<?php
// Assuming $conn is the database connection

$modelszz_sql = "SELECT * FROM model ORDER BY model_name ASC";
$modelszz_res = $conn->query($modelszz_sql);

if($modelszz_res){
    if($modelszz_res->num_rows > 0){
        while($row = $modelszz_res->fetch_assoc()){
            echo '<option value="' . $row['model_name'] . '">' . $row['model_name'] . '</option>';
        }
    } else {
        echo '<option value="">No model</option>';
    }
    $modelszz_res->close(); // Close the result set
} else {
    echo "Error: " . $conn->error; // Error handling
}

?>
