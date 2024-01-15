<div class="main-content ">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-20 m-t-30 text-center "><strong>THÔNG TIN SẢN PHẨM</strong></h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2 text-center" name="property"
                                    onchange="window.location.href = this.value;">
                                    <option selected="selected" value="">DANH MỤC</option>
                                    @if(isset($value['categories']))
                                    @foreach($value['categories'] as $category)
                                    <option value="{{route('page.product', ['id' => $category->id])}}">
                                        {{$category->name_category}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <form class="form-header" action="{{route('page.search_product')}}" method="get">
                                    <input class="au-input au-input--xl" type="text" name="search" id="searchInput"
                                        placeholder="TÌM KIẾM..." />
                                    <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <a href="{{route('page.add_product')}}" class=" nav-link text-decoration-none"><i class="zmdi zmdi-plus"></i> SẢN
                                    PHẨM</a>
                            </button>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small " id="showFormBtn">
                                <i class="zmdi zmdi-plus"> DANH
                                    MỤC</i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive table-container border border-5 rounded col-md-12 ">
                        <table class="table table-hover table-bordered border-primary col-md-12">
                            <thead class="sticky-top ">
                                <tr class="table-info border border-primary ">
                                    <th class="text-center align-middle text-secondary" scope="col"><i>HÌNH ẢNH<i></th>
                                    <th class="text-center align-middle text-secondary" scope="col"><i>SẢN PHẨM<i></th>
                                    <th class="text-center align-middle text-secondary" scope="col"><i>MÔ TẢ<i></th>
                                    <th class="text-center align-middle text-secondary" scope="col"><i>ĐIỂM NỔI BẬT<i>
                                    </th>
                                    <th class="text-center align-middle text-secondary" scope="col"><i>THÔNG SỐ SẢN
                                            PHẨM<i></th>
                                    <th class="text-center align-middle text-secondary"
                                        style="min-width: 170px !important" scope="col" colspan="2"><i>CHI TIẾT<i></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($value['products']))
                                @foreach($value['products'] as $product)
                                <tr class="text-secondary text-center align-middle content">
                                    <td rowspan="5">
                                        <img src="{{ asset('storage/images/' . $product->image) }}"
                                            alt="{{$product->image}}" class="w-60 rounded border border-info">
                                    </td>
                                    <td class="text-secondary" rowspan="5">
                                        <i>{{$product->name_product}}</i>
                                    </td>
                                    <td class="text-secondary" rowspan="5"><i>{!! $product->long_description !!}</i></td>
                                    <td class="text-secondary" rowspan="5">
                                        <span class="text-wrap"><i>{!! $product->highlight !!}</i></span>
                                    </td>
                                    <td class="text-secondary" rowspan="5"><i>{!! $product->product_specification !!}</i>
                                    </td>

                                    <th class="text-center align-middle text-secondary table-info" rowspan="1">
                                        <i>GIÁ</i>
                                    </th>
                                    <td class="text-secondary"> <i>{{$product->price}} VNĐ</i></td>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th class="text-center align-middle text-secondary table-info" rowspan="1"><i>SỐ
                                            LƯỢNG</i></th>
                                    <td class="text-secondary"> <i>{{$product->quantity}}</i></td>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th class="text-center align-middle text-secondary table-info" rowspan="1"><i>NGÀY
                                            TẠO</i></th>
                                    <td class="text-secondary"> <i>{{$product->created_at}}</i></td>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th class="text-center align-middle text-secondary table-info" rowspan="1"><i>NGÀY
                                            CHỈNH
                                            SỬA</i></th>
                                    <td class="text-secondary "> <i>{{$product->updated_at}}</i></td>
                                </tr>

                                <tr class="text-center align-middle">
                                    <th class="text-center align-middle text-secondary table-info" rowspan="1"><i>TRẠNG
                                            THÁI</i>
                                    </th>
                                    <td class="text-secondary">
                                        <div class="table-data-feature ">
                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="Edit">
                                                <a href="{{route('page.edit_product', ['id' => $product->id])}}"><i class="zmdi zmdi-edit "></i></a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="Delete"
                                                onclick="confirmDelete('<?php echo e(route('page.delete_product', ['id' => $product->id])); ?>')">
                                                <i class="zmdi zmdi-delete "></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                                @endif

                                @if($value['products']->count() == 0)
                                <div class="row position-absolute top-100 start-50 translate-middle">
                                    <h4 class="text-danger text-center text-uppercase">Sản Phẩm Chưa Được Cập Nhật
                                    </h4>
                                </div>
                                @endif
                            </tbody>
                        </table>
                        <!-- END DATA TABLE -->
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12" style=" display: flex;justify-content: center;align-items: center;">
                            {{ $value['products']->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    <div class="row border border-5 rounded col-md-4 m-auto text-center div-catagories ">
                        <div class="col-md-12">
                            <form class="align-middle text-center text-secondary " method="get" action="{{route('page.add_category')}}">
                                @csrf
                                <div class="mb-2 mt-2">
                                    <input type="text" class="form-control text-secondary text-center" id="categories" name="name_category"
                                        aria-describedby="categoriesHelp" placeholder="Nhập tên danh mục">
                                        <input type="text" hidden id="id" name="id">
                                    <div class="form-text mb-2 text-secondary"><i>Thêm danh mục tại
                                            đây.</i>
                                    </div>
                                    <button type="submit" class="btn btn-primary" ><i class="fa-solid fa-check"
                                            style="color: #10da57;"><a href=""></a></i>
                                        <space> </space>Xác Nhận
                                    </button>
                                    <button type="button" class="btn btn-danger" id="close-categories"><i
                                            class="fa-solid fa-circle-xmark "></i>
                                        <space> </space>Đóng
                                    </button>
                                </div>

                            </form>
                            <div class="mb-2 overflow-auto" style="max-height: 300px;">
                                <table class="table table-hover table-bordered border border-2 rounded" id="table">
                                    <thead class="sticky-top ">
                                        <tr class="">
                                            <td class="text-center align-middle text-secondary table-info" scope="col"
                                                colspan="3">Danh Mục</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($value['categories'] as $category)
                                        <tr class="text-center align-middle text-secondary ">
                                            <td class="text-center align-middle text-secondary info_category">
                                                <i>{{$category->name_category}}</i>
                                            </td>
                                            <td><button type="submit" class="btn btn-info"
                                                    onclick="copyText('<?php echo $i ?>','<?php echo $category->id ?>')"> <i class="zmdi zmdi-edit "
                                                        style="color: #FFF;"></i></button></td>
                                            <td><button type="submit" class="btn btn-danger"
                                                    onclick="confirmDelete('<?php echo e(route('page.delete_category', ['id' => $category->id])); ?>')">
                                                    <i class="zmdi zmdi-delete "></i></button></td>
                                        </tr>
                                        <?php $i++ ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    <script>

        function copyText(rowIndex,value_id) {    
            var table = document.getElementById('table');                 
            var cell = table.rows[rowIndex].cells[0];
            var textToCopy =  cell.innerText;

            var inputField = document.getElementById('categories');
            inputField.value = textToCopy;
            var id = document.getElementById('id');
            id.value = value_id;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const showFormBtn = document.getElementById('showFormBtn');
            const div_catagories = document.querySelector('.div-catagories');

            showFormBtn.addEventListener('click', function () {
                // Loại bỏ class 'close-categories' trước khi thêm class 'display-categories'
                div_catagories.classList.remove('close-categories');
                div_catagories.classList.add('display-categories');
            });

            const close_categories = document.getElementById('close-categories');

            close_categories.addEventListener('click', function () {
                // Loại bỏ class 'display-categories' trước khi thêm class 'close-categories'
                div_catagories.classList.remove('display-categories');
                div_catagories.classList.add('close-categories');
            });
        });

        function confirmDelete(url) {
            if (confirm("Bạn có chắc muốn xóa không?")) {
                window.location.href = url;
            } else {
                return false
            }
            return false
        }

        var placeholderTexts = [
            "Tìm Kiếm...",
            "Nhập từ khóa...",
            "Sản phẩm...",
            "Giá...",
        ];

        // Hàm để thay đổi placeholder
        function changePlaceholder() {
            var input = document.getElementById('searchInput');
            var randomIndex = Math.floor(Math.random() * placeholderTexts.length);
            input.placeholder = placeholderTexts[randomIndex];
        }

        // Gọi hàm thay đổi placeholder sau mỗi 5 giây (hoặc sau mỗi sự kiện cụ thể)
        setInterval(gholder, 1000); // Tsy
    </script>
</div>