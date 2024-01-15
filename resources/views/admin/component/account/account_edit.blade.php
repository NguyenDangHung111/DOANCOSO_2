<div class="main-content">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card col-md-7 shadow-lg p-3 mb-5 bg-body rounded ">
                <div class="card-header text-center  bg-primary bg-gradient text-white text-transform-capitalize">
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
                    <form action="{{route('page.update_account')}}" method="post" enctype="multipart/form-data"
                        class="form-horizontal">
                        @csrf
                        <div class="row form-group">
                            <label class=" text-secondary m-b-5">Thông Tin</label>
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Họ và tên</span>
                                    <input type="text" class="form-control text-secondary text-center" id="text-input"
                                        name="fullname" value="{{ $value['accounts']->fullname }}"
                                        placeholder="Nhập họ và tên ..." aria-label="Fullname"
                                        aria-describedby="basic-addon1">
                                    <input type="text" name="id" value="{{ $value['accounts']->id }}" hidden="true">
                                    <input type="hidden" name="address" id="address" >
                                </div>
                            </div>
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text text-secondary text-center"
                                        for="inputGroupSelect01">Quyền</label>
                                    <select class="form-select text-secondary text-center" id="inputGroupSelect06"
                                        name="function">
                                        <option @if($value['accounts']->function == 0) selected @endif value="0">Khách
                                            hàng</option>
                                        <option @if($value['accounts']->function == 1) selected @endif value="1">Nhân
                                            viên</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Email</span>
                                    <input type="email" class="form-control text-secondary text-center" id="text-input"
                                        name="email" value="{{ $value['accounts']->email }}"
                                        placeholder="Nhập Email ..." aria-label="email" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="row form-group col-md-6 ">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Số điện
                                        thoại</span>
                                    <input type="text" class="form-control text-secondary text-center" id="text-input"
                                        name="phone" value="{{ $value['accounts']->phone }}"
                                        placeholder="Nhập số điện thoại ..." aria-label="Fullname"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group ">
                            <div class="row form-group col-md-6 ">
                                <div class="input-group mb-3 ">
                                    <label class="input-group-text text-secondary" for="inputGroupSelect01">Giới
                                        tính</label>
                                    <select class="form-select text-secondary text-center" id="inputGroupSelect0"
                                        name="gender">
                                        <option @if($value['accounts']->sex == 'Nam') selected @endif value="Nam">Nam
                                        </option>
                                        <option @if($value['accounts']->sex == 'Nữ') selected @endif value="Nữ">Nữ
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group col-md-6 ">
                                <div class="input-group mb-3 ">
                                    <label class="input-group-text text-secondary" for="inputGroupSelect01">Tình
                                        Trạng</label>
                                    <select class="form-select text-secondary text-center" id="inputGroupSelect0"
                                        name="status">
                                        <option @if($value['accounts']->status == 'ON') selected @endif value="ON">Mở
                                        </option>
                                        <option @if($value['accounts']->status == 'OFF') selected @endif
                                            value="OFF">Khóa
                                        </option>
                                    </select>
                                </div>
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
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text text-secondary"
                                        for="inputGroupSelect03">Quận/Huyện</label>
                                    <select class="form-select text-secondary text-center location districts"
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
                            <div class="row form-group col-md-6 ">
                                <div class="input-group mb-3">
                                    <label class="input-group-text text-secondary"
                                        for="inputGroupSelect04">Phường/Xã</label>
                                    <select class="form-select text-secondary text-center wards" id="select-ward"
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
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Địa Chỉ</span>
                                    @if(isset($value['address']))
                                    <input type="text" class="form-control text-secondary text-center" id="address_house"
                                        name="address_house" value="{{$value['address']}}">
                                    @else
                                    <input type="text" class="form-control text-secondary text-center" id="address_house"
                                        name="address_house" value="">
                                    @endif
                                </div>
                            </div>
                        </div>                
                </div>
                <div class="row form-group col-md-12 ">
                    <div class="mb-3 text-center ">
                        <label for="formFileMultiple" class="form-label text-center text-secondary ">Chọn ảnh đại
                            diện</label>
                        <br>
                        <input class="form-control" style="display:none;" type="file" id="imageInput" accept="image/*"
                            onchange="previewImage()" name="image">
                        <input type="text" id="image2" name="image2" value="" hidden>
                        <div class="container justify-content-center">
                            <span id="closeIcon" onclick="resetImage()" style="left: 50px;"><i
                                    class="fa-regular fa-circle-xmark"></i></span>
                            <img id="imagePreview" src="{{ asset('storage/images/'.$value['accounts']->avatar) }}"
                                alt="Image Preview" class="rounded shadow d-block mx-auto"
                                style="display:block; max-width: 100px;max-height: 100px;filter: drop-shadow(0 0 1rem #B29D9D);"
                                onclick="setImage()">
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center m-t-20 col-md-12">
                    <button type="submit" class="btn btn-primary btn-sm m-r-10 col-md-2" >
                        <i class="fa-regular fa-floppy-disk m-r-5"></i>Sửa
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm col-md-2"
                        onclick="resetForm('<?php echo trim($value['accounts']->avatar); ?>')">
                        <i class="fa-solid fa-rotate-right m-r-5"></i>Khôi Phục
                    </button>
                </div>
                </form>
                <script>
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
                    
                    function previewImage() {
                        var input = document.getElementById('imageInput');
                        var preview = document.getElementById('imagePreview');

                        var file = input.files[0];

                        if (file) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                preview.src = e.target.result;
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
                        document.getElementById('image2').value = "default.jpg";

                    }

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