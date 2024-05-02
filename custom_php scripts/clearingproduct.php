<?php
// Including the database connection file
include "../database/database.php";

// SQL query to select data from multiple tables using JOIN
$sql = "SELECT p.*, b.brand_name, c.category_name, u.name AS unit_name 
        FROM product p
        LEFT JOIN brand b ON b.id = p.brand_id
        LEFT JOIN category c ON c.id = p.category_id
        LEFT JOIN unit u ON u.id = p.unit_id";

// Executing the SQL query
$result = $conn->query($sql);

// Checking if there are rows returned by the query
if($result->num_rows>0){
    // Looping through each row of the result set
    while($row=$result->fetch_assoc()){
        // Storing values from the current row into variables
        $product_id = $row['id'];
        $product_name = strtoupper($row['name']);
        $product_models = $row['models'];
        $unit_name = $row['unit_name'];
        $brand_name = strtoupper($row['brand_name']);
        $category_name = strtoupper($row['category_name']);

        // Printing product details
        echo "<br>***************************************************************************************************<br>";
        echo "✔️ product id: " . $product_id . "<br>";
        echo "✔️ product name: " . $product_name . "<br>";
        echo "✔️ product models: " . $product_models . "<br>";
        echo "✔️ product unit: " . $unit_name . "<br>";
        echo "✔️ product brand: " . $brand_name . "<br>";
        echo "✔️ product category: " . $category_name . "<br>";
        echo "------------------------------------------------------------------------------------------------------------------------<br>";

        // Checking if product name contains brand name and/or category name
        if(strpos($product_name, $brand_name) !== false || strpos($product_name, $category_name) !== false ) {
            // If either brand name or category name is present
            if(strpos($product_name, $brand_name) !== false && strpos($product_name, $category_name) !== false ) {
                // If both brand name and category name are present
                echo "product name consists of both the brand name and category name<br>";
            } elseif(strpos($product_name, $brand_name) !== false){
                // If only brand name is present
                echo "product name consists of the brand name but does not consist of the category name<br>";
            } elseif(strpos($product_name, $category_name) !== false ){
                // If only category name is present
                echo "product name consists of the category name but does not consist of the brand name<br>";
            }
            // Remove brand name and/or category name from product name
            $product_name_without_brand_category = str_replace([$brand_name, $category_name], '', $product_name);
            echo $product_name_without_brand_category . "<br>";
        } else {
            // If neither brand name nor category name is present
            echo "product name does not consist of the brand name and category name<br>";
            echo $product_name . "<br>";
        }
        echo "<br>***************************************************************************************************<br>";


    }
}
?>
