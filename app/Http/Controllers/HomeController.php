<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\Interfaces\CategoryServiceInterface as CategoryService;
use App\Services\Interfaces\ProductServiceInterface as ProductService;
use App\Services\Interfaces\ProvinceServiceInterface as ProvinceService;
use App\Services\Interfaces\AccountServiceInterface as AccountService;
use App\Services\Interfaces\Shop_cartServiceInterface as Shop_cart;
use App\Services\DistrictService;
use App\Services\WardService;
use App\Http\Requests\Form_ProfileRequest;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{

    protected $categoryService;
    protected $productService;
    protected ProvinceService $provinceService;
    protected DistrictService $districtService;
    protected WardService $wardService;
    protected AccountService $accountService;
    protected Shop_cart $shop_cart;


    public function __construct(
        CategoryService $categoryService,
        ProductService $productService,
        ProvinceService $provinceService,
        DistrictService $districtService,
        WardService $wardService,
        AccountService $accountService,
        Shop_cart $shop_cart    
    ) {

        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->provinceService = $provinceService;
        $this->districtService = $districtService;
        $this->wardService = $wardService;
        $this->accountService = $accountService;
        $this->shop_cart = $shop_cart;
    }

    public function index(Request $request)
    {
        if (Auth::guard('account')->check()) {
            $value = [
                'provinces' => $this->provinceService->all(),
                'districts' => $this->districtService->all(),
                'wards' => $this->wardService->all(),
                'user' => Auth::guard('account')->user(),
                'categories' => $this->categoryService->all(),
                'products' => $this->productService->all(),
                'quantity' => $this->shop_cart->quantity_cart(Auth::guard('account')->user()->id),
                'list_cart' => $this->shop_cart->list_cart(Auth::guard('account')->user()->id)
            ];

            if ($request->id_category != null) {
                $value['products_chose'] = $this->productService->render_product($request->id_category);
            } else {
                $value['products_chose'] = null;
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

            return view('client.index', compact('value'));
        } else {
            $value = [
                'categories' => $this->categoryService->all(),
                'products' => $this->productService->all(),
                
                'user' => null
            ];

            if ($request->id_category != null) {
                $value['products_chose'] = $this->productService->render_product($request->id_category);
            } else {
                $value['products_chose'] = null;
            }
            return view('client.index', compact('value'));
        }

    }

    public function update_profile(Form_ProfileRequest $request)
    {
        if ($request->id !== null) {
            $this->accountService->update_profile($request);
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->back();
        }
    }

    public function add_cart(Request $request)
    {
        if ($request->id_product !== null && $request->id_account !== null && $request->status !== null) {
            if( $this->shop_cart->add_cart($request)){
                return redirect(URL::previous().'#shop')->with('success', 'Thêm vào giỏ hàng thành công');
            }else{
                return redirect(URL::previous().'#shop')->with('error', 'Sản phẩm đã tồn tại');
            }
        } else {
            return redirect()->back();
        }
    }

}