<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if any checkboxes are selected
    if (isset($_POST['product_id']) && is_array($_POST['product_id'])) {
        // Start building the table
        echo '<table class="table" border="1">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Unit</th>
                        <th>Models</th>
                    </tr>
                </thead>
                <tbody>';
                
        // Loop through each selected checkbox
        foreach ($_POST['product_id'] as $selectedProductId) {
            // Retrieve data associated with the selected product id
            $product_key = array_search($selectedProductId, $_POST['product_id']);
            $productName = $_POST['product_name'][$product_key];
            $category = $_POST['category'][$product_key];
            $brand = $_POST['brand'][$product_key];
            $unit = $_POST['unit'][$product_key];
            $models = $_POST['models'][$product_key];

            // Display the data in the table row
            echo '<tr>
                    <td>' . $productName . '</td>
                    <td>' . $category . '</td>
                    <td>' . $brand . '</td>
                    <td>' . $unit . '</td>
                    <td>' . $models . '</td>
                </tr>';
        }
        
        // Close the table
        echo '</tbody></table>';
    } else {
        // No checkboxes selected
        echo "No checkboxes selected.";
    }
} else {
    // Form not submitted
    echo "Form not submitted.";
}
?>
