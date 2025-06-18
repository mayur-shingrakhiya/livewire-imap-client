<nav class="nav navbar navbar-expand-xl navbar-light iq-navbar pt-2 pb-2 px-2"
     id="boxid">
    <div class="container-fluid navbar-inner">
        <div class="row flex-grow-1">
            <div class="col-lg-4 col-md-6 align-items-center d-flex">
                <li class="nav-item dropdown search-width pt-2 pt-lg-0">
                    <div class="form-group input-group mb-0 search-input">
                        <input type="text"
                               class="form-control"
                               placeholder="Type here to search...">
                        <span class="input-group-text">
                            <svg class="icon-20 text-primary"
                                 width="20"
                                 height="20"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.7669"
                                        cy="11.7666"
                                        r="8.98856"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"></circle>
                                <path d="M18.0186 18.4851L21.5426 22"
                                      stroke="currentColor"
                                      stroke-width="1.5"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </div>
                </li>
            </div>
            <div class="col-lg-8 col-md-6 d-flex justify-content-end align-items-center">



                <li class="nav-item d-block d-xl-none">
                    <a class="wrapper-menu"
                       data-toggle="sidebar"
                       data-active="true">
                        <div class="main-circle "><i class="ri-more-fill"></i></div>
                    </a>
                </li>
                <li class=" nav-item ms-3 d-flex align-items-center d-block d-xl-none">
                    <button id="navbar-toggle"
                            class="navbar-toggler px-0"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-btn">
                            <span class="navbar-toggler-icon"></span>
                        </span>
                    </button>
                </li>
                <li class="nav-item dropdown">
                    <a href="inbox.html#"
                       class="nav-link d-flex align-items-center"
                       id="notification-drop"
                       data-bs-toggle="dropdown">
                        <img src="../assets/images/user/001.png"
                             style="width: 50px; height: 50px;"
                             class="img-fluid rounded"
                             alt="user">
                        <div class="caption d-none d-lg-block">
                            <h6 class="mb-0 line-height">{{ Auth::guard('admins')->name }}</h6>
                            <span class="font-size-12">Available</span>
                        </div>
                    </a>
                    <div class="p-0 sub-drop dropdown-menu dropdown-menu-end"
                         aria-labelledby="notification-drop">
                        <div class="m-0 -none card">

                            <div class="p-0 card-body">

                                <div class="iq-sub-card d-flex justify-content-center">
                                    <a href=""
                                       class="btn btn-primary-subtle ">
                                        Sign out
                                        <i class="ri-login-box-line ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
        </div>
    </div>
    <div class="collapse navbar-collapse "
         id="navbarSupportedContent">
        <div class="row flex-grow-1 pt-4 pb-4 px-2">
            <div class=" col-md-12 d-flex justify-content-end align-items-center">
                <li class="nav-item dropdown ">
                    <a href="inbox.html#"
                       class="nav-link d-block d-xl-none"
                       id="notification-drop"
                       data-bs-toggle="dropdown">
                        <img src="../assets/images/small/flag-01.png"
                             alt="img-flaf"
                             class="img-fluid me-1"
                             style="height: 16px; width: 16px;" /> English <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <div class="p-0 sub-drop dropdown-menu dropdown-menu-end"
                         aria-labelledby="notification-drop">
                        <div class="m-0 -none card">
                            <div class="p-0 card-body">
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class
                                             src="../assets/images/small/flag-02.png"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <p class="mb-0 ">French</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class
                                             src="../assets/images/small/flag-03.png"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <p class="mb-0 ">Spanish</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class
                                             src="../assets/images/small/flag-04.png"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <p class="mb-0 ">Italian</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class
                                             src="../assets/images/small/flag-05.png"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <p class="mb-0 ">German</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class
                                             src="../assets/images/small/flag-06.png"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <p class="mb-0 ">Japanese</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                </li>
                <li class="nav-item iq-full-screen iq-full-screen2 d-block d-xl-none"
                    id="fullscreen-item">
                    <a href="inbox.html#"
                       class="nav-link"
                       id="btnFullscreen">
                        <i class="ri-fullscreen-line normal-screen"></i>
                        <i class="ri-fullscreen-exit-line full-normal-screen d-none"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="inbox.html#"
                       class="nav-link d-block d-xl-none "
                       id="notification-drop"
                       data-bs-toggle="dropdown">
                        <i class="ri-notification-4-line"></i>
                    </a>
                    <div class="p-0 sub-drop dropdown-menu dropdown-menu-end"
                         aria-labelledby="notification-drop">
                        <div class="m-0 -none card">
                            <div class="py-3 card-header d-flex justify-content-between bg-primary mb-0">
                                <div class="header-title">
                                    <h5 class="mb-0 text-white">All Notifications</h5>
                                </div>
                            </div>
                            <div class="p-0 card-body">
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class="p-1 avatar-40 rounded-pill bg-primary-subtle"
                                             src="../assets/images/user/01.jpg"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <h6 class="mb-0 ">Emma Watson Bni</h6>
                                            <p class="mb-0">95 MB</p>
                                        </div>
                                        <small class="float-end font-size-12">Just
                                            Now</small>
                                    </div>
                                </a>
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class="p-1 avatar-40 rounded-pill bg-primary-subtle"
                                             src="../assets/images/user/02.jpg"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <h6 class="mb-0 ">New customer is join</h6>
                                            <p class="mb-0">Cyst Bni</p>
                                        </div>
                                        <small class="float-end font-size-12">5 days
                                            ago</small>
                                    </div>
                                </a>
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class="p-1 avatar-40 rounded-pill bg-primary-subtle"
                                             src="../assets/images/user/03.jpg"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <h6 class="mb-0 ">Two customer is left</h6>
                                            <p class="mb-0">Cyst Bni</p>
                                        </div>
                                        <small class="float-end font-size-12">2 days
                                            ago</small>
                                    </div>
                                </a>
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class="p-1 avatar-40 rounded-pill bg-primary-subtle"
                                             src="../assets/images/user/04.jpg"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <h6 class="mb-0 ">New Mail from Fenny</h6>
                                            <p class="mb-0">Cyst Bni</p>
                                        </div>
                                        <small class="float-end font-size-12">3 days
                                            ago</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="inbox.html#"
                       class="nav-link d-block d-xl-none "
                       id="notification-drop"
                       data-bs-toggle="dropdown">
                        <i class="ri-mail-open-line"></i>
                    </a>
                    <div class="p-0 sub-drop dropdown-menu dropdown-menu-end"
                         aria-labelledby="notification-drop">
                        <div class="m-0 -none card">
                            <div class="py-3 card-header d-flex justify-content-between bg-primary mb-0">
                                <div class="header-title">
                                    <h5 class="mb-0 text-white">All Notifications</h5>
                                </div>
                            </div>
                            <div class="p-0 card-body">
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class="p-1 avatar-40 rounded-pill bg-primary-subtle"
                                             src="../assets/images/user/01.jpg"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <h6 class="mb-0 ">Emma Watson Bni</h6>
                                            <p class="mb-0">95 MB</p>
                                        </div>
                                        <small class="float-end font-size-12">Just
                                            Now</small>
                                    </div>
                                </a>
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class="p-1 avatar-40 rounded-pill bg-primary-subtle"
                                             src="../assets/images/user/02.jpg"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <h6 class="mb-0 ">New customer is join</h6>
                                            <p class="mb-0">Cyst Bni</p>
                                        </div>
                                        <small class="float-end font-size-12">5 days
                                            ago</small>
                                    </div>
                                </a>
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class="p-1 avatar-40 rounded-pill bg-primary-subtle"
                                             src="../assets/images/user/03.jpg"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <h6 class="mb-0 ">Two customer is left</h6>
                                            <p class="mb-0">Cyst Bni</p>
                                        </div>
                                        <small class="float-end font-size-12">2 days
                                            ago</small>
                                    </div>
                                </a>
                                <a href="inbox.html#"
                                   class="iq-sub-card">
                                    <div class="d-flex align-items-center">
                                        <img class="p-1 avatar-40 rounded-pill bg-primary-subtle"
                                             src="../assets/images/user/04.jpg"
                                             alt
                                             loading="lazy" />
                                        <div class="ms-3 flex-grow-1 text-start">
                                            <h6 class="mb-0 ">New Mail from Fenny</h6>
                                            <p class="mb-0">Cyst Bni</p>
                                        </div>
                                        <small class="float-end font-size-12">3 days
                                            ago</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
        </div>
    </div>
</nav>
