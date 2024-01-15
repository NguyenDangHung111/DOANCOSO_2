<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">THÔNG TIN TÀI KHOẢN</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property"
                                    onchange="window.location.href = this.value;">
                                    <option selected="selected" value="">CHỌN</option>
                                    <option value="{{route('page.account_admin')}}">NHÂN VIÊN</option>
                                    <option value="{{route('page.account_user')}}">KHÁCH HÀNG</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <form class="form-header" action="" method="get">
                                    <input class="au-input au-input--xl" type="text" name="search"
                                        placeholder="TÌM KIẾM..." />
                                    <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <a href="{{route('page.add_account')}}" class=" nav-link text-decoration-none"><i
                                        class="zmdi zmdi-plus"></i>TẠO HỒ SƠ</a>
                            </button>
                        </div>
                    </div>
                    @if($value['accounts']->isEmpty())
                    <div class="row position-absolute top-100 start-50 translate-middle">
                        <h4 class="text-danger text-center text-uppercase">Không tìm thấy tài khoản</h4>
                    </div>
                    @endif
                    @if(!$value['accounts']->isEmpty())
                    <div class="table-responsive table-container border border-5 rounded col-md-12 ">

                        <table class="table table-hover table-bordered border-primary col-md-12">
                            <thead class="sticky-top ">
                                <tr class="table-info border border-primary">
                                    <th class="text-center align-middle text-secondary " scope="col">HÌNH ẢNH</th>
                                    <th class="text-center align-middle text-secondary" scope="col">HỌ TÊN</th>
                                    <th class="text-center align-middle text-secondary" scope="col">GIỚI TÍNH</th>
                                    <th class="text-center align-middle text-secondary" scope="col">ĐIỆN THOẠI</th>
                                    <th class="text-center align-middle text-secondary" scope="col">ĐỊA CHỈ</th>
                                    <th class="text-center align-middle text-secondary" scope="col">NGÀY TẠO</th>
                                    <th class="text-center align-middle text-secondary" scope="col">NGÀY CHỈNH SỬA</th>
                                    <th class="text-center align-middle text-secondary" scope="col">EMAIL</th>
                                    <th class="text-center align-middle text-secondary" scope="col">TÌNH TRẠNG</th>
                                    <th class="text-center align-middle text-secondary" scope="col">TRẠNG THÁI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($value['accounts'] as $account)
                                <tr class="text-center align-middle content">
                                    <td>
                                        <img src="{{ asset('storage/images/' . $account->avatar) }}" alt=""
                                            class="w-60 rounded border border-info">
                                    </td>
                                    <td class="text-secondary">
                                        {{$account->fullname}}
                                    </td>
                                    <td class="desc text-secondary">{{$account->sex}}</td>
                                    <td class="text-secondary">{{$account->phone}}</td>
                                    <td class="text-secondary">
                                        <span class="text-wrap">{{$account->address}}</span>
                                    </td>
                                    <td class="text-secondary">{{$account->created_at}}</td>
                                    <td class="text-secondary">{{$account->updated_at}}</td>
                                    <td class="text-secondary">{{$account->email}}</td>
                                    @if($account->status == 'ON')
                                    <td class="text-secondary"><i>Đang Mở</i></td>
                                    @endif
                                    @if($account->status == 'OFF')
                                    <td class="text-secondary"><i>Đang Khóa</i></td>
                                    @endif
                                    <td>
                                        <div class="table-data-feature ">
                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="Edit">
                                                <a href="{{route('page.edit_account',['id' => $account->id])}}"><i
                                                        class="zmdi zmdi-edit"></i></a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12" style=" display: flex;justify-content: center;align-items: center;">
                            {{ $value['accounts']->links('pagination::bootstrap-4') }}
                        </div>
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
</div>