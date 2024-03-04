     <!-- vertical navbar -->
     <nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
        <script>
          var navbarStyle = window.config.config.phoenixNavbarStyle;
          if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
          }
        </script>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <!-- scrollbar removed-->
          <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
              <li class="nav-item">
                <!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-home" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-home">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="pie-chart"></span></span><span class="nav-link-text">Home</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-home">
                      <li class="collapsed-nav-item-title d-none">Home</li>
                      <li class="nav-item"><a class="nav-link" href="../../index.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">E commerce</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../dashboard/project-management.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Project management</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../dashboard/crm.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">CRM</span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/social/feed.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Social feed</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <!-- label-->
                <p class="navbar-vertical-label">Apps</p>
                <hr class="navbar-vertical-line" /><!-- parent pages-->
                <div class="nav-item-wrapper">
                  <a class="nav-link dropdown-indicator label-1" href="#nv-e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-e-commerce">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="shopping-cart"></span></span><span class="nav-link-text">E commerce</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-e-commerce">
                      <li class="collapsed-nav-item-title d-none">E commerce</li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-admin" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-admin">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Admin</span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent show" data-bs-parent="#e-commerce" id="nv-admin">
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/admin/add-product.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Add product</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/admin/products.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Products</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/admin/customers.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Customers</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/admin/customer-details.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Customer details</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/admin/orders.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Orders</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/admin/order-details.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Order details</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/admin/refund.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Refund</span></div>
                              </a><!-- more inner pages-->
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-customer" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-customer">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Customer</span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent show" data-bs-parent="#e-commerce" id="nv-customer">
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/landing/homepage.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Homepage</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/landing/product-details.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Product details</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/landing/products-filter.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Products filter</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/landing/cart.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Cart</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/landing/checkout.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Checkout</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/landing/shipping-info.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Shipping info</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/landing/profile.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Profile</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/landing/favourite-stores.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Favourite stores</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/landing/wishlist.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Wishlist</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/landing/order-tracking.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Order tracking</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../apps/e-commerce/landing/invoice.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Invoice</span></div>
                              </a><!-- more inner pages-->
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-CRM" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-CRM">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="phone"></span></span><span class="nav-link-text">CRM</span><span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-CRM">
                      <li class="collapsed-nav-item-title d-none">CRM</li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/crm/analytics.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Analytics</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/crm/deals.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Deals</span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/crm/deal-details.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Deal details</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/crm/leads.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Leads</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/crm/lead-details.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Lead details</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/crm/reports.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Reports</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/crm/reports-details.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Reports details</span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/crm/add-contact.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Add contact</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-project-management" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-project-management">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="clipboard"></span></span><span class="nav-link-text">Project management</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-project-management">
                      <li class="collapsed-nav-item-title d-none">Project management</li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/project-management/create-new.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Create new</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/project-management/project-list-view.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Project list view</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/project-management/project-card-view.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Project card view</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/project-management/project-board-view.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Project board view</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/project-management/todo-list.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Todo list</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/project-management/project-details.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Project details</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="../../apps/chat.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="message-square"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Chat</span></span></div>
                  </a></div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-email">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="mail"></span></span><span class="nav-link-text">Email</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-email">
                      <li class="collapsed-nav-item-title d-none">Email</li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Inbox</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/email/email-detail.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Email detail</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/email/compose.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Compose</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-events" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-events">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="bookmark"></span></span><span class="nav-link-text">Events</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-events">
                      <li class="collapsed-nav-item-title d-none">Events</li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/events/create-an-event.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Create an event</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/events/event-detail.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Event detail</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-kanban" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-kanban">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="trello"></span></span><span class="nav-link-text">Kanban</span><span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-kanban">
                      <li class="collapsed-nav-item-title d-none">Kanban</li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/kanban/kanban.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Kanban</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/kanban/boards.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Boards</span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/kanban/create-kanban-board.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Create board</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-social" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-social">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="share-2"></span></span><span class="nav-link-text">Social</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-social">
                      <li class="collapsed-nav-item-title d-none">Social</li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/social/profile.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Profile</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../apps/social/settings.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Settings</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="../../apps/calendar.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="calendar"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Calendar</span></span></div>
                  </a></div>
              </li>
              <li class="nav-item">
                <!-- label-->
                <p class="navbar-vertical-label">Pages</p>
                <hr class="navbar-vertical-line" /><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link active label-1" href="starter.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="compass"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Starter</span></span></div>
                  </a></div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-faq" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-faq">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="help-circle"></span></span><span class="nav-link-text">Faq</span><span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-faq">
                      <li class="collapsed-nav-item-title d-none">Faq</li>
                      <li class="nav-item"><a class="nav-link" href="faq/faq-accordion.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Faq accordion</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="faq/faq-tab.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Faq tab</span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-landing" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-landing">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="globe"></span></span><span class="nav-link-text">Landing</span><span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-landing">
                      <li class="collapsed-nav-item-title d-none">Landing</li>
                      <li class="nav-item"><a class="nav-link" href="landing/default.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Default</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="landing/alternate.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Alternate</span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-pricing" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-pricing">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="tag"></span></span><span class="nav-link-text">Pricing</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-pricing">
                      <li class="collapsed-nav-item-title d-none">Pricing</li>
                      <li class="nav-item"><a class="nav-link" href="pricing/pricing-column.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Pricing column</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="pricing/pricing-grid.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Pricing grid</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="notifications.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="bell"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Notifications</span></span></div>
                  </a></div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="members.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="users"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Members</span></span></div>
                  </a></div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="timeline.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="clock"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Timeline</span></span></div>
                  </a></div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-errors" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-errors">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="alert-triangle"></span></span><span class="nav-link-text">Errors</span><span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-errors">
                      <li class="collapsed-nav-item-title d-none">Errors</li>
                      <li class="nav-item"><a class="nav-link" href="errors/404.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">404</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="errors/403.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">403</span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="errors/500.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">500</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-authentication" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-authentication">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="lock"></span></span><span class="nav-link-text">Authentication</span><span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-authentication">
                      <li class="collapsed-nav-item-title d-none">Authentication</li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-simple" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-simple">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Simple</span><span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent" data-bs-parent="#authentication" id="nv-simple">
                            <li class="nav-item"><a class="nav-link" href="authentication/simple/sign-in.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Sign in</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/simple/sign-up.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Sign up</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/simple/sign-out.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Sign out</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/simple/forgot-password.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Forgot password</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/simple/reset-password.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Reset password</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/simple/lock-screen.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Lock screen</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/simple/2FA.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">2FA</span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span></div>
                              </a><!-- more inner pages-->
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-split" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-split">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Split</span><span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent" data-bs-parent="#authentication" id="nv-split">
                            <li class="nav-item"><a class="nav-link" href="authentication/split/sign-in.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Sign in</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/split/sign-up.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Sign up</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/split/sign-out.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Sign out</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/split/forgot-password.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Forgot password</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/split/reset-password.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Reset password</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/split/lock-screen.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Lock screen</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/split/2FA.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">2FA</span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span></div>
                              </a><!-- more inner pages-->
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-Card" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-Card">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Card</span><span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent" data-bs-parent="#authentication" id="nv-Card">
                            <li class="nav-item"><a class="nav-link" href="authentication/card/sign-in.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Sign in</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/card/sign-up.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Sign up</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/card/sign-out.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Sign out</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/card/forgot-password.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Forgot password</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/card/reset-password.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Reset password</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/card/lock-screen.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Lock screen</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="authentication/card/2FA.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">2FA</span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info ">New</span></div>
                              </a><!-- more inner pages-->
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-layouts" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-layouts">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="layout"></span></span><span class="nav-link-text">Layouts</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-layouts">
                      <li class="collapsed-nav-item-title d-none">Layouts</li>
                      <li class="nav-item"><a class="nav-link" href="../../demo/vertical-sidenav.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Vertical sidenav</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../demo/dark-mode.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Dark mode</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../demo/sidenav-collapse.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Sidenav collapse</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../demo/darknav.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Darknav</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../demo/topnav-slim.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Topnav slim</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../demo/navbar-top-slim.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Navbar top slim</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../demo/navbar-top.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Navbar top</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../demo/horizontal-slim.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Horizontal slim</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../demo/combo-nav.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Combo nav</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../demo/combo-nav-slim.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Combo nav slim</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../demo/dual-nav.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Dual nav</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <!-- label-->
                <p class="navbar-vertical-label">Modules</p>
                <hr class="navbar-vertical-line" /><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-forms">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="file-text"></span></span><span class="nav-link-text">Forms</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-forms">
                      <li class="collapsed-nav-item-title d-none">Forms</li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-basic" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-basic">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Basic</span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent" data-bs-parent="#forms" id="nv-basic">
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/basic/form-control.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Form control</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/basic/input-group.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Input group</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/basic/select.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Select</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/basic/checks.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Checks</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/basic/range.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Range</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/basic/floating-labels.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Floating labels</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/basic/layout.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Layout</span></div>
                              </a><!-- more inner pages-->
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-advance" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-advance">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Advance</span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent" data-bs-parent="#forms" id="nv-advance">
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/advance/advance-select.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Advance select</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/advance/date-picker.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Date picker</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/advance/editor.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Editor</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/advance/file-uploader.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">File uploader</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/advance/rating.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Rating</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/forms/advance/emoji-button.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Emoji button</span></div>
                              </a><!-- more inner pages-->
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/forms/validation.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Validation</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/forms/wizard.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Wizard</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-icons" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-icons">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="grid"></span></span><span class="nav-link-text">Icons</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-icons">
                      <li class="collapsed-nav-item-title d-none">Icons</li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/icons/feather.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Feather</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/icons/font-awesome.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Font awesome</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/icons/unicons.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Unicons</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-tables" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-tables">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="columns"></span></span><span class="nav-link-text">Tables</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-tables">
                      <li class="collapsed-nav-item-title d-none">Tables</li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/tables/basic-tables.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Basic tables</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/tables/advance-tables.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Advance tables</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/tables/bulk-select.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Bulk Select</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-ECharts" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-ECharts">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="bar-chart-2"></span></span><span class="nav-link-text">ECharts</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-ECharts">
                      <li class="collapsed-nav-item-title d-none">ECharts</li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/echarts/line-charts.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Line charts</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/echarts/bar-charts.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Bar charts</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/echarts/candlestick-charts.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Candlestick charts</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/echarts/geo-map.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Geo map</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/echarts/scatter-charts.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Scatter charts</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/echarts/pie-charts.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Pie charts</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/echarts/gauge-chart.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Gauge chart</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/echarts/radar-charts.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Radar charts</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/echarts/heatmap-charts.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Heatmap charts</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/echarts/how-to-use.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">How to use</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-components" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-components">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">Components</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-components">
                      <li class="collapsed-nav-item-title d-none">Components</li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/accordion.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Accordion</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/avatar.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Avatar</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/alerts.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Alerts</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/badge.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Badge</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/breadcrumb.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Breadcrumb</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/button.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Buttons</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/calendar.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Calendar</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/card.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Card</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-carousel" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-carousel">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Carousel</span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent" data-bs-parent="#components" id="nv-carousel">
                            <li class="nav-item"><a class="nav-link" href="../../modules/components/carousel/bootstrap.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Bootstrap</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/components/carousel/swiper.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Swiper</span></div>
                              </a><!-- more inner pages-->
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/collapse.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Collapse</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/dropdown.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Dropdown</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/list-group.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">List group</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/modal.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Modals</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-navs-_and_-Tabs" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-navs-_and_-Tabs">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Navs &amp; Tabs</span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent" data-bs-parent="#components" id="nv-navs-_and_-Tabs">
                            <li class="nav-item"><a class="nav-link" href="../../modules/components/navs-and-tabs/navs.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Navs</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/components/navs-and-tabs/navbar.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Navbar</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../modules/components/navs-and-tabs/tabs.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Tabs</span></div>
                              </a><!-- more inner pages-->
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/offcanvas.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Offcanvas</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/progress-bar.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Progress bar</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/placeholder.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Placeholder</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/pagination.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Pagination</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/popovers.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Popovers</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/scrollspy.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Scrollspy</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/sortable.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Sortable</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/spinners.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Spinners</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/toast.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Toast</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/tooltips.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Tooltips</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/components/chat-widget.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Chat widget</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-utilities" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-utilities">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="tool"></span></span><span class="nav-link-text">Utilities</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-utilities">
                      <li class="collapsed-nav-item-title d-none">Utilities</li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/background.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Background</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/borders.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Borders</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/colors.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Colors</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/display.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Display</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/flex.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Flex</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/stacks.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Stacks</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/float.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Float</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/grid.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Grid</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/interactions.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Interactions</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/opacity.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Opacity</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/overflow.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Overflow</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/position.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Position</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/shadows.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Shadows</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/sizing.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Sizing</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/spacing.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Spacing</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/typography.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Typography</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/vertical-align.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Vertical align</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../modules/utilities/visibility.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Visibility</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="../../widgets.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="server"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Widgets</span></span><span class="badge ms-2 badge badge-phoenix badge-phoenix-info nav-link-badge">New</span></div>
                  </a></div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-multi-level" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-multi-level">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="layers"></span></span><span class="nav-link-text">Multi level</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-multi-level">
                      <li class="collapsed-nav-item-title d-none">Multi level</li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-level-two" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-level-two">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Level two</span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent" data-bs-parent="#multi-level" id="nv-level-two">
                            <li class="nav-item"><a class="nav-link" href="../../index-2.html#!.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Item 1</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link" href="../../index-2.html#!.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Item 2</span></div>
                              </a><!-- more inner pages-->
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-level-three" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-level-three">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Level three</span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent" data-bs-parent="#multi-level" id="nv-level-three">
                            <li class="nav-item"><a class="nav-link" href="../../index-2.html#!.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Item 3</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-item-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-item-4">
                                <div class="d-flex align-items-center">
                                  <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Item 4</span>
                                </div>
                              </a><!-- more inner pages-->
                              <div class="parent-wrapper">
                                <ul class="nav collapse parent" data-bs-parent="#level-three" id="nv-item-4">
                                  <li class="nav-item"><a class="nav-link" href="../../index-2.html#!.html" data-bs-toggle="" aria-expanded="false">
                                      <div class="d-flex align-items-center"><span class="nav-link-text">Item 5</span></div>
                                    </a><!-- more inner pages-->
                                  </li>
                                  <li class="nav-item"><a class="nav-link" href="../../index-2.html#!.html" data-bs-toggle="" aria-expanded="false">
                                      <div class="d-flex align-items-center"><span class="nav-link-text">Item 6</span></div>
                                    </a><!-- more inner pages-->
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-level-four" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-level-four">
                          <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Level four</span>
                          </div>
                        </a><!-- more inner pages-->
                        <div class="parent-wrapper">
                          <ul class="nav collapse parent" data-bs-parent="#multi-level" id="nv-level-four">
                            <li class="nav-item"><a class="nav-link" href="../../index-2.html#!.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text">Item 6</span></div>
                              </a><!-- more inner pages-->
                            </li>
                            <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-item-7" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-item-7">
                                <div class="d-flex align-items-center">
                                  <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Item 7</span>
                                </div>
                              </a><!-- more inner pages-->
                              <div class="parent-wrapper">
                                <ul class="nav collapse parent" data-bs-parent="#level-four" id="nv-item-7">
                                  <li class="nav-item"><a class="nav-link" href="../../index-2.html#!.html" data-bs-toggle="" aria-expanded="false">
                                      <div class="d-flex align-items-center"><span class="nav-link-text">Item 8</span></div>
                                    </a><!-- more inner pages-->
                                  </li>
                                  <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-item-9" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-item-9">
                                      <div class="d-flex align-items-center">
                                        <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Item 9</span>
                                      </div>
                                    </a><!-- more inner pages-->
                                    <div class="parent-wrapper">
                                      <ul class="nav collapse parent" data-bs-parent="#item-7" id="nv-item-9">
                                        <li class="nav-item"><a class="nav-link" href="../../index-2.html#!.html" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text">Item 10</span></div>
                                          </a><!-- more inner pages-->
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="../../index-2.html#!.html" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text">Item 11</span></div>
                                          </a><!-- more inner pages-->
                                        </li>
                                      </ul>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <!-- label-->
                <p class="navbar-vertical-label">Documentation</p>
                <hr class="navbar-vertical-line" /><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="../../documentation/getting-started.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="life-buoy"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Getting started</span></span></div>
                  </a></div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-customization" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-customization">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="settings"></span></span><span class="nav-link-text">Customization</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-customization">
                      <li class="collapsed-nav-item-title d-none">Customization</li>
                      <li class="nav-item"><a class="nav-link" href="../../documentation/customization/configuration.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Configuration</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../documentation/customization/styling.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Styling</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../documentation/customization/dark-mode.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Dark mode</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../documentation/customization/plugin.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Plugin</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-layouts-doc" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-layouts-doc">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="table"></span></span><span class="nav-link-text">Layouts doc</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-layouts-doc">
                      <li class="collapsed-nav-item-title d-none">Layouts doc</li>
                      <li class="nav-item"><a class="nav-link" href="../../documentation/layouts/vertical-navbar.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Vertical navbar</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../documentation/layouts/horizontal-navbar.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Horizontal navbar</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../documentation/layouts/combo-navbar.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Combo navbar</span></div>
                        </a><!-- more inner pages-->
                      </li>
                      <li class="nav-item"><a class="nav-link" href="../../documentation/layouts/dual-nav.html" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Dual nav</span></div>
                        </a><!-- more inner pages-->
                      </li>
                    </ul>
                  </div>
                </div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="../../documentation/gulp.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fa-brands fa-gulp ms-1 me-1 fa-lg"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Gulp</span></span></div>
                  </a></div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="../../documentation/design-file.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="figma"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Design file</span></span></div>
                  </a></div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="../../changelog.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="git-merge"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Changelog</span></span></div>
                  </a></div><!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="../../showcase.html" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="monitor"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Showcase</span></span></div>
                  </a></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="navbar-vertical-footer"><button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-0"></span><span class="uil uil-arrow-from-right fs-0"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button></div>
      </nav>
      <nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault" style="display:none;">
        <div class="collapse navbar-collapse justify-content-between">
          <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="../../index.html">
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center"><img src="../../assets/img/icons/logo.png" alt="phoenix" width="27" />
                  <p class="logo-text ms-2 d-none d-sm-block">Logo Text</p>
                </div>
              </div>
            </a>
          </div>
          <div class="search-box navbar-top-search-box d-none d-lg-block" data-list='{"valueNames":["title"]}' style="width:25rem;">
            <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input fuzzy-search rounded-pill form-control-sm" type="search" placeholder="Search..." aria-label="Search" />
              <span class="fas fa-search search-box-icon"></span>
            </form>
            <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button></div>
            <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
              <div class="scrollbar-overlay" style="max-height: 30rem;">
                <div class="list pb-3">
                  <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span class="text-500">results</span></h6>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently Searched </h6>
                  <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"><span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> Store Macbook</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"> <span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                      </div>
                    </a>
                  </div>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Products</h6>
                  <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="../../apps/e-commerce/landing/product-details.html">
                      <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3" src="../../assets/img/products/60x60/3.png" alt="" /></div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                        <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB Memory - 1.6GHz - 128GB Storage</span></p>
                      </div>
                    </a>
                    <a class="dropdown-item py-2 d-flex align-items-center" href="../../apps/e-commerce/landing/product-details.html">
                      <div class="file-thumbnail me-2"><img class="img-fluid" src="../../assets/img/products/60x60/3.png" alt="" /></div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                        <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                      </div>
                    </a>
                  </div>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick Links</h6>
                  <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"><span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Support MacBook House</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"> <span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                      </div>
                    </a>
                  </div>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Files</h6>
                  <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"><span class="fa-solid fa-file-zipper text-900" data-fa-transform="shrink-2"></span> Library MacBook folder.rar</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"> <span class="fa-solid fa-file-lines text-900" data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"> <span class="fa-solid fa-image text-900" data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                      </div>
                    </a>
                  </div>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Members</h6>
                  <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="members.html">
                      <div class="avatar avatar-l status-online  me-2 text-900">
                        <img class="rounded-circle " src="../../assets/img/team/40x40/10.webp" alt="" />
                      </div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                        <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                      </div>
                    </a>
                    <a class="dropdown-item py-2 d-flex align-items-center" href="members.html">
                      <div class="avatar avatar-l  me-2 text-900">
                        <img class="rounded-circle " src="../../assets/img/team/40x40/12.webp" alt="" />
                      </div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-1000 title">John Smith</h6>
                        <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                      </div>
                    </a>
                  </div>
                  <hr class="text-200 my-0" />
                  <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Related Searches</h6>
                  <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"><span class="fa-brands fa-firefox-browser text-900" data-fa-transform="shrink-2"></span> Search in the Web MacBook</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">
                        <div class="fw-normal text-1000 title"> <span class="fa-brands fa-chrome text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="text-center">
                  <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                </div>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
              <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="moon"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label></div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" style="min-width: 2.5rem" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span data-feather="bell" style="height:20px;width:20px;"></span></a>
              <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                <div class="card position-relative border-0">
                  <div class="card-header p-2">
                    <div class="d-flex justify-content-between">
                      <h5 class="text-black mb-0">Notificatons</h5><button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                    </div>
                  </div>
                  <div class="card-body p-0">



                    <!-- notification-content -->
                    <?php include "notification-content.php";?>
                    <!-- end of notification content -->



                    
                  </div>
                  <div class="card-footer p-0 border-top border-0">
                    <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="notifications.html">Notification history</a></div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-l ">
                  <img class="rounded-circle " src="../../assets/img/team/40x40/57.webp" alt="" />
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                <div class="card position-relative border-0">
                  <div class="card-body p-0">
                    <div class="text-center pt-4 pb-3">
                      <div class="avatar avatar-xl ">
                        <img class="rounded-circle " src="../../assets/img/team/72x72/57.webp" alt="" />
                      </div>
                      <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                    </div>
                    <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                  </div>
                  <div class="overflow-auto scrollbar" style="height: 10rem;">
                    <ul class="nav d-flex flex-column mb-2 pb-1">
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                    </ul>
                  </div>
                  <div class="card-footer p-0 border-top">
                    <ul class="nav d-flex flex-column my-3">
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
                    </ul>
                    <hr />
                    <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                    <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- vertical navbar -->
      
      <!-- minimize na lang -->
      <nav class="navbar navbar-top navbar-slim fixed-top navbar-expand" id="topNavSlim" style="display:none;">
        <div class="collapse navbar-collapse justify-content-between">
          <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand navbar-brand" href="../../index.html">phoenix <span class="text-1000 d-none d-sm-inline">slim</span></a>
          </div>
          <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
              <div class="theme-control-toggle fa-ion-wait pe-2 theme-control-toggle-slim"><input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="phoenixTheme" value="dark" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon me-1 d-none d-sm-block" data-feather="moon"></span><span class="fs--1 fw-bold">Dark</span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon me-1 d-none d-sm-block" data-feather="sun"></span><span class="fs--1 fw-bold">Light</span></label></div>
            </li>
            <li class="nav-item"> <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span data-feather="search" style="height:12px;width:12px;"></span></a></li>
            <li class="nav-item dropdown">
              <a class="nav-link" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span data-feather="bell" style="height:12px;width:12px;"></span></a>
              <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                <div class="card position-relative border-0">
                  <div class="card-header p-2">
                    <div class="d-flex justify-content-between">
                      <h5 class="text-black mb-0">Notificatons</h5><button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="scrollbar-overlay" style="height: 27rem;">
                      <div class="border-300">
                        <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/30.webp" alt="" /></div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs--1 text-black">Jessie Samson</h4>
                                <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                                <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                            </div>
                          </div>
                        </div>
                        <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3">
                                <div class="avatar-name rounded-circle"><span>J</span></div>
                              </div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs--1 text-black">Jane Foster</h4>
                                <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>📅</span>Created an event.<span class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:20 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                            </div>
                          </div>
                        </div>
                        <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder" src="../../assets/img/team/40x40/avatar.webp" alt="" /></div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs--1 text-black">Jessie Samson</h4>
                                <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                                <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:30 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="border-300">
                        <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/57.webp" alt="" /></div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:11 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                            </div>
                          </div>
                        </div>
                        <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/59.webp" alt="" /></div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs--1 text-black">Herman Carter</h4>
                                <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👤</span>Tagged you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:58 PM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                            </div>
                          </div>
                        </div>
                        <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                          <div class="d-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex">
                              <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/58.webp" alt="" /></div>
                              <div class="flex-1 me-sm-3">
                                <h4 class="fs--1 text-black">Benjamin Button</h4>
                                <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:18 AM </span>August 7,2021</p>
                              </div>
                            </div>
                            <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer p-0 border-top border-0">
                    <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="notifications.html">Notification history</a></div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="10" height="10" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                  <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                  <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                  <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                  <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                  <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                  <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                  <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                  <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                </svg></a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300" aria-labelledby="navbarDropdownNindeDots">
                <div class="card bg-white position-relative border-0">
                  <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                    <div class="row text-center align-items-center gx-0 gy-0">
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/behance.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/slack.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/trello.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/figma.webp" alt="" width="20" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/twitter.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/ln.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                        </a></div>
                      <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/spotify.webp" alt="" width="30" />
                          <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                        </a></div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0 white-space-nowrap" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">Olivia <span class="fa-solid fa-chevron-down fs--2"></span></a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                <div class="card position-relative border-0">
                  <div class="card-body p-0">
                    <div class="text-center pt-4 pb-3">
                      <div class="avatar avatar-xl ">
                        <img class="rounded-circle " src="../../assets/img/team/72x72/57.webp" alt="" />
                      </div>
                      <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                    </div>
                    <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                  </div>
                  <div class="overflow-auto scrollbar" style="height: 10rem;">
                    <ul class="nav d-flex flex-column mb-2 pb-1">
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                    </ul>
                  </div>
                  <div class="card-footer p-0 border-top">
                    <ul class="nav d-flex flex-column my-3">
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
                    </ul>
                    <hr />
                    <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                    <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarTop" style="display:none;">
        <div class="navbar-logo">
          <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopCollapse" aria-controls="navbarTopCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
          <a class="navbar-brand me-1 me-sm-3" href="../../index.html">
            <div class="d-flex align-items-center">
              <div class="d-flex align-items-center"><img src="../../assets/img/icons/logo.png" alt="phoenix" width="27" />
                <p class="logo-text ms-2 d-none d-sm-block">phoenix</p>
              </div>
            </div>
          </a>
        </div>
        <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center" id="navbarTopCollapse">
          <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-chart-pie"></span>Home</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item" href="../../index.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="shopping-cart"></span>E commerce</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../dashboard/project-management.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clipboard"></span>Project management</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../dashboard/crm.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="phone"></span>CRM</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../apps/social/feed.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="share-2"></span>Social feed</div>
                  </a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-cube"></span>Apps</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="shopping-cart"></span>E commerce</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Admin</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/add-product.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add product</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/products.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/customers.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customers</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/customer-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customer details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/orders.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/order-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/refund.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Customer</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/homepage.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/products-filter.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products filter</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/cart.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/checkout.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/shipping-info.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Shipping info</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/profile.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/favourite-stores.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Favourite stores</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/wishlist.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Wishlist</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/order-tracking.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order tracking</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/invoice.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/crm/analytics.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/deals.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/deal-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/leads.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/lead-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/reports.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/reports-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/add-contact.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="clipboard"></span>Project management</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/project-management/create-new.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-list-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project list view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-card-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project card view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-board-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project board view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/todo-list.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project details</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../apps/chat.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="message-square"></span>Chat</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="mail"></span>Email</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/email/inbox.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/email/email-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email detail</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/email/compose.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/events/create-an-event.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an event</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/events/event-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event detail</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/kanban/kanban.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/kanban/boards.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/kanban/create-kanban-board.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create board</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/social/profile.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/social/settings.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../apps/calendar.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="calendar"></span>Calendar</div>
                  </a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-files-landscapes-alt"></span>Pages</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item active" href="starter.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="compass"></span>Starter</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="faq/faq-accordion.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq accordion</div>
                      </a></li>
                    <li><a class="dropdown-item" href="faq/faq-tab.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="landing/default.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default</div>
                      </a></li>
                    <li><a class="dropdown-item" href="landing/alternate.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="pricing/pricing-column.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing column</div>
                      </a></li>
                    <li><a class="dropdown-item" href="pricing/pricing-grid.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing grid</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="notifications.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="bell"></span>Notifications</div>
                  </a></li>
                <li><a class="dropdown-item" href="members.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="users"></span>Members</div>
                  </a></li>
                <li><a class="dropdown-item" href="timeline.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clock"></span>Timeline</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="alert-triangle"></span>Errors</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="errors/404.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                      </a></li>
                    <li><a class="dropdown-item" href="errors/403.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                      </a></li>
                    <li><a class="dropdown-item" href="errors/500.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="lock"></span>Authentication</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Simple</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/simple/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Split</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/split/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Card</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/card/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../demo/vertical-sidenav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical sidenav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/dark-mode.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/sidenav-collapse.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav collapse</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/darknav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/topnav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/navbar-top-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/navbar-top.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/horizontal-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/combo-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/combo-nav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-puzzle-piece"></span>Modules</a>
              <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                <div class="border-0 scrollbar" style="max-height: 60vh;">
                  <div class="px-3 pt-4 pb-3 img-dropdown">
                    <div class="row gx-4 gy-5">
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="file-text" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Forms</h6>
                        </div><a class="dropdown-link" href="../../modules/forms/basic/form-control.html">Form control</a><a class="dropdown-link" href="../../modules/forms/basic/input-group.html">Input group</a><a class="dropdown-link" href="../../modules/forms/basic/select.html">Select</a><a class="dropdown-link" href="../../modules/forms/basic/checks.html">Checks</a><a class="dropdown-link" href="../../modules/forms/basic/range.html">Range</a><a class="dropdown-link" href="../../modules/forms/basic/floating-labels.html">Floating labels</a><a class="dropdown-link" href="../../modules/forms/basic/layout.html">Layout</a><a class="dropdown-link" href="../../modules/forms/advance/advance-select.html">Advance select</a><a class="dropdown-link" href="../../modules/forms/advance/date-picker.html">Date picker</a><a class="dropdown-link" href="../../modules/forms/advance/editor.html">Editor</a><a class="dropdown-link" href="../../modules/forms/advance/file-uploader.html">File uploader</a><a class="dropdown-link" href="../../modules/forms/advance/rating.html">Rating</a><a class="dropdown-link" href="../../modules/forms/advance/emoji-button.html">Emoji button</a><a class="dropdown-link" href="../../modules/forms/validation.html">Validation</a><a class="dropdown-link" href="../../modules/forms/wizard.html">Wizard</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Icons</h6>
                        </div><a class="dropdown-link" href="../../modules/icons/feather.html">Feather</a><a class="dropdown-link" href="../../modules/icons/font-awesome.html">Font awesome</a><a class="dropdown-link" href="../../modules/icons/unicons.html">Unicons</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="bar-chart-2" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">ECharts</h6>
                        </div><a class="dropdown-link" href="../../modules/echarts/line-charts.html">Line charts</a><a class="dropdown-link" href="../../modules/echarts/bar-charts.html">Bar charts</a><a class="dropdown-link" href="../../modules/echarts/candlestick-charts.html">Candlestick charts</a><a class="dropdown-link" href="../../modules/echarts/geo-map.html">Geo map</a><a class="dropdown-link" href="../../modules/echarts/scatter-charts.html">Scatter charts</a><a class="dropdown-link" href="../../modules/echarts/pie-charts.html">Pie charts</a><a class="dropdown-link" href="../../modules/echarts/gauge-chart.html">Gauge chart</a><a class="dropdown-link" href="../../modules/echarts/radar-charts.html">Radar charts</a><a class="dropdown-link" href="../../modules/echarts/heatmap-charts.html">Heatmap charts</a><a class="dropdown-link" href="../../modules/echarts/how-to-use.html">How to use</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="package" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Components</h6>
                        </div><a class="dropdown-link" href="../../modules/components/accordion.html">Accordion</a><a class="dropdown-link" href="../../modules/components/avatar.html">Avatar</a><a class="dropdown-link" href="../../modules/components/alerts.html">Alerts</a><a class="dropdown-link" href="../../modules/components/badge.html">Badge</a><a class="dropdown-link" href="../../modules/components/breadcrumb.html">Breadcrumb</a><a class="dropdown-link" href="../../modules/components/button.html">Buttons</a><a class="dropdown-link" href="../../modules/components/calendar.html">Calendar</a><a class="dropdown-link" href="../../modules/components/card.html">Card</a><a class="dropdown-link" href="../../modules/components/carousel/bootstrap.html">Bootstrap</a><a class="dropdown-link" href="../../modules/components/carousel/swiper.html">Swiper</a><a class="dropdown-link" href="../../modules/components/collapse.html">Collapse</a><a class="dropdown-link" href="../../modules/components/dropdown.html">Dropdown</a><a class="dropdown-link" href="../../modules/components/list-group.html">List group</a><a class="dropdown-link" href="../../modules/components/modal.html">Modals</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navs.html">Navs</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="dropdown-link" href="../../modules/components/offcanvas.html">Offcanvas</a><a class="dropdown-link" href="../../modules/components/progress-bar.html">Progress bar</a><a class="dropdown-link" href="../../modules/components/placeholder.html">Placeholder</a><a class="dropdown-link" href="../../modules/components/pagination.html">Pagination</a><a class="dropdown-link" href="../../modules/components/popovers.html">Popovers</a><a class="dropdown-link" href="../../modules/components/scrollspy.html">Scrollspy</a><a class="dropdown-link" href="../../modules/components/sortable.html">Sortable</a><a class="dropdown-link" href="../../modules/components/spinners.html">Spinners</a><a class="dropdown-link" href="../../modules/components/toast.html">Toast</a><a class="dropdown-link" href="../../modules/components/tooltips.html">Tooltips</a><a class="dropdown-link" href="../../modules/components/chat-widget.html">Chat widget</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="columns" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Tables</h6>
                        </div><a class="dropdown-link" href="../../modules/tables/basic-tables.html">Basic tables</a><a class="dropdown-link" href="../../modules/tables/advance-tables.html">Advance tables</a><a class="dropdown-link" href="../../modules/tables/bulk-select.html">Bulk Select</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Utilities</h6>
                        </div><a class="dropdown-link" href="../../modules/utilities/background.html">Background</a><a class="dropdown-link" href="../../modules/utilities/borders.html">Borders</a><a class="dropdown-link" href="../../modules/utilities/colors.html">Colors</a><a class="dropdown-link" href="../../modules/utilities/display.html">Display</a><a class="dropdown-link" href="../../modules/utilities/flex.html">Flex</a><a class="dropdown-link" href="../../modules/utilities/stacks.html">Stacks</a><a class="dropdown-link" href="../../modules/utilities/float.html">Float</a><a class="dropdown-link" href="../../modules/utilities/grid.html">Grid</a><a class="dropdown-link" href="../../modules/utilities/interactions.html">Interactions</a><a class="dropdown-link" href="../../modules/utilities/opacity.html">Opacity</a><a class="dropdown-link" href="../../modules/utilities/overflow.html">Overflow</a><a class="dropdown-link" href="../../modules/utilities/position.html">Position</a><a class="dropdown-link" href="../../modules/utilities/shadows.html">Shadows</a><a class="dropdown-link" href="../../modules/utilities/sizing.html">Sizing</a><a class="dropdown-link" href="../../modules/utilities/spacing.html">Spacing</a><a class="dropdown-link" href="../../modules/utilities/typography.html">Typography</a><a class="dropdown-link" href="../../modules/utilities/vertical-align.html">Vertical align</a><a class="dropdown-link" href="../../modules/utilities/visibility.html">Visibility</a>
                      </div>
                    </div>
                  </div>
                </div>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-document-layout-right"></span>Documentation</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item" href="../../documentation/getting-started.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="life-buoy"></span>Getting started</div>
                  </a></li>
                <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="settings"></span>Customization</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../documentation/customization/configuration.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/styling.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/dark-mode.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/plugin.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="table"></span>Layouts doc</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../documentation/layouts/vertical-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/horizontal-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/combo-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../documentation/gulp.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../documentation/design-file.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="figma"></span>Design file</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../changelog.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="git-merge"></span>Changelog</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../showcase.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="monitor"></span>Showcase</div>
                  </a></li>
              </ul>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
          <li class="nav-item">
            <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="moon"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label></div>
          </li>
          <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span data-feather="search" style="height:19px;width:19px;margin-bottom: 2px;"></span></a></li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" style="min-width: 2.5rem" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span data-feather="bell" style="height:20px;width:20px;"></span></a>
            <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
              <div class="card position-relative border-0">
                <div class="card-header p-2">
                  <div class="d-flex justify-content-between">
                    <h5 class="text-black mb-0">Notificatons</h5><button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="scrollbar-overlay" style="height: 27rem;">
                    <div class="border-300">
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/30.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jessie Samson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3">
                              <div class="avatar-name rounded-circle"><span>J</span></div>
                            </div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jane Foster</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>📅</span>Created an event.<span class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:20 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder" src="../../assets/img/team/40x40/avatar.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jessie Samson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:30 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="border-300">
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/57.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Kiera Anderson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:11 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/59.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Herman Carter</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👤</span>Tagged you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:58 PM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/58.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Benjamin Button</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:18 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer p-0 border-top border-0">
                  <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="notifications.html">Notification history</a></div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
              </svg></a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300" aria-labelledby="navbarDropdownNindeDots">
              <div class="card bg-white position-relative border-0">
                <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                  <div class="row text-center align-items-center gx-0 gy-0">
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/behance.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/slack.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/trello.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/figma.webp" alt="" width="20" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/twitter.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/ln.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/spotify.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                      </a></div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-l ">
                <img class="rounded-circle " src="../../assets/img/team/40x40/57.webp" alt="" />
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
              <div class="card position-relative border-0">
                <div class="card-body p-0">
                  <div class="text-center pt-4 pb-3">
                    <div class="avatar avatar-xl ">
                      <img class="rounded-circle " src="../../assets/img/team/72x72/57.webp" alt="" />
                    </div>
                    <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                  </div>
                  <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                </div>
                <div class="overflow-auto scrollbar" style="height: 10rem;">
                  <ul class="nav d-flex flex-column mb-2 pb-1">
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                  </ul>
                </div>
                <div class="card-footer p-0 border-top">
                  <ul class="nav d-flex flex-column my-3">
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
                  </ul>
                  <hr />
                  <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                  <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <nav class="navbar navbar-top navbar-slim justify-content-between fixed-top navbar-expand-lg" id="navbarTopSlim" style="display:none;">
        <div class="navbar-logo">
          <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopCollapse" aria-controls="navbarTopCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
          <a class="navbar-brand navbar-brand" href="../../index.html">phoenix <span class="text-1000 d-none d-sm-inline">slim</span></a>
        </div>
        <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center" id="navbarTopCollapse">
          <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-chart-pie"></span>Home</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item" href="../../index.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="shopping-cart"></span>E commerce</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../dashboard/project-management.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clipboard"></span>Project management</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../dashboard/crm.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="phone"></span>CRM</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../apps/social/feed.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="share-2"></span>Social feed</div>
                  </a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-cube"></span>Apps</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="shopping-cart"></span>E commerce</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Admin</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/add-product.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add product</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/products.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/customers.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customers</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/customer-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customer details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/orders.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/order-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/refund.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Customer</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/homepage.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/products-filter.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products filter</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/cart.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/checkout.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/shipping-info.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Shipping info</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/profile.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/favourite-stores.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Favourite stores</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/wishlist.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Wishlist</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/order-tracking.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order tracking</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/invoice.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/crm/analytics.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/deals.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/deal-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/leads.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/lead-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/reports.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/reports-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/add-contact.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="clipboard"></span>Project management</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/project-management/create-new.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-list-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project list view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-card-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project card view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-board-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project board view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/todo-list.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project details</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../apps/chat.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="message-square"></span>Chat</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="mail"></span>Email</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/email/inbox.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/email/email-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email detail</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/email/compose.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/events/create-an-event.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an event</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/events/event-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event detail</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/kanban/kanban.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/kanban/boards.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/kanban/create-kanban-board.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create board</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/social/profile.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/social/settings.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../apps/calendar.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="calendar"></span>Calendar</div>
                  </a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-files-landscapes-alt"></span>Pages</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item active" href="starter.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="compass"></span>Starter</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="faq/faq-accordion.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq accordion</div>
                      </a></li>
                    <li><a class="dropdown-item" href="faq/faq-tab.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="landing/default.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default</div>
                      </a></li>
                    <li><a class="dropdown-item" href="landing/alternate.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="pricing/pricing-column.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing column</div>
                      </a></li>
                    <li><a class="dropdown-item" href="pricing/pricing-grid.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing grid</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="notifications.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="bell"></span>Notifications</div>
                  </a></li>
                <li><a class="dropdown-item" href="members.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="users"></span>Members</div>
                  </a></li>
                <li><a class="dropdown-item" href="timeline.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clock"></span>Timeline</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="alert-triangle"></span>Errors</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="errors/404.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                      </a></li>
                    <li><a class="dropdown-item" href="errors/403.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                      </a></li>
                    <li><a class="dropdown-item" href="errors/500.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="lock"></span>Authentication</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Simple</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/simple/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Split</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/split/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Card</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/card/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../demo/vertical-sidenav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical sidenav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/dark-mode.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/sidenav-collapse.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav collapse</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/darknav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/topnav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/navbar-top-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/navbar-top.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/horizontal-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/combo-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/combo-nav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-puzzle-piece"></span>Modules</a>
              <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                <div class="border-0 scrollbar" style="max-height: 60vh;">
                  <div class="px-3 pt-4 pb-3 img-dropdown">
                    <div class="row gx-4 gy-5">
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="file-text" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Forms</h6>
                        </div><a class="dropdown-link" href="../../modules/forms/basic/form-control.html">Form control</a><a class="dropdown-link" href="../../modules/forms/basic/input-group.html">Input group</a><a class="dropdown-link" href="../../modules/forms/basic/select.html">Select</a><a class="dropdown-link" href="../../modules/forms/basic/checks.html">Checks</a><a class="dropdown-link" href="../../modules/forms/basic/range.html">Range</a><a class="dropdown-link" href="../../modules/forms/basic/floating-labels.html">Floating labels</a><a class="dropdown-link" href="../../modules/forms/basic/layout.html">Layout</a><a class="dropdown-link" href="../../modules/forms/advance/advance-select.html">Advance select</a><a class="dropdown-link" href="../../modules/forms/advance/date-picker.html">Date picker</a><a class="dropdown-link" href="../../modules/forms/advance/editor.html">Editor</a><a class="dropdown-link" href="../../modules/forms/advance/file-uploader.html">File uploader</a><a class="dropdown-link" href="../../modules/forms/advance/rating.html">Rating</a><a class="dropdown-link" href="../../modules/forms/advance/emoji-button.html">Emoji button</a><a class="dropdown-link" href="../../modules/forms/validation.html">Validation</a><a class="dropdown-link" href="../../modules/forms/wizard.html">Wizard</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Icons</h6>
                        </div><a class="dropdown-link" href="../../modules/icons/feather.html">Feather</a><a class="dropdown-link" href="../../modules/icons/font-awesome.html">Font awesome</a><a class="dropdown-link" href="../../modules/icons/unicons.html">Unicons</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="bar-chart-2" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">ECharts</h6>
                        </div><a class="dropdown-link" href="../../modules/echarts/line-charts.html">Line charts</a><a class="dropdown-link" href="../../modules/echarts/bar-charts.html">Bar charts</a><a class="dropdown-link" href="../../modules/echarts/candlestick-charts.html">Candlestick charts</a><a class="dropdown-link" href="../../modules/echarts/geo-map.html">Geo map</a><a class="dropdown-link" href="../../modules/echarts/scatter-charts.html">Scatter charts</a><a class="dropdown-link" href="../../modules/echarts/pie-charts.html">Pie charts</a><a class="dropdown-link" href="../../modules/echarts/gauge-chart.html">Gauge chart</a><a class="dropdown-link" href="../../modules/echarts/radar-charts.html">Radar charts</a><a class="dropdown-link" href="../../modules/echarts/heatmap-charts.html">Heatmap charts</a><a class="dropdown-link" href="../../modules/echarts/how-to-use.html">How to use</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="package" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Components</h6>
                        </div><a class="dropdown-link" href="../../modules/components/accordion.html">Accordion</a><a class="dropdown-link" href="../../modules/components/avatar.html">Avatar</a><a class="dropdown-link" href="../../modules/components/alerts.html">Alerts</a><a class="dropdown-link" href="../../modules/components/badge.html">Badge</a><a class="dropdown-link" href="../../modules/components/breadcrumb.html">Breadcrumb</a><a class="dropdown-link" href="../../modules/components/button.html">Buttons</a><a class="dropdown-link" href="../../modules/components/calendar.html">Calendar</a><a class="dropdown-link" href="../../modules/components/card.html">Card</a><a class="dropdown-link" href="../../modules/components/carousel/bootstrap.html">Bootstrap</a><a class="dropdown-link" href="../../modules/components/carousel/swiper.html">Swiper</a><a class="dropdown-link" href="../../modules/components/collapse.html">Collapse</a><a class="dropdown-link" href="../../modules/components/dropdown.html">Dropdown</a><a class="dropdown-link" href="../../modules/components/list-group.html">List group</a><a class="dropdown-link" href="../../modules/components/modal.html">Modals</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navs.html">Navs</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="dropdown-link" href="../../modules/components/offcanvas.html">Offcanvas</a><a class="dropdown-link" href="../../modules/components/progress-bar.html">Progress bar</a><a class="dropdown-link" href="../../modules/components/placeholder.html">Placeholder</a><a class="dropdown-link" href="../../modules/components/pagination.html">Pagination</a><a class="dropdown-link" href="../../modules/components/popovers.html">Popovers</a><a class="dropdown-link" href="../../modules/components/scrollspy.html">Scrollspy</a><a class="dropdown-link" href="../../modules/components/sortable.html">Sortable</a><a class="dropdown-link" href="../../modules/components/spinners.html">Spinners</a><a class="dropdown-link" href="../../modules/components/toast.html">Toast</a><a class="dropdown-link" href="../../modules/components/tooltips.html">Tooltips</a><a class="dropdown-link" href="../../modules/components/chat-widget.html">Chat widget</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="columns" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Tables</h6>
                        </div><a class="dropdown-link" href="../../modules/tables/basic-tables.html">Basic tables</a><a class="dropdown-link" href="../../modules/tables/advance-tables.html">Advance tables</a><a class="dropdown-link" href="../../modules/tables/bulk-select.html">Bulk Select</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Utilities</h6>
                        </div><a class="dropdown-link" href="../../modules/utilities/background.html">Background</a><a class="dropdown-link" href="../../modules/utilities/borders.html">Borders</a><a class="dropdown-link" href="../../modules/utilities/colors.html">Colors</a><a class="dropdown-link" href="../../modules/utilities/display.html">Display</a><a class="dropdown-link" href="../../modules/utilities/flex.html">Flex</a><a class="dropdown-link" href="../../modules/utilities/stacks.html">Stacks</a><a class="dropdown-link" href="../../modules/utilities/float.html">Float</a><a class="dropdown-link" href="../../modules/utilities/grid.html">Grid</a><a class="dropdown-link" href="../../modules/utilities/interactions.html">Interactions</a><a class="dropdown-link" href="../../modules/utilities/opacity.html">Opacity</a><a class="dropdown-link" href="../../modules/utilities/overflow.html">Overflow</a><a class="dropdown-link" href="../../modules/utilities/position.html">Position</a><a class="dropdown-link" href="../../modules/utilities/shadows.html">Shadows</a><a class="dropdown-link" href="../../modules/utilities/sizing.html">Sizing</a><a class="dropdown-link" href="../../modules/utilities/spacing.html">Spacing</a><a class="dropdown-link" href="../../modules/utilities/typography.html">Typography</a><a class="dropdown-link" href="../../modules/utilities/vertical-align.html">Vertical align</a><a class="dropdown-link" href="../../modules/utilities/visibility.html">Visibility</a>
                      </div>
                    </div>
                  </div>
                </div>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-document-layout-right"></span>Documentation</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item" href="../../documentation/getting-started.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="life-buoy"></span>Getting started</div>
                  </a></li>
                <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="settings"></span>Customization</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../documentation/customization/configuration.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/styling.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/dark-mode.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/plugin.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="table"></span>Layouts doc</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../documentation/layouts/vertical-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/horizontal-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/combo-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../documentation/gulp.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../documentation/design-file.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="figma"></span>Design file</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../changelog.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="git-merge"></span>Changelog</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../showcase.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="monitor"></span>Showcase</div>
                  </a></li>
              </ul>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
          <li class="nav-item">
            <div class="theme-control-toggle fa-ion-wait pe-2 theme-control-toggle-slim"><input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="phoenixTheme" value="dark" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon me-1 d-none d-sm-block" data-feather="moon"></span><span class="fs--1 fw-bold">Dark</span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon me-1 d-none d-sm-block" data-feather="sun"></span><span class="fs--1 fw-bold">Light</span></label></div>
          </li>
          <li class="nav-item"> <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span data-feather="search" style="height:12px;width:12px;"></span></a></li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span data-feather="bell" style="height:12px;width:12px;"></span></a>
            <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
              <div class="card position-relative border-0">
                <div class="card-header p-2">
                  <div class="d-flex justify-content-between">
                    <h5 class="text-black mb-0">Notificatons</h5><button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="scrollbar-overlay" style="height: 27rem;">
                    <div class="border-300">
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/30.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jessie Samson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3">
                              <div class="avatar-name rounded-circle"><span>J</span></div>
                            </div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jane Foster</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>📅</span>Created an event.<span class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:20 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder" src="../../assets/img/team/40x40/avatar.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jessie Samson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:30 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="border-300">
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/57.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Kiera Anderson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:11 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/59.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Herman Carter</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👤</span>Tagged you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:58 PM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/58.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Benjamin Button</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:18 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer p-0 border-top border-0">
                  <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="notifications.html">Notification history</a></div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="10" height="10" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
              </svg></a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300" aria-labelledby="navbarDropdownNindeDots">
              <div class="card bg-white position-relative border-0">
                <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                  <div class="row text-center align-items-center gx-0 gy-0">
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/behance.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/slack.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/trello.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/figma.webp" alt="" width="20" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/twitter.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/ln.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/spotify.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                      </a></div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0 white-space-nowrap" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">Olivia <span class="fa-solid fa-chevron-down fs--2"></span></a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
              <div class="card position-relative border-0">
                <div class="card-body p-0">
                  <div class="text-center pt-4 pb-3">
                    <div class="avatar avatar-xl ">
                      <img class="rounded-circle " src="../../assets/img/team/72x72/57.webp" alt="" />
                    </div>
                    <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                  </div>
                  <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                </div>
                <div class="overflow-auto scrollbar" style="height: 10rem;">
                  <ul class="nav d-flex flex-column mb-2 pb-1">
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                  </ul>
                </div>
                <div class="card-footer p-0 border-top">
                  <ul class="nav d-flex flex-column my-3">
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
                  </ul>
                  <hr />
                  <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                  <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarCombo" data-navbar-top="combo" data-move-target="#navbarVerticalNav" style="display:none;">
        <div class="navbar-logo">
          <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
          <a class="navbar-brand me-1 me-sm-3" href="../../index.html">
            <div class="d-flex align-items-center">
              <div class="d-flex align-items-center"><img src="../../assets/img/icons/logo.png" alt="phoenix" width="27" />
                <p class="logo-text ms-2 d-none d-sm-block">phoenix</p>
              </div>
            </div>
          </a>
        </div>
        <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center" id="navbarTopCollapse">
          <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-chart-pie"></span>Home</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item" href="../../index.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="shopping-cart"></span>E commerce</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../dashboard/project-management.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clipboard"></span>Project management</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../dashboard/crm.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="phone"></span>CRM</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../apps/social/feed.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="share-2"></span>Social feed</div>
                  </a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-cube"></span>Apps</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="shopping-cart"></span>E commerce</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Admin</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/add-product.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add product</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/products.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/customers.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customers</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/customer-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customer details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/orders.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/order-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/refund.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Customer</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/homepage.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/products-filter.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products filter</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/cart.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/checkout.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/shipping-info.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Shipping info</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/profile.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/favourite-stores.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Favourite stores</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/wishlist.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Wishlist</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/order-tracking.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order tracking</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/invoice.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/crm/analytics.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/deals.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/deal-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/leads.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/lead-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/reports.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/reports-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/add-contact.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="clipboard"></span>Project management</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/project-management/create-new.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-list-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project list view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-card-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project card view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-board-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project board view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/todo-list.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project details</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../apps/chat.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="message-square"></span>Chat</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="mail"></span>Email</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/email/inbox.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/email/email-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email detail</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/email/compose.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/events/create-an-event.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an event</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/events/event-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event detail</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/kanban/kanban.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/kanban/boards.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/kanban/create-kanban-board.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create board</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/social/profile.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/social/settings.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../apps/calendar.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="calendar"></span>Calendar</div>
                  </a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-files-landscapes-alt"></span>Pages</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item active" href="starter.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="compass"></span>Starter</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="faq/faq-accordion.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq accordion</div>
                      </a></li>
                    <li><a class="dropdown-item" href="faq/faq-tab.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="landing/default.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default</div>
                      </a></li>
                    <li><a class="dropdown-item" href="landing/alternate.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="pricing/pricing-column.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing column</div>
                      </a></li>
                    <li><a class="dropdown-item" href="pricing/pricing-grid.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing grid</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="notifications.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="bell"></span>Notifications</div>
                  </a></li>
                <li><a class="dropdown-item" href="members.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="users"></span>Members</div>
                  </a></li>
                <li><a class="dropdown-item" href="timeline.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clock"></span>Timeline</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="alert-triangle"></span>Errors</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="errors/404.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                      </a></li>
                    <li><a class="dropdown-item" href="errors/403.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                      </a></li>
                    <li><a class="dropdown-item" href="errors/500.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="lock"></span>Authentication</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Simple</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/simple/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Split</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/split/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Card</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/card/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../demo/vertical-sidenav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical sidenav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/dark-mode.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/sidenav-collapse.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav collapse</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/darknav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/topnav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/navbar-top-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/navbar-top.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/horizontal-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/combo-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/combo-nav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-puzzle-piece"></span>Modules</a>
              <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                <div class="border-0 scrollbar" style="max-height: 60vh;">
                  <div class="px-3 pt-4 pb-3 img-dropdown">
                    <div class="row gx-4 gy-5">
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="file-text" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Forms</h6>
                        </div><a class="dropdown-link" href="../../modules/forms/basic/form-control.html">Form control</a><a class="dropdown-link" href="../../modules/forms/basic/input-group.html">Input group</a><a class="dropdown-link" href="../../modules/forms/basic/select.html">Select</a><a class="dropdown-link" href="../../modules/forms/basic/checks.html">Checks</a><a class="dropdown-link" href="../../modules/forms/basic/range.html">Range</a><a class="dropdown-link" href="../../modules/forms/basic/floating-labels.html">Floating labels</a><a class="dropdown-link" href="../../modules/forms/basic/layout.html">Layout</a><a class="dropdown-link" href="../../modules/forms/advance/advance-select.html">Advance select</a><a class="dropdown-link" href="../../modules/forms/advance/date-picker.html">Date picker</a><a class="dropdown-link" href="../../modules/forms/advance/editor.html">Editor</a><a class="dropdown-link" href="../../modules/forms/advance/file-uploader.html">File uploader</a><a class="dropdown-link" href="../../modules/forms/advance/rating.html">Rating</a><a class="dropdown-link" href="../../modules/forms/advance/emoji-button.html">Emoji button</a><a class="dropdown-link" href="../../modules/forms/validation.html">Validation</a><a class="dropdown-link" href="../../modules/forms/wizard.html">Wizard</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Icons</h6>
                        </div><a class="dropdown-link" href="../../modules/icons/feather.html">Feather</a><a class="dropdown-link" href="../../modules/icons/font-awesome.html">Font awesome</a><a class="dropdown-link" href="../../modules/icons/unicons.html">Unicons</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="bar-chart-2" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">ECharts</h6>
                        </div><a class="dropdown-link" href="../../modules/echarts/line-charts.html">Line charts</a><a class="dropdown-link" href="../../modules/echarts/bar-charts.html">Bar charts</a><a class="dropdown-link" href="../../modules/echarts/candlestick-charts.html">Candlestick charts</a><a class="dropdown-link" href="../../modules/echarts/geo-map.html">Geo map</a><a class="dropdown-link" href="../../modules/echarts/scatter-charts.html">Scatter charts</a><a class="dropdown-link" href="../../modules/echarts/pie-charts.html">Pie charts</a><a class="dropdown-link" href="../../modules/echarts/gauge-chart.html">Gauge chart</a><a class="dropdown-link" href="../../modules/echarts/radar-charts.html">Radar charts</a><a class="dropdown-link" href="../../modules/echarts/heatmap-charts.html">Heatmap charts</a><a class="dropdown-link" href="../../modules/echarts/how-to-use.html">How to use</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="package" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Components</h6>
                        </div><a class="dropdown-link" href="../../modules/components/accordion.html">Accordion</a><a class="dropdown-link" href="../../modules/components/avatar.html">Avatar</a><a class="dropdown-link" href="../../modules/components/alerts.html">Alerts</a><a class="dropdown-link" href="../../modules/components/badge.html">Badge</a><a class="dropdown-link" href="../../modules/components/breadcrumb.html">Breadcrumb</a><a class="dropdown-link" href="../../modules/components/button.html">Buttons</a><a class="dropdown-link" href="../../modules/components/calendar.html">Calendar</a><a class="dropdown-link" href="../../modules/components/card.html">Card</a><a class="dropdown-link" href="../../modules/components/carousel/bootstrap.html">Bootstrap</a><a class="dropdown-link" href="../../modules/components/carousel/swiper.html">Swiper</a><a class="dropdown-link" href="../../modules/components/collapse.html">Collapse</a><a class="dropdown-link" href="../../modules/components/dropdown.html">Dropdown</a><a class="dropdown-link" href="../../modules/components/list-group.html">List group</a><a class="dropdown-link" href="../../modules/components/modal.html">Modals</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navs.html">Navs</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="dropdown-link" href="../../modules/components/offcanvas.html">Offcanvas</a><a class="dropdown-link" href="../../modules/components/progress-bar.html">Progress bar</a><a class="dropdown-link" href="../../modules/components/placeholder.html">Placeholder</a><a class="dropdown-link" href="../../modules/components/pagination.html">Pagination</a><a class="dropdown-link" href="../../modules/components/popovers.html">Popovers</a><a class="dropdown-link" href="../../modules/components/scrollspy.html">Scrollspy</a><a class="dropdown-link" href="../../modules/components/sortable.html">Sortable</a><a class="dropdown-link" href="../../modules/components/spinners.html">Spinners</a><a class="dropdown-link" href="../../modules/components/toast.html">Toast</a><a class="dropdown-link" href="../../modules/components/tooltips.html">Tooltips</a><a class="dropdown-link" href="../../modules/components/chat-widget.html">Chat widget</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="columns" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Tables</h6>
                        </div><a class="dropdown-link" href="../../modules/tables/basic-tables.html">Basic tables</a><a class="dropdown-link" href="../../modules/tables/advance-tables.html">Advance tables</a><a class="dropdown-link" href="../../modules/tables/bulk-select.html">Bulk Select</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Utilities</h6>
                        </div><a class="dropdown-link" href="../../modules/utilities/background.html">Background</a><a class="dropdown-link" href="../../modules/utilities/borders.html">Borders</a><a class="dropdown-link" href="../../modules/utilities/colors.html">Colors</a><a class="dropdown-link" href="../../modules/utilities/display.html">Display</a><a class="dropdown-link" href="../../modules/utilities/flex.html">Flex</a><a class="dropdown-link" href="../../modules/utilities/stacks.html">Stacks</a><a class="dropdown-link" href="../../modules/utilities/float.html">Float</a><a class="dropdown-link" href="../../modules/utilities/grid.html">Grid</a><a class="dropdown-link" href="../../modules/utilities/interactions.html">Interactions</a><a class="dropdown-link" href="../../modules/utilities/opacity.html">Opacity</a><a class="dropdown-link" href="../../modules/utilities/overflow.html">Overflow</a><a class="dropdown-link" href="../../modules/utilities/position.html">Position</a><a class="dropdown-link" href="../../modules/utilities/shadows.html">Shadows</a><a class="dropdown-link" href="../../modules/utilities/sizing.html">Sizing</a><a class="dropdown-link" href="../../modules/utilities/spacing.html">Spacing</a><a class="dropdown-link" href="../../modules/utilities/typography.html">Typography</a><a class="dropdown-link" href="../../modules/utilities/vertical-align.html">Vertical align</a><a class="dropdown-link" href="../../modules/utilities/visibility.html">Visibility</a>
                      </div>
                    </div>
                  </div>
                </div>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-document-layout-right"></span>Documentation</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item" href="../../documentation/getting-started.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="life-buoy"></span>Getting started</div>
                  </a></li>
                <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="settings"></span>Customization</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../documentation/customization/configuration.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/styling.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/dark-mode.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/plugin.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="table"></span>Layouts doc</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../documentation/layouts/vertical-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/horizontal-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/combo-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../documentation/gulp.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../documentation/design-file.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="figma"></span>Design file</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../changelog.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="git-merge"></span>Changelog</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../showcase.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="monitor"></span>Showcase</div>
                  </a></li>
              </ul>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
          <li class="nav-item">
            <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="moon"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label></div>
          </li>
          <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span data-feather="search" style="height:19px;width:19px;margin-bottom: 2px;"></span></a></li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" style="min-width: 2.5rem" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span data-feather="bell" style="height:20px;width:20px;"></span></a>
            <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
              <div class="card position-relative border-0">
                <div class="card-header p-2">
                  <div class="d-flex justify-content-between">
                    <h5 class="text-black mb-0">Notificatons</h5><button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="scrollbar-overlay" style="height: 27rem;">
                    <div class="border-300">
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/30.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jessie Samson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3">
                              <div class="avatar-name rounded-circle"><span>J</span></div>
                            </div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jane Foster</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>📅</span>Created an event.<span class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:20 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder" src="../../assets/img/team/40x40/avatar.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jessie Samson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:30 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="border-300">
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/57.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Kiera Anderson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:11 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/59.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Herman Carter</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👤</span>Tagged you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:58 PM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/58.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Benjamin Button</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:18 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer p-0 border-top border-0">
                  <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="notifications.html">Notification history</a></div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
              </svg></a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300" aria-labelledby="navbarDropdownNindeDots">
              <div class="card bg-white position-relative border-0">
                <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                  <div class="row text-center align-items-center gx-0 gy-0">
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/behance.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/slack.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/trello.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/figma.webp" alt="" width="20" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/twitter.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/ln.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/spotify.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                      </a></div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-l ">
                <img class="rounded-circle " src="../../assets/img/team/40x40/57.webp" alt="" />
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
              <div class="card position-relative border-0">
                <div class="card-body p-0">
                  <div class="text-center pt-4 pb-3">
                    <div class="avatar avatar-xl ">
                      <img class="rounded-circle " src="../../assets/img/team/72x72/57.webp" alt="" />
                    </div>
                    <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                  </div>
                  <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                </div>
                <div class="overflow-auto scrollbar" style="height: 10rem;">
                  <ul class="nav d-flex flex-column mb-2 pb-1">
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                  </ul>
                </div>
                <div class="card-footer p-0 border-top">
                  <ul class="nav d-flex flex-column my-3">
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
                  </ul>
                  <hr />
                  <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                  <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <nav class="navbar navbar-top fixed-top navbar-slim justify-content-between navbar-expand-lg" id="navbarComboSlim" data-navbar-top="combo" data-move-target="#navbarVerticalNav" style="display:none;">
        <div class="navbar-logo">
          <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
          <a class="navbar-brand navbar-brand" href="../../index.html">phoenix <span class="text-1000 d-none d-sm-inline">slim</span></a>
        </div>
        <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center" id="navbarTopCollapse">
          <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-chart-pie"></span>Home</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item" href="../../index.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="shopping-cart"></span>E commerce</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../dashboard/project-management.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clipboard"></span>Project management</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../dashboard/crm.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="phone"></span>CRM</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../apps/social/feed.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="share-2"></span>Social feed</div>
                  </a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-cube"></span>Apps</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="shopping-cart"></span>E commerce</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Admin</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/add-product.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add product</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/products.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/customers.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customers</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/customer-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customer details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/orders.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/order-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/admin/refund.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Customer</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/homepage.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product details</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/products-filter.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products filter</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/cart.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/checkout.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/shipping-info.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Shipping info</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/profile.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/favourite-stores.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Favourite stores</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/wishlist.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Wishlist</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/order-tracking.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order tracking</div>
                          </a></li>
                        <li><a class="dropdown-item" href="../../apps/e-commerce/landing/invoice.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/crm/analytics.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/deals.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/deal-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/leads.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/lead-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/reports.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/reports-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports details</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/crm/add-contact.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="clipboard"></span>Project management</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/project-management/create-new.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-list-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project list view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-card-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project card view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-board-view.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project board view</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/todo-list.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/project-management/project-details.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project details</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../apps/chat.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="message-square"></span>Chat</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="mail"></span>Email</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/email/inbox.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/email/email-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email detail</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/email/compose.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/events/create-an-event.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an event</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/events/event-detail.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event detail</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/kanban/kanban.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/kanban/boards.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/kanban/create-kanban-board.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create board</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../apps/social/profile.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../apps/social/settings.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../apps/calendar.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="calendar"></span>Calendar</div>
                  </a></li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-files-landscapes-alt"></span>Pages</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item active" href="starter.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="compass"></span>Starter</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="faq/faq-accordion.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq accordion</div>
                      </a></li>
                    <li><a class="dropdown-item" href="faq/faq-tab.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="landing/default.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default</div>
                      </a></li>
                    <li><a class="dropdown-item" href="landing/alternate.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="pricing/pricing-column.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing column</div>
                      </a></li>
                    <li><a class="dropdown-item" href="pricing/pricing-grid.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing grid</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="notifications.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="bell"></span>Notifications</div>
                  </a></li>
                <li><a class="dropdown-item" href="members.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="users"></span>Members</div>
                  </a></li>
                <li><a class="dropdown-item" href="timeline.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clock"></span>Timeline</div>
                  </a></li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="alert-triangle"></span>Errors</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="errors/404.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                      </a></li>
                    <li><a class="dropdown-item" href="errors/403.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                      </a></li>
                    <li><a class="dropdown-item" href="errors/500.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="lock"></span>Authentication</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Simple</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/simple/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/simple/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Split</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/split/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/split/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Card</span></div>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="authentication/card/sign-in.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/sign-up.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/sign-out.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/forgot-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/reset-password.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/lock-screen.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                          </a></li>
                        <li><a class="dropdown-item" href="authentication/card/2FA.html">
                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../demo/vertical-sidenav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical sidenav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/dark-mode.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/sidenav-collapse.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav collapse</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/darknav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/topnav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/navbar-top-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/navbar-top.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/horizontal-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/combo-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/combo-nav-slim.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav slim</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../demo/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-puzzle-piece"></span>Modules</a>
              <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                <div class="border-0 scrollbar" style="max-height: 60vh;">
                  <div class="px-3 pt-4 pb-3 img-dropdown">
                    <div class="row gx-4 gy-5">
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="file-text" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Forms</h6>
                        </div><a class="dropdown-link" href="../../modules/forms/basic/form-control.html">Form control</a><a class="dropdown-link" href="../../modules/forms/basic/input-group.html">Input group</a><a class="dropdown-link" href="../../modules/forms/basic/select.html">Select</a><a class="dropdown-link" href="../../modules/forms/basic/checks.html">Checks</a><a class="dropdown-link" href="../../modules/forms/basic/range.html">Range</a><a class="dropdown-link" href="../../modules/forms/basic/floating-labels.html">Floating labels</a><a class="dropdown-link" href="../../modules/forms/basic/layout.html">Layout</a><a class="dropdown-link" href="../../modules/forms/advance/advance-select.html">Advance select</a><a class="dropdown-link" href="../../modules/forms/advance/date-picker.html">Date picker</a><a class="dropdown-link" href="../../modules/forms/advance/editor.html">Editor</a><a class="dropdown-link" href="../../modules/forms/advance/file-uploader.html">File uploader</a><a class="dropdown-link" href="../../modules/forms/advance/rating.html">Rating</a><a class="dropdown-link" href="../../modules/forms/advance/emoji-button.html">Emoji button</a><a class="dropdown-link" href="../../modules/forms/validation.html">Validation</a><a class="dropdown-link" href="../../modules/forms/wizard.html">Wizard</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Icons</h6>
                        </div><a class="dropdown-link" href="../../modules/icons/feather.html">Feather</a><a class="dropdown-link" href="../../modules/icons/font-awesome.html">Font awesome</a><a class="dropdown-link" href="../../modules/icons/unicons.html">Unicons</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="bar-chart-2" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">ECharts</h6>
                        </div><a class="dropdown-link" href="../../modules/echarts/line-charts.html">Line charts</a><a class="dropdown-link" href="../../modules/echarts/bar-charts.html">Bar charts</a><a class="dropdown-link" href="../../modules/echarts/candlestick-charts.html">Candlestick charts</a><a class="dropdown-link" href="../../modules/echarts/geo-map.html">Geo map</a><a class="dropdown-link" href="../../modules/echarts/scatter-charts.html">Scatter charts</a><a class="dropdown-link" href="../../modules/echarts/pie-charts.html">Pie charts</a><a class="dropdown-link" href="../../modules/echarts/gauge-chart.html">Gauge chart</a><a class="dropdown-link" href="../../modules/echarts/radar-charts.html">Radar charts</a><a class="dropdown-link" href="../../modules/echarts/heatmap-charts.html">Heatmap charts</a><a class="dropdown-link" href="../../modules/echarts/how-to-use.html">How to use</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="package" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Components</h6>
                        </div><a class="dropdown-link" href="../../modules/components/accordion.html">Accordion</a><a class="dropdown-link" href="../../modules/components/avatar.html">Avatar</a><a class="dropdown-link" href="../../modules/components/alerts.html">Alerts</a><a class="dropdown-link" href="../../modules/components/badge.html">Badge</a><a class="dropdown-link" href="../../modules/components/breadcrumb.html">Breadcrumb</a><a class="dropdown-link" href="../../modules/components/button.html">Buttons</a><a class="dropdown-link" href="../../modules/components/calendar.html">Calendar</a><a class="dropdown-link" href="../../modules/components/card.html">Card</a><a class="dropdown-link" href="../../modules/components/carousel/bootstrap.html">Bootstrap</a><a class="dropdown-link" href="../../modules/components/carousel/swiper.html">Swiper</a><a class="dropdown-link" href="../../modules/components/collapse.html">Collapse</a><a class="dropdown-link" href="../../modules/components/dropdown.html">Dropdown</a><a class="dropdown-link" href="../../modules/components/list-group.html">List group</a><a class="dropdown-link" href="../../modules/components/modal.html">Modals</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navs.html">Navs</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="dropdown-link" href="../../modules/components/offcanvas.html">Offcanvas</a><a class="dropdown-link" href="../../modules/components/progress-bar.html">Progress bar</a><a class="dropdown-link" href="../../modules/components/placeholder.html">Placeholder</a><a class="dropdown-link" href="../../modules/components/pagination.html">Pagination</a><a class="dropdown-link" href="../../modules/components/popovers.html">Popovers</a><a class="dropdown-link" href="../../modules/components/scrollspy.html">Scrollspy</a><a class="dropdown-link" href="../../modules/components/sortable.html">Sortable</a><a class="dropdown-link" href="../../modules/components/spinners.html">Spinners</a><a class="dropdown-link" href="../../modules/components/toast.html">Toast</a><a class="dropdown-link" href="../../modules/components/tooltips.html">Tooltips</a><a class="dropdown-link" href="../../modules/components/chat-widget.html">Chat widget</a>
                      </div>
                      <div class="col-12 col-sm-6 col-md-4">
                        <div class="dropdown-item-group"><span class="me-2" data-feather="columns" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Tables</h6>
                        </div><a class="dropdown-link" href="../../modules/tables/basic-tables.html">Basic tables</a><a class="dropdown-link" href="../../modules/tables/advance-tables.html">Advance tables</a><a class="dropdown-link" href="../../modules/tables/bulk-select.html">Bulk Select</a>
                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool" style="stroke-width:2;"></span>
                          <h6 class="dropdown-item-title">Utilities</h6>
                        </div><a class="dropdown-link" href="../../modules/utilities/background.html">Background</a><a class="dropdown-link" href="../../modules/utilities/borders.html">Borders</a><a class="dropdown-link" href="../../modules/utilities/colors.html">Colors</a><a class="dropdown-link" href="../../modules/utilities/display.html">Display</a><a class="dropdown-link" href="../../modules/utilities/flex.html">Flex</a><a class="dropdown-link" href="../../modules/utilities/stacks.html">Stacks</a><a class="dropdown-link" href="../../modules/utilities/float.html">Float</a><a class="dropdown-link" href="../../modules/utilities/grid.html">Grid</a><a class="dropdown-link" href="../../modules/utilities/interactions.html">Interactions</a><a class="dropdown-link" href="../../modules/utilities/opacity.html">Opacity</a><a class="dropdown-link" href="../../modules/utilities/overflow.html">Overflow</a><a class="dropdown-link" href="../../modules/utilities/position.html">Position</a><a class="dropdown-link" href="../../modules/utilities/shadows.html">Shadows</a><a class="dropdown-link" href="../../modules/utilities/sizing.html">Sizing</a><a class="dropdown-link" href="../../modules/utilities/spacing.html">Spacing</a><a class="dropdown-link" href="../../modules/utilities/typography.html">Typography</a><a class="dropdown-link" href="../../modules/utilities/vertical-align.html">Vertical align</a><a class="dropdown-link" href="../../modules/utilities/visibility.html">Visibility</a>
                      </div>
                    </div>
                  </div>
                </div>
              </ul>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-document-layout-right"></span>Documentation</a>
              <ul class="dropdown-menu navbar-dropdown-caret">
                <li><a class="dropdown-item" href="../../documentation/getting-started.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="life-buoy"></span>Getting started</div>
                  </a></li>
                <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="settings"></span>Customization</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../documentation/customization/configuration.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/styling.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/dark-mode.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/customization/plugin.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin</div>
                      </a></li>
                  </ul>
                </li>
                <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="table"></span>Layouts doc</span></div>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../documentation/layouts/vertical-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/horizontal-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/combo-navbar.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo navbar</div>
                      </a></li>
                    <li><a class="dropdown-item" href="../../documentation/layouts/dual-nav.html">
                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                      </a></li>
                  </ul>
                </li>
                <li><a class="dropdown-item" href="../../documentation/gulp.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../documentation/design-file.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="figma"></span>Design file</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../changelog.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="git-merge"></span>Changelog</div>
                  </a></li>
                <li><a class="dropdown-item" href="../../showcase.html">
                    <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="monitor"></span>Showcase</div>
                  </a></li>
              </ul>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
          <li class="nav-item">
            <div class="theme-control-toggle fa-ion-wait pe-2 theme-control-toggle-slim"><input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="phoenixTheme" value="dark" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon me-1 d-none d-sm-block" data-feather="moon"></span><span class="fs--1 fw-bold">Dark</span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon me-1 d-none d-sm-block" data-feather="sun"></span><span class="fs--1 fw-bold">Light</span></label></div>
          </li>
          <li class="nav-item"> <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span data-feather="search" style="height:12px;width:12px;"></span></a></li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span data-feather="bell" style="height:12px;width:12px;"></span></a>
            <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
              <div class="card position-relative border-0">
                <div class="card-header p-2">
                  <div class="d-flex justify-content-between">
                    <h5 class="text-black mb-0">Notificatons</h5><button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="scrollbar-overlay" style="height: 27rem;">
                    <div class="border-300">
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/30.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jessie Samson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3">
                              <div class="avatar-name rounded-circle"><span>J</span></div>
                            </div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jane Foster</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>📅</span>Created an event.<span class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:20 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder" src="../../assets/img/team/40x40/avatar.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Jessie Samson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:30 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="border-300">
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/57.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Kiera Anderson</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:11 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/59.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Herman Carter</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👤</span>Tagged you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:58 PM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                        <div class="d-flex align-items-center justify-content-between position-relative">
                          <div class="d-flex">
                            <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/58.webp" alt="" /></div>
                            <div class="flex-1 me-sm-3">
                              <h4 class="fs--1 text-black">Benjamin Button</h4>
                              <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                              <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:18 AM </span>August 7,2021</p>
                            </div>
                          </div>
                          <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer p-0 border-top border-0">
                  <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="notifications.html">Notification history</a></div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="10" height="10" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
              </svg></a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300" aria-labelledby="navbarDropdownNindeDots">
              <div class="card bg-white position-relative border-0">
                <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                  <div class="row text-center align-items-center gx-0 gy-0">
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/behance.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/slack.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/trello.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/figma.webp" alt="" width="20" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/twitter.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/ln.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                      </a></div>
                    <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/spotify.webp" alt="" width="30" />
                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                      </a></div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0 white-space-nowrap" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">Olivia <span class="fa-solid fa-chevron-down fs--2"></span></a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
              <div class="card position-relative border-0">
                <div class="card-body p-0">
                  <div class="text-center pt-4 pb-3">
                    <div class="avatar avatar-xl ">
                      <img class="rounded-circle " src="../../assets/img/team/72x72/57.webp" alt="" />
                    </div>
                    <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                  </div>
                  <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                </div>
                <div class="overflow-auto scrollbar" style="height: 10rem;">
                  <ul class="nav d-flex flex-column mb-2 pb-1">
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                  </ul>
                </div>
                <div class="card-footer p-0 border-top">
                  <ul class="nav d-flex flex-column my-3">
                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
                  </ul>
                  <hr />
                  <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                  <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="dualNav" style="display:none;">
        <div class="w-100">
          <div class="d-flex flex-between-center dual-nav-first-layer">
            <div class="navbar-logo">
              <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopCollapse" aria-controls="navbarTopCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
              <a class="navbar-brand me-1 me-sm-3" href="../../index.html">
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-center"><img src="../../assets/img/icons/logo.png" alt="phoenix" width="27" />
                    <p class="logo-text ms-2 d-none d-sm-block">phoenix</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="search-box navbar-top-search-box d-none d-lg-block" data-list='{"valueNames":["title"]}' style="width:25rem;">
              <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input fuzzy-search rounded-pill form-control-sm" type="search" placeholder="Search..." aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>
              </form>
              <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button></div>
              <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                <div class="scrollbar-overlay" style="max-height: 30rem;">
                  <div class="list pb-3">
                    <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span class="text-500">results</span></h6>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently Searched </h6>
                    <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> Store Macbook</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                        </div>
                      </a>
                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Products</h6>
                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3" src="../../assets/img/products/60x60/3.png" alt="" /></div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                          <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB Memory - 1.6GHz - 128GB Storage</span></p>
                        </div>
                      </a>
                      <a class="dropdown-item py-2 d-flex align-items-center" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="file-thumbnail me-2"><img class="img-fluid" src="../../assets/img/products/60x60/3.png" alt="" /></div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                          <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                        </div>
                      </a>
                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick Links</h6>
                    <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Support MacBook House</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                        </div>
                      </a>
                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Files</h6>
                    <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-file-zipper text-900" data-fa-transform="shrink-2"></span> Library MacBook folder.rar</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-file-lines text-900" data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-image text-900" data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                        </div>
                      </a>
                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Members</h6>
                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="members.html">
                        <div class="avatar avatar-l status-online  me-2 text-900">
                          <img class="rounded-circle " src="../../assets/img/team/40x40/10.webp" alt="" />
                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                          <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                        </div>
                      </a>
                      <a class="dropdown-item py-2 d-flex align-items-center" href="members.html">
                        <div class="avatar avatar-l  me-2 text-900">
                          <img class="rounded-circle " src="../../assets/img/team/40x40/12.webp" alt="" />
                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">John Smith</h6>
                          <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                        </div>
                      </a>
                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Related Searches</h6>
                    <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                          <div class="fw-normal text-1000 title"><span class="fa-brands fa-firefox-browser text-900" data-fa-transform="shrink-2"></span> Search in the Web MacBook</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">
                          <div class="fw-normal text-1000 title"> <span class="fa-brands fa-chrome text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="text-center">
                    <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                  </div>
                </div>
              </div>
            </div>
            <ul class="navbar-nav navbar-nav-icons flex-row">
              <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="moon"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label></div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" style="min-width: 2.5rem" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span data-feather="bell" style="height:20px;width:20px;"></span></a>
                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                  <div class="card position-relative border-0">
                    <div class="card-header p-2">
                      <div class="d-flex justify-content-between">
                        <h5 class="text-black mb-0">Notificatons</h5><button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                      </div>
                    </div>
                    <div class="card-body p-0">
                      <div class="scrollbar-overlay" style="height: 27rem;">
                        <div class="border-300">
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/30.webp" alt="" /></div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Jessie Samson</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3">
                                  <div class="avatar-name rounded-circle"><span>J</span></div>
                                </div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Jane Foster</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>📅</span>Created an event.<span class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:20 AM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder" src="../../assets/img/team/40x40/avatar.webp" alt="" /></div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Jessie Samson</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:30 AM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="border-300">
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/57.webp" alt="" /></div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:11 AM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/59.webp" alt="" /></div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Herman Carter</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👤</span>Tagged you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:58 PM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="../../assets/img/team/40x40/58.webp" alt="" /></div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Benjamin Button</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:18 AM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block"><button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer p-0 border-top border-0">
                      <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="notifications.html">Notification history</a></div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                    <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                    <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                    <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                    <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                    <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                    <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                    <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                    <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                  </svg></a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300" aria-labelledby="navbarDropdownNindeDots">
                  <div class="card bg-white position-relative border-0">
                    <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                      <div class="row text-center align-items-center gx-0 gy-0">
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/behance.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/slack.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/trello.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/figma.webp" alt="" width="20" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/twitter.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/ln.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/google-photos.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                          </a></div>
                        <div class="col-4"><a class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3" href="#!"><img src="../../assets/img/nav-icons/spotify.webp" alt="" width="30" />
                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                          </a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-l ">
                    <img class="rounded-circle " src="../../assets/img/team/40x40/57.webp" alt="" />
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                  <div class="card position-relative border-0">
                    <div class="card-body p-0">
                      <div class="text-center pt-4 pb-3">
                        <div class="avatar avatar-xl ">
                          <img class="rounded-circle " src="../../assets/img/team/72x72/57.webp" alt="" />
                        </div>
                        <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                      </div>
                      <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                    </div>
                    <div class="overflow-auto scrollbar" style="height: 10rem;">
                      <ul class="nav d-flex flex-column mb-2 pb-1">
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                      </ul>
                    </div>
                    <div class="card-footer p-0 border-top">
                      <ul class="nav d-flex flex-column my-3">
                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>
                      </ul>
                      <hr />
                      <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                      <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="collapse navbar-collapse navbar-top-collapse justify-content-center" id="navbarTopCollapse">
            <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-chart-pie"></span>Home</a>
                <ul class="dropdown-menu navbar-dropdown-caret">
                  <li><a class="dropdown-item" href="../../index.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="shopping-cart"></span>E commerce</div>
                    </a></li>
                  <li><a class="dropdown-item" href="../../dashboard/project-management.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clipboard"></span>Project management</div>
                    </a></li>
                  <li><a class="dropdown-item" href="../../dashboard/crm.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="phone"></span>CRM</div>
                    </a></li>
                  <li><a class="dropdown-item" href="../../apps/social/feed.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="share-2"></span>Social feed</div>
                    </a></li>
                </ul>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-cube"></span>Apps</a>
                <ul class="dropdown-menu navbar-dropdown-caret">
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="shopping-cart"></span>E commerce</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Admin</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="../../apps/e-commerce/admin/add-product.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add product</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/admin/products.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/admin/customers.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customers</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/admin/customer-details.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Customer details</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/admin/orders.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/admin/order-details.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order details</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/admin/refund.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund</div>
                            </a></li>
                        </ul>
                      </li>
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Customer</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="../../apps/e-commerce/landing/homepage.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Homepage</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product details</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/landing/products-filter.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Products filter</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/landing/cart.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/landing/checkout.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Checkout</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/landing/shipping-info.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Shipping info</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/landing/profile.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/landing/favourite-stores.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Favourite stores</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/landing/wishlist.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Wishlist</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/landing/order-tracking.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order tracking</div>
                            </a></li>
                          <li><a class="dropdown-item" href="../../apps/e-commerce/landing/invoice.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice</div>
                            </a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../../apps/crm/analytics.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/crm/deals.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/crm/deal-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/crm/leads.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/crm/lead-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/crm/reports.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/crm/reports-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports details</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/crm/add-contact.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="clipboard"></span>Project management</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../../apps/project-management/create-new.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/project-management/project-list-view.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project list view</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/project-management/project-card-view.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project card view</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/project-management/project-board-view.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project board view</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/project-management/todo-list.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/project-management/project-details.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project details</div>
                        </a></li>
                    </ul>
                  </li>
                  <li><a class="dropdown-item" href="../../apps/chat.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="message-square"></span>Chat</div>
                    </a></li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="mail"></span>Email</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../../apps/email/inbox.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/email/email-detail.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email detail</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/email/compose.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../../apps/events/create-an-event.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an event</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/events/event-detail.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event detail</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../../apps/kanban/kanban.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/kanban/boards.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/kanban/create-kanban-board.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create board</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../../apps/social/profile.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../apps/social/settings.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings</div>
                        </a></li>
                    </ul>
                  </li>
                  <li><a class="dropdown-item" href="../../apps/calendar.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="calendar"></span>Calendar</div>
                    </a></li>
                </ul>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-files-landscapes-alt"></span>Pages</a>
                <ul class="dropdown-menu navbar-dropdown-caret">
                  <li><a class="dropdown-item active" href="starter.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="compass"></span>Starter</div>
                    </a></li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="faq/faq-accordion.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq accordion</div>
                        </a></li>
                      <li><a class="dropdown-item" href="faq/faq-tab.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="landing/default.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default</div>
                        </a></li>
                      <li><a class="dropdown-item" href="landing/alternate.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="pricing/pricing-column.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing column</div>
                        </a></li>
                      <li><a class="dropdown-item" href="pricing/pricing-grid.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing grid</div>
                        </a></li>
                    </ul>
                  </li>
                  <li><a class="dropdown-item" href="notifications.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="bell"></span>Notifications</div>
                    </a></li>
                  <li><a class="dropdown-item" href="members.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="users"></span>Members</div>
                    </a></li>
                  <li><a class="dropdown-item" href="timeline.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="clock"></span>Timeline</div>
                    </a></li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="alert-triangle"></span>Errors</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="errors/404.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                        </a></li>
                      <li><a class="dropdown-item" href="errors/403.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                        </a></li>
                      <li><a class="dropdown-item" href="errors/500.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="lock"></span>Authentication</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Simple</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="authentication/simple/sign-in.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/simple/sign-up.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/simple/sign-out.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/simple/forgot-password.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/simple/reset-password.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/simple/lock-screen.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/simple/2FA.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                            </a></li>
                        </ul>
                      </li>
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Split</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="authentication/split/sign-in.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/split/sign-up.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/split/sign-out.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/split/forgot-password.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/split/reset-password.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/split/lock-screen.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/split/2FA.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                            </a></li>
                        </ul>
                      </li>
                      <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                          <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil"></span>Card</span></div>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="authentication/card/sign-in.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/card/sign-up.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/card/sign-out.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign out</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/card/forgot-password.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot password</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/card/reset-password.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset password</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/card/lock-screen.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock screen</div>
                            </a></li>
                          <li><a class="dropdown-item" href="authentication/card/2FA.html">
                              <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA</div>
                            </a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../../demo/vertical-sidenav.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical sidenav</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../demo/dark-mode.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../demo/sidenav-collapse.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav collapse</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../demo/darknav.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../demo/topnav-slim.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../demo/navbar-top-slim.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top slim</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../demo/navbar-top.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../demo/horizontal-slim.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal slim</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../demo/combo-nav.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../demo/combo-nav-slim.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav slim</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../demo/dual-nav.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                        </a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-puzzle-piece"></span>Modules</a>
                <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                  <div class="border-0 scrollbar" style="max-height: 60vh;">
                    <div class="px-3 pt-4 pb-3 img-dropdown">
                      <div class="row gx-4 gy-5">
                        <div class="col-12 col-sm-6 col-md-4">
                          <div class="dropdown-item-group"><span class="me-2" data-feather="file-text" style="stroke-width:2;"></span>
                            <h6 class="dropdown-item-title">Forms</h6>
                          </div><a class="dropdown-link" href="../../modules/forms/basic/form-control.html">Form control</a><a class="dropdown-link" href="../../modules/forms/basic/input-group.html">Input group</a><a class="dropdown-link" href="../../modules/forms/basic/select.html">Select</a><a class="dropdown-link" href="../../modules/forms/basic/checks.html">Checks</a><a class="dropdown-link" href="../../modules/forms/basic/range.html">Range</a><a class="dropdown-link" href="../../modules/forms/basic/floating-labels.html">Floating labels</a><a class="dropdown-link" href="../../modules/forms/basic/layout.html">Layout</a><a class="dropdown-link" href="../../modules/forms/advance/advance-select.html">Advance select</a><a class="dropdown-link" href="../../modules/forms/advance/date-picker.html">Date picker</a><a class="dropdown-link" href="../../modules/forms/advance/editor.html">Editor</a><a class="dropdown-link" href="../../modules/forms/advance/file-uploader.html">File uploader</a><a class="dropdown-link" href="../../modules/forms/advance/rating.html">Rating</a><a class="dropdown-link" href="../../modules/forms/advance/emoji-button.html">Emoji button</a><a class="dropdown-link" href="../../modules/forms/validation.html">Validation</a><a class="dropdown-link" href="../../modules/forms/wizard.html">Wizard</a>
                          <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid" style="stroke-width:2;"></span>
                            <h6 class="dropdown-item-title">Icons</h6>
                          </div><a class="dropdown-link" href="../../modules/icons/feather.html">Feather</a><a class="dropdown-link" href="../../modules/icons/font-awesome.html">Font awesome</a><a class="dropdown-link" href="../../modules/icons/unicons.html">Unicons</a>
                          <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="bar-chart-2" style="stroke-width:2;"></span>
                            <h6 class="dropdown-item-title">ECharts</h6>
                          </div><a class="dropdown-link" href="../../modules/echarts/line-charts.html">Line charts</a><a class="dropdown-link" href="../../modules/echarts/bar-charts.html">Bar charts</a><a class="dropdown-link" href="../../modules/echarts/candlestick-charts.html">Candlestick charts</a><a class="dropdown-link" href="../../modules/echarts/geo-map.html">Geo map</a><a class="dropdown-link" href="../../modules/echarts/scatter-charts.html">Scatter charts</a><a class="dropdown-link" href="../../modules/echarts/pie-charts.html">Pie charts</a><a class="dropdown-link" href="../../modules/echarts/gauge-chart.html">Gauge chart</a><a class="dropdown-link" href="../../modules/echarts/radar-charts.html">Radar charts</a><a class="dropdown-link" href="../../modules/echarts/heatmap-charts.html">Heatmap charts</a><a class="dropdown-link" href="../../modules/echarts/how-to-use.html">How to use</a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                          <div class="dropdown-item-group"><span class="me-2" data-feather="package" style="stroke-width:2;"></span>
                            <h6 class="dropdown-item-title">Components</h6>
                          </div><a class="dropdown-link" href="../../modules/components/accordion.html">Accordion</a><a class="dropdown-link" href="../../modules/components/avatar.html">Avatar</a><a class="dropdown-link" href="../../modules/components/alerts.html">Alerts</a><a class="dropdown-link" href="../../modules/components/badge.html">Badge</a><a class="dropdown-link" href="../../modules/components/breadcrumb.html">Breadcrumb</a><a class="dropdown-link" href="../../modules/components/button.html">Buttons</a><a class="dropdown-link" href="../../modules/components/calendar.html">Calendar</a><a class="dropdown-link" href="../../modules/components/card.html">Card</a><a class="dropdown-link" href="../../modules/components/carousel/bootstrap.html">Bootstrap</a><a class="dropdown-link" href="../../modules/components/carousel/swiper.html">Swiper</a><a class="dropdown-link" href="../../modules/components/collapse.html">Collapse</a><a class="dropdown-link" href="../../modules/components/dropdown.html">Dropdown</a><a class="dropdown-link" href="../../modules/components/list-group.html">List group</a><a class="dropdown-link" href="../../modules/components/modal.html">Modals</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navs.html">Navs</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="dropdown-link" href="../../modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="dropdown-link" href="../../modules/components/offcanvas.html">Offcanvas</a><a class="dropdown-link" href="../../modules/components/progress-bar.html">Progress bar</a><a class="dropdown-link" href="../../modules/components/placeholder.html">Placeholder</a><a class="dropdown-link" href="../../modules/components/pagination.html">Pagination</a><a class="dropdown-link" href="../../modules/components/popovers.html">Popovers</a><a class="dropdown-link" href="../../modules/components/scrollspy.html">Scrollspy</a><a class="dropdown-link" href="../../modules/components/sortable.html">Sortable</a><a class="dropdown-link" href="../../modules/components/spinners.html">Spinners</a><a class="dropdown-link" href="../../modules/components/toast.html">Toast</a><a class="dropdown-link" href="../../modules/components/tooltips.html">Tooltips</a><a class="dropdown-link" href="../../modules/components/chat-widget.html">Chat widget</a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                          <div class="dropdown-item-group"><span class="me-2" data-feather="columns" style="stroke-width:2;"></span>
                            <h6 class="dropdown-item-title">Tables</h6>
                          </div><a class="dropdown-link" href="../../modules/tables/basic-tables.html">Basic tables</a><a class="dropdown-link" href="../../modules/tables/advance-tables.html">Advance tables</a><a class="dropdown-link" href="../../modules/tables/bulk-select.html">Bulk Select</a>
                          <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool" style="stroke-width:2;"></span>
                            <h6 class="dropdown-item-title">Utilities</h6>
                          </div><a class="dropdown-link" href="../../modules/utilities/background.html">Background</a><a class="dropdown-link" href="../../modules/utilities/borders.html">Borders</a><a class="dropdown-link" href="../../modules/utilities/colors.html">Colors</a><a class="dropdown-link" href="../../modules/utilities/display.html">Display</a><a class="dropdown-link" href="../../modules/utilities/flex.html">Flex</a><a class="dropdown-link" href="../../modules/utilities/stacks.html">Stacks</a><a class="dropdown-link" href="../../modules/utilities/float.html">Float</a><a class="dropdown-link" href="../../modules/utilities/grid.html">Grid</a><a class="dropdown-link" href="../../modules/utilities/interactions.html">Interactions</a><a class="dropdown-link" href="../../modules/utilities/opacity.html">Opacity</a><a class="dropdown-link" href="../../modules/utilities/overflow.html">Overflow</a><a class="dropdown-link" href="../../modules/utilities/position.html">Position</a><a class="dropdown-link" href="../../modules/utilities/shadows.html">Shadows</a><a class="dropdown-link" href="../../modules/utilities/sizing.html">Sizing</a><a class="dropdown-link" href="../../modules/utilities/spacing.html">Spacing</a><a class="dropdown-link" href="../../modules/utilities/typography.html">Typography</a><a class="dropdown-link" href="../../modules/utilities/vertical-align.html">Vertical align</a><a class="dropdown-link" href="../../modules/utilities/visibility.html">Visibility</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </ul>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span class="uil fs-0 me-2 uil-document-layout-right"></span>Documentation</a>
                <ul class="dropdown-menu navbar-dropdown-caret">
                  <li><a class="dropdown-item" href="../../documentation/getting-started.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="life-buoy"></span>Getting started</div>
                    </a></li>
                  <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="settings"></span>Customization</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../../documentation/customization/configuration.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../documentation/customization/styling.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../documentation/customization/dark-mode.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../documentation/customization/plugin.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin</div>
                        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <div class="dropdown-item-wrapper"><span class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span class="me-2 uil" data-feather="table"></span>Layouts doc</span></div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../../documentation/layouts/vertical-navbar.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical navbar</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../documentation/layouts/horizontal-navbar.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal navbar</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../documentation/layouts/combo-navbar.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo navbar</div>
                        </a></li>
                      <li><a class="dropdown-item" href="../../documentation/layouts/dual-nav.html">
                          <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav</div>
                        </a></li>
                    </ul>
                  </li>
                  <li><a class="dropdown-item" href="../../documentation/gulp.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp</div>
                    </a></li>
                  <li><a class="dropdown-item" href="../../documentation/design-file.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="figma"></span>Design file</div>
                    </a></li>
                  <li><a class="dropdown-item" href="../../changelog.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="git-merge"></span>Changelog</div>
                    </a></li>
                  <li><a class="dropdown-item" href="../../showcase.html">
                      <div class="dropdown-item-wrapper"><span class="me-2 uil" data-feather="monitor"></span>Showcase</div>
                    </a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- /minimize na lang  -->
      
      <div class="modal fade" id="searchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true" data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
        <div class="modal-dialog">
          <div class="modal-content mt-15 rounded-pill">
            <div class="modal-body p-0">
              <div class="search-box navbar-top-search-box" data-list='{"valueNames":["title"]}' style="width: auto;">
                <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input fuzzy-search rounded-pill form-control-lg" type="search" placeholder="Search..." aria-label="Search" />
                  <span class="fas fa-search search-box-icon"></span>
                </form>
                <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button></div>
                <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                  <div class="scrollbar-overlay" style="max-height: 30rem;">
                    <div class="list pb-3">
                      <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span class="text-500">results</span></h6>
                      <hr class="text-200 my-0" />
                      <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently Searched </h6>
                      <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                          <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"><span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> Store Macbook</div>
                          </div>
                        </a>
                        <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                          <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"> <span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                          </div>
                        </a>
                      </div>
                      <hr class="text-200 my-0" />
                      <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Products</h6>
                      <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="../../apps/e-commerce/landing/product-details.html">
                          <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3" src="../../assets/img/products/60x60/3.png" alt="" /></div>
                          <div class="flex-1">
                            <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                            <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB Memory - 1.6GHz - 128GB Storage</span></p>
                          </div>
                        </a>
                        <a class="dropdown-item py-2 d-flex align-items-center" href="../../apps/e-commerce/landing/product-details.html">
                          <div class="file-thumbnail me-2"><img class="img-fluid" src="../../assets/img/products/60x60/3.png" alt="" /></div>
                          <div class="flex-1">
                            <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                            <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                          </div>
                        </a>
                      </div>
                      <hr class="text-200 my-0" />
                      <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick Links</h6>
                      <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                          <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"><span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Support MacBook House</div>
                          </div>
                        </a>
                        <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                          <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"> <span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                          </div>
                        </a>
                      </div>
                      <hr class="text-200 my-0" />
                      <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Files</h6>
                      <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                          <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"><span class="fa-solid fa-file-zipper text-900" data-fa-transform="shrink-2"></span> Library MacBook folder.rar</div>
                          </div>
                        </a>
                        <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                          <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"> <span class="fa-solid fa-file-lines text-900" data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt</div>
                          </div>
                        </a>
                        <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                          <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"> <span class="fa-solid fa-image text-900" data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                          </div>
                        </a>
                      </div>
                      <hr class="text-200 my-0" />
                      <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Members</h6>
                      <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="members.html">
                          <div class="avatar avatar-l status-online  me-2 text-900">
                            <img class="rounded-circle " src="../../assets/img/team/40x40/10.webp" alt="" />
                          </div>
                          <div class="flex-1">
                            <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                            <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                          </div>
                        </a>
                        <a class="dropdown-item py-2 d-flex align-items-center" href="members.html">
                          <div class="avatar avatar-l  me-2 text-900">
                            <img class="rounded-circle " src="../../assets/img/team/40x40/12.webp" alt="" />
                          </div>
                          <div class="flex-1">
                            <h6 class="mb-0 text-1000 title">John Smith</h6>
                            <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                          </div>
                        </a>
                      </div>
                      <hr class="text-200 my-0" />
                      <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Related Searches</h6>
                      <div class="py-2"><a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                          <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"><span class="fa-brands fa-firefox-browser text-900" data-fa-transform="shrink-2"></span> Search in the Web MacBook</div>
                          </div>
                        </a>
                        <a class="dropdown-item" href="../../apps/e-commerce/landing/product-details.html">
                          <div class="d-flex align-items-center">
                            <div class="fw-normal text-1000 title"> <span class="fa-brands fa-chrome text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="text-center">
                      <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        var navbarTopShape = window.config.config.phoenixNavbarTopShape;
        var navbarPosition = window.config.config.phoenixNavbarPosition;
        var body = document.querySelector('body');
        var navbarDefault = document.querySelector('#navbarDefault');
        var navbarTop = document.querySelector('#navbarTop');
        var topNavSlim = document.querySelector('#topNavSlim');
        var navbarTopSlim = document.querySelector('#navbarTopSlim');
        var navbarCombo = document.querySelector('#navbarCombo');
        var navbarComboSlim = document.querySelector('#navbarComboSlim');
        var dualNav = document.querySelector('#dualNav');

        var documentElement = document.documentElement;
        var navbarVertical = document.querySelector('.navbar-vertical');

        if (navbarPosition === 'dual-nav') {
          topNavSlim.remove();
          navbarTop.remove();
          navbarVertical.remove();
          navbarTopSlim.remove();
          navbarCombo.remove();
          navbarComboSlim.remove();
          navbarDefault.remove();
          dualNav.removeAttribute('style');
          documentElement.classList.add('dual-nav');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
          navbarDefault.remove();
          navbarTop.remove();
          navbarTopSlim.remove();
          navbarCombo.remove();
          navbarComboSlim.remove();
          topNavSlim.style.display = 'block';
          navbarVertical.style.display = 'inline-block';
          body.classList.add('nav-slim');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
          navbarDefault.remove();
          navbarVertical.remove();
          navbarTop.remove();
          topNavSlim.remove();
          navbarCombo.remove();
          navbarComboSlim.remove();
          navbarTopSlim.removeAttribute('style');
          body.classList.add('nav-slim');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'combo') {
          navbarDefault.remove();
          //- navbarVertical.remove();
          navbarTop.remove();
          topNavSlim.remove();
          navbarCombo.remove();
          navbarTopSlim.remove();
          navbarComboSlim.removeAttribute('style');
          navbarVertical.removeAttribute('style');
          body.classList.add('nav-slim');
        } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
          navbarDefault.remove();
          topNavSlim.remove();
          navbarVertical.remove();
          navbarTopSlim.remove();
          navbarCombo.remove();
          navbarComboSlim.remove();
          navbarTop.removeAttribute('style');
          documentElement.classList.add('navbar-horizontal');
        } else if (navbarTopShape === 'default' && navbarPosition === 'combo') {
          topNavSlim.remove();
          navbarTop.remove();
          navbarTopSlim.remove();
          navbarDefault.remove();
          navbarComboSlim.remove();
          navbarCombo.removeAttribute('style');
          navbarVertical.removeAttribute('style');
          documentElement.classList.add('navbar-combo')

        } else {
          topNavSlim.remove();
          navbarTop.remove();
          navbarTopSlim.remove();
          navbarCombo.remove();
          navbarComboSlim.remove();
          navbarDefault.removeAttribute('style');
          navbarVertical.removeAttribute('style');
        }

        var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
        var navbarTop = document.querySelector('.navbar-top');
        if (navbarTopStyle === 'darker') {
          navbarTop.classList.add('navbar-darker');
        }

        var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
        var navbarVertical = document.querySelector('.navbar-vertical');
        if (navbarVerticalStyle === 'darker') {
          navbarVertical.classList.add('navbar-darker');
        }
      </script>