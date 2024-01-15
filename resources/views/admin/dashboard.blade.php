<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <!-- Title Page-->
    <title>THỐNG KÊ</title>

    <!-- Fontfaces CSS-->
    <link href="Edit/css/font-face.css" rel="stylesheet" media="all">
    <link href="Edit/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="Edit/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="Edit/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="Edit/fontawesome-free-6.4.0-web/css/all.css">

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- Edit/Vendor CSS-->
    <link href="Edit/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="Edit/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="Edit/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="Edit/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="Edit/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="Edit/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="Edit/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="icon" type="image/jpg" sizes="16x16"
        href="http://purepng.com/public/uploads/large/purepng.com-treetreewoodplantbranch-1411527182958jn6pr.png">
    <!-- Main CSS-->
    <link href="Edit/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include($header_mobile)
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block menu">
            <div class="logo1">
                <h4><b><a href="{{route('page.dashboard')}}" class="logo text-success aos-init aos-animate text-decoration-none" data-aos="fade-down">GREEN HOUSE</a></b></h4>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{route('page.dashboard')}}">
                                <i class="fas fa-bar-chart-o"></i>THỐNG KÊ</a>
                        </li>
                        <li>
                            <a href="{{route('page.account')}}">
                                <i class="fas fa-group"></i>TÀI KHOẢN</a>
                        </li>
                        <li>
                            <a href="{{route('page.product')}}">
                                <i class="fas fa-suitcase"></i>SẢN PHẨM</a>
                        </li>
                        <li>
                            <a href="{{route('page.order')}}">
                                <i class="fas fa-gift"></i>ĐƠN HÀNG</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include($header_desktop)
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid ">
                        <div class="row m-t-25 d-flex justify-content-center align-items-center">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$value['admin']->count()}}</h2>
                                                <span>Tài Khoản</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix ">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart "></i>
                                            </div>
                                            <div class="text">
                                                <span>Đang Giao: {{$value['quantity1']}} đơn</span><br>
                                                <span>Đã Giao: {{$value['quantity2']}} đơn</span><br>
                                                <span>Đã Hủy: {{$value['quantity3']}} đơn</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa-solid fa-money-bill " style="color: #eceff4;"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{number_format($value['get_revenue'],0,',','.')}} đ</h2>
                                                <span>Tổng Doanh Thu</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="eye">
                    <div>
                        <button onclick="toggleIcon()" class="" id="close_menu"><i class="fa-solid fa-eye-slash"
                                id="icon" style="color: #FFF;"></i></button>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="Edit/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="Edit/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="Edit/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Edit/Vendor JS       -->
    <script src="Edit/vendor/slick/slick.min.js">
    </script>
    <script src="Edit/vendor/wow/wow.min.js"></script>
    <script src="Edit/vendor/animsition/animsition.min.js"></script>
    <script src="Edit/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="Edit/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="Edit/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="Edit/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="Edit/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="Edit/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="Edit/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    @include('admin.component.script')
</body>

</html>
<!-- end document-->