<div class="main-content">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card col-md-8 shadow-lg p-3 mb-5 bg-body rounded ">
                <div class="card-header text-center  bg-primary bg-gradient text-white text-transform-capitalize">
                    <strong>CHỈNH SỬA SẢN PHẨM</strong>
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
                    <form action="{{route('page.update_product',['id' => $value['product']->id])}}" method="post" enctype="multipart/form-data"
                        class="form-horizontal ">
                        @csrf
                        <div class="row form-group m-b-10">
                            <label class=" text-secondary m-b-5">Thông Tin Cơ Bản</label>
                            <div class="row form-group m-b-10 col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Tên Sản Phẩm</span>
                                    <input type="text" class="form-control text-secondary text-center" name="name_product"
                                        placeholder="Nhập tên sản phẩm ..." aria-label="name_product"
                                        value="{{$value['product']->name_product}}">                                      
                                </div>
                            </div>
                            <div class="row form-group m-b-10 col-md-6">
                                <div class="input-group mb-3">
                                    <label class="input-group-text text-secondary" for="inputGroupSelect01">Danh
                                        mục</label>
                                    <select class="form-select text-secondary text-center" id="inputGroupSelect06"
                                        name="id_category">
                                        <option value="0">[Chọn Danh mục]</option>
                                        @foreach($value['categories'] as $category)
                                        <option @if($value['product']->id_category == $category->id) selected @endif value="{{$category->id}}">{{$category->name_category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group m-b-10">
                            <div class="row form-group col-md-6">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Giá</span>
                                    <input value="{{$value['product']->price}}" type="number" class="form-control text-secondary text-center" name="price"
                                        placeholder="Nhập giá ..." aria-label="price" min="0">
                                </div>
                            </div>

                            <div class="row form-group col-md-6 ">
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text text-secondary" id="basic-addon1">Số lượng</span>
                                    <input type="number" class="form-control text-secondary text-center" name="quantity"
                                        placeholder="Nhập số lượng..." value="{{$value['product']->quantity}}" min="1">
                                </div>
                            </div>
                        </div>

                        <div class="row form-group m-b-20 ">
                            <label class=" text-secondary m-b-5">Mô tả sản phẩm</label>
                            <div class="row form-group col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Mô tả sản phẩm ở đây"
                                        id="textarea" name="long_description" value="">{{$value['product']->long_description}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group m-b-20 ">
                            <label class=" text-secondary m-b-5">Điểm đặc biệt</label>
                            <div class="row form-group col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Điểm đặc biệt"
                                        id="textarea" name="highlight" value="">{{$value['product']->highlight}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group m-b-15 ">
                            <label class=" text-secondary m-b-5">Thông số sản phẩm</label>
                            <div class="row form-group col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Thông số sản phẩm"
                                        id="textarea" name="product_specification" value="">{{$value['product']->product_specification}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group m-b-10 col-md-9">
                            <div class="col-12 col-md-9">
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label text-center text-secondary">Ảnh sản phẩm</label>
                                    <br>
                                    <input class="form-control" style="display: none;" type="file" id="imageInput"
                                        accept="image/*" onchange="previewImage()" name="image_product"
                                        value="{{old('image')}}">
                                    <div>
                                        <span id="closeIcon" onclick="resetImage()" style="display: none;"><i
                                                class="fa-regular fa-circle-xmark"></i></span>
                                        <img id="imagePreview" src="{{ asset('storage/images/'.$value['product']->image) }}"
                                            alt="Image Preview" class="rounded shadow "
                                            style=" max-width: 100px;max-height: 100px;filter: drop-shadow(0 0 1rem #B29D9D);"
                                            onclick="setImage()">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center m-t-20">
                            <button type="submit" class="btn btn-primary btn-sm m-r-10 col-md-2" ">
                                <i class=" fa-regular fa-floppy-disk m-r-10"></i>Sửa
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm col-md-2" onclick="resetForm()">
                                <i class="fa-solid fa-rotate-right m-r-10"></i>Khôi Phục
                            </button>
                        </div>
                    </form>
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
            document.getElementById('imagePreview').src = "{{asset('storage/Images/default_2.jpg')}}";
            document.getElementById('imagePreview').style.display = 'block';
            resetImage();
        }
        function resetImage() {
            document.getElementById('imagePreview').src = "{{asset('storage/Images/default_2.jpg')}}"; // Đặt đường dẫn ảnh mặc định
            document.getElementById('closeIcon').style.display = 'none';
            document.getElementById('imagePreview').style.maxWidth = '100px';
            document.getElementById('imagePreview').style.minHeight = '100px';

        }
      
    </script>
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/q3jcubrl65k40tqbg8jphxsl5yu4lrikq4qpcl4rpqgjc15v/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',    
            height:200,       
        });
    </script>
</div>