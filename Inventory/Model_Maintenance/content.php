<h1>MODELS</h1>
<form action="../../PHP - process_files/addModel.php" method="POST">
    <label for="model_name">Model Name</label>
    <input type="text" id="model_name" name="model_name">
    <button type="submit">Submit</button>
</form>

<table class="table">
    <thead>
        <th>Model Name</th>
        <th>Date Added:</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
            $query = 'SELECT date_added, model_name, status FROM model';
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt->bind_result($date, $name, $status);
            while ($stmt->fetch()) {
                if ($status = 1) {
                    $active = 'active';
                } else {
                    $active = 'inactive';
                }
                echo '<tr>
                        <td>'.$name.'</td>
                        <td>'.$date.'</td>
                        <td>'.$active.'</td>
                        <td>EDIT DELETE</td>
                    </tr>';
            }
            $stmt->close();
        ?>
    </tbody>
</table>