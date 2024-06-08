<style>
    .cropper-container {
        max-width: 100%;
        min-width: 300px;
        min-height: 200px !important;
        position: relative;
        overflow: hidden;
    }

    #image {
        /* width: 100%; */
        max-height: 200px;
        position: relative;
    }
</style>

<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 text-center mb-4">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#cropImage" ><img id="dp_lang" src="../../uploads/<?php echo $profile;?>" class="img-fluid rounded-circle mb-3" alt="pfp" style="height: 150px;"></a>
                            <p><?php echo ucwords($fname . " " . $lname); ?></p>
                        </div>

                        <div class="col-lg-12 text-center">
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#update_info">Edit Profile Info</button>
                            <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#update_pw">Update Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <h3 class="mb-4 mt-4">Activity Logs</h3>
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
                // Check if user_brn_code is set in the session
                if(isset($_SESSION['user_brn_code']) && !empty($_SESSION['user_brn_code'])) {
                    $user_brn_code = $_SESSION['user_brn_code'];

                    // Prepare SQL query with a placeholder for user_brn_code
                    $sql_logs = "SELECT `id`, `audit_date`, `audit_user_id`, `audit_description` FROM `audit` WHERE `audit_user_id` = ? ORDER BY audit_date DESC";
                    
                    // Prepare statement
                    $stmt = $conn->prepare($sql_logs);
                    
                    // Bind parameter
                    $stmt->bind_param("s", $user_id);

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
                // Populate table with data
                if ($result_logs !== null && $result_logs->num_rows > 0) {
                    while($row = $result_logs->fetch_assoc()) {
                        $adminName = isset($adminData[$row["audit_user_id"]]) ? $adminData[$row["audit_user_id"]]['user_fname'] . ' ' . $adminData[$row["audit_user_id"]]['user_lname'] : 'Unknown';
                        // convert lang tito, change mo na lang pag pangit
                        $auditDate = $row["audit_date"];
                        $convertAudit_date = strtotime($auditDate);
                        $formatted_audit_date = date('M j, Y g:i A', $convertAudit_date);
                        echo "<tr>";
                        echo "<td style='padding-left: 10px;'>" . $adminName . "</td>";
                        echo "<td style='padding-left: 10px;'>" . $row["audit_description"] . "</td>";
                        echo "<td style='padding-left: 10px;'>" . $formatted_audit_date . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No data found</td></tr>";
                }
                ?>
                </tbody>
            </table>
            </div>
            <!-- /Display DataTable -->
        </div>
    </div>





    <!-- ----- below is gawa ko para sa pag crop ng picture. ref ko si fb -->
    <!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#cropImage" >Launch basic modal</button> -->
    <div class="modal fade" id="cropImage" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile Picture</h5>
                    <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span class="fas fa-times fs--1"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" id="inputImage" accept="image/*" hidden>
                    <div class="text-center">
                        <img id="image" src="../../uploads/<?php echo $profile;?>" class="img-fluid" alt="Your Image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="changeProfileButton">Change Profile Photo</button>
                    <button class="btn btn-warning" id="changeProfileButtonagain" style="display: none;">Change Profile Photo</button>
                    <button class="btn btn-primary" id="cropButton" style="display: none;">Save</button>
                    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <!-- update_info -->
    <div class="modal fade" id="update_info" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="../../PHP - process_files/update_user_info.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile Information</h5>
                        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span class="fas fa-times fs--1"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-floating mb-2">
                                    <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>">
                                    <label for="fname">First name:</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mb-2">
                                    <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>">
                                    <label for="lname">Last name:</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- update password -->
    <div class="modal fade" id="update_pw" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="../../PHP - process_files/update_user_pw.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
                        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span class="fas fa-times fs--1"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-floating mb-2">
                                    <input type="password" name="old_pw" id="old_pw" class="form-control">
                                    <label for="fname">Old Password</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mb-2">
                                    <input type="password" name="new_pw" id="new_pw" class="form-control">
                                    <label for="lname">New Password</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mb-2">
                                    <input type="password" name="confirm_pw" class="form-control">
                                    <label for="lname">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" disabled>Save</button>
                        <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
    <div class="toast fade text-white" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto text-white">Bootstrap</strong>
            <small class="text-800 text-white">11 mins ago</small>
            <button class="btn ms-2 p-0" type="button" data-bs-dismiss="toast" aria-label="Close">
                <span class="uil uil-times fs-1"></span>
            </button>
        </div>
        <div class="toast-body text-white">Hello, world! This is a toast message.</div>
    </div>
</div>

<script src="../../vendors/cropperJS/cropper.min.js"></script>
<script src="script.js"></script>
<script>
const inputImage = document.getElementById("inputImage");
const changeProfileButton = document.getElementById("changeProfileButton");
const cropButton = document.getElementById("cropButton");
const changeProfileButtonAgain = document.getElementById("changeProfileButtonagain");

inputImage.addEventListener("change", function() {
  if (inputImage.files.length > 0 && inputImage.files[0].type.startsWith("image/")) {
    changeProfileButton.style.display = "none";
    cropButton.style.display = "block";
    changeProfileButtonagain.style.display = "block";
  } else {
    changeProfileButton.style.display = "block";
    cropButton.style.display = "none";
  }
});

document.getElementById("changeProfileButton").addEventListener("click", function() {
  inputImage.click();
});
document.getElementById("changeProfileButtonagain").addEventListener("click", function() {
  inputImage.click();
});
</script>