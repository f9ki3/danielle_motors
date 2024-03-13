<h1>CATEGORY</h1>
<form action="../../PHP - process_files/addCategory.php" method="POST">
    <label for="category_name">Category Name</label>
    <input type="text" id="category_name" name="category_name">
    <button type="submit">Submit</button>
</form>

<table class="table">
    <thead>
        <th>Category Name</th>
        <th>Published by:</th>
        <th>Date Added:</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
            $query = 'SELECT date_added, category_name, publish_by, status FROM category';
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