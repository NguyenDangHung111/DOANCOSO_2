<header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
          <div class="container-fluid">
            <div class="header-mobile-inner">
              <a class="logo" href="index.html">
                <img src="{{ asset('storage/images/logo.png')}}" alt="CoolAdmin" />
              </a>
              <button class="hamburger hamburger--slider" type="button">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
            </div>
          </div>
        </div>
        <nav class="navbar-mobile">
          <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
              <li>
                <a class="js-arrow" href="{{route('page.dashboard')}}">
                  <i class="fas fa-bar-chart-o"></i>THỐNG KÊ</a
                >
              </li>
              <li class="has-sub">
                <a href="{{route('page.account_admin')}}"> <i class="fas fa-group"></i>TÀI KHOẢN</a>
              </li>
              <li>
                <a href="{{route('page.product')}}"> <i class="fas fa-suitcase"></i>SẢN PHẨM</a>
              </li>
              <li>
                <a href="#"> <i class="fas fa-gift"></i>ĐƠN HÀNG</a>
              </li>
              <li>
                <a href="#"> <i class="fas fa-bullhorn"></i>QUẢNG CÁO</a>
              </li>
            </ul>
          </div>
        </nav>
      </header>