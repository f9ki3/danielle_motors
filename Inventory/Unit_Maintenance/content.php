<h1>UNIT</h1>
<form action="../../PHP - process_files/addUnit.php" method="POST">
    <label for="unit_name">Unit Name</label>
    <input type="text" id="unit_name" name="unit_name">
    <button type="submit">Submit</button>
</form>

<table>
    <thead>
        <th>Unit Name</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
            $query = 'SELECT name, active FROM unit';
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->bind_result($name, $status);
            while ($stmt->fetch()) {
                if ($status = 1) {
                    $active = 'active';
                } else {
                    $active = 'inactive';
                }
                echo '<tr>
                        <td>'.$name.'</td>
                        <td>'.$active.'</td>
                        <td>EDIT DELETE</td>
                    </tr>';
            }
            $stmt->close();
        ?>
    </tbody>
</table>