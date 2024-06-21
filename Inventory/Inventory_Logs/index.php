<?php
include "../../admin/session.php";
include "../../database/database.php";
date_default_timezone_set('Asia/Manila');

// Check if user_brn_code is set in the session
if(isset($_SESSION['user_brn_code']) && !empty($_SESSION['user_brn_code'])) {
    $user_brn_code = $_SESSION['user_brn_code'];

    // Prepare SQL query with a placeholder for user_brn_code
    $sql_logs = "SELECT `id`, `audit_date`, `audit_user_id`, `audit_description` FROM `audit` WHERE `user_brn_code` = ? ORDER BY audit_date DESC";
    
    // Prepare statement
    $stmt = $conn->prepare($sql_logs);
    
    // Bind parameter
    $stmt->bind_param("s", $user_brn_code);

    // Execute statement
    $stmt->execute();

    // Get result
    $result_logs = $stmt->get_result();

    // Close statement
    $stmt->close();
} else {
    // If user_brn_code is not set or empty, handle the error or set a default value
    $result_logs = null;
}

// Fetch admin data
$sql_admin = "SELECT `id`, `username`, `user_fname`, `user_mname`, `user_lname` FROM `user`";
$result_admin = $conn->query($sql_admin);

// Prepare admin data for easy lookup
$adminData = array();
if ($result_admin->num_rows > 0) {
    while ($row = $result_admin->fetch_assoc()) {
        // Assuming username is unique, use it as key for admin data
        $adminData[$row['id']] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<?php include "../../page_properties/header.php" ?>
  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <!-- navigation -->
      <?php include "../../page_properties/nav.php";?>
      <!-- /navigation -->
      <div class="content">
        <div class="col-lg-12 mb-5">
          <h1>Activity Logs</h1>
        </div>
        <!-- Display DataTable -->
        <div class="table-responsive" style="max-height: 700px; overflow-y: auto;">
          <table id="userLogsTable" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th style="width: 20%">Employee Name</th>
                <th style="width: 60%">Logs</th>
                <th style="width: 20%">Log Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Populate table with data
              if ($result_logs !== null && $result_logs->num_rows > 0) {
                  while($row = $result_logs->fetch_assoc()) {
                      $adminName = isset($adminData[$row["audit_user_id"]]) ? $adminData[$row["audit_user_id"]]['user_fname'] . ' ' . $adminData[$row["audit_user_id"]]['user_lname'] : 'Unknown';
                      // convert lang tito, change mo na lang pag pangit
                      $auditor = $row["audit_user_id"];
                      $check_dev = "SELECT * FROM user WHERE id = '$auditor' AND user_position = 'System Developer' LIMIT 1";
                      $dev_res = $conn->query($check_dev);
                      if($dev_res->num_rows>0){

                      } else {
                        $auditDate = $row["audit_date"];
                        $convertAudit_date = strtotime($auditDate);
                        $formatted_audit_date = date('M j, Y g:i A', $convertAudit_date);
                        echo "<tr>";
                        echo "<td style='padding-left: 10px;'>" . $adminName . "</td>";
                        echo "<td style='padding-left: 10px;'>" . $row["audit_description"] . "</td>";
                        echo "<td style='padding-left: 10px;'>" . $formatted_audit_date . "</td>";
                        echo "</tr>";
                      }
                  }
              } else {
                  echo "<tr><td colspan='3'>No data found</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /Display DataTable -->

        <!-- footer -->
        <?php include "../../page_properties/footer.php"; ?>
        <!-- /footer -->
      </div>
      <!-- chat-container -->
      <?php include "../../page_properties/chat-container.php"; ?>
      <!-- /chat container -->
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- Include necessary libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Initialize DataTable -->
    <script>
    $(document).ready(function() {
        $('#userLogsTable').DataTable({
            "scrollX": true,
            "scrollY": "300px", // Adjust as needed
            "scrollCollapse": true,
            "paging": false,
            // Add your other DataTable options here
        });
    });
    </script>

    <!-- Apply custom styling -->
    <style>
    #userLogsTable td {
        margin-left: -2px;
    }
    </style>

    <!-- theme customizer -->
    <?php include "../../page_properties/theme-customizer.php"; ?>
    <!-- /theme customizer -->

    <?php include "../../page_properties/footer_main.php"; ?>
  </body>
</html>
