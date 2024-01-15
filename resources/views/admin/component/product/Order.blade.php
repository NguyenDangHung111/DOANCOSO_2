<script>
        document.addEventListener('DOMContentLoaded', function () {
            function action(btn, form) {
                var btnElement = document.getElementById(btn);
                var formElement = document.getElementById(form);

                btnElement.addEventListener('click', function () {
                    formElement.submit();
                });
            }
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
            "Số điện thoại...",
            "Email...",
        ];

        // Hàm để thay đổi placeholder
        function changePlaceholder() {
            var input = document.getElementById('searchInput');
            var randomIndex = Math.floor(Math.random() * placeholderTexts.length);
            input.placeholder = placeholderTexts[randomIndex];      
        }

        // Gọi hàm thay đổi placeholder sau mỗi 7 giây (hoặc sau mỗi sự kiện cụ thể)
        setInterval(changePlaceholder, 1000); // Tsy
    </script>
<div class="main-content ">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-20 m-t-30 text-center text-blue"><strong>THÔNG TIN ĐƠN HÀNG</strong></h3>
                    <div class="table-data__tool d-flex justify-content-center ">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2 text-center text-uppercase " name="property"
                                    onchange="window.location.href = this.value;">
                                    <option value="{{route('page.order')}}">LỌC
                                    </option>
                                    <option @if($value['status']==2) selected @endif)
                                        value="{{route('page.order',['status' => 2])}}">ĐANG GIAO</option>
                                    <option @if($value['status']==3) selected @endif
                                        value="{{route('page.order',['status' => 3])}}">ĐÃ GIAO</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <form class="form-header" action="{{Route('page.search_order')}}" method="get">
                                    <input class="au-input au-input--xl" type="text" name="search" id="searchInput"
                                        placeholder="TÌM KIẾM..." />
                                    <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table-container border border-7 rounded col-md-12 ">
                        <table class="table table-hover table-bordered border-primary col-md-12">
                            <thead class="sticky-top ">
                                <tr class="table-info border border-primary ">
                                    <th class="text-center align-middle text-secondary" scope="col"><i>HÌNH ẢNH<i></th>
                                    <th class="text-center align-middle text-secondary" scope="col"><i>SẢN PHẨM<i></th>
                                    <th class="text-center align-middle text-secondary" scope="col"><i>KHÁCH HÀNG<i>
                                    </th>
                                    <th class="text-center align-middle text-secondary" scope="col"><i>ĐỊA CHỈ<i>
                                    </th>
                                    <th class="text-center align-middle text-secondary"
                                        style="min-width: 170px !important" scope="col" colspan="2"><i>CHI TIẾT<i></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($value['products']))
                                @foreach($value['products'] as $product)
                                <tr class="text-secondary text-center align-middle content">
                                    <td rowspan="7">
                                        <img src="{{ asset('storage/images/' . $product->image) }}"
                                            alt="{{$product->image}}" class="w-20 rounded border border-info">
                                    </td>
                                    <td class="text-secondary" rowspan="7" style="max-width: 170px !important">
                                        <i>{{$product->name_product}}</i>
                                    </td>
                                    <td class="text-secondary" rowspan="7" style="min-width: 160px !important"><i>{!!
                                            $product->fullname !!}</i>
                                    </td>
                                    <td class="text-secondary" rowspan="7"><i>{!! $product->address
                                            !!}</i>

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
                                            NHẬN
                                        </i></th>
                                    @if($product->received_at == null)
                                    <td class="text-secondary "> <i>Chưa cập nhật</i></td>
                                    @else
                                    <td class="text-secondary "> <i>{{$product->received_at}}</i></td>
                                    @endif
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="text-center align-middle text-secondary table-info" rowspan="1">
                                        <i>EMAIL</i>
                                    </th>
                                    <td class="text-secondary "> <i>{{$product->email}}</i></td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="text-center align-middle text-secondary table-info" rowspan="1"><i>ĐIỆN
                                            THOẠI</i></th>
                                    <td class="text-secondary "> <i>{{$product->phone}}</i></td>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th class="text-center align-middle text-secondary table-info" rowspan="1"><i>TRẠNG
                                            THÁI</i>
                                    </th>
                                    <td class="text-secondary  d-flex justify-content-evenly align-items-center">
                                        @if($product->status_bill == 2)
                                        <button type="button" class="btn btn-success " data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$product->id}}" data-bs-whatever="@mdo">
                                            Xác Nhận <i class="fa-solid fa-circle-check" style="color: #c1df2a;"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$product->id}}{{$product->id}}"
                                            data-bs-whatever="@mdo">
                                            Hủy<space> </space><i class="fa-regular fa-circle-xmark"
                                                style="color: #fafafa;"></i>
                                        </button>
                                        @endif
                                        @if($product->status_bill == 3)
                                        <i>ĐÃ GIAO <i class="fa-solid fa-circle-check" style="color: #0ee132;"></i></i>
                                        @endif
                                    </td>
                                </tr>

                                @endforeach
                                @endif

                                @if($value['products']->count() == 0)
                                <div class="row" style="position: absolute; top: 209px;left: 484px;">
                                    <h4 class="text-danger text-center text-uppercase">Không tìm thấy hóa đơn
                                    </h4>
                                </div>
                                @endif
                            </tbody>
                        </table>
                        <!-- END DATA TABLE -->
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
    @if(isset($value['products']))
    @foreach($value['products'] as $product)
    <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="z-index: 999999 !important">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">Thông Báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('update')}}" method="POST" enctype="multipart/form-data"
                        id="form{{$product->id}}">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Sản Phẩm: {{$product->name_product}} - Số
                                Lượng: {{$product->quantity}} - Giá: {{$product->price}} VNĐ</label>
                            <label for="recipient-name" class="col-form-label">Khách Hàng: {{$product->fullname}} - Số
                                Điện Thoại: {{$product->phone}}</label>
                            <input type="hidden" name="status_bill" value="3">
                            <input type="hidden" name="id" value="{{$product->id}}">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"
                            style="color: #ffffff;"></i>
                        <space> </space>Hủy
                    </button>
                    <button  id="submit{{$product->id}}"
                        type="button" class="btn btn-success">
                        Xác Nhận <i class="fa-solid fa-circle-check" style="color: #c1df2a;"></i>
                    </button>
                    <script>
                        document.getElementById("submit{{ $product->id }}").onclick = function () {
                            document.getElementById("form{{ $product->id }}").submit();
                          }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal{{$product->id}}{{$product->id}}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="z-index: 999999 !important">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-success" id="exampleModalLabel">Thông Báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('update')}}" method="POST" enctype="multipart/form-data"
                        id="form{{$product->id}}{{$product->id}}">
                        @csrf
                        <div class="mb-3">            
                            <label for="recipient-name" class="col-form-label">Sản Phẩm: {{$product->name_product}} - Số
                                Lượng: {{$product->quantity}} - Giá: {{$product->price}} VNĐ</label>
                            <label for="recipient-name" class="col-form-label">Khách Hàng: {{$product->fullname}} - Số
                                Điện Thoại: {{$product->phone}}</label>
                            <div class="input-group">
                                <span class="input-group-text">Lý Do</span>
                                <textarea class="form-control" aria-label="Lý Do" name="messenger"></textarea>
                            </div>
                            <input type="hidden" name="status_bill" value="0">
                            <input type="hidden" name="id" value="{{$product->id}}">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"
                            style="color: #ffffff;"></i>
                        <space> </space>Hủy
                    </button>
                    <button                      
                        id="submit{{$product->id}}{{$product->id}}" type="button" class="btn btn-success">
                        Xác Nhận <i class="fa-solid fa-circle-check" style="color: #c1df2a;"></i>
                    </button>
                    <script>
                        document.getElementById("submit{{ $product->id }}{{$product->id}}").onclick = function () {
                            document.getElementById("form{{ $product->id }}{{$product->id}}").submit();
                          }
                    </script>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>