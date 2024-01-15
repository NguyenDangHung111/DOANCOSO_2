<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\AccountServiceInterface as AccountService;
use Illuminate\Http\Request;
use App\Services\Interfaces\ProvinceServiceInterface as ProvinceService;
use App\Http\Requests\Form_AccountRequest;
use App\Services\DistrictService;
use App\Services\WardService;

class AccountController extends Controller
{

    protected AccountService $accountService;
    protected ProvinceService $provinceService;
    protected DistrictService $districtService;
    protected WardService $wardService;

    public function __construct(
        AccountService $accountService,
        ProvinceService $provinceService,
        DistrictService $districtService,
        WardService $wardService
    ) {
        $this->accountService = $accountService;
        $this->provinceService = $provinceService;
        $this->districtService = $districtService;
        $this->wardService = $wardService;
    }

    public function account()
    {
        $value = [
            'accounts' => $this->accountService->get_Account(),
            'admin' => Auth::guard('account')->user(),
        ];

        $header_desktop = 'admin.component.header_desktop';
        $header_mobile = 'admin.component.header_mobile';
        $main_content = 'admin.component.account.account_main';
        return view('admin.account', compact('value', 'main_content', 'header_desktop', 'header_mobile'));
    }

    public function account_admin()
    {
        $value = [
            'accounts' => $this->accountService->get_AccountAdmin(),
            'admin' => Auth::guard('account')->user(),
        ];

        $header_desktop = 'admin.component.header_desktop';
        $header_mobile = 'admin.component.header_mobile';
        $main_content = 'admin.component.account.account_main';
        return view('admin.account', compact('value', 'main_content', 'header_desktop', 'header_mobile'));
    }

    public function account_user()
    {
        $value = [
            'accounts' => $this->accountService->get_AccountUser(),
            'admin' => Auth::guard('account')->user(),
        ];

        $header_desktop = 'admin.component.header_desktop';
        $header_mobile = 'admin.component.header_mobile';
        $main_content = 'admin.component.account.account_main';
        return view('admin.account', compact('value', 'main_content', 'header_desktop', 'header_mobile'));
    }

    public function add_account()
    {

        $value = [
            'provinces' => $this->provinceService->all(),
            'admin' => Auth::guard('account')->user(),
        ];

        $header_desktop = 'admin.component.header_desktop';
        $header_mobile = 'admin.component.header_mobile';
        $main_content = 'admin.component.account.account_add';
        return view('admin.account', compact('value', 'main_content', 'header_desktop', 'header_mobile'));
    }

    public function search_account(Request $request)
    {
        $value = [
            'admin' => Auth::guard('account')->user(),
            'accounts' => $this->accountService->search(),
        ];

        $header_desktop = 'admin.component.header_desktop';
        $header_mobile = 'admin.component.header_mobile';
        $main_content = 'admin.component.account.account_search';
        return view('admin.account', compact('value', 'main_content', 'header_desktop', 'header_mobile'));
    }

    public function edit_account(Request $request)
    {
        
         $value = [
            'admin' => Auth::guard('account')->user(),
            'accounts' => $this->accountService->edit($request->id),
            'provinces' => $this->provinceService->all(),
            'districts' => $this->districtService->all(),
            'wards' => $this->wardService->all(),
        ];

        if ($this->accountService->edit($request->id)->address !== null) {
            $address = explode(",", $this->accountService->edit($request->id)->address);
            $count = count($address);
            $address_home = "";
            for ($i = 0; $i < $count - 3; $i++) {
                if($i == $count-4){
                    $address_home .= $address[$i];
                }else{
                    $address_home .= $address[$i].", ";
                }         
            };
            $value['city'] = $address[$count - 1];
            $value['district'] = $address[$count - 2];
            $value['ward'] = $address[$count - 3];
            $value['address'] = $address_home;
        }

        $header_desktop = 'admin.component.header_desktop';
        $header_mobile = 'admin.component.header_mobile';
        $main_content = 'admin.component.account.account_edit';
        return view('admin.account',compact('value', 'main_content', 'header_desktop', 'header_mobile'));
    }

    public function create_account(Form_AccountRequest $request)
    {
        if ($this->accountService->create($request)) {
            return redirect()->route('page.account')->with('success', 'Tạo Tài Khoản Thành Công');
        }
        return redirect()->back()->with('error', 'Tạo Tài Khoản Thất Bại');
    }

    public function delete_account(Request $request)
    {
        if ($this->accountService->delete($request->id)) {
            return redirect()->back()->with('success', 'Xóa Tài Khoản Thành Công');
        }
        return redirect()->back()->with('error', 'Xóa Tài Khoản Thất Bại');
    }

    public function update_account(Request $request)
    {
        if ($this->accountService->update($request)) {
            return redirect()->route('page.account')->with('success', 'Cập Nhật Tài Khoản Thành Công');
        }
        return redirect()->back()->with('error', 'Cập Nhật Tài Khoản Thất Bại');
    }

}
