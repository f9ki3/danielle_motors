<?php
// Open the CSV file
if (($handle = fopen("eastway.csv", "r")) !== FALSE) {
    // Loop through each line of the CSV file
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // $data is an array containing the values in the row
        print_r($data);
    }
    // Close the file
    fclose($handle);
} else {
    echo "Error: Unable to open the file.";
}
?>
