<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div id="actualContent" class="p-0 m-0" style="display: none;">
    <!-- ----------------- -->
        <div class="chat d-flex phoenix-offcanvas-container">
          <div class="card p-3 p-xl-1 mt-xl-n1 chat-sidebar me-3 phoenix-offcanvas phoenix-offcanvas-start" id="chat-sidebar"><button class="btn d-none d-sm-block d-xl-none mb-2" data-bs-toggle="modal" data-bs-target="#chatSearchBoxModal"><span class="fa-solid fa-magnifying-glass text-600 fs-1"></span></button>
            <div class="d-none d-sm-block d-xl-none mb-5"><button class="btn w-100 mx-auto" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-bars text-600 fs-1"></span></button>
              <ul class="dropdown-menu dropdown-menu-end p-0">
                <li><a class="dropdown-item" href="#!">All</a></li>
                <li><a class="dropdown-item" href="#!">Read</a></li>
                <li><a class="dropdown-item" href="#!">Unread</a></li>
              </ul>
            </div>
            <div class="form-icon-container mb-4 d-sm-none d-xl-block"><input class="form-control form-icon-input" type="text" placeholder="People, Groups and Messages" /><span class="fas fa-user text-900 fs--1 form-icon"></span></div>
            <ul class="nav nav-phoenix-pills mb-5 d-sm-none d-xl-flex" id="contactListTab" data-chat-thread-tab="data-chat-thread-tab" role="tablist">
              <li class="nav-item" role="presentation"><a class="nav-link cursor-pointer active" data-bs-toggle="tab" data-chat-thread-list="all" role="tab" aria-selected="true">All</a></li>
              <li class="nav-item" role="presentation"><a class="nav-link cursor-pointer" data-bs-toggle="tab" role="tab" data-chat-thread-list="read" aria-selected="false">Read</a></li>
              <li class="nav-item" role="presentation"><a class="nav-link cursor-pointer" data-bs-toggle="tab" role="tab" data-chat-thread-list="unread" aria-selected="false">Unread</a></li>
            </ul>
            <div class="scrollbar">
              <div class="tab-content" id="contactListTabContent">
                <div data-chat-thread-tab-content="data-chat-thread-tab-content">
                  <ul id="chat_threads_list" id="Inventory/Chats/index.php" class="nav chat-thread-tab flex-column list">
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="chat-content tab-content flex-1" id="chat_body_thread">
            
            
            
            
            
            


            
          </div>
          <div class="phoenix-offcanvas-backdrop d-lg-none" data-phoenix-backdrop="data-phoenix-backdrop" style="top: 0;"></div>
          <div class="modal fade" id="chatSearchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true" data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
            <div class="modal-dialog">
              <div class="modal-content mt-15">
                <div class="modal-body p-0">
                  <div class="chat-search-box">
                    <div class="form-icon-container"><input class="form-control py-3 form-icon-input rounded-1" type="text" autofocus="autofocus" placeholder="Search People, Groups and Messages" /><span class="fa-solid fa-magnifying-glass fs--1 form-icon"></span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- ----------------- -->
</div>
