<?php
if($row['status'] === 'ACTIVE'){

} else {
?>
<a class="dropdown-item" href="../../PHP - process_files/set_as_logo.php?logo_id=<?php echo $row['id']; ?>">Set as logo</a>
<?php 
}
?>
<a class="dropdown-item" href="../../PHP - process_files/delete_logo.php?logo_id=<?php echo $row['id']; ?>">Delete</a>