<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="mb-9" id="actualContent" style="display: none;">
  <div class="row g-2 mb-4">
    <div class="col-auto">
      <h2 class="mb-0">Employee/ Users</h2>
    </div>
  </div>
  <div id="products" data-list='{"valueNames":["user","email","username","position","branch","address","contact"],"page":10,"pagination":true}'>
    <div class="mb-4">
      <div class="row g-3">
        <div class="col-auto">
          <div class="search-box">
            <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search users" aria-label="Search" />
              <span class="fas fa-search search-box-icon"></span>
            </form>
          </div>
        </div>
        <div class="col-auto mb-4">
          <a href="../AddUsers/" class="btn btn-primary"><span class="fas fa-plus me-2"></span>Add users</button></a>
          <!-- <a class="btn btn-link text-900 me-4 px-0" href="../print/employees/" id="printButton" onclick="window.open(this.href, '_blank'); return false;"><span class="fa-solid fa-print fs--1 me-2"></span>Print</a> -->
      </div>
    </div>
    <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
      <div class="table-responsive scrollbar-overlay mx-n1 px-1">
        <table class="table table-sm fs--1 mb-0">
          <thead>
            
            <tr>
              <!-- <th class="white-space-nowrap fs--1 align-middle ps-0">
                <div class="form-check mb-0 fs-0"><input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox" data-bulk-select='{"body":"customers-table-body"}' /></div>
              </th> -->
              <th class="white-space-nowrap fs--1 align-middle ps-0"></th>
              <th class="sort text-start" scope="col" data-sort="user" colspan="2">FULLNAME</th>
              <th class="sort text-start" scope="col" data-sort="email">EMAIL</th>
              <th class="sort text-start" scope="col" data-sort="username">USERNAME</th>
              <th class="sort text-start" scope="col" data-sort="position">Position</th>
              <th class="sort text-start" scope="col" data-sort="branch">BRANCH ASSIGNED</th>
              <th class="sort text-start" scope="col" data-sort="address">Address</th><!--Address ng User mismo-->
              <th class="sort text-start" scope="col" data-sort="contact">CONTACT NO.</th>
              <th class="sort text-start" scope="col" data-sort="status">STATUS</th>
              <th class="sort text-start" scope="col"></th>
            </tr>
          </thead>
          <tbody class="list" id="customers-table-body">
          <?php 
$sql = "SELECT user.*, branch.brn_name 
        FROM user 
        LEFT JOIN branch ON user.user_brn_code = branch.brn_code 
        WHERE user.user_position != 'System Developer'
        ORDER BY user.id DESC";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_id = $row['id'];
        $user_profileImg = $row['user_img'];
        $user_fname = ucwords(strtolower($row['user_fname']));
        $user_mname = ucwords(strtolower($row['user_mname']));
        $user_lname = ucwords(strtolower($row['user_lname']));
        $username = $row['username'];
        $full_name = ucwords(strtolower($user_fname . " " . $user_lname));
        $user_password = $row['user_password'];
        $user_position = ucwords(strtolower($row['user_position']));
        $user_email = $row['user_email'];
        $user_contact = $row['user_contact'];
        $user_status = $row['user_status'];
        $user_otp = $row['user_otp'];
        $user_address1 = ucwords(strtolower($row['user_address']));
        $user_brgy = ucwords(strtolower($row['user_brgy']));
        $user_municipality = ucwords(strtolower($row['user_municipality']));
        $user_province = ucwords(strtolower($row['user_province']));
        $brn_code = $row['user_brn_code'];
        $branch_name = $row['brn_name'];
                  if($user_status == 0) {
                  $user_status_final = "<span class='badge badge-phoenix fs--2 badge-phoenix-success'>Activated</span>";
                  }
                  if($user_status == 1) {
                  $user_status_final = "<span class='badge badge-phoenix fs--2 badge-phoenix-danger'>Deactivated</span>";
                  }

            ?>
            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
              <!-- <td class="fs--1 align-middle ps-0 py-3">
                <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Carry Anna"},"email":"annac34@gmail.com","city":"Budapest","totalOrders":89,"totalSpent":23987,"lastSeen":"34 min ago","lastOrder":"Dec 12, 12:56 PM"}' /></div>
              </td> -->
              <td class="white-space-nowrap fs--1 align-middle p-0" style="max-width: 10px;">
                  <span class="far fa-dot-circle m-0 p-0 fs--1 text-success"></span>
                </td>
                <td><div class="avatar avatar-m"><img class="rounded-circle" src="../../uploads/<?php echo $user_profileImg;?>" alt="" /></div></td>
              <td class="user align-middle white-space-nowrap pe-5">
    
                  <p class="mb-0 ms-3 text-1100 fw-bold"><?php echo $full_name;?></p>
                
                        
              </td>
              <td class="email"><?php echo $user_email;?></td>
              <td class="username"><?php echo $username;?></td>
              <td class="position"><?php echo $user_position;?></td>
              <td class="branch"><?php echo $branch_name;?></td>
              <td class="address"><?php echo $user_address1 . ", " . $user_brgy . ", " . $user_municipality . ", " . $user_province  ;?></td>
              <td class="contact"><?php echo $user_contact;?></td>
              <td class="status"><?php echo $user_status_final;?></td>
              <td class="align-middle text-end white-space-nowrap pe-0 action">
                <div class="font-sans-serif btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                  <div class="dropdown-menu dropdown-menu-end py-2">
                    <?php 
                    if($user_status == 0){
                    ?>
                    <a class="dropdown-item" href="../../PHP - process_files/deactivateuser.php?user_id=<?php echo $user_id;?>">Deactivate</a>
                    <?php 
                    } else {
                    ?>
                    <a class="dropdown-item" href="../../PHP - process_files/activateuser.php?user_id=<?php echo $user_id;?>">Activate</a>
                    <?php 
                    }
                    ?>
                    <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#promote_<?php echo $user_id;?>">Change User Position</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="../process/archiveuser.php?user_id=<?php echo $user_id;?>">Remove</a>
                  </div>
                </div>
              </td>
            </tr>
            <?php
                }
              }
            ?>
            
            
            
          </tbody>
        </table>
      </div>
      <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
        <div class="col-auto d-flex">
          <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
        </div>
        <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
          <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
$modal_sql = "SELECT user.*, branch.brn_name 
        FROM user 
        LEFT JOIN branch ON user.user_brn_code = branch.brn_code 
        ORDER BY user.id DESC";

$modal_result = $conn->query($modal_sql);
if ($modal_result->num_rows > 0) {
    while ($row = $modal_result->fetch_assoc()) {
        $modal_user_id = $row['id'];
        $modal_user_profileImg = $row['user_img'];
        $modal_user_fname = ucwords(strtolower($row['user_fname']));
        $modal_user_mname = ucwords(strtolower($row['user_mname']));
        $modal_user_lname = ucwords(strtolower($row['user_lname']));
        $modal_username = $row['username'];
        $modal_full_name = ucwords(strtolower($user_fname . " " . $user_lname));
        $modal_user_password = $row['user_password'];
        $modal_user_position = ucwords(strtolower($row['user_position']));
        $modal_user_email = $row['user_email'];
        $modal_user_contact = $row['user_contact'];
        $modal_user_status = $row['user_status'];
        $modal_user_otp = $row['user_otp'];
        $modal_user_address1 = ucwords(strtolower($row['user_address']));
        $modal_user_brgy = ucwords(strtolower($row['user_brgy']));
        $modal_user_municipality = ucwords(strtolower($row['user_municipality']));
        $modal_user_province = ucwords(strtolower($row['user_province']));
        $modal_brn_code = $row['user_brn_code'];
        $modal_branch_name = $row['brn_name'];
                  if($user_status == 0) {
                  $user_status_final = "<span class='badge badge-phoenix fs--2 badge-phoenix-success'>Activated</span>";
                  }
                  if($user_status == 1) {
                  $user_status_final = "<span class='badge badge-phoenix fs--2 badge-phoenix-danger'>Deactivated</span>";
                  }
?>
<div class="modal fade" id="promote_<?php echo $modal_user_id;?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form action="../../PHP - process_files/change_position.php?user_id=<?php echo $modal_user_id;?>" method="POST">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change position of <?php echo $modal_user_fname . " " . $modal_user_lname;?></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-floating mb-3">
              <select name="user_position" class="form-select" id="">
                <option value="<?php echo $modal_user_position;?>"><?php echo $modal_user_position;?></option>
                <?php 
                $position_Sql = "SELECT * FROM groups WHERE position_name != '$modal_user_position'";
                $position_Res = $conn->query($position_Sql);
                if($position_Res->num_rows > 0){
                    while($row = $position_Res->fetch_assoc()){
                        echo '<option value="' . $row['position_name'] . '">' . $row['position_name'] . '</option>';
                    }
                } else {
                    echo '<option value="">No data</option>';
                }
                ?>


              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer"><button class="btn btn-primary" type="submit">Okay</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
    </div>
    </form>
  </div>
</div>
<?php
  }
}
?>