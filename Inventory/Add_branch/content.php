<?php
if(isset($_GET['branchname'])){
    $brn_name = $_GET['branchname'];
} else if(!isset($_GET['branchname'])){
    $brn_name = "";
}
if(isset($_GET['email'])){
    $email = $_GET['email'];
} else if(!isset($_GET['email'])){
    $email = "";
}
if(isset($_GET['telnum'])){
    $telnum = $_GET['telnum'];
} else if(!isset($_GET['telnum'])){
    $telnum = "";
}
?>
<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
<nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Maintenance</a></li>
            <li class="breadcrumb-item active">Add Branch</li>
        </ol>
    </nav>
<div class="mb-4">
    <?php
    if(isset($_GET['error'])){
        if($_GET['error'] === "1fVjhhUJKHD12378"){
    ?>
    <div class="row">
        <div class="col-md-9">
        <div class="alert alert-outline-danger d-flex align-items-center" role="alert">
            <span class="fas fa-times-circle text-danger fs-3 me-3"></span>
            <p class="mb-0 flex-1">Email Already Taken</p>
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
        <form class="row g-3 mb-6" id="myForm" action="../../PHP - process_files/addbranch.php" method="POST">
            <div class="col-sm-6 col-md-12">
            <div class="form-floating"><input class="form-control" id="floatingInputGrid" name="brn_name" type="text" placeholder="Project title" value="<?php echo $brn_name;?>" required/><label for="floatingInputGrid">Branch Name</label></div>
            </div>
            <div class="col-sm-6 col-md-6">
            <div class="form-floating"><select class="form-select" id="region" name="region" required>
                <option selected="selected">Select region</option>
                </select><label for="floatingSelectTask">Region</label></div>
            </div>
            <div class="col-sm-6 col-md-6">
            <div class="form-floating"><select class="form-select" id="province" name="province" required>
                <option selected="selected">Select province</option>
                <option value="1">technical</option>
                <option value="2">external</option>
                <option value="3">organizational</option>
                </select><label for="floatingSelectTask">Province</label></div>
            </div>
            <div class="col-sm-6 col-md-6">
            <div class="form-floating"><select class="form-select" id="municipality" name="municipality" required>
                <option selected="selected">Select municipality</option>
                </select><label for="floatingSelectPrivacy">Municipality</label></div>
            </div>
            <div class="col-sm-6 col-md-6">
            <div class="form-floating"><select class="form-select" id="brgy" name="brgy" required>
                <option selected="selected">Select barangay</option>
                </select><label for="floatingSelectTeam">Barangay </label></div>
            </div>
            <div class="col-sm-6 col-md-8">
            <div class="form-floating"><input class="form-control" name="address_line1" id="floatingInputGrid" type="text" placeholder="Project title" required /><label for="floatingInputGrid">Street name</label></div>
            </div>
            <div class="col-sm-6 col-md-4">
            <div class="form-floating"><select class="form-select" name="status" id="floatingSelectAdmin" required>
                <option selected="selected">Select status</option>
                <option value="1">Active</option>
                <option value="2">Disabled</option>
                </select><label for="floatingSelectAdmin">Status</label></div>
            </div>
            <div class="col-sm-6 col-md-6">
            <div class="flatpickr-input-container">
                <div class="form-floating"><input class="form-control" name="email" id="email" type="email" placeholder="Project title" value="<?php echo $email;?>" required /><label for="floatingInputGrid">Branch Email</label></div>
            </div>
            </div>
            <div class="col-sm-6 col-md-6">
            <div class="flatpickr-input-container">
                <div class="form-floating"><input class="form-control" name="contact" id="contactInput" type="text" placeholder="Project title" value="<?php echo $telnum;?>" required/><label for="floatingInputGrid">Contact No.</label></div>
            </div>
            </div>
            
            <div class="col-12 gy-6">
            <div class="row g-3 justify-content-end">
                <div class="col-auto"><button class="btn btn-phoenix-primary px-5">Cancel</button></div>
                <div class="col-auto"><button type="submit" class="btn btn-primary px-5 px-sm-15" id="submitBtn">Add Branch</button></div>
            </div>
            </div>
        </form>
        <!-- Modal for blocking overlay -->
        <div class="modal" id="loadingModal" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content loading">
                <div class="modal-body text-center">
                    <div class="spinner-grow text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        </div>
    </div>
</div>
</div>