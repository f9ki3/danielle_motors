<h1>BRAND</h1>
<form action="../../PHP - process_files/addBrand.php" method="POST">
    <label for="brand_name">Brand Name</label>
    <input type="text" id="brand_name" name="brand_name">
    <button type="submit">Submit</button>
</form>

<table>
    <thead>
        <th>Brand Name</th>
        <th>Published by:</th>
        <th>Date Added:</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
            $query = 'SELECT date_added, brand_name, publish_by, status FROM brand';
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->bind_result($date, $name, $author, $status);
            while ($stmt->fetch()) {
                if ($status = 1) {
                    $active = 'active';
                } else {
                    $active = 'inactive';
                }
                echo '<tr>
                        <td>'.$name.'</td>
                        <td>'.$author.'</td>
                        <td>'.$date.'</td>
                        <td>'.$active.'</td>
                        <td>EDIT DELETE</td>
                    </tr>';
            }
            $stmt->close();
        ?>
    </tbody>
</table>