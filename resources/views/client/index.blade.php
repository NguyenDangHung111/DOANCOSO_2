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
        <div class="card col-md-6 shadow-lg p-3 bg-body loader div-form2">
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
                                <input type="text" class="form-control text-secondary text-center" id="text-input"
                                    name="fullname" value="{{ $value['user']->fullname }}"
                                    placeholder="Nhập họ và tên ..." aria-label="Fullname"
                                    aria-describedby="basic-addon1" required>
                                <input type="text" name="id" value="{{ $value['user']->id }}" hidden="true">
                                <input type="hidden" name="address" id="address">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group mb-2 ">
                                <label class="input-group-text text-secondary" for="inputGroupSelect01">Giới
                                    tính</label>
                                <select class="form-select text-secondary text-center" id="inputGroupSelect0"
                                    name="gender">
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
                                <input type="email" class="form-control text-secondary text-center" id="text-input"
                                    name="email" value="{{ $value['user']->email }}" placeholder="Nhập Email ..."
                                    aria-label="email" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6 ">
                            <div class="input-group mb-2 ">
                                <span class="input-group-text text-secondary" id="basic-addon1">Số điện
                                    thoại</span>
                                <input type="text" class="form-control text-secondary text-center" id="text-input"
                                    name="phone" value="{{ $value['user']->phone }}"
                                    placeholder="Nhập số điện thoại ..." aria-label="Fullname"
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
                                <select required class="form-select text-secondary text-center location"
                                    data-target="districts" id="select-city" name="city">
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
                                <label class="input-group-text text-secondary"
                                    for="inputGroupSelect03">Quận/Huyện</label>
                                <select required class="form-select text-secondary text-center location districts"
                                    data-target="wards" id="select-district" name="district">
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
                                <label class="input-group-text text-secondary"
                                    for="inputGroupSelect04">Phường/Xã</label>
                                <select required class="form-select text-secondary text-center wards" id="select-ward"
                                    name="ward">
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
                                <input required type="text" class="form-control text-secondary text-center"
                                    id="address_house" name="address_house" value="{{$value['address']}}">
                                @else
                                <input required type="text" class="form-control text-secondary text-center"
                                    id="address_house" name="address_house" value="">
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class=" text-white m-b-5">Đổi Mật Khẩu</label>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <input minlength="6" type="password" class="form-control text-secondary text-center"
                                        id="password1" name="password1" placeholder="Nhập mật khẩu mới ..."
                                        aria-label="Fullname" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group ">
                                    <input minlength="6" type="password" class="form-control text-secondary text-center"
                                        id="password2" name="password2" placeholder="Nhập lại mật khẩu mới ..."
                                        aria-label="Fullname" aria-describedby="basic-addon1" same="password1">
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
                        <span id="closeIcon" onclick="resetImage()"
                            style="position: relative;top: 12px;left: 50px;z-index: 1;"><i
                                class="fa-regular fa-circle-xmark"></i></span>
                        <img id="imagePreview" src="{{ asset('storage/images/'.$value['user']->avatar) }}"
                            alt="Image Preview" class="rounded shadow d-block mx-auto"
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
        <a href="#" class="logo text-success" data-aos="fade-down">GREEN HOUSE</a>
        <nav class="navbar navbar-expand-lg bg-body-tertiary rounded-pill " style="max-height: 53px;">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item  my-auto " data-aos="fade-down" data-aos-delay="50"><a class="nav-link"
                                href="#home" onclick="toggleMenu();" class=""><i>Trang Chủ</i></a>
                        </li>
                        <li class="nav-item  my-auto" data-aos="fade-down" data-aos-delay="100"><a class="nav-link"
                                href="#about" onclick="toggleMenu();"><i>Giới
                                    Thiệu</i></a></li>
                        <li class="nav-item  my-auto" data-aos="fade-down" data-aos-delay="150"><a class="nav-link"
                                href="#system" onclick="toggleMenu();"><i>Hệ
                                    Thống</i></a></li>
                        <li class="nav-item  my-auto" data-aos="fade-down" data-aos-delay="250"><a class="nav-link"
                                href="#testimonials" onclick="toggleMenu();"><i>Phản Hồi</i></a></li>
                        <li class="nav-item  my-auto" data-aos="fade-down" data-aos-delay="150">
                            <a class="nav-link" href="#shop" onclick="toggleMenu();"><i>Mua Sắm</i></a>

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
                                    <a class="dropdown-item text-center nav-link m-r-10px"
                                        href="{{route('auth.logout')}}">ĐĂNG XUẤT<space>
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
    <!-- Landing page  -->
    <section class="home" id="home">
        <div class="content text-center">
            <i><h2 data-aos="fade-up">SỐNG XANH TIỆN LỢI <br>KHÔNG CẦN NGHĨ SUY</h2></i>
            <p data-aos="fade-up" data-aos-delay="100">
                chúng tôi mong muốn mang đến những giải pháp thay thế bền vững, thân thiện với môi trường vì một thế
                giới không nhựa. Từ ống hút, dao, muỗng, nĩa, đến hộp đựng thực phẩm, hay ly giấy, tất cả đều được làm
                từ nguyên liệu có nguồn gốc tự nhiên, không chứa
                nhựa và phân huỷ hoàn toàn trong môi trường tự nhiên
            </p>
        </div>
    </section>
    <!-- About Section  -->
    <section class="about" id="about">
        <div class="container">
            <!-- About item  -->
            <div class="row">
                <div class="col50 text-center" data-aos="fade-right">
                    <div class="titleText text-secondary">
                        <i class="text-secondary"><h2>GIỚI THIỆU</h2></i>
                    </div>
                    <p>Tại GreenHouse chúng tôi liên tục cho ra những giải pháp thay thế nhựa thật sự bền vững, có thể
                        phân huỷ hoàn toàn trong tự nhiên, với giá thành phải chăng và dễ dàng tiếp cận, luôn luôn lắng
                        nghe và cải tiến</p>
                </div>
                <div class="col50">
                    <div class="imgBx" data-aos="fade-left">
                        <img src="storage/images/index2.jpg" alt>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col50 text-center" data-aos="fade-left">
                    <p>Có các sản phẩm nhựa được sản xuất chỉ để dùng 1 lần và phần lớn sẽ bị vứt đi, nhưng những hậu
                        quả mà chúng để lại cho môi trường và tất cả các sinh vật đang sống trên hành tinh này là rất
                        đáng báo động</p>
                </div>
                <div class="col50">
                    <div class="imgBx" data-aos="fade-right">
                        <img src="storage/images/index2.jpg" alt>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col50 text-center" data-aos="fade-right">
                    <p>Tại GreenHouse chúng tôi mong muốn mang đến những thay đổi tích cực bằng cách cung các các giải
                        pháp thay thế nhựa sử dụng một lần thật sự thân thiện với môi trường và an toàn cho sức khoẻ!
                    </p>
                </div>
                <div class="col50">
                    <div class="imgBx" data-aos="fade-left">
                        <img src="storage/images/index2.jpg" alt>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- System Section  -->
    <section class="system" id="system">
        <div class="container">
            <div class="title" data-aos="fade-up">
                <i><h2 class="titleText text-white">HỆ THỐNG SẢN PHẨM</h2></i>    
            </div>
            <div class="row">
                <div class="timeline">
                    <div class="row">
                        <!-- timeline item  -->
                        <div class="timeline-item text-center text-white">
                            <div class="timeline-item-inner" data-aos="fade-right">
                                <i class="icon"></i>
                                <span><i>
                                        <h2>Đa Dạng</h2>
                                    </i></span>
                                <p class="text-white">cung cấp đa dạng các sản phẩm thân thiện với môi trường từ ống hút, dụng cụ ăn uống,
                                    hộp đựng thực phẩm đến các sản phẩm văn phòng phẩm. Chúng tôi có tất cả những giải
                                    pháp cần thiết để hỗ trợ cho doanh nghiệp của bạn trên
                                    hành trình phát triển bền vững.
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item text-white">
                            <div class="timeline-item-inner text-center" data-aos="fade-left">
                                <i class="icon"></i>
                                <span><i>
                                        <h2>Chất Lượng Tuyệt Vời</h2>
                                    </i></span>
                                <p class="text-white">Các sản phẩm của chúng tôi vô cùng linh hoạt, bền chắc và hoạt động tốt ở mọi nhiệt
                                    độ khác nhau, giúp chúng trở nên lý tưởng cho mọi loại thực phẩm và đồ uống. Các sản
                                    phẩm của GREEN HOUSE được chế tạo để sử dụng lâu bền nên
                                    thường có thời hạn sử dụng lên đến 3 năm.
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item text-white">
                            <div class="timeline-item-inner text-center" data-aos="fade-right">
                                <i class="icon"></i>
                                <span><i>
                                        <h2>An Toàn Với Môi Trường</h2>
                                    </i></span>
                                <p class="text-white">Các sản phẩm của GREEN HOUSE đáp ứng các tiêu chuẩn cao nhất về tính bền vững và đều
                                    được
                                    chứng nhận an toàn với môi trường, đảm bảo hành trình xanh với tác động môi trường
                                    tối thiểu trong suốt vòng đời của sản phẩm.
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item text-white">
                            <div class="timeline-item-inner text-center" data-aos="fade-left">
                                <i class="icon"></i>
                                <span><i>
                                        <h2>An Toàn Cho Sức Khoẻ</h2>
                                    </i></span>
                                <p class="text-white">Tất cả các sản phẩm GREEN HOUSE đều được kiểm định và xác nhận kỹ lưỡng để đảm bảo
                                    khả năng
                                    phân hủy, không chứa nhựa và độc tố, không chứa gluten, không chứa kim loại nặng và
                                    an toàn để sử dụng trước khi tung ra thị trường..
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item text-white">
                            <div class="timeline-item-inner text-center" data-aos="fade-right">
                                <i class="icon"></i>
                                <span><i>
                                        <h2>Dịch Vụ Tận Tâm </h2>
                                    </i></span>
                                <p class="text-white">Không chỉ đem đến những sản phẩm chất lượng, chúng tôi còn tự hào cung cấp dịch vụ
                                    chăm sóc khách hàng nhiệt tình nhất có thể. Chúng tôi luôn đặt nhu cầu của khách
                                    hàng lên hàng đầu, và cố gắng phản hồi mọi thắc mắc của
                                    bạn chỉ trong vòng 2 đến 3 ngày làm việc..
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section  -->
    <section class="shop" id="shop">
        <div class="container">
            <div class="text-center text-white" data-aos="fade-up">
                <i>
                    <h2 class="titleText ">SẢN PHẨM</h2>
                </i>
                <p>Chào mừng bạn đến với trang web mua sắm tuyệt vời của chúng tôi! Ở đây, chúng tôi cam kết mang đến
                    cho bạn trải nghiệm mua sắm trực tuyến tuyệt vời nhất, với sự đa dạng, chất lượng và dịch vụ chăm
                    sóc khách hàng hàng đầu.</p>
            </div>
            <div class="row rounded" style="background-color: #fff;max-height: 525px">
                <div class="container mt-4">
                    <div class="card">
                        <div class="popular_song rounded" style="background-color: #fff;min-height: 470px;">
                            <div class="h4 rounded"
                                style="background-color: #fff;display: flex !important;flex-direction: row !important;justify-content: space-between !important;align-items: center !important;">
                                <div style="color: rgb(2, 207, 29, 139);padding: 14px 0px 0px 25px;">
                                    <select onchange="changeRoute(this)" class="form-select text-secondary text-center"
                                        aria-label="Default select example">
                                        @foreach ($value['categories'] as $category)
                                        @if($value['products_chose'] != null)
                                        @if($value['products_chose'][0] != null)
                                        <option value="{{route('page.index',['id_category' => $category->id],)}}"
                                            @if($value['products_chose'][0]->id_category == $category->id) selected
                                            @endif>{{ $category->name_category }}
                                        </option>
                                        @else
                                        <option value="{{route('page.index',['id_category' => $category->id])}}">{{
                                            $category->name_category }}</option>
                                        @endif
                                        @else
                                        <option value="{{route('page.index',['id_category' => $category->id])}}">{{
                                            $category->name_category }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="btn_s" style="padding: 0px 10px;">
                                    <i class="fa-solid fa-circle-left fa-sm" id="pop_song_left"
                                        style="color: #2265d8;"></i>
                                    <i class="fa-solid fa-circle-right fa-sm" id="pop_song_right"
                                        style="color: #2265d8;"></i>
                                </div>
                            </div>
                            @if($value['user'] != null)
                            <div class="pop_song">
                                @if($value['products_chose'] == null)
                                @foreach ($value['products'] as $product)
                                <li class="songItem rounded "
                                    style="max-width: 300px;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">
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
                                            <button class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{$product->id}}"
                                                data-bs-whatever="@getbootstrap"><i class="fa-solid fa-eye"
                                                    style="color: #FFF;"></i>
                                                <space> </space>Xem
                                            </button>

                                            <button id="addButton{{$product->id}}" class="btn btn-success">
                                                Thêm<space> </space><i class="fa-solid fa-cart-plus"
                                                    style="color: #ffffff;"></i>
                                            </button>

                                        </div>
                                        <form id="addCartForm{{$product->id}}" action="{{route('page.add_cart')}}"
                                            method="post" hidden="true">
                                            @csrf
                                            <input type="text" name="id_product" value="{{$product->id}}">
                                            <input type="text" name="id_account" value="{{$value['user']->id}}">
                                            <input type="text" name="status" value="1">
                                        </form>
                                        <script>
                                            document.getElementById('addButton{{$product->id}}').addEventListener('click', function () {
                                                // Khi nút "Thêm" được click, kích hoạt sự kiện submit của form
                                                document.getElementById('addCartForm{{$product->id}}').submit();
                                            });
                                        </script>
                                    </h6>
                                </li>
                                <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">
                                                   <b><i>{{$product->name_product}}</i></b></h1>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex">
                                                        <div class=" col-md-6 text-center" >
                                                              <img src="storage/images/{{ $product->image }}" alt="" style="max-width: 75%;" >
                                                        </div>                                                     
                                                        <div class=" col-md-6 " >
                                                            <b class=" col-md-6 text-center "><i>Mô tả sản phẩm</i></b>
                                                            <p>{!! $product->long_description !!}</p>
                                                            <b class=" col-md-6 text-center "><i>ĐẶC ĐIỂM NỔI BẬT</i></b>
                                                            <p>{!! $product->highlight !!}</p>
                                                            <b class=" col-md-6 text-center "><i>THÔNG SỐ SẢN PHẨM</i></b>
                                                            <p>{!! $product->product_specification !!}</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Đóng<space> </space><i class="fa-solid fa-circle-xmark" style="color: #fff;"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @if($value['products_chose'] != null)
                                @foreach ($value['products_chose'] as $product)
                                <li class="songItem rounded "
                                    style="max-width: 300px;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">
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
                                            <button class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{$product->id}}"
                                                data-bs-whatever="@getbootstrap"><i class="fa-solid fa-eye"
                                                    style="color: #FFF;"></i>
                                                <space> </space>Xem
                                            </button>
                                            <button class="btn btn-success">Thêm<space> </space><i
                                                    class="fa-solid fa-cart-plus" style="color: #ffffff;"></i></button>
                                        </div>
                                    </h6>
                                </li>
                                <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">
                                                   <b><i>{{$product->name_product}}</i></b></h1>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex">
                                                        <div class=" col-md-6 text-center" >
                                                              <img src="storage/images/{{ $product->image }}" alt="" style="max-width: 75%;" >
                                                        </div>                                                     
                                                        <div class=" col-md-6 " >
                                                            <b class=" col-md-6 text-center "><i>Mô tả sản phẩm</i></b>
                                                            <p>{!! $product->long_description !!}</p>
                                                            <b class=" col-md-6 text-center "><i>ĐẶC ĐIỂM NỔI BẬT</i></b>
                                                            <p>{!! $product->highlight !!}</p>
                                                            <b class=" col-md-6 text-center "><i>THÔNG SỐ SẢN PHẨM</i></b>
                                                            <p>{!! $product->product_specification !!}</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Đóng<space> </space><i class="fa-solid fa-circle-xmark" style="color: #fff;"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            @endif
                            @if($value['user'] == null)
                            <div class="pop_song">
                                @if($value['products_chose'] == null)
                                @foreach ($value['products'] as $product)
                                <li class="songItem rounded "
                                    style="max-width: 300px;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">
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
                                            <button class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{$product->id}}"
                                                data-bs-whatever="@getbootstrap"><i class="fa-solid fa-eye"
                                                    style="color: #FFF;"></i>
                                                <space> </space>Xem
                                            </button>
                                            <button id="addButton{{$product->id}}" class="btn btn-success">Thêm<space>
                                                </space><i class="fa-solid fa-cart-plus"
                                                    style="color: #ffffff;"></i></button>
                                        </div>
                                        <script>
                                            document.getElementById('addButton{{$product->id}}').addEventListener('click', function () {
                                                window.location.href = "http://localhost/DOANCOSO_2/public/cart";
                                            })
                                        </script>
                                    </h6>
                                </li>
                                <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">
                                                   <b><i>{{$product->name_product}}</i></b></h1>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex">
                                                        <div class=" col-md-6 text-center" >
                                                              <img src="storage/images/{{ $product->image }}" alt="" style="max-width: 75%;" >
                                                        </div>                                                     
                                                        <div class=" col-md-6 " >
                                                            <b class=" col-md-6 text-center "><i>Mô tả sản phẩm</i></b>
                                                            <p>{!! $product->long_description !!}</p>
                                                            <b class=" col-md-6 text-center "><i>ĐẶC ĐIỂM NỔI BẬT</i></b>
                                                            <p>{!! $product->highlight !!}</p>
                                                            <b class=" col-md-6 text-center "><i>THÔNG SỐ SẢN PHẨM</i></b>
                                                            <p>{!! $product->product_specification !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Đóng<space> </space><i class="fa-solid fa-circle-xmark" style="color: #fff;"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @if($value['products_chose'] != null)
                                @foreach ($value['products_chose'] as $product)
                                <li class="songItem rounded "
                                    style="max-width: 300px;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">
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
                                            <button class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{$product->id}}"
                                                data-bs-whatever="@getbootstrap"><i class="fa-solid fa-eye"
                                                    style="color: #FFF;"></i>
                                                <space> </space>Xem
                                            </button>
                                            <button class="btn btn-success">Thêm<space> </space><i
                                                    class="fa-solid fa-cart-plus" style="color: #ffffff;"></i></button>
                                        </div>
                                    </h6>
                                </li>
                                <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">
                                                   <b><i>{{$product->name_product}}</i></b></h1>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex">
                                                        <div class=" col-md-6 text-center" >
                                                              <img src="storage/images/{{ $product->image }}" alt="" style="max-width: 75%;" >
                                                        </div>                                                     
                                                        <div class=" col-md-6 " >
                                                            <b class=" col-md-6 text-center "><i>Mô tả sản phẩm</i></b>
                                                            <p>{!! $product->long_description !!}</p>
                                                            <b class=" col-md-6 text-center "><i>ĐẶC ĐIỂM NỔI BẬT</i></b>
                                                            <p>{!! $product->highlight !!}</p>
                                                            <b class=" col-md-6 text-center "><i>THÔNG SỐ SẢN PHẨM</i></b>
                                                            <p>{!! $product->product_specification !!}</p>


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Đóng<space> </space><i class="fa-solid fa-circle-xmark" style="color: #fff;"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials" id="testimonials">
        <div class="container text-center">
            <div class="title text-center" data-aos="fade-up">
                <i><h2 class="titleText ">PHẢN HỒI KHÁCH HÀNG</h2></i>
                
                <p data-aos="fade-up">Chào mừng bạn đến với trang web mua sắm tuyệt vời của chúng tôi, nơi bạn sẽ khám
                    phá một trải nghiệm
                    mua sắm trực tuyến độc đáo với những sản phẩm đặc biệt và độc quyền. Dù số lượng sản phẩm không
                    nhiều, nhưng chúng tôi cam kết mang đến cho bạn sự chất lượng và sự độc đáo trong từng sản phẩm.
                    Điều này có nghĩa là chúng tôi đã tận tâm chọn lọc từng sản phẩm để đảm bảo rằng mỗi sản phẩm đều
                    đáp ứng được sự chú ý và sở thích của khách hàng. </p>
                <div class="content">
                    <!-- Testi items start  -->
                    <div class="box" data-aos="fade-up" data-aos-delay="100">
                        <div class="imgBx">
                            <img src="storage/images/user-icon-male.jpg" alt>
                        </div>
                        <div class="text-white">
                            <p>Bên mình đã sử dụng ống hút bã cả phê của GreenHouse. Mình cho rằng bài toán kinh tế
                                không phải là vấn đề mà quan trọng là ta đã góp phần bảo vệ môi trường xung quanh</p>
                            <h5>TRANG TRẦN</h5>
                        </div>
                    </div>

                    <div class="box" data-aos="fade-up" data-aos-delay="200">
                        <div class="imgBx">
                            <img src="storage/images/user-icon-male.jpg" alt>
                        </div>
                        <div class="text-white">
                            <p>Mặc dù giá cả của các sản phẩm thân thiện với môi trường có thể cao hơn các sản phẩm
                                thông thường, nhưng chúng tôi vẫn chọn sản phẩm của GreenHouse để bảo vệ môi trường</p>
                            <h5>BÁ TUẤN</h5>
                        </div>
                    </div>

                    <div class="box" data-aos="fade-up" data-aos-delay="300">
                        <div class="imgBx">
                            <img src="storage/images/user-icon-male.jpg" alt>
                        </div>
                        <div class="text-white">
                            <p>Chọn lựa và sử dụng các sản phẩm ống hút của GreenHouse để thay thế các sản phẩm dùng
                                nhựa và giấy. Sau thời gian sử dụng, ống hút bã mía đã nhận được nhiều phản hồi tốt từ
                                khách hàng</p>
                            <h5>ĐỨC PHÚC</h5>
                        </div>
                    </div>
                    <!-- Testi items end  -->
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section  -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="box">
                <div class="contactForm shadow-lg p-3 mb-5 bg-body-tertiary rounded" data-aos="fade-right">
                    <i>
                        <h4 class="text-center text-white ">BẠN CẦN HỔ TRỢ !</h4>
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
                        <span>ĐỊA CHỈ :</span>
                        <p>571 Nui Thanh, Hai Chau, DN</p>
                    </div>
                    <div class="icons" data-aos="fade-up" data-aos-delay="200">
                        <span>EMAIL :</span>
                        <p>Greenhouse123@gmail.com</p>
                    </div>
                    <div class="icons" data-aos="fade-up" data-aos-delay="300">
                        <span>ĐIỆN THOẠI :</span>
                        <p>0 123 456 789</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Copyright  -->
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

    <script>
        function changeRoute(select) {
            var selectedValue = select.value;
            // Thêm #shop vào cuối liên kết
            var newRoute = selectedValue + '#shop';
            // Chuyển hướng trang đến liên kết mới
            window.location.href = newRoute;
        }

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

</body>

</html>