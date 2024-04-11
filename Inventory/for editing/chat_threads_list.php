<li class="nav-item {message_status}" role="presentation">
    <a id="message_id_{from_user_id}" class="nav-link d-flex align-items-center justify-content-center p-2 {message_status}" data-bs-toggle="tab" data-chat-thread="data-chat-thread" href="#tab-thread-{from_user_id}"
        role="tab" aria-selected="false">
        
        <div class="avatar avatar-xl status-online position-relative me-2 me-sm-0 me-xl-2"><img class="rounded-circle border border-2 border-white" src="../../uploads/<?php echo basename($user_pfp); ?>" alt="" /></div>
        <div class="flex-1 d-sm-none d-xl-block">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-900 fw-normal name text-nowrap">{from_user_full_name}</h5>
                <p class="fs--2 text-600 mb-0 text-nowrap">{date_sent}</p>
            </div>
            <div class="d-flex justify-content-between">
                <p class="fs--1 mb-0 line-clamp-1 text-600 message">{message}</p>
            </div>
        </div>
    </a>
</li>