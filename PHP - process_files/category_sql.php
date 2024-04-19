<?php
// Assuming $conn is the database connection

$category_sql = "SELECT * FROM category ORDER BY category_name ASC";
$category_res = $conn->query($category_sql);

if($category_res){
    if($category_res->num_rows > 0){
        while($row = $category_res->fetch_assoc()){
            echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['category_name']) . '</option>';
        }
    } else {
        echo '<option value="">No brand</option>';
    }
    $category_res->close(); // Close the result set
} else {
    echo "Error: " . $conn->error; // Error handling
}

?>
