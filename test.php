<?php
// Assuming you have fetched the $permission value from your MySQL table
$permission = "view_inventory, add_inventory, manage_users";

// Split the permission string into an array of individual permissions
$permissionsArray = explode(', ', $permission);
?>

<form action="update_permissions.php" method="post">
    <?php foreach ($permissionsArray as $perm) { ?>
        <input type="text" name="permissions[]" value="<?php echo $perm; ?>"><br>
    <?php } ?>
    <button type="submit">Submit</button>
</form>
