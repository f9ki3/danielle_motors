<?php
function getUserData($conn) {
    $sql = "SELECT * FROM user WHERE id = 11";
    $result = $conn->query($sql);

    $data = []; // Initialize an empty array to store the data

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            // Store the data in an associative array
            $data[] = [
                "id" => $row["id"],
                "user_img" => $row["user_img"],
                "username" => $row["username"],
                "user_fname" => $row["user_fname"],
                "user_mname" => $row["user_mname"],
                "user_lname" => $row["user_lname"],
                "user_password" => $row["user_password"],
                "user_position" => $row["user_position"],
                "user_email" => $row["user_email"],
                "user_contact" => $row["user_contact"],
                "user_status" => $row["user_status"],
                "user_otp" => $row["user_otp"],
                "user_address" => $row["user_address"],
                "user_brgy" => $row["user_brgy"],
                "user_municipality" => $row["user_municipality"],
                "user_province" => $row["user_province"],
                "user_postalcode" => $row["user_postalcode"],
                "user_account_type" => $row["user_account_type"],
                "online" => $row["online"],
                "user_brn_code" => $row["user_brn_code"]
            ];
        }
    } else {
        echo "0 results";
    }
    return $data;
}

// Call the function and store the data in a variable
$userData = getUserData($conn);

// Now $userData can be accessed anywhere on the page
?>


<div class="support-chat-container">
<div class="container-fluid support-chat">
    <div class="card bg-white">
    <div class="card-header d-flex flex-between-center px-4 py-3 border-bottom">
        <h5 class="mb-0 d-flex align-items-center gap-2"><?php echo $userData[0]["user_fname"]. ' '; ?><?php echo $userData[0]["user_lname"]; ?><span class="fa-solid fa-circle text-success fs--3"></span></h5>
        <div class="btn-reveal-trigger"><button class="btn btn-link p-0 dropdown-toggle dropdown-caret-none transition-none d-flex" type="button" id="support-chat-dropdown" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h text-900"></span></button>
        <div class="dropdown-menu dropdown-menu-end py-2" aria-labelledby="support-chat-dropdown"><a class="dropdown-item" href="#!">Request a callback</a><a class="dropdown-item" href="#!">Search in chat</a><a class="dropdown-item" href="#!">Show history</a><a class="dropdown-item" href="#!">Report to Admin</a><a class="dropdown-item btn-support-chat" href="#!">Close Support</a></div>
        </div>
    </div>
    <div class="card-body chat p-0">
        <div class="d-flex flex-column-reverse scrollbar h-100 p-3">
        <!-- <div class="text-end mt-6"><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
            <p class="mb-0 fw-semi-bold fs--1">I need help with something</p><span class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
            </a><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
            <p class="mb-0 fw-semi-bold fs--1">I can’t reorder a product I previously ordered</p><span class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
            </a><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
            <p class="mb-0 fw-semi-bold fs--1">How do I place an order?</p><span class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
            </a><a class="false d-inline-flex align-items-center text-decoration-none text-1100 hover-bg-soft rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
            <p class="mb-0 fw-semi-bold fs--1">My payment method not working</p><span class="fa-solid fa-paper-plane text-primary fs--1 ms-3"></span>
            </a></div> -->
        <div class="text-center mt-auto">
            <div class="avatar avatar-3xl status-online"><img class="rounded-circle border border-3 border-white" src="../../uploads/<?php echo $userData[0]["user_img"]; ?>" alt="" /></div>
            <h5 class="mt-2 mb-3"><?php echo $userData[0]["user_fname"]; ?></h5>
            <p class="text-center text-black mb-0">Ask us anything – we’ll get back to you here or by email within 24 hours.</p>

            <!-- sakin na message -->
            <div class="d-flex chat-message">
                    <div class="d-flex mb-2 justify-content-end flex-1">
                      <div class="w-100 w-xxl-75">
                        <div class="d-flex flex-end-center hover-actions-trigger">
                          <div class="d-sm-none hover-actions align-self-center me-2 start-0">
                            <div class="bg-white rounded-pill d-flex align-items-center border border-300 px-2 actions"><button class="btn p-2" type="button"><span class="fa-solid fa-reply text-primary"></span></button><button class="btn p-2" type="button"><span class="fa-solid fa-pen-to-square text-primary"></span></button><button class="btn p-2" type="button"><span class="fa-solid fa-trash text-primary"></span></button><button class="btn p-2" type="button"><span class="fa-solid fa-share text-primary"></span></button><button class="btn p-2" type="button"><span class="fa-solid fa-face-smile text-primary"></span></button></div>
                          </div>
                          <div class="d-none d-sm-flex">
                            <div class="hover-actions position-relative align-self-center"><button class="btn p-2 fs--2"><span class="fa-solid fa-reply text-primary"></span></button><button class="btn p-2 fs--2"><span class="fa-solid fa-pen-to-square text-primary"></span></button><button class="btn p-2 fs--2"><span class="fa-solid fa-share text-primary"></span></button><button class="btn p-2 fs--2"><span class="fa-solid fa-trash text-primary"></span></button><button class="btn p-2 fs--2"><span class="fa-solid fa-face-smile text-primary"></span></button></div>
                          </div>
                          <div class="chat-message-content me-2">
                            <div class="mb-1 sent-message-content light bg-primary rounded-2 p-3 text-white">
                              <p class="mb-0">If Peter Piper picked a peck of pickled peppers, where’s the peck of pickled peppers Peter Piper picked?</p>
                            </div>
                          </div>
                        </div>
                        <div class="text-end">
                          <p class="mb-0 fs--2 text-600 fw-semi-bold">Yesterday, 10 AM</p>
                        </div>
                      </div>
                    </div>
            </div>

            <!-- sa kausap ko -->
            <div class="d-flex chat-message">
                    <div class="d-flex mb-2 flex-1">
                      <div class="w-100 w-xxl-75">
                        <div class="d-flex hover-actions-trigger">
                          <div class="avatar avatar-m me-3 flex-shrink-0"><img class="rounded-circle" src="../../uploads/<?php echo $userData[0]["user_img"]; ?>" alt="" /></div>
                          <div class="chat-message-content received me-2">
                            <div class="mb-1 received-message-content border rounded-2 p-3">
                              <p class="mb-0">Peter Piper picked a peck of pickled peppers. A peck of pickled peppers Peter Piper picked.</p>
                            </div>
                          </div>
                          <div class="d-none d-sm-flex">
                            <div class="hover-actions position-relative align-self-center me-2"><button class="btn p-2 fs--2"><span class="fa-solid fa-reply"></span></button><button class="btn p-2 fs--2"><span class="fa-solid fa-trash"></span></button><button class="btn p-2 fs--2"><span class="fa-solid fa-share"></span></button><button class="btn p-2 fs--2"><span class="fa-solid fa-face-smile"></span></button></div>
                          </div>
                          <div class="d-sm-none hover-actions align-self-center me-2 end-0">
                            <div class="bg-white rounded-pill d-flex align-items-center border border-300 px-2 actions"><button class="btn p-2" type="button"><span class="fa-solid fa-reply text-primary"></span></button><button class="btn p-2" type="button"><span class="fa-solid fa-trash text-primary"></span></button><button class="btn p-2" type="button"><span class="fa-solid fa-share text-primary"></span></button><button class="btn p-2" type="button"><span class="fa-solid fa-face-smile text-primary"></span></button></div>
                          </div>
                        </div>
                        <p class="mb-0 fs--2 text-600 fw-semi-bold ms-7">Yesterday, 10 AM</p>
                      </div>
                    </div>
                  </div>
        </div>
        </div>
    </div>
    <div class="card-footer d-flex align-items-center gap-2 border-top ps-3 pe-4 py-3">
        <div class="d-flex align-items-center flex-1 gap-3 border rounded-pill px-4"><input id="messageInput" class="form-control outline-none border-0 flex-1 fs--1 px-0" type="text" placeholder="Write message" />
    <label class="btn btn-link d-flex p-0 text-500 fs--1 border-0" for="supportChatPhotos"><span class="fa-solid fa-image"></span></label><input class="d-none" type="file" accept="image/*" id="supportChatPhotos" />
    <label class="btn btn-link d-flex p-0 text-500 fs--1 border-0" for="supportChatAttachment"> <span class="fa-solid fa-paperclip"></span></label>
    <input class="d-none" type="file" id="supportChatAttachment" /></div><button id="sendMessageBtn" class="btn p-0 border-0 send-btn"><span class="fa-solid fa-paper-plane fs--1"></span></button>
    </div>
    </div>
</div><button class="btn p-0 border border-200 btn-support-chat"><span class="fs-0 btn-text text-primary text-nowrap">Chat demo</span><span class="fa-solid fa-circle text-success fs--1 ms-2"></span><span class="fa-solid fa-chevron-down text-primary fs-1"></span></button>
</div>

<script>
document.getElementById("sendMessageBtn").addEventListener("click", function() {
    var message = document.getElementById("messageInput").value;
    
    // Send the message using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../php/send_message.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Handle the response from the server
                console.log(xhr.responseText);
            } else {
                // Handle errors
                console.error("Error: " + xhr.status);
            }
        }
    };
    xhr.send("message=" + encodeURIComponent(message));
});
</script>
