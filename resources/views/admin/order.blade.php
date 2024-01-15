<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="au theme template" />
  <!-- Title Page-->
  <title>TÀI KHOẢN</title>

  <!-- Fontfaces CSS-->
  <link href="Edit/css/font-face.css" rel="stylesheet" media="all" />
  <link href="Edit/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all" />
  <link href="Edit/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all" />
  <link href="Edit/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all" />

  <link rel="stylesheet" href="Edit/fontawesome-free-6.4.0-web/css/all.css">

  <!-- Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- Edit/Vendor CSS-->
  <link href="Edit/vendor/animsition/animsition.min.css" rel="stylesheet" media="all" />
  <link href="Edit/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all" />
  <link href="Edit/vendor/wow/animate.css" rel="stylesheet" media="all" />
  <link href="Edit/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all" />
  <link href="Edit/vendor/slick/slick.css" rel="stylesheet" media="all" />
  <link href="Edit/vendor/select2/select2.min.css" rel="stylesheet" media="all" />
  <link href="Edit/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all" />
  <link rel="icon" type="image/jpg" sizes="16x16"
        href="http://purepng.com/public/uploads/large/purepng.com-treetreewoodplantbranch-1411527182958jn6pr.png">
  <!-- Main CSS-->
  <link href="Edit/css/theme.css" rel="stylesheet" media="all" />
  
</head>

<body >
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
            <li>
              <a class="js-arrow text-transform-capitalize" href="{{route('page.dashboard')}}">
                <i class="fas fa-bar-chart-o "></i>THỐNG KÊ</a>
            </li>
            <li >
              <a href="{{route('page.account')}}"> <i class="fas fa-group"></i>TÀI KHOẢN</a>
            </li>
            <li>
              <a href="{{route('page.product')}}"> <i class="fas fa-suitcase"></i>SẢN PHẨM</a>
            </li>
            <li class="active has-sub">
              <a href="{{route('page.order')}}"> <i class="fas fa-gift"></i>ĐƠN HÀNG</a>
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
      @include($content)
      <!-- END MAIN CONTENT-->
      <!-- END PAGE CONTAINER-->
    </div>

  @include('admin.component.script')

</body>

</html>
<!-- end document-->