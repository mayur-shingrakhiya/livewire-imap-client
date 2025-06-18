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


    <!-- Config Options -->
    <script>
        (function() {
            const savedTheme = sessionStorage.getItem('XRay');

            if (savedTheme) {
                const settings = JSON.parse(savedTheme);
                const themeScheme = settings.setting.theme_scheme.value;
                document.documentElement.setAttribute('data-bs-theme', themeScheme);
            }
        })();
    </script>
    <meta name="setting_options"
          content='{&quot;saveLocal&quot;:&quot;sessionStorage&quot;,&quot;storeKey&quot;:&quot;XRay&quot;,&quot;setting&quot;:{&quot;app_name&quot;:{&quot;value&quot;:&quot;XRay&quot;},&quot;theme_scheme_direction&quot;:{&quot;value&quot;:&quot;ltr&quot;},&quot;theme_scheme&quot;:{&quot;value&quot;:&quot;light&quot;},&quot;theme_style_appearance&quot;:{&quot;value&quot;:[&quot;theme-default&quot;]},&quot;theme_color&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;theme_transition&quot;:{&quot;value&quot;:&quot;theme-with-animation&quot;},&quot;theme_font_size&quot;:{&quot;value&quot;:&quot;theme-fs-sm&quot;},&quot;page_layout&quot;:{&quot;value&quot;:&quot;container-fluid&quot;},&quot;header_navbar&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;header_banner&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;sidebar_color&quot;:{&quot;value&quot;:&quot;sidebar-color&quot;},&quot;card_color&quot;:{&quot;value&quot;:&quot;card-default&quot;},&quot;sidebar_type&quot;:{&quot;value&quot;:[&quot;sidebar-hover&quot;,&quot;sidebar-mini&quot;]},&quot;sidebar_menu_style&quot;:{&quot;value&quot;:&quot;sidebar-default navs-pill-all&quot;},&quot;footer&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;body_font_family&quot;:{&quot;value&quot;:null},&quot;heading_font_family&quot;:{&quot;value&quot;:null}}}'>
    <!-- Google Font Api KEY-->
    <meta name="google_font_api"
          content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
    <!-- Favicon -->
    <link rel="shortcut icon"
          href="{{ asset('assets/images/favicon.ico') }}" />
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/core/libs.min.css') }}" />
    <!-- flaticon css -->
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/flaticon/css/flaticon.css') }}" />
    <!-- font-awesome css -->
    {{-- <link rel="stylesheet"
          href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" /> --}}
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

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body">
                <img src="../assets/images/loader.gif"
                     alt="loader"
                     class="light-loader img-fluid "
                     width="200">
            </div>
        </div>
    </div>
    <!-- loader END -->
    <div class="wrapper">
        <!--- aside-begin -->
        <x-aside />
        <!--- aside-end -->
        <main class="main-content content-page ">
            <div class="position-relative ">
                <!--nav-begin-->
                <x-nav />
                <!--nav-end-->
            </div>
            <div class="content-inner container-fluid pb-0"
                 id="page_layout">
                {{ $slot }}

            </div>
            <!-- Footer Section Start -->
            <footer class="footer rounded-pill mb-4 mx-0 mx-md-4">
                <div class="footer-body  ">
                    <div class="row d-flex flex-grow-1">
                        <div class="col-lg-6 col-md-12">
                            <ul
                                class="left-panel list-inline mb-0 p-0 d-flex justify-content-center justify-content-lg-start">
                                <li class="list-inline-item fw-500"><a class="footer-link"
                                       href="../extra-pages/privacy-policy.html">Privacy
                                        Policy</a>
                                </li>
                                <li class="list-inline-item fw-500"><a class="footer-link footer-spacing"
                                       href="../extra-pages/terms-of-service.html">Terms of
                                        Use</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h6 class="right-panel mb-0 d-flex justify-content-center justify-content-lg-end">
                                Copyright
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> <a href="inbox.html#"
                                   class="px-1"> XRay </a> All Rights Reserved.
                            </h6>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer Section End -->
        </main>
    </div>
    <!-- Wrapper End-->
    <!-- Library Bundle Script -->
    <script src="../assets/js/core/libs.min.js"></script>
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
    <script src="{{ asset('assets/js/sidebar.js') }}"
            defer></script>
    <script src="{{ asset('assets/js/dashboard/doctor-dashboard.js') }}"
            defer></script>
    <script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"
            defer></script>
    <script src="{{ asset('assets/js/dashboard/dashboard-2.js') }}"
            defer></script>
    <script src="{{ asset('assets/js/dashboard/patient-dashboard.js') }}"
            defer></script>
    <script src="{{ asset('assets/js/dashboard/covid19-dashboard.js') }}"
            defer></script>
    <!-- All charts script -->
    <!-- e-chart script -->
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/Setting/enchanter.js') }}"
            defer></script>
    {{-- <script src="{{ asset('assets/js/plugins/countdown.js') }}"></script> --}}
    <script src="{{ asset('assets/js/xray/email.js') }}"></script>

    @livewireScripts
</body>

</html>
