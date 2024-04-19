<?php
// Assuming $conn is the database connection

$unit_sql = "SELECT * FROM unit ORDER BY name ASC";
$unit_res = $conn->query($unit_sql);

if($unit_res){
    if($unit_res->num_rows > 0){
        while($row = $unit_res->fetch_assoc()){
            echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
        }
    } else {
        echo '<option value="">No brand</option>';
    }
    $unit_res->close(); // Close the result set
} else {
    echo "Error: " . $conn->error; // Error handling
}

?>
