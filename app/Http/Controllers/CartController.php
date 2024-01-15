<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\Interfaces\CategoryServiceInterface as CategoryService;
use App\Services\Interfaces\ProductServiceInterface as ProductService;
use App\Services\Interfaces\ProvinceServiceInterface as ProvinceService;
use App\Services\Interfaces\AccountServiceInterface as AccountService;
use App\Services\Interfaces\Shop_cartServiceInterface as Shop_cart;
use App\Services\Interfaces\BillServiceInterface as BillService;
use App\Services\DistrictService;
use App\Services\WardService;


class CartController extends Controller
{

    protected $categoryService;
    protected $productService;
    protected ProvinceService $provinceService;
    protected DistrictService $districtService;
    protected WardService $wardService;
    protected AccountService $accountService;
    protected Shop_cart $shop_cart;
    protected BillService $billService;

    public function __construct(
        CategoryService $categoryService,
        ProductService $productService,
        ProvinceService $provinceService,
        DistrictService $districtService,
        WardService $wardService,
        AccountService $accountService,
        Shop_cart $shop_cart,
        BillService $bill
    ) {

        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->provinceService = $provinceService;
        $this->districtService = $districtService;
        $this->wardService = $wardService;
        $this->accountService = $accountService;
        $this->shop_cart = $shop_cart;
        $this->billService = $bill;
    }

    public function page_cart(Request $request){
        
        if (Auth::guard('account')->check()) {
            $value = [
                'provinces' => $this->provinceService->all(),
                'districts' => $this->districtService->all(),
                'wards' => $this->wardService->all(),
                'user' => Auth::guard('account')->user(),
                'categories' => $this->categoryService->all(),
                'products' => $this->productService->product_shop_cart(Auth::guard('account')->user()->id),
                'quantity' => $this->shop_cart->quantity_cart(Auth::guard('account')->user()->id),
                'bills'=> $this->billService->product(Auth::guard('account')->user()->id),
            ];

            if($request->chose != null){
                $value['chose'] = $request->chose;
            }else{
                $value['chose'] = 1;
            }

            if ($this->accountService->edit(Auth::guard('account')->user()->id)->address !== null) {
                $address = explode(",", $this->accountService->edit(Auth::guard('account')->user()->id)->address);
                $count = count($address);
                $address_home = "";
                for ($i = 0; $i < $count - 3; $i++) {
                    if ($i == $count - 4) {
                        $address_home .= $address[$i];
                    } else {
                        $address_home .= $address[$i] . ", ";
                    }
                }
                ;
                $value['city'] = $address[$count - 1];
                $value['district'] = $address[$count - 2];
                $value['ward'] = $address[$count - 3];
                $value['address'] = $address_home;
            }

            return view('client.cart', compact('value'));
        } 
      
    }

    public function delete_cart(Request $request){
        if($this->shop_cart->delete_cart($request->id)){
            return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
        }
        return redirect()->back();
    }

    public function buy(Request $request){
        if($this->shop_cart->buy($request)){
            return redirect()->back()->with('success', 'Đặt hàng thành công');
        }
        return redirect()->back();

    }
}
