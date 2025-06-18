<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
          content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">

    <title>Admin | {{ $title }}</title>

    <meta name="description"
          content="{{ $description ?? '' }}">
    <meta name="keywords"
          content="{{ $keywords ?? '' }}">
    <meta name="author"
          content="{{ $author ?? '' }}">

    <!-- Fonts -->
    <link rel="shortcut icon"
          href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/core/libs.min.css') }}" />

    <!-- flaticon css -->
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/flaticon/css/flaticon.css') }}" />

    <!-- font-awesome css -->
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" />

    <!-- Xray Design System Css -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/xray.min.css') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/custom.min.css') }}" />

    <!-- RTL Css -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/rtl.min.css') }}" />

    <!-- Customizer Css -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/customizer.min.css') }}" />

    <!-- Google Font -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="{{ asset('assets/vendor/dripicons/webfont/webfont.css') }}" />

    <link rel="stylesheet"
          href="{{ asset('assets/vendor/ionicons/css/ionicons.min.css') }}" />

    <link rel="stylesheet"
          href="{{ asset('assets/vendor/line-awesome/css/line-awesome.min.css') }}" />

    <!-- Phosphor icons  -->
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/phosphor-icons/Fonts/regular/style.css') }}">
    </link>
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/phosphor-icons/Fonts/duotone/style.css') }}">
    </link>
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/phosphor-icons/Fonts/fill/style.css') }}">
    </link>

    @livewireStyles
</head>

<body class="sidebar-main-menu">
    <span class="screen-darken"></span>
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body">
                <img src="{{ asset('assets/images/loader.gif') }}"
                     alt="loader"
                     class="light-loader img-fluid "
                     width="200">
            </div>
        </div>
    </div>
    <!-- loader END -->


    <div class="content-bg">

        <section class="sign-in-page custom-auth-height d-md-flex align-items-center">
            <div class="container sign-in-page-bg mt-5 mb-md-5 mb-0 p-0">
                <div class="row">
                    <div class="col-md-6 text-center z-2">
                        <div class="sign-in-detail text-white">
                            <a href="https://templates.iqonic.design/xray-dist/html/index.html"
                               class="sign-in-logo mb-2">
                                <img src="{{ asset('assets/images/logo-white.png') }}"
                                     class="img-fluid"
                                     alt="" />
                            </a>
                            <div id="carouselExampleCaptions"
                                 class="carousel slide"
                                 data-bs-ride="carousel"
                                 data-bs-interval="1000">
                                <div class="carousel-indicators">
                                    <button type="button"
                                            data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0"
                                            class="active"
                                            aria-current="true"
                                            aria-label="Slide 1"></button>
                                    <button type="button"
                                            data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                    <button type="button"
                                            data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('assets/images/login/1.png') }}"
                                             class="d-block w-100"
                                             alt="..." />
                                        <h4 class="mb-1 mt-3 text-white">Manage your orders</h4>
                                        <p class="pb-5">It is a long established fact that a reader
                                            will be distracted by the readable content.</p>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('assets/images/login/2.png') }}"
                                             class="d-block w-100"
                                             alt="..." />
                                        <h4 class="mb-1 mt-3 text-white">Manage your orders</h4>
                                        <p class="pb-5">It is a long established fact that a reader
                                            will be distracted by the readable content.</p>

                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('assets/images/login/3.png') }}"
                                             class="d-block w-100"
                                             alt="..." />
                                        <h4 class="mb-1 mt-3 text-white">Manage your orders</h4>
                                        <p class="pb-5">It is a long established fact that a reader
                                            will be distracted by the readable content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative z-2">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </section>




    </div>


    <!-- Library Bundle Script -->
    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
    <!-- Plugin Scripts -->


    <!-- Slider-tab Script -->
    <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>


    <!-- fslightbox Script -->
    <script src="{{ asset('assets/js/plugins/fslightbox.js') }}"
            defer></script>

    <!-- am-chart Script -->

    <script src="{{ asset('assets/vendor/amcharts/core.js') }}"></script>
    <script src="{{ asset('assets/vendor/amcharts/charts.js') }}"></script>
    <script src="{{ asset('assets/vendor/amcharts/themes/animated.js') }}"></script>




    <!-- Lodash Utility -->
    <script src="{{ asset('assets/vendor/lodash/lodash.min.js') }}"></script>
    <!-- Utilities Functions -->
    <script src="{{ asset('assets/js/iqonic-script/utility.min.js') }}"></script>
    <!-- Settings Script -->
    <script src="{{ asset('assets/js/iqonic-script/setting.min.js') }}"></script>
    <!-- Settings Init Script -->
    <script src="{{ asset('assets/js/iqonic-script/setting-init.js') }}"></script>
    <!-- External Library Bundle Script -->
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>

    <!-- Dashboard Script -->
    <script src="{{ asset('assets/js/charts/dashboard.js') }}"
            defer></script>
    <!-- Hopeui Script -->
    <script src="{{ asset('assets/js/xray.js') }}"
            defer></script>
    <script src="{{ asset('assets/js/xray-advance.js') }}"
            defer></script>

    @livewireScripts

</body>
