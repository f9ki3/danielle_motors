<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div id="actualContent" class="mb-9" style="display: none;">
    <!-- Chat Sidebar -->
    <div class="chat d-flex phoenix-offcanvas-container pt-1 mt-n1 mb-9">
        <div class="card p-3 p-xl-1 mt-xl-n1 chat-sidebar me-3 phoenix-offcanvas phoenix-offcanvas-start" id="chat-sidebar">
            <button class="btn d-none d-sm-block d-xl-none mb-2" data-bs-toggle="modal" data-bs-target="#chatSearchBoxModal">
                <span class="fa-solid fa-magnifying-glass text-600 fs-1"></span>
            </button>
            <div class="d-none d-sm-block d-xl-none mb-5">
                <button class="btn w-100 mx-auto" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                    <span class="fa-solid fa-bars text-600 fs-1"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end p-0">
                    <li><a class="dropdown-item" href="#!">All</a></li>
                    <li><a class="dropdown-item" href="#!">Read</a></li>
                    <li><a class="dropdown-item" href="#!">Unread</a></li>
                </ul>
            </div>
            <!-- Chat Search Box -->
            <div class="form-icon-container mb-4 d-sm-none d-xl-block">
                <input class="form-control form-icon-input" type="text" placeholder="People, Groups and Messages" />
                <span class="fas fa-user text-900 fs--1 form-icon"></span>
            </div>
            <!-- Chat Thread Tabs -->
            <ul class="nav nav-phoenix-pills mb-5 d-sm-none d-xl-flex" id="contactListTab" data-chat-thread-tab="data-chat-thread-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link cursor-pointer active" data-bs-toggle="tab" data-chat-thread-list="all" role="tab" aria-selected="true">All</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link cursor-pointer" data-bs-toggle="tab" role="tab" data-chat-thread-list="read" aria-selected="false">Read</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link cursor-pointer" data-bs-toggle="tab" role="tab" data-chat-thread-list="unread" aria-selected="false">Unread</a>
                </li>
            </ul>
            <div class="scrollbar">
                <!-- Chat Threads -->
                <div class="tab-content" id="contactListTabContent">
                    <div data-chat-thread-tab-content="data-chat-thread-tab-content">
                        <ul class="nav chat-thread-tab flex-column list" id="chat_threads_list">
                            
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <!-- Chat Content -->
        <div class="chat-content tab-content flex-1">
            <div class="tab-pane h-100 fade active show" id="tab-thread-1" role="tabpanel" aria-labelledby="tab-thread-1">
                <div class="card flex-1 h-100 phoenix-offcanvas-container">
                    <!-- Chat Header -->
                    <div class="card-header p-3 p-md-4 d-flex flex-between-center">
                        <div class="d-flex align-items-center">
                            <button class="btn ps-0 pe-2 text-700 d-sm-none" data-phoenix-toggle="offcanvas" data-phoenix-target="#chat-sidebar"><span class="fa-solid fa-chevron-left"></span></button>
                            <div class="d-flex flex-column flex-md-row align-items-md-center">
                                <button class="btn fs-1 fw-semi-bold text-1100 d-flex align-items-center p-0 me-3 text-start" data-phoenix-toggle="offcanvas" data-phoenix-target="#thread-details-0"><span class="line-clamp-1">Sharuka Nijibum</span><span class="fa-solid fa-chevron-down ms-2 fs--2"></span></button>
                                <p class="fs--1 mb-0 me-2"> <span class="fa-solid fa-circle text-success fs--3 me-2"></span>Active now</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-icon btn-primary me-1"><span class="fa-solid fa-phone"></span></button>
                            <button class="btn btn-icon btn-primary me-1"><span class="fa-solid fa-video"></span></button>
                            <button class="btn btn-icon btn-phoenix-primary" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-ellipsis-vertical"></span></button>
                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                <li><a class="dropdown-item" href="#!">Add to favourites</a></li>
                                <li><a class="dropdown-item" href="#!">View profile</a></li>
                                <li><a class="dropdown-item" href="#!">Report</a></li>
                                <li><a class="dropdown-item" href="#!">Manage notifications</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Chat Body -->
                    <div class="card-body p-3 p-sm-4 scrollbar">
                        <!-- Chat Messages -->
                        <div class="d-flex chat-message">
                            <!-- Received Message -->
                            <div class="d-flex mb-2 flex-1">
                                <div class="w-100 w-xxl-75">
                                    <div class="d-flex hover-actions-trigger">
                                        <div class="avatar avatar-m me-3 flex-shrink-0"><img class="rounded-circle" src="../../assets/img/team/20.webp" alt="" /></div>
                                        <div class="chat-message-content received me-2">
                                            <div class="mb-1 received-message-content border rounded-2 p-3">
                                                <p class="mb-0">I have got a date at a quarter to eight; I’ll see you at the gate, so don’t be late.</p>
                                            </div>
                                        </div>
                                        <div class="d-none d-sm-flex">
                                            <div class="hover-actions position-relative align-self-center me-2">
                                                <button class="btn p-2 fs--2"><span class="fa-solid fa-reply"></span></button>
                                                <button class="btn p-2 fs--2"><span class="fa-solid fa-trash"></span></button>
                                                <button class="btn p-2 fs--2"><span class="fa-solid fa-share"></span></button>
                                                <button class="btn p-2 fs--2"><span class="fa-solid fa-face-smile"></span></button>
                                            </div>
                                        </div>
                                        <div class="d-sm-none hover-actions align-self-center me-2 end-0">
                                            <div class="bg-white rounded-pill d-flex align-items-center border border-300 px-2 actions">
                                                <button class="btn p-2" type="button"><span class="fa-solid fa-reply text-primary"></span></button>
                                                <button class="btn p-2" type="button"><span class="fa-solid fa-trash text-primary"></span></button>
                                                <button class="btn p-2" type="button"><span class="fa-solid fa-share text-primary"></span></button>
                                                <button class="btn p-2" type="button"><span class="fa-solid fa-face-smile text-primary"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-0 fs--2 text-600 fw-semi-bold ms-7">Yesterday, 10 AM</p>
                                </div>
                            </div>
                        </div>
                        <!-- Sent Message -->
                        <div class="d-flex chat-message">
                            <div class="d-flex mb-2 justify-content-end flex-1">
                                <div class="w-100 w-xxl-75">
                                    <div class="d-flex flex-end-center hover-actions-trigger">
                                        <div class="d-sm-none hover-actions align-self-center me-2 start-0">
                                            <div class="bg-white rounded-pill d-flex align-items-center border border-300 px-2 actions">
                                                <button class="btn p-2" type="button"><span class="fa-solid fa-reply text-primary"></span></button>
                                                <button class="btn p-2" type="button"><span class="fa-solid fa-pen-to-square text-primary"></span></button>
                                                <button class="btn p-2" type="button"><span class="fa-solid fa-trash text-primary"></span></button>
                                                <button class="btn p-2" type="button"><span class="fa-solid fa-share text-primary"></span></button>
                                                <button class="btn p-2" type="button"><span class="fa-solid fa-face-smile text-primary"></span></button>
                                            </div>
                                        </div>
                                        <div class="d-none d-sm-flex">
                                            <div class="hover-actions position-relative align-self-center">
                                                <button class="btn p-2 fs--2"><span class="fa-solid fa-reply text-primary"></span></button>
                                                <button class="btn p-2 fs--2"><span class="fa-solid fa-pen-to-square text-primary"></span></button>
                                                <button class="btn p-2 fs--2"><span class="fa-solid fa-share text-primary"></span></button>
                                                <button class="btn p-2 fs--2"><span class="fa-solid fa-trash text-primary"></span></button>
                                                <button class="btn p-2 fs--2"><span class="fa-solid fa-face-smile text-primary"></span></button>
                                            </div>
                                        </div>
                                        <div class="chat-message-content me-2">
                                            <div class="mb-1 sent-message-content light bg-primary rounded-2 p-3 text-white">
                                                <p class="mb-0">This is a message from you</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-0 fs--2 text-600 fw-semi-bold">Yesterday, 10 AM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Chat Footer -->
                    <div class="card-footer">
                        <div class="chat-textarea outline-none scrollbar mb-1" contenteditable="true"></div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div>
                                <button class="btn btn-link py-0 ps-0 pe-2 text-900 fs--1 btn-emoji" data-picmo="data-picmo"><span class="fa-regular fa-face-smile"></span></button>
                                <label class="btn btn-link py-0 px-2 text-900 fs--1" for="chatPhotos-0"><span class="fa-solid fa-image"></span></label>
                                <input class="d-none" type="file" accept="image/*" id="chatPhotos-0" />
                                <label class="btn btn-link py-0 px-2 text-900 fs--1" for="chatAttachment-0"> <span class="fa-solid fa-paperclip"></span></label>
                                <input class="d-none" type="file" id="chatAttachment-0" />
                                <button class="btn btn-link py-0 px-2 text-900 fs--1"><span class="fa-solid fa-microphone"></span></button>
                                <button class="btn btn-link py-0 px-2 text-900 fs--1"><span class="fa-solid fa-ellipsis"></span></button>
                            </div>
                            <div>
                                <button class="btn btn-primary fs--2" type="button">Send<span class="fa-solid fa-paper-plane ms-1"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Chat Search Box Modal -->
<div class="phoenix-offcanvas phoenix-offcanvas-top h-100 w-100 bg-white scrollbar z-index-0" id="thread-details-0">
    <!-- Chat Search Box Modal Header -->
    <div class="border-bottom p-4">
        <div class="d-flex flex-between-center">
            <button class="btn p-0" data-phoenix-dismiss="offcanvas"><span class="fa-solid fa-chevron-left text-700"></span></button>
            <button class="btn p-0 btn-reveal dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-v text-700"></span></button>
            <div class="dropdown-menu dropdown-menu-end py-2">
                <a class="dropdown-item" href="#!">View</a>
                <a class="dropdown-item" href="#!">Export</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#!">Remove</a>
            </div>
        </div>
        <div class="d-flex flex-column align-items-center text-center">
            <div class="avatar avatar-4xl mb-2"><img class="rounded-circle border border-2 border-white" src="../../assets/img/team/20.webp" alt="" /></div>
            <h4 class="fw-semi-bold mb-3">Sharuka Nijibum</h4>
        </div>
    </div>
    <!-- Chat Search Box Modal Body -->
    <div class="p-4 px-sm-5 scrollbar">
        <!-- Shared Media -->
        <div class="d-flex mb-5">
            <span class="fa-solid fa-photo-film me-3 fs--1"></span>
            <div>
                <h6 class="fw-semi-bold mb-2">Shared Media</h6>
                <div class="row g-2">
                    <div class="col-auto"><a href="../../assets/img/chat/2.png" data-gallery="gallery"> <img class="fit-cover rounded-2 hover-bg-200" src="../../assets/img/chat/2.png" alt="" height="100" width="100" /></a></div>
                    <div class="col-auto"><a href="../../assets/img/chat/3.png" data-gallery="gallery"> <img class="fit-cover rounded-2 hover-bg-200" src="../../assets/img/chat/3.png" alt="" height="100" width="100" /></a></div>
                    <div class="col-auto"><a href="../../assets/img/chat/4.png" data-gallery="gallery"> <img class="fit-cover rounded-2 hover-bg-200" src="../../assets/img/chat/4.png" alt="" height="100" width="100" /></a></div>
                </div>
            </div>
        </div>
        <!-- Shared Files -->
        <div class="mb-5">
            <div class="d-flex">
                <span class="fa-solid fa-folder me-3 fs--1"></span>
                <div class="flex-1">
                    <h6 class="fw-semi-bold border-bottom pb-2 mb-0">Shared Files</h6>
                    <div class="mb-2">
                        <!-- Shared File -->
                        <div class="border-bottom d-flex align-items-center justify-content-between">
                            <a class="text-decoration-none d-flex align-items-center py-3" href="#!">
                                <div class="btn-icon btn-icon-lg border border-500 rounded-3 text-500 flex-column me-2"><span class="fs-0 mb-1 fa-solid fa-file-zipper"></span>
                                    <p class="mb-0 fs--2 fw-bold lh-1">zip</p>
                                </div>
                                <div class="flex-1">
                                    <h6 class="text-900 line-clamp-1">Federico_godarf_design.zip</h6>
                                    <div class="d-flex align-items-center lh-1">
                                        <p class="fs--2 mb-0 text-700 fw-semi-bold">53.34 MB</p><span class="fa-solid fa-circle text-500 fs--2" data-fa-transform="shrink-12"></span>
                                        <p class="fs--2 mb-0 text-700 fw-semi-bold">Dec 8, 2011</p>
                                    </div>
                                </div>
                            </a><button class="btn p-0"><span class="fa-regular fa-arrow-alt-circle-down fs-0 text-700"></span></button>
                        </div>
                        <!-- Shared File -->
                        <div class="border-bottom d-flex align-items-center justify-content-between">
                            <a class="text-decoration-none d-flex align-items-center py-3" href="#!">
                                <div class="btn-icon btn-icon-lg border border-500 rounded-3 text-500 flex-column me-2"><span class="fs-0 mb-1 fa-solid fa-file-code"></span>
                                    <p class="mb-0 fs--2 fw-bold lh-1">bat</p>
                                </div>
                                <div class="flex-1">
                                    <h6 class="text-900 line-clamp-1">Restart_lyf.bat</h6>
                                    <div class="d-flex align-items-center lh-1">
                                        <p class="fs--2 mb-0 text-700 fw-semi-bold">11.13 KB</p><span class="fa-solid fa-circle text-500 fs--2" data-fa-transform="shrink-12"></span>
                                        <p class="fs--2 mb-0 text-700 fw-semi-bold">Dec 2, 2011</p>
                                    </div>
                                </div>
                            </a><button class="btn p-0"><span class="fa-regular fa-arrow-alt-circle-down fs-0 text-700"></span></button>
                        </div>
                        <!-- Shared File -->
                        <div class="border-bottom d-flex align-items-center justify-content-between">
                            <a class="text-decoration-none d-flex align-items-center py-3" href="#!">
                                <div class="btn-icon btn-icon-lg border border-500 rounded-3 text-500 flex-column me-2"><span class="fs-0 mb-1 fa-solid fa-file-lines"></span>
                                    <p class="mb-0 fs--2 fw-bold lh-1">txt</p>
                                </div>
                                <div class="flex-1">
                                    <h6 class="text-900 line-clamp-1">Fake lorem ipsum fr fr.txt</h6>
                                    <div class="d-flex align-items-center lh-1">
                                        <p class="fs--2 mb-0 text-700 fw-semi-bold">11.13 KB</p><span class="fa-solid fa-circle text-500 fs--2" data-fa-transform="shrink-12"></span>
                                        <p class="fs--2 mb-0 text-700 fw-semi-bold">Dec 2, 2011</p>
                                    </div>
                                </div>
                            </a><button class="btn p-0"><span class="fa-regular fa-arrow-alt-circle-down fs-0 text-700"></span></button>
                        </div>
                        <!-- Shared File -->
                        <div class="border-bottom d-flex align-items-center justify-content-between">
                            <a class="text-decoration-none d-flex align-items-center py-3" href="#!">
                                <div class="btn-icon btn-icon-lg border border-500 rounded-3 text-500 flex-column me-2"><span class="fs-0 mb-1 fa-solid fa-file"></span>
                                    <p class="mb-0 fs--2 fw-bold lh-1">txt</p>
                                </div>
                                <div class="flex-1">
                                    <h6 class="text-900 line-clamp-1">Federico_godarf.txt</h6>
                                    <div class="d-flex align-items-center lh-1">
                                        <p class="fs--2 mb-0 text-700 fw-semi-bold">11.13 KB</p><span class="fa-solid fa-circle text-500 fs--2" data-fa-transform="shrink-12"></span>
                                        <p class="fs--2 mb-0 text-700 fw-semi-bold">Dec 2, 2011</p>
                                    </div>
                                </div>
                            </a><button class="btn p-0"><span class="fa-regular fa-arrow-alt-circle-down fs-0 text-700"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
