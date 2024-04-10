
  <?php 
include '../config/config.php';
include '../admin/session.php';

// Fetch chat messages from the database
$sql = "SELECT * FROM chat_messages where (to_user_id='$user_id' or from_user_id='$user_id') ORDER BY id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $from = $row['from_user_id'];
        $to = $row['to_user_id'];
        $initial_message = $row['message'];
        $date = $row['date_sent'];
        if($from == $user_id ){
          $message = '
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
                              <p class="mb-0">' . $initial_message . '</p>
                            </div>
                          </div>
                        </div>
                        <div class="text-end">
                          <p class="mb-0 fs--2 text-600 fw-semi-bold">'.$date.'</p>
                        </div>
                      </div>
                    </div>
                  </div>
          ';
        } elseif($to == $user_id) {
          $message =  '
          <div class="d-flex chat-message">
                    <div class="d-flex mb-2 flex-1">
                      <div class="w-100 w-xxl-75">
                        <div class="d-flex hover-actions-trigger">
                          <div class="avatar avatar-m me-3 flex-shrink-0"><img class="rounded-circle" src="../assets/img/team/57.webp" alt="" /></div>
                          <div class="chat-message-content received me-2">
                            <div class="mb-1 received-message-content border rounded-2 p-3">
                              <p class="mb-0">' . $initial_message . '</p>
                            </div>
                          </div>
                          <div class="d-none d-sm-flex">
                            <div class="hover-actions position-relative align-self-center me-2"><button class="btn p-2 fs--2"><span class="fa-solid fa-reply"></span></button><button class="btn p-2 fs--2"><span class="fa-solid fa-trash"></span></button><button class="btn p-2 fs--2"><span class="fa-solid fa-share"></span></button><button class="btn p-2 fs--2"><span class="fa-solid fa-face-smile"></span></button></div>
                          </div>
                          <div class="d-sm-none hover-actions align-self-center me-2 end-0">
                            <div class="bg-white rounded-pill d-flex align-items-center border border-300 px-2 actions"><button class="btn p-2" type="button"><span class="fa-solid fa-reply text-primary"></span></button><button class="btn p-2" type="button"><span class="fa-solid fa-trash text-primary"></span></button><button class="btn p-2" type="button"><span class="fa-solid fa-share text-primary"></span></button><button class="btn p-2" type="button"><span class="fa-solid fa-face-smile text-primary"></span></button></div>
                          </div>
                        </div>
                        <p class="mb-0 fs--2 text-600 fw-semi-bold ms-7">'.$date.'</p>
                      </div>
                    </div>
                  </div>
          ';
        }

        echo $message;
    }
} else {
    echo "0 results";
}
$conn->close();

?>

<!-- 


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

            <!-- left id=11-->
            <!-- <div class="d-flex chat-message">
                    <div class="d-flex mb-2 flex-1">
                      <div class="w-100 w-xxl-75">
                        <div class="d-flex hover-actions-trigger">
                          <div class="avatar avatar-m me-3 flex-shrink-0"><img class="rounded-circle" src="../../uploads/<?php //echo $userData[0]["user_img"]; ?>" alt="" /></div>
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
            </div>  -->