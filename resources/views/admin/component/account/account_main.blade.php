<div class="main-content ">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- DATA TABLE -->
          <h3 class="title-5 m-b-20 m-t-30 text-center "><strong>THÔNG TIN TÀI KHOẢN</strong></h3>
          <div class="table-data__tool">
            <div class="table-data__tool-left">
              <div class="rs-select2--light rs-select2--md">
                <select class="js-select2" name="property" onchange="window.location.href = this.value;">
                  <option selected="selected" value="">CHỌN</option>
                  <option value="{{route('page.account_admin')}}">NHÂN VIÊN</option>
                  <option value="{{route('page.account_user')}}">KHÁCH HÀNG</option>
                </select>
                <div class="dropDownSelect2"></div>
              </div>
              <div class="rs-select2--light rs-select2--sm">
                <form class="form-header" action="{{route('page.search_account')}}" method="get">
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
                <a href="{{route('page.add_account')}}" class=" nav-link text-decoration-none"><i
                    class="zmdi zmdi-plus"></i>TẠO HỒ SƠ</a>
              </button>
            </div>
          </div>
          <div class="table-responsive table-container border border-5 rounded col-md-12 ">
            <table class="table table-hover table-bordered border-primary col-md-12">
              <thead class="sticky-top ">
                <tr class="table-info border border-primary ">
                  <th class="text-center align-middle text-secondary" scope="col"><i>HÌNH ẢNH<i></th>
                  <th class="text-center align-middle text-secondary" scope="col"><i>HỌ TÊN<i></th>
                  <th class="text-center align-middle text-secondary" scope="col"><i>GIỚI TÍNH<i></th>
                  <th class="text-center align-middle text-secondary" scope="col"><i>ĐIỆN THOẠI<i></th>
                  <th class="text-center align-middle text-secondary" scope="col"><i>ĐỊA CHỈ<i></th>
                  <th class="text-center align-middle text-secondary" scope="col"><i>NGÀY TẠO<i></th>
                  <th class="text-center align-middle text-secondary" scope="col"><i>NGÀY CHỈNH SỬA<i></th>
                  <th class="text-center align-middle text-secondary" scope="col"><i>EMAIL<i></th>
                  <th class="text-center align-middle text-secondary" scope="col"><i>TÌNH TRẠNG<i></th>
                  <th class="text-center align-middle text-secondary" scope="col"><i>TRẠNG THÁI<i></i></th>
                </tr>
              </thead>
              <tbody >
                @if(isset($value))
                @foreach($value['accounts'] as $account)
                <tr class="text-secondary text-center align-middle content">
                  <td>
                    <img src="{{ asset('storage/images/' . $account->avatar) }}" alt=""
                      class="w-60 rounded border border-info">
                  </td>
                  <td class="text-secondary">
                    <i>{{$account->fullname}}</i>
                  </td>
                  <td class="text-secondary" class="desc"><i>{{$account->sex}}</i></td>
                  <td class="text-secondary"><i>{{$account->phone}}</i></td>
                  <td class="text-secondary">
                    <span class="text-wrap"><i>{{$account->address}}</i></span>
                  </td>
                  <td class="text-secondary"><i>{{$account->created_at}}</i></td>
                  <td class="text-secondary"><i>{{$account->updated_at}}</i></td>
                  <td class="text-secondary"><i>{{$account->email}}</i></td>
                  @if($account->status == 'ON')
                  <td class="text-secondary"><i>Đang Mở</i></td>
                  @endif
                  @if($account->status == 'OFF')
                  <td class="text-secondary"><i>Đang Khóa</i></td>
                  @endif
                  <td>
                    <div class="table-data-feature ">
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                        <a href="{{route('page.edit_account',['id' => $account->id])}}"><i
                            class="zmdi zmdi-edit "></i></a>
                      </button>
                      <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="confirmDelete('<?php echo e(route('page.delete_account', ['id' => $account->id])); ?>')">
                       <i class="zmdi zmdi-delete "></i>              
                      </button>
                    </div>
                  </td>
                </tr>
                <tr class="spacer"></tr>
                @endforeach
                @endif
              </tbody>
            </table>
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
  <script>
    function confirmDelete(url) {
      if (confirm("Bạn có chắc muốn xóa không?")) {
        window.location.href = url;
      }else{
        return false
      }
      return false
    }

    var placeholderTexts = [
      "Tìm Kiếm...",
      "Nhập từ khóa...",
      "Số Điện Thoại...",
      "Email...",
    ];

    // Hàm để thay đổi placeholder
    function changePlaceholder() {
      var input = document.getElementById('searchInput');
      var randomIndex = Math.floor(Math.random() * placeholderTexts.length);
      input.placeholder = placeholderTexts[randomIndex];
    }

    // Gọi hàm thay đổi placeholder sau mỗi 5 giây (hoặc sau mỗi sự kiện cụ thể)
    setInterval(changePlaceholder, 1000); // Thay đổi sau mỗi 5 giây
  </script>
</div>