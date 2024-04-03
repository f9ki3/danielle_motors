<?php
$user_permission_sql = "SELECT permission.*, user.user_fname, user.user_lname FROM permission 
LEFT JOIN user ON permission.user_id = user.id 
ORDER BY permission.id DESC";


$user_permission_res = $conn->query($user_permission_sql);
if($user_permission_res->num_rows>0){
    while($row=$user_permission_res->fetch_assoc()){
        $permission_name = $row['permission_name'];
        $full_name = $row['user_fname'] . " " . $row['user_lname'];
        // Get the timestamp of the date added
        $date_added_timestamp = strtotime($row['date_added']);
        $currentDate = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS
        $converted_date = strtotime($currentDate);
        // Calculate the difference in seconds
        $difference = $converted_date - $date_added_timestamp;

        // Define time intervals in seconds
        $minute = 60;
        $hour = $minute * 60;
        $day = $hour * 24;
        $month = $day * 30;
        $year = $day * 365;

        // Calculate the time ago
        if ($difference < $minute) {
            $time_ago = "just now";
        } elseif ($difference < $hour) {
            $time_ago = floor($difference / $minute) . " mins ago";
        } elseif ($difference < $day) {
            $time_ago = floor($difference / $hour) . " hrs ago";
        } elseif ($difference < $month) {
            $time_ago = floor($difference / $day) . " days ago";
        } else {
            $time_ago = date("M j, Y", $date_added_timestamp);
        }

?>
<tr>
    <td class="white-space-nowrap fs--1 align-middle ps-0" style="max-widtd:20px; widtd:18px;">
    <div class="form-check mb-0 fs-0">
        <input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' />
    </div>
    </td>
    <td class="branch_name"><?php echo ucwords(strtolower($permission_name)); ?></td>
    <td class="status text-start"><?php echo ucwords(strtolower($full_name));?></td>
    <td class="address text-start"><?php echo $time_ago;?></td>
</tr>
<?php
    }
} else {
?>
<tr>
    <td class="text-center py-10" colspan="4"><h1 class="text-400"><span class="far fa-clipboard"></span> Empty!!</h1></td>
</tr>
<?php
}
?>
