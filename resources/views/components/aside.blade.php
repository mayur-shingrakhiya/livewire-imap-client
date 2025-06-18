<aside class="sidebar sidebar-base   sidebartab1   "
       id="first-tour"
       data-toggle="main-sidebar"
       data-sidebar="responsive">
    <div class="sidebar-header d-flex align-items-center justify-content-start position-relative">
        <a href="https://templates.iqonic.design/xray-dist/html/index.html"
           class="navbar-brand me-5 pt-3">
            <!--Logo start-->
            <div class="logo-main">
                <img class="logo-normal img-fluid mb-3"
                     src="../assets/images/logo.png"
                     height="30"
                     alt="logo">
                <span class="ms-2 brand-name">XRay</span>
            </div>
            <!--logo End-->
        </a>
        <div class="ms-5 wrapper-menu d-flex d-none d-xl-block">
            <div class="main-circle"
                 role="button"><i class="ri-more-fill"></i></div>
        </div>
        <li class="nav-item d-block d-xl-none">
            <a class="wrapper-menu"
               data-toggle="sidebar"
               data-active="true">
                <div class="main-circle "><i class="ri-more-fill"></i></div>
            </a>
        </li>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu"
                id="sidebar-menu">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                       href="{{ route('admin.dashboard') }}">
                        <i class="ri-home-8-fill"
                           data-bs-toggle="tooltip"
                           title="Dashboard"
                           data-bs-placement="right">
                        </i>
                        <span class="item-name ">Dashboard</span>

                    </a>
                </li>

                <li>
                    <hr class="hr-horizontal">
                </li>

                <li class="nav-item">
                    <div class="colors">
                        <a class="nav-link"
                           data-bs-toggle="collapse"
                           href="#Email"
                           role="button"
                           aria-expanded="false">
                            <i class="ri-mail-open-fill"
                               data-bs-toggle="tooltip"
                               title="Email"
                               data-bs-placement="right"></i>
                            <span class="item-name">Email</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="18"
                                     class="icon-18"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse"
                            id="Email"
                            data-bs-parent="#sidebar-menu">
                            <li class="{{ route('email.index') }}">
                                <a class="nav-link {{ request()->routeIs('email.index') ? 'active' : '' }}"
                                   href="{{ route('email.index') }}">
                                    <i class="icon ri-inbox-fill">
                                    </i>
                                    <span class="item-name">Inbox</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="nav-link "
                                   href="../email/email-compose.html">
                                    <i class="icon ri-edit-2-fill">

                                    </i>

                                    <span class="item-name">Email Compose</span>
                                </a>
                            </li>

                        </ul>
                    </div>

                </li>


            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>
