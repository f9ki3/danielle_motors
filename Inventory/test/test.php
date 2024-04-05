<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['checkbox'])) {
        $checkedItems = $_POST['checkbox'];
        echo "<h2>Checked Items:</h2>";
        echo "<ul>";
        foreach($checkedItems as $item) {
            echo "<li>$item</li>";
        }
        echo "</ul>";
    } else {
        echo "No items were checked.";
    }
}
?>
