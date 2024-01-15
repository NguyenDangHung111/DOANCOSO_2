<header class="header-desktop">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
              <div class="header-wrap">
                <div class="header-button">
                  <div class="account-wrap">
                    @if(isset($value))
                    <div
                      class="account-item clearfix js-item-menu"
                      style="float: right !important"
                    >
                      <div class="image">
                        <img src="{{ asset('storage/images/' . $value['admin']->avatar) }}" alt="" />
                      </div>
                      <div class="content">
                        <a class="js-acc-btn text-secondary text-uppercase" href="#">{{$value['admin']->fullname}}</a><br />
                        <span class="email">{{$value['admin']->email}}</span>
                      </div>
                      <div class="account-dropdown js-dropdown ">
                        <div class="account-dropdown__footer">
                          <a href="{{route('auth.logout')}}" class="text-secondary "> <i class="zmdi zmdi-power"></i>Logout</a>
                        </div>
                      </div>
                    </div>
                    @endif
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>