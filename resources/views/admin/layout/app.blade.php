<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html.phoenixcoded.net/dasho/bootstrap/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Aug 2024 02:54:26 GMT -->

<head>

    <title>Admin Sinh Travel</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Dasho Bootstrap admin template made using Bootstrap 5 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 5, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Dasho, Dasho bootstrap admin template">
    <meta name="author" content="Phoenixcoded" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('images/design/favicon_io/android-chrome-512x512.png')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/animation/css/animate.min.css')}}">

    <!-- notification css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/notification/css/notification.min.css')}}">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @yield('link')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>
<style>
    .image_overlay {
        z-index: 2000;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
    }
</style>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menupos-fixed menu-dark menu-item-icon-style6 ">
        <div class="navbar-wrapper ">
            <div class="navbar-brand header-logo">
                <a href="/" class="b-brand">

                    <img src="{{asset($logo->image)}}" style="width: 48px; height: 48px;" alt="logo" class="logo images">
                    <img src="{{asset($logo->image)}}" style="width: 48px; height: 48px;"
                        style="width: 30px; height: 30px" alt="logo" class="logo-thumb images">
                </a>
            </div>
            <div class="navbar-content scroll-div" id="layout-sidenav">

                <ul class="nav pcoded-inner-navbar sidenav-inner">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Quản lí</label>
                    </li>

                    <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project"
                        class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Đơn hàng</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="/admin/orders" class="">Danh sách
                                    <span class="pcoded-badge label label-danger">{{ $countOrder }}</span>
                                </a></li>
                        </ul>
                    </li>

                    <li data-username="basic components button alert badges breadcrumb pagination progress tooltip popovers carousel cards collapse tabs pills modal spinner grid system toasts typography extra shadows embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Danh mục</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="/admin/categories" class="">Danh sách</a></li>
                            <li class=""><a href="/admin/categories/create" class="">Thêm danh mục</a></li>
                            <li class=""><a href="/admin/category-children" class="">Danh sách danh mục con</a></li>
                            <li class=""><a href="/admin/category-children/create" class="">Thêm danh mục con</a></li>
                        </ul>
                    </li>

                    <li data-username="widget statistic data chart" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-layers"></i></span><span class="pcoded-mtext">Thông tin
                                website</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="/admin/banners" class="">Banner</a></li>
                            <li class=""><a href="/admin/logos" class="">Logo</a></li>
                            <li class=""><a href="/admin/footers" class="">Địa chỉ footer</a></li>
                            <li class=""><a href="/admin/google-maps" class="">Google Maps</a></li>
                        </ul>
                    </li>

                    <li data-username="widget statistic data chart" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-layers"></i></span><span class="pcoded-mtext">Tour</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="/admin/tours" class="">Danh sách</a></li>
                            <li class=""><a href="/admin/tours/create" class="">Thêm tour</a></li>
                        </ul>
                    </li>

                    <li data-username="widget statistic data chart" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-layers"></i></span><span class="pcoded-mtext">Blog</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="/admin/blogs" class="">Danh sách</a></li>
                            <li class=""><a href="/admin/blogs/create" class="">Thêm blog</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">

        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
            <a href="index.html" class="b-brand">

                <img src="{{asset('assets/images/logo.svg')}}" alt="" class="logo images">
                <img src="{{asset('assets/images/logo-icon.svg')}}" alt="" class="logo-thumb images">
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="#!">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <a href="#!" class="mob-toggler"></a>
            <ul class="navbar-nav ms-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-notification">
                            <div class="pro-head">
                                <img src="{{asset('assets/images/user/avatar-1.jpg')}}" class="img-radius"
                                    alt="User-Profile-Image">
                                <span>
                                    <span class="text-muted">{{ Auth::user()->name }}</span>
                                    <span class="h6">{{ Auth::user()->email }}</span>
                                </span>
                            </div>
                            <ul class="pro-body">
                                <li><a href="#!" class="dropdown-item"><i class="feather icon-settings"></i>
                                        Settings</a></li>
                                <li><a href="#!" class="dropdown-item"><i class="feather icon-user"></i> Profile</a>
                                </li>
                                <li><a href="" class="dropdown-item"><i class="feather icon-mail"></i>
                                        My Messages</a></li>
                                <li><a href="" class="dropdown-item"><i class="feather icon-lock"></i>
                                        Lock Screen</a></li>
                                <li><a href="/admin/logout" class="dropdown-item"><i class="feather icon-power text-danger"></i>
                                        Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                @yield('content')

            </div>
        </div>

    </div>
    <div class="image_overlay" id="over"></div>

    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/pcoded.min.js')}}"></script>
    <script src="{{asset('assets/js/menu-setting.js')}}"></script>

    <!-- am chart js -->
    <script src="{{asset('assets/plugins/chart-am4/js/core.js')}}"></script>
    <script src="{{asset('assets/plugins/chart-am4/js/charts.js')}}"></script>
    <script src="{{asset('assets/plugins/chart-am4/js/animated.js')}}"></script>
    <script src="{{asset('assets/plugins/chart-am4/js/maps.js')}}"></script>
    <script src="{{asset('assets/plugins/chart-am4/js/worldLow.js')}}"></script>
    <script src="{{asset('assets/plugins/chart-am4/js/continentsLow.js')}}"></script>

</body>

</html>