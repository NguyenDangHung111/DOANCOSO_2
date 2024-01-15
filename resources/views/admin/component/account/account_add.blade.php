<div class="main-content">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card col-md-7 shadow-lg p-3 mb-5 bg-body rounded ">
                <div class="card-header text-center  bg-primary bg-gradient text-white text-transform-capitalize">
                    <strong>THÊM TÀI KHOẢN</strong>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body card-block ">
                    <form action="{{route('page.save_account')}}" method="post" enctype="multipart/form-data"
                        class="form-horizontal ">
                        @csrf
                        <div class="row form-group m-b-10">
                            <label class=" text-secondary m-b-5">Thông Tin</label>
                            <div class="row form-group m-b-10 col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Họ và tên</span>
                                    <input type="text" class="form-control" name="fullname"
                                        placeholder="Nhập họ và tên ..." aria-label="Fullname"
                                        value="{{old('fullname')}}">
                                </div>
                            </div>
                            <div class="row form-group m-b-10 col-md-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text text-secondary"
                                        for="inputGroupSelect01">Quyền</label>
                                    <select class="form-select text-secondary text-center" id="inputGroupSelect06"
                                        name="function">
                                        <option @if(old('function')==0) selected @endif value="0">Khách hàng</option>
                                        <option @if(old('function')==1) selected @endif value="1">Nhân viên</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group m-b-10">
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Email</span>
                                    <input value="{{old('email')}}" type="email" class="form-control" name="email"
                                        placeholder="Nhập Email ..." aria-label="email">
                                </div>
                            </div>

                            <div class="row form-group col-md-6 ">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Số điện
                                        thoại</span>
                                    <input type="text" class="form-control" name="phone"
                                        placeholder="Nhập số điện thoại ..." value="{{old('phone')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row form-group col-md-4 m-r-35">
                            <div class="input-group mb-3 ">
                                <label class="input-group-text text-secondary" for="inputGroupSelect01">Giới
                                    tính</label>
                                <select class="form-select text-secondary" id="inputGroupSelect01" name="gender">
                                    <option @if(old('gender')=='Nam' ) selected @endif value="Nam">Nam</option>
                                    <option @if(old('gender')=='Nữ' ) selected @endif value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group m-b-10 ">
                            <label class=" text-secondary m-b-5">Địa chỉ</label>
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text text-secondary" for="inputGroupSelect02">Thành
                                        phố</label>
                                    <select class="form-select text-secondary text-center location"
                                        data-target="districts" id="select-city" name="city">
                                        <option value="">[Chọn Thành phố]</option>
                                        @if(isset($value['provinces']))
                                        @foreach($value['provinces'] as $province)
                                        <option @if(old('city')==$province->code) selected @endif value="{{
                                            $province->code }}"> {{ $province->full_name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text text-secondary"
                                        for="inputGroupSelect03">Quận/Huyện</label>
                                    <select class="form-select text-secondary text-center location districts"
                                        data-target="wards" id="select-district" name="district">
                                        <option value="">[Chọn Quận/Huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group m-b-10 ">
                            <div class="row form-group col-md-6 ">
                                <div class="input-group mb-3">
                                    <label class="input-group-text text-secondary"
                                        for="inputGroupSelect04">Phường/Xã</label>
                                    <select class="form-select text-secondary text-center wards" id="select-ward"
                                        name="ward">
                                        <option value="">[Chọn Phường/Xã]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3 ">
                                    <input type="text" class="form-control" name="address_house" id="address_house" placeholder="Tổ/Xóm...">
                                </div>
                            </div>
                            <input type="hidden" name="address" id="address">
                        </div>
                        <div class="row form-group m-b-10 ">
                            <label class=" text-secondary m-b-5">Mật Khẩu</label>
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Mật khẩu</span>
                                    <input type="password" class="form-control" name="password1"
                                        placeholder="Nhập mật khẩu..." aria-label="password">
                                </div>
                            </div>
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Nhập lại mật
                                        khẩu</span>
                                    <input type="password" class="form-control" name="password2"
                                        placeholder="Nhập mật khẩu..." aria-label="password">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group m-b-10 col-md-9">
                            <div class="col-12 col-md-9">
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label text-center text-secondary">Chọn ảnh
                                        đại
                                        diện</label>
                                    <br>
                                    <input class="form-control" style="display: none;" type="file" id="imageInput"
                                        accept="image/*" onchange="previewImage()" name="image"
                                        value="{{old('image')}}">
                                    <div>
                                        <span id="closeIcon" onclick="resetImage()" style="display: none;"><i
                                                class="fa-regular fa-circle-xmark"></i></span>
                                        <img id="imagePreview"
                                            src="{{asset('storage/Images/default.jpg')}}"
                                            alt="Image Preview" class="rounded shadow "
                                            style=" max-width: 100px;max-height: 100px;filter: drop-shadow(0 0 1rem #B29D9D);"
                                            onclick="setImage()">
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row d-flex justify-content-center m-t-20">
                            <button type="submit" class="btn btn-primary btn-sm m-r-10 col-md-2" ">
                                <i class=" fa-regular fa-floppy-disk m-r-10"></i>Lưu
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm col-md-2" onclick="resetForm()">
                                <i class="fa-solid fa-rotate-right m-r-10"></i>Làm Mới
                            </button>
                        </div>
                        
                    </form>
                    <script>
                        function previewImage() {
                            var input = document.getElementById('imageInput');
                            var preview = document.getElementById('imagePreview');
                            var closeIcon = document.getElementById('closeIcon');

                            var file = input.files[0];

                            if (file) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    preview.src = e.target.result;
                                    preview.style.display = 'block';
                                    closeIcon.style.display = 'block';
                                };

                                reader.readAsDataURL(file);
                            }
                        }

                        function setImage() {
                            var input = document.getElementById('imageInput');
                            input.click();
                            previewImage();
                        }

                        function resetForm() {
                            document.getElementById('imageInput').value = '';
                            document.getElementById('imagePreview').src = "{{asset('storage/Images/default.jpg')}}";
                            document.getElementById('imagePreview').style.display = 'block';
                            resetImage();
                        }
                        function resetImage() {
                            document.getElementById('imagePreview').src = "{{asset('storage/Images/default.jpg')}}"; // Đặt đường dẫn ảnh mặc định
                            document.getElementById('closeIcon').style.display = 'none';
                            document.getElementById('imagePreview').style.maxWidth = '100px';
                            document.getElementById('imagePreview').style.minHeight = '100px';

                        }
                        function address() {
                            // Lấy giá trị văn bản từ ba thẻ select khác nhau
                            var select1Text = document.getElementById('select-city').options[document.getElementById('select-city').selectedIndex].text;
                            var select2Text = document.getElementById('select-district').options[document.getElementById('select-district').selectedIndex].text;
                            var select3Text = document.getElementById('select-ward').options[document.getElementById('select-ward').selectedIndex].text;
                            var select4Text = document.getElementById('address_house').value;


                            // Gộp giá trị văn bản và đặt vào input cuối cùng
                            var address = select4Text+',' + select3Text+',' + select2Text + ','+ select1Text;
                            document.getElementById('address').value = address;

                        }

                        document.querySelector("form").addEventListener("submit", function (event) {
                            // Gọi hàm address() trước khi submit form
                            address();
                        })                  

                    </script>
                  
                </div>

            </div>
        </div>
    </div>
    <div class="eye">
        <div>
            <button onclick="toggleIcon()" class="" id="close_menu"><i class="fa-solid fa-eye-slash" id="icon"
                    style="color: #FFF;"></i></button>
        </div>
    </div>

</div>