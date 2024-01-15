<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREEN HOUSE</title>
  <link rel="icon" type="image/jpg" sizes="16x16"
    href="http://purepng.com/public/uploads/large/purepng.com-treetreewoodplantbranch-1411527182958jn6pr.png">
  <link rel="stylesheet" href="Edit/css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="Edit/css/theme.css" type="text/css" media="all">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href='https://fonts.googleapis.com/css?family=AR One Sans' rel='stylesheet'>
  <!-- AOS CSS  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
    integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- ScrollBar Settings  -->

  <!-- Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

  <!-- GSAP (GreenSock Animation Platform) -->
  <script src="https://unpkg.com/gsap@3.9.1/dist/gsap.min.js"></script>
  <!--Icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

  <style>
    html::-webkit-scrollbar {
      width: 1vw;
    }

    html::-webkit-scrollbar-thumb {
      background: rgb(37, 37, 37);
      border-radius: 10px;
    }

    .bg-success {
      --bs-bg-opacity: 1;
      position: relative;
      top: -12px;
      left: -7px;
      background-color: #15ce0d !important;
      border: 2px solid #d8e623;
      border-radius: 50%;
    }

    .loader {
      position: relative;
      top: 35px;
      background: #37ccc9b0 !important;
      border-radius: 20px;
    }
  </style>

</head>

<body>

  @if(isset($value['user']))
  <div class="div-form">
    <div class="card col-md-6 shadow-lg p-3 bg-body loader div-form2"
      style="position: relative; top: -30px;background: #37ccc9b0 !important;border-radius: 20px;">
      <div class="card-header text-center  bg-primary bg-gradient text-white text-transform-capitalize ">
        <strong>SỬA THÔNG TIN TÀI KHOẢN</strong>
      </div>
      <div class="card-body card-block ">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{route('page.update_account_user')}}" method="post" enctype="multipart/form-data"
          class="form-horizontal">
          @csrf
          <div class="row form-group  m-b-10">
            <label class=" text-white m-b-5">Thông Tin</label>
            <div class="form-group col-md-6">
              <div class="input-group mb-2">
                <span class="input-group-text text-secondary" id="basic-addon1">Họ và tên</span>
                <input type="text" class="form-control text-secondary text-center" id="text-input" name="fullname"
                  value="{{ $value['user']->fullname }}" placeholder="Nhập họ và tên ..." aria-label="Fullname"
                  aria-describedby="basic-addon1" required>
                <input type="text" name="id" value="{{ $value['user']->id }}" hidden="true">
                <input type="hidden" name="address" id="address">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="input-group mb-2 ">
                <label class="input-group-text text-secondary" for="inputGroupSelect01">Giới
                  tính</label>
                <select class="form-select text-secondary text-center" id="inputGroupSelect0" name="gender">
                  <option @if($value['user']->sex == 'Nam') selected @endif value="Nam">Nam
                  </option>
                  <option @if($value['user']->sex == 'Nữ') selected @endif value="Nữ">Nữ
                  </option>
                </select>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <div class=" form-group col-md-6">
              <div class="input-group mb-2 ">
                <span class="input-group-text text-secondary" id="basic-addon1">Email</span>
                <input type="email" class="form-control text-secondary text-center" id="text-input" name="email"
                  value="{{ $value['user']->email }}" placeholder="Nhập Email ..." aria-label="email"
                  aria-describedby="basic-addon1" required>
              </div>
            </div>
            <div class="form-group col-md-6 ">
              <div class="input-group mb-2 ">
                <span class="input-group-text text-secondary" id="basic-addon1">Số điện
                  thoại</span>
                <input type="text" class="form-control text-secondary text-center" id="text-input" name="phone"
                  value="{{ $value['user']->phone }}" placeholder="Nhập số điện thoại ..." aria-label="Fullname"
                  aria-describedby="basic-addon1" required>
              </div>
            </div>
          </div>

          <div class="row form-group m-b-10 ">
            <label class=" text-white m-b-5">Địa chỉ</label>
            <div class=" form-group col-md-6">
              <div class="input-group mb-2">
                <label class="input-group-text text-secondary" for="inputGroupSelect02">Thành
                  phố</label>
                <select required class="form-select text-secondary text-center location" data-target="districts"
                  id="select-city" name="city">
                  @if(isset($value['city']))
                  @foreach($value['provinces'] as $province)
                  <option @if($province->full_name == $value['city']) selected @endif value="{{
                    $province->code }}"> {{ $province->full_name }}</option>
                  @endforeach
                  @endif

                  @if(!isset($value['city']))
                  <option value="" selected>[Chọn Thành phố]</option>
                  @foreach($value['provinces'] as $province)
                  <option value="{{ $province->code }}"> {{ $province->full_name }}</option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class=" form-group col-md-6">
              <div class="input-group mb-2">
                <label class="input-group-text text-secondary" for="inputGroupSelect03">Quận/Huyện</label>
                <select required class="form-select text-secondary text-center location districts" data-target="wards"
                  id="select-district" name="district">
                  @if(isset($value['district']))
                  @foreach($value['districts'] as $district)
                  <option @if($district->full_name == $value['district']) selected @endif
                    value="{{$district->code}}">{{$district->full_name}}</option>
                  @endforeach
                  @endif

                  @if(!isset($value['district']))
                  <option value="" selected>[Chọn Quận/Huyện]</option>
                  @foreach($value['districts'] as $district)
                  <option value="{{$district->code}}">{{$district->full_name}}</option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>
          </div>
          <div class="row form-group m-b-10 ">
            <div class=" form-group col-md-6 ">
              <div class="input-group mb-2">
                <label class="input-group-text text-secondary" for="inputGroupSelect04">Phường/Xã</label>
                <select required class="form-select text-secondary text-center wards" id="select-ward" name="ward">
                  @if(isset($value['ward']))
                  @foreach($value['wards'] as $ward)
                  <option @if($ward->full_name == $value['ward']) selected @endif
                    value="{{$ward->code}}">{{$ward->full_name}}</option>
                  @endforeach
                  @endif

                  @if(!isset($value['ward']))
                  <option value="" selected>[Chọn Phường/Xã]</option>
                  @foreach($value['wards'] as $ward)
                  <option value="{{$ward->code}}">{{$ward->full_name}}</option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>
            <div class=" form-group col-md-6">
              <div class="input-group mb-2 ">
                <span class="input-group-text text-secondary" id="basic-addon1">Địa Chỉ</span>
                @if(isset($value['address']))
                <input required type="text" class="form-control text-secondary text-center" id="address_house"
                  name="address_house" value="{{$value['address']}}">
                @else
                <input required type="text" class="form-control text-secondary text-center" id="address_house"
                  name="address_house" value="">
                @endif
              </div>
            </div>
            <div class="row form-group">
              <label class=" text-white m-b-5">Đổi Mật Khẩu</label>
              <div class="form-group col-md-6">
                <div class="input-group">
                  <input minlength="6" type="password" class="form-control text-secondary text-center" id="password1"
                    name="password1" placeholder="Nhập mật khẩu mới ..." aria-label="Fullname"
                    aria-describedby="basic-addon1">
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group ">
                  <input minlength="6" type="password" class="form-control text-secondary text-center" id="password2"
                    name="password2" placeholder="Nhập lại mật khẩu mới ..." aria-label="Fullname"
                    aria-describedby="basic-addon1" same="password1">
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="row form-group col-md-12 ">
        <div class="mb-2 text-center ">
          <label for="formFileMultiple" class="form-label text-center text-white ">Chọn ảnh đại
            diện</label>
          <br>
          <input class="form-control" style="display:none;" type="file" id="imageInput" accept="image/*"
            onchange="previewImage()" name="image">
          <input type="text" id="image2" name="image2" value="" hidden>
          <div class="container justify-content-center">
            <span id="closeIcon" onclick="resetImage()" style="position: relative;top: 12px;left: 50px;z-index: 1;"><i
                class="fa-regular fa-circle-xmark"></i></span>
            <img id="imagePreview" src="{{ asset('storage/images/'.$value['user']->avatar) }}" alt="Image Preview"
              class="rounded shadow d-block mx-auto"
              style="display:block; max-width: 100px;max-height: 100px;filter: drop-shadow(0 0 1rem #B29D9D);"
              onclick="setImage()">
          </div>
        </div>
      </div>

      <div class="row d-flex justify-content-center m-t-20 col-md-12">
        <button type="submit" class="btn btn-primary btn-sm col-md-2" style="margin-right: 10px;">
          <i class="fa-regular fa-floppy-disk "></i>
          <space> </space>Sửa
        </button>
        <button type="button" class="btn btn-danger btn-sm col-md-2 " id="close-form">
          <i class="fa-solid fa-xmark " style="color: #fff;"></i>
          <space> </space>Đóng
        </button>
      </div>
      </form>
    </div>
  </div>
  </div>
  </div>
  </div>
  @endif

  <header class="bg-info bg-gradient" style="z-index: 2;">
    <a href="http://localhost/DOANCOSO_2/public/index" class="logo text-success" data-aos="fade-down">GREEN HOUSE</a>
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded-pill " style="max-height: 53px;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item  my-auto " data-aos="fade-down" data-aos-delay="50"><a class="nav-link"
                href="http://localhost/DOANCOSO_2/public/index#home" onclick="toggleMenu();" class=""><i>Trang
                  Chủ</i></a>
            </li>
            <li class="nav-item  my-auto" data-aos="fade-down" data-aos-delay="100"><a class="nav-link"
                href="http://localhost/DOANCOSO_2/public/index#about" onclick="toggleMenu();"><i>Giới
                  Thiệu</i></a></li>
            <li class="nav-item  my-auto" data-aos="fade-down" data-aos-delay="150"><a class="nav-link"
                href="http://localhost/DOANCOSO_2/public/index#system" onclick="toggleMenu();"><i>Hệ
                  Thống</i></a></li>
            <li class="nav-item  my-auto" data-aos="fade-down" data-aos-delay="250"><a class="nav-link"
                href="http://localhost/DOANCOSO_2/public/index#testimonials" onclick="toggleMenu();"><i>Phản Hồi</i></a>
            </li>
            <li class="nav-item  my-auto" data-aos="fade-down" data-aos-delay="150">
              <a class="nav-link" href="http://localhost/DOANCOSO_2/public/index#shop" onclick="toggleMenu();"><i>Mua
                  Sắm</i></a>

            </li>
            @if(isset($value['user']))
            <li class="nav-item  my-auto" data-aos="fade-down" data-aos-delay="100"><a class="nav-link"
                href="{{route('page.cart')}}"><i class="fa-solid fa-cart-arrow-down "></i> <span
                  class="badge bg-success">{{$value['quantity']}}</span></a>
            </li>
            <li class="nav-item  my-auto dropdown" data-aos="fade-down" data-aos-delay="50">
              <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="{{ asset('storage/images/'.$value['user']->avatar) }}" class="rounded-circle"
                  style="max-width: 30px; max-height: 30px;margin-right:5px" alt="...">
                <i>{{$value['user']->fullname}}</i>

              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item nav-link text-center" id="show-form">
                    <i class="fa-regular fa-address-card"></i>
                    <space> </space>CHỈNH SỬA
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item text-center nav-link m-r-10px" href="{{route('auth.logout')}}">ĐĂNG XUẤT
                    <space>
                    </space><i class="fa-solid fa-right-from-bracket "></i>
                  </a>
                </li>
              </ul>
            </li>
            @endif
            @if($value['user'] == null)
            <li class="nav-item  my-auto" data-aos="fade-down" data-aos-delay="100"><a class="nav-link"
                href="{{route('page.cart')}}"><i class="fa-solid fa-cart-arrow-down "></i> <span
                  class="badge bg-success">0</span></a>
            </li>
            <li class="nav-item  my-auto" data-aos="fade-down" data-aos-delay="350"><a class="nav-link"
                href="{{route('page.login')}}"><i class="fa-regular fa-circle-user fa-lg"></i>
                <space> </space> <i>TÀI KHOẢN</i>
              </a>
            </li>
            @endif

          </ul>

        </div>
      </div>
    </nav>
  </header>

  <!-- main -->
  <section class="shop" id="shop">
    <div class="container">
      <div class="row rounded" style="background-color: #fff;min-height: 533px;">
        <div class="container mt-4">
          <div class="card">
            <div class="popular_song rounded" style="background-color: #fff;">
              <div class="h4 rounded"
                style="background-color: #fff;display: flex !important;flex-direction: row !important;justify-content: space-between !important;align-items: center !important;">
                <div style="color: rgb(2, 207, 29, 139);padding: 14px 0px 0px 25px;">
                  <select class="form-select text-secondary text-center" aria-label="Default select example"
                    onchange="window.location.href = this.value;">
                    <option @if ($value['chose']==1) selected @endif value="{{ route('page.cart', ['chose' => 1]) }}">
                      Hàng trong giỏ</option>
                    <option @if ($value['chose']==2) selected @endif value="{{ route('page.cart', ['chose' => 2]) }}">
                      Hàng đang giao</option>
                    <option @if ($value['chose']==3) selected @endif value="{{ route('page.cart', ['chose' => 3]) }}">
                      Lịch Sử Mua Hàng</option>
                  </select>
                </div>
                <div class="btn_s" style="padding: 0px 10px;">
                  <i class="fa-solid fa-circle-left fa-sm" id="pop_song_left" style="color: #2265d8;"></i>
                  <i class="fa-solid fa-circle-right fa-sm" id="pop_song_right" style="color: #2265d8;"></i>
                </div>
              </div>
              <div class="pop_song">
                @if($value['chose'] == 1)
                @foreach ($value['products'] as $product)
                @if($product->status == 1)
                <li class="songItem rounded " style="max-width: 300px;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">
                  <div class="img_play">
                    <img src="storage/images/{{ $product->image }}">
                  </div>
                  <h6 class="text-center text-truncate" style="padding: 0px 20px">{{
                    $product->name_product }}<br>
                    <div class="subtitle">
                      <small class="text-muted">Giá: <s><span>{{$product->price}}
                            vnđ</span></s></small>
                    </div>
                    <div class="subtitle" style="padding-top: 5px;">
                      <button class="btn btn-success "><i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                        <space> </space><a class="text-decoration-none text-white"
                          href="{{route('delete_cart', ['id' => $product->id_product])}}">Xóa</a>
                      </button>
                      <button class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ $product->id_product }}" data-bs-whatever="@getbootstrap"><i
                          class="fa-solid fa-credit-card" style="color: #ffffff;"></i>
                        <space> </space>Mua
                      </button>
                    </div>
                  </h6>
                </li>
                <div class="modal fade" id="exampleModal{{ $product->id_product }}" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Mua Hàng</h1>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('buy')}}" method="get" type="multipart/form-data"
                          id="form{{ $product->id_product }}" class="text-truncate">
                          @csrf
                          <input type="hidden" name="id_product" value="{{ $product->id_product }}">
                          <input type="hidden" name="id_account" value="{{ $value['user']->id }}">
                          <input type="hidden" name="name_product" value="{{ $product->name_product }}">
                          <input type="hidden" name="price" id="price" value="{{ $product->price }}">
                          <input type="hidden" name="image" value="{{ $product->image }}">
                          <div class="d-flex justify-content-center mb-2">
                            <img src="storage/images/{{ $product->image }}" width="80%"
                              alt="{{ $product->name_product }}">
                          </div>
                          <div class="mb-2 text-center text-truncate">
                            <h3 for="recipient-name " class="col-form-label  text-secondary text-center text-truncate">
                              {{$product->name_product }}</h3>
                          </div>
                          <div class="mb-2 text-secondary">
                            <label for="quantity ">Số lượng:</label>
                            <input type="number" id="quantity{{ $product->id_product }}" name="quantity" value="1"
                              min="1" onchange="updatePrice('{{ $product->id_product }}','{{ $product->price }}')"
                              style="background-color: #dcc9c9;border-radius: 9px;text-align: center;">
                          </div>
                          <div class="mb-2 text-secondary">
                            <label for="price{{ $product->id_product }}">Giá:</label>
                            <span id="price{{ $product->id_product }}" name="price"
                              style="padding-left: 42px;text-align:center">{{ $product->price }}vnđ</span>

                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                            class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                          <space> </space>Hủy
                        </button>
                        <button type="button" id="submit{{ $product->id_product }}" class="btn btn-primary"><i
                            class="fa-solid fa-credit-card" style="color: #ffffff;"></i>
                          <space> </space>Mua
                        </button>

                        <script>
                          document.getElementById("submit{{ $product->id_product }}").onclick = function () {
                            document.getElementById("form{{ $product->id_product }}").submit();
                          }

                          function updatePrice(number, pricePerUnit) {
                            // Lấy giá trị số lượng từ ô input
                            var quantity = document.getElementById('quantity' + number).value;

                            // Chuyển đổi giá thành số thực
                            pricePerUnit = parseFloat(pricePerUnit);

                            // Tính giá tổng dựa trên số lượng
                            var totalPrice = quantity * pricePerUnit;

                            // Hiển thị giá mới trên trang
                            document.getElementById('price' + number).innerHTML = totalPrice;

                            // Tính toán giá trị trên form
                            document.getElementById('price').value = totalPrice;

                          }
                        </script>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
                @endif
                @if($value['chose'] == 2)
                @foreach ($value['bills'] as $bill)
                @if($bill->status_bill == 2)
                <li class="songItem rounded " style="max-width: 300px;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">
                  <div class="img_play">
                    <img src="storage/images/{{ $bill->image }}">
                  </div>
                  <h6 class="text-center text-truncate" style="padding: 0px 20px">{{
                    $bill->name_product }}<br>
                    <div class="subtitle">
                      <small class="text-muted">Số lượng: <span>{{$bill->quantity}}</span> - </small>
                      <small class="text-muted">Giá: <s><span>{{$bill->price}}
                            vnđ</span></s></small>
                    </div>
                    <div class="subtitle" style="padding-top: 5px;">

                      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        data-bs-whatever="@getbootstrap">Đang giao<space> </space><i
                          class="fa-solid fa-truck-fast fa-beat-fade" style="color: #ffffff;"></i>

                      </button>
                    </div>
                  </h6>
                </li>

                @endif
                @endforeach
                @endif
                @if($value['chose'] == 3)
                @foreach ($value['bills'] as $bill)
                @if($bill->status_bill == 3)
                <li class="songItem rounded " style="max-width: 300px;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">
                  <div class="img_play">
                    <img src="storage/images/{{ $bill->image }}">
                  </div>
                  <h6 class="text-center text-truncate" style="padding: 0px 20px">{{
                    $bill->name_product }}<br>
                    <div class="subtitle">
                      <small class="text-muted">Số lượng: <span>{{$bill->quantity}}</span> - </small>
                      <small class="text-muted">Giá: <s><span>{{$bill->price}}
                            vnđ</span></s></small>
                    </div>
                    <div class="subtitle" style="padding-top: 5px;">
                      <small class="text-muted">Ngày Mua: <span>{{$bill->created_at}}</span></small><br>
                      <small class="text-muted">Ngày Nhận: <s><span>{{$bill->received_at}}
                          </span></s></small>

                    </div>
                  </h6>
                </li>
                @endif
                @if($bill->status_bill == 0)
                <li class="songItem rounded " style="max-width: 300px;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">
                  <div class="img_play">
                    <img src="storage/images/{{ $bill->image }}">
                  </div>
                  <h6 class="text-center text-truncate" style="padding: 0px 20px">{{
                    $bill->name_product }}<br>
                    <div class="subtitle">
                      <small class="text-muted">Số lượng: <span>{{$bill->quantity}}</span> - </small>
                      <small class="text-muted">Giá: <s><span>{{$bill->price}}
                            vnđ</span></s></small>
                    </div>
                    <div class="subtitle" style="padding-top: 5px;">
                      <button type="button" class="btn btn-success " data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{$bill->id}}" data-bs-whatever="@mdo">
                        Đã Hủy <i class="fa-solid fa-circle-check" style="color: #c1df2a;"></i>
                      </button>
                    </div>
                  </h6>
                </li>
                <div class="modal fade" id="exampleModal{{$bill->id}}" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="z-index: 999999 !important">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">Thông Báo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form >                   
                          <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Sản Phẩm: {{$bill->name_product}} - Số
                              Lượng: {{$bill->quantity}} - Giá: {{$bill->price}} VNĐ</label>
                            <label for="recipient-name" class="col-form-label">Lý Do Hủy Đơn: {{$bill->messenger}} </label>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                            class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                          <space> </space>Đóng
                        </button>                                   
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- end main -->

  <!-- Contact Section  -->
  <section class="contact" id="contact">
    <div class="container">
      <div class="box">
        <div class="contactForm shadow-lg p-3 mb-5 bg-body-tertiary rounded" data-aos="fade-right">
          <i>
            <h4 class="text-center text-secondary ">BẠN CẦN HỔ TRỢ !</h4>
          </i>
          <div class="inputBox" data-aos="fade-right" data-aos-delay="40">
            <input type="text" placeholder="Email">
          </div>

          <div class="inputBox" data-aos="fade-right" data-aos-delay="60">
            <textarea placeholder="Message"></textarea>
          </div>
          <div class="inputBox align-center" data-aos="fade-right" data-aos-delay="80">
            <input type="submit" class="btn-submit " value="GỬI">
          </div>
        </div>
        <div class="map shadow-lg p-3 mb-5 bg-body-tertiary rounded" data-aos="fade-left">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2568.2542413259!2d108.22160981690112!3d16.031650144849895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219ee33413dc7%3A0x7eb33ace27edf2ae!2zSGFuZG1hZGUgxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1694438307984!5m2!1svi!2s"
            width="600" height="450" style="border:0;" allowfullscreen loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="icon-container shadow-lg p-3 mb-5 bg-body-tertiary rounded" data-aos="fade-up">
          <div class="icons" data-aos="fade-up" data-aos-delay="100">
            <span>Address :</span>
            <p>571 Nui Thanh, Hai Chau, DN</p>
          </div>
          <div class="icons" data-aos="fade-up" data-aos-delay="200">
            <span>Email :</span>
            <p>Greenhouse123@gmail.com</p>
          </div>
          <div class="icons" data-aos="fade-up" data-aos-delay="300">
            <span>Phone :</span>
            <p>+84 123 456 789</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JS Link  -->
  <script src="Edit/js/script.js"></script>
  <!-- AOS JS  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
    integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
  <script>
    AOS.init();
  </script>

  <script>

    document.addEventListener('DOMContentLoaded', function () {
      const showFormBtn = document.getElementById('show-form');
      const background = document.querySelector('.div-form');


      showFormBtn.addEventListener('click', function () {
        // Loại bỏ class 'close-categories' trước khi thêm class 'display-categories'
        background.classList.remove('close-categories');
        background.classList.add('display-form');

      });

      const close = document.getElementById('close-form');

      close.addEventListener('click', function () {
        // Loại bỏ class 'display-categories' trước khi thêm class 'close-categories'
        background.classList.remove('.div-form');
        background.classList.add('close-categories');
      });
    });

    function address() {
      // Lấy giá trị văn bản từ ba thẻ select khác nhau
      var select1Text = document.getElementById('select-city').options[document.getElementById('select-city').selectedIndex].text;
      var select2Text = document.getElementById('select-district').options[document.getElementById('select-district').selectedIndex].text;
      var select3Text = document.getElementById('select-ward').options[document.getElementById('select-ward').selectedIndex].text;
      var select4Text = document.getElementById('address_house').value;

      // Gộp giá trị văn bản và đặt vào input cuối cùng
      var address = select4Text + ',' + select3Text + ',' + select2Text + ',' + select1Text;
      document.getElementById('address').value = address;
    }

    document.querySelector("form").addEventListener("submit", function (event) {
      // Gọi hàm address() trước khi submit form
      address();

    })

    function previewImage() {
      var input = document.getElementById('imageInput');
      var preview = document.getElementById('imagePreview');

      var file = input.files[0];

      if (file) {
        var reader = new FileReader();

        reader.onload = function (e) {
          viewe.target.result;
          preview.style.display = 'block';
          document.getElementById('closeIcon').style.display = 'block';
        };

        reader.readAsDataURL(file);
      }
    }

    function setImage() {
      var input = document.getElementById('imageInput');
      input.click();
      previewImage();
    }

    function resetForm(avatar) {
      var imageSrc = "{{asset('storage/images')}}";
      document.getElementById('imagePreview').src = imageSrc + "/" + avatar;
      document.getElementById('closeIcon').style.display = 'block';
    }

    function resetImage() {
      document.getElementById('imagePreview').src = "{{asset('storage/images/default.jpg')}}";
      document.getElementById('closeIcon').style.display = 'none';
      document.getElementById('image2').value = 'default.jpg';

    }
  </script>

  <script>
    let pop_song_left = document.getElementById('pop_song_left');
    let pop_song_right = document.getElementById('pop_song_right');
    let pop_song = document.getElementsByClassName('pop_song')[0];

    const itemWidth = 370; // Độ rộng của mỗi item, điều này cần được điều chỉnh tùy thuộc vào layout của bạn

    pop_song_right.addEventListener('click', () => {
      const newScrollLeft = pop_song.scrollLeft + itemWidth;
      gsap.to(pop_song, { scrollLeft: newScrollLeft, duration: 0, ease: 'power2.inOut' });
    });

    pop_song_left.addEventListener('click', () => {
      const newScrollLeft = pop_song.scrollLeft - itemWidth;
      gsap.to(pop_song, { scrollLeft: newScrollLeft < 0 ? 0 : newScrollLeft, duration: 0, ease: 'power2.inOut' });
    });


    const input1 = document.getElementById('password1');
    const input2 = document.getElementById('password2');
    function checkInputs() {
      if (input1.value !== input2.value) {
        input2.setCustomValidity('Giá trị không khớp');
      } else {
        input2.setCustomValidity('');
      }
    }
    input1.addEventListener('input', checkInputs);
    input2.addEventListener('input', oneheckInputs);
  </script>


</body>

</html>