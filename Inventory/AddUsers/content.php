<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
    <?php 
    if(isset($_GET['duplicate_email'])){
        if($_GET['duplicate_email'] === "true"){
    ?>
    <div class="row">
        <div class="col-md-9">
            <div class="alert alert-outline-danger d-flex align-items-center" role="alert">
                <span class="fas fa-times-circle text-danger fs-3 me-3"></span>
                <p class="mb-0 flex-1">Username/Email Already Taken</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>
    <div class="row">
        <div class="col-xl-9">
            <form class="row g-3 mb-6" id="myForm" action="../../PHP - process_files/add_user.php" method="POST">
                <div class="col-sm-6 col-md-4">
                <div class="form-floating"><input class="form-control" id="floatingInputGrid" type="text" placeholder="Project title" name="user_fname" required /><label for="floatingInputGrid">First Name</label></div>
                </div>
                <div class="col-sm-6 col-md-4">
                <div class="form-floating"><input class="form-control" id="floatingInputGrid" type="text" placeholder="Project title" name="user_mname" required /><label for="floatingInputGrid">Middle Name</label></div>
                </div>
                <div class="col-sm-6 col-md-4">
                <div class="form-floating"><input class="form-control" id="floatingInputGrid" type="text" placeholder="Project title" name="user_lname" required /><label for="floatingInputGrid">Last Name</label></div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="form-floating"><select class="form-select" id="region" name="region" required>
                    </select><label for="floatingSelectTask">Region</label></div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="form-floating"><select class="form-select" id="province" name="user_province" required>
                    </select><label for="floatingSelectTask">Province</label></div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="form-floating"><select class="form-select" id="municipality" name="user_municipality" required>
                    </select><label for="floatingSelectPrivacy">Municipality</label></div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="form-floating"><select class="form-select" id="brgy" name="user_brgy" required>
                    </select><label for="floatingSelectTeam">Barangay </label></div>
                </div>
                <div class="col-sm-6 col-md-5">
                <div class="form-floating"><input class="form-control" id="floatingInputGrid" type="text" placeholder="Project title" name="user_address1" required /><label for="floatingInputGrid">House #/ Street name</label></div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-floating">
                        <select class="form-select" name="account_type" id="">
                            <option value="0">Inventory</option>
                            <option value="1">Sales</option>
                        </select>
                        <label for="">Account Type</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                <div class="form-floating"><select class="form-select" id="floatingSelectAdmin" name="brn_code" required>
                    <option selected="selected" value="">Select branch</option>
                    <?php
                    $brn_select = "SELECT brn_code, brn_name FROM branch";
                    $res = mysqli_query($conn, $brn_select); // Corrected variable name
                    if (!$res) {
                        die("Database query failed: " . mysqli_error($connection));
                    }

                    while ($row = mysqli_fetch_assoc($res)) {
                        // Output an option for each branch
                        echo '<option value="' . $row['brn_code'] . '">' . $row['brn_name'] . '</option>';
                    }

                    mysqli_free_result($res); // Free the result set
                    ?>

                    </select><label for="floatingSelectAdmin">Branch Assigned</label></div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="form-floating"><select class="form-select" id="floatingSelectAdmin" name="user_position" required>
                    <option value="" selected="selected">Select position</option>
                    <?php 
                    $user_position_sql = "SELECT position_name FROM `groups` ORDER BY position_name ASC";
                    $user_position_res = $conn->query($user_position_sql);
                    if($user_position_res->num_rows>0){
                        while($position_row = $user_position_res->fetch_assoc()){
                            echo '<option value="' . ucwords(strtolower($position_row['position_name'])) . '">' . ucwords(strtolower($position_row['position_name'])) . '</option>';
                        }
                    }
                    ?>
                    </select><label for="floatingSelectAdmin">Company Position</label></div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="flatpickr-input-container">
                    <div class="form-floating"><input class="form-control" type="email" id="email" type="text" placeholder="Project title" name="user_email" required /><label for="floatingInputGrid">Email</label><span id="email-error" style="color: red;"></span></div>
                </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-floating"><input class="form-control" type="text" id="username" type="text" placeholder="Project title" name="user_name" required /><label for="floatingInputGrid">Username</label><span id="email-error" style="color: red;"></span></div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="flatpickr-input-container">
                    <div class="form-floating"><input class="form-control" id="contactInput" type="text" placeholder="Project title" name="user_contact" required/><label for="floatingInputGrid">Contact No.</label></div>
                </div>
                </div>
                
                <div class="col-12 gy-6">
                <div class="row g-3 justify-content-end">
                    <div class="col-auto"><a href="../User_Maintenance/" class="btn btn-phoenix-primary px-5">Cancel</a></div>
                    <div class="col-auto"><button name="submit" type="submit" class="btn btn-primary px-5 px-sm-15" id="submitBtn">Add User</button></div>
                </div>
                </div>
            </form>
        <!-- Modal for blocking overlay -->
            <div class="modal" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content loading">
                    <div class="modal-body text-center">
                    <div class="spinner-grow text-success custom-spinner" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- loading spinner -->
<script>
    const form = document.getElementById('myForm');
    const loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));

    form.addEventListener('submit', function(event) {
    // Prevent the default form submission
    event.preventDefault();

    // Show the loading modal
    loadingModal.show();

    // Simulate form submission delay (replace with actual submission logic)
    setTimeout(() => {
        // Hide the loading modal after submission is complete
        loadingModal.hide();
        // You can also submit the form using form.submit() here if needed
        form.submit();
    }, 2000); // Simulated delay of 2 seconds, replace with your actual form submission logic
    });
</script>