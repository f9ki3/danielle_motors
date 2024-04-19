<?php
// Assuming $conn is the database connection

$brand_sql = "SELECT * FROM brand ORDER BY brand_name ASC";
$brand_res = $conn->query($brand_sql);

if($brand_res){
    if($brand_res->num_rows > 0){
        while($row = $brand_res->fetch_assoc()){
            echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['brand_name']) . '</option>';
        }
    } else {
        echo '<option value="">No brand</option>';
    }
    $brand_res->close(); // Close the result set
} else {
    echo "Error: " . $conn->error; // Error handling
}

?>
