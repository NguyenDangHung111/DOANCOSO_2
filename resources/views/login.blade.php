<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="Edit/css/login.css">
    <title>Tài Khoản</title>
    <link rel="icon" type="image/jpg" sizes="16x16"
        href="http://purepng.com/public/uploads/large/purepng.com-treetreewoodplantbranch-1411527182958jn6pr.png">
</head>

<body style="background: url(http://localhost/DOANCOSO_2/public/storage/images/background.png);">
    <div class="container">
        <div class="signin-signup ">
            <form action="{{route('auth.login')}}" method="post" class="sign-in-form">
                @csrf
                <h2 class="title">ĐĂNG NHẬP</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Email" name="email" value="{{old('email')}}">
                </div>
                @if($errors->has('email'))
                <span style="color: #e01313; font-family: 'Font Awesome 5 Pro';">
                    {{$errors->first('email')}}</span>
                @endif
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Mật Khẩu" name="password">
                </div>
                @if($errors->has('password'))
                <span style="color: #e01313; font-family: 'Font Awesome 5 Pro';">{{$errors->first('password')}}</span>
                @endif
                <input type="submit" value="ĐĂNG NHẬP" class="btn">
                <p class="social-text">Hoặc</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
                <p class="account-text"><a href="#" id="sign-up-btn2">TẠO TÀI KHOẢN</a></p>
            </form>
            <form action="{{route('auth.register')}}" class="sign-up-form" id="myForm" method="post">
                @csrf
                <h2 class="title">TẠO TÀI KHOẢN</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Tài Khoản" name="fullname" value="{{old('fullname')}}">
                </div>
                @if($errors->has('fullname'))
                <span style="color: #e01313; font-family: 'Font Awesome 5 Pro';">
                    {{$errors->first('fullname')}}</span>
                @endif
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="Email" placeholder="Email" id="email2" name="email2" value="{{old('email2')}}">
                </div>

                @if($errors->has('email2'))
                <span style="color: #e01313; font-family: 'Font Awesome 5 Pro';">{{$errors->first('email2')}}</span>
                @endif

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Mật Khẩu" name="password2">
                </div>
                @if($errors->has('password2'))
                <span style="color: #e01313; font-family: 'Font Awesome 5 Pro';">
                    {{$errors->first('password2')}}</span>
                @endif
                <input type="submit" value="TẠO TÀI KHOẢN" class="btn">

                <p class="social-text">Hoặc</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
                <p class="account-text"><a href="#" id="sign-in-btn2">ĐĂNG NHẬP</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>GREEN HOUSE</h3>
                    <p style="line-height: 25px;text-align:center"><i>Sản phẩm của chúng tôi tự hào là những sản phẩm thân
                        thiện với môi trường, được thiết kế và sản xuất với sự chú trọng đặc biệt đến bảo vệ và bảo quản
                        tài nguyên tự nhiên. Với mục tiêu giảm thiểu ảnh hưởng đến môi trường, chúng tôi sử dụng nguyên
                        liệu tái chế và quy trình sản xuất tiên tiến để tạo ra sản phẩm có chất lượng cao mà không gây
                        hại cho hệ sinh thái. Hãy đồng hành cùng chúng tôi trong hành trình bảo vệ hành tinh, mỗi lựa
                        chọn của bạn là một đóng góp tích cực cho sự bền vững của chúng ta.</i></p>
                    <button class="btn" id="sign-in-btn">ĐĂNG NHẬP</button>
                </div>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>GREEN HOUSE</h3>
                    <p style="line-height: 25px;text-align:center"><i>Sản phẩm của chúng tôi là biểu tượng của cam kết vì
                        môi trường, mang lại sự hài hòa hoàn hảo giữa hiện đại và bảo vệ môi trường. Với thiết kế sáng
                        tạo và nguyên liệu thân thiện với tự nhiên, chúng tôi tự hào giới thiệu một sản phẩm không chỉ
                        làm đẹp cho cuộc sống hàng ngày mà còn góp phần tích cực vào việc bảo vệ và duy trì sức khỏe của
                        hành tinh chúng ta.</i></p>
                    <button class="btn" id="sign-up-btn">TẠO TÀI KHOẢN</button>
                </div>
            </div>
        </div>
    </div>
    <script src="Edit/js/login.js"></script>
</body>

</html>