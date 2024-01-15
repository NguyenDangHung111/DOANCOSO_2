<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\CategoryServiceInterface as CategoryService;
use App\Services\Interfaces\ProductServiceInterface as ProductService;
use App\Http\Requests\Form_ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller{

    protected CategoryService $categoryService;
    protected ProductService $productService;

    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function delete_category(Request $request){
        if ($this->categoryService->delete($request->id)) {
            return redirect()->back()->with('success', 'Xóa Danh Mục Thành Công');
        }
        return redirect()->back()->with('error', 'Xóa Danh Mục Thất Bại');
    }

    public function add_category(Request $request){

        if($request->id !== null && $request->name_category !== null){
            if($this->categoryService->edit($request->id, $request->name_category)){
                return redirect()->back()->with('success', 'Sửa Danh Mục Thành Công');
            }
            return redirect()->back()->with('error', 'Sửa Danh Mục Thất Bại');
        }

       if($request->name_category !== null && $request->id == null){
            if($this->categoryService->add($request->name_category)){
                return redirect()->back()->with('success', 'Thêm Danh Mục Thành Công');
            }
            return redirect()->back()->with('error', 'Thêm Danh Mục Thất Bại');
        }
    }

    public function page_product(Request $request)
    {

        $value = [
            'admin' => Auth::guard('account')->user(),
            'categories' => $this->categoryService->all()         
        ];

            if($request->id !== null){
             foreach($value['categories'] as $category){
                if($category->id == $request->id){
                    $value['products'] = $this->productService->filter_Product($request->id);
                }
             }    
             
             if($this->productService->filter_Product($request->id) == null){
                $value['products'] = null;
             }
            }else{
                $value['products'] = $this->productService->get_Product();
            };
       
        
        $header_desktop = 'admin.component.header_desktop';
        $header_mobile = 'admin.component.header_mobile';
        $main_content = 'admin.component.product.product_main';
        return view('admin.product', compact('value','main_content','header_desktop', 'header_mobile'));

    }

    public function page_add_product(){
        $value = [
            'admin' => Auth::guard('account')->user(),  
            'categories' => $this->categoryService->all()         
        ];          
        
        $header_desktop = 'admin.component.header_desktop';
        $header_mobile = 'admin.component.header_mobile';
        $main_content = 'admin.component.product.product_add';
        return view('admin.product', compact('value','main_content','header_desktop', 'header_mobile'));
    }

    public function search_product(Request $request){
        $value = [
            'admin' => Auth::guard('account')->user(),
            'categories' => $this->categoryService->all()         
        ];

            if($this->productService->find_Product() !== null){         
                 $value['products'] = $this->productService->find_Product();
             }else{
                $value['products'] = null;
            }
                
        $header_desktop = 'admin.component.header_desktop';
        $header_mobile = 'admin.component.header_mobile';
        $main_content = 'admin.component.product.product_main';
        return view('admin.product', compact('value','main_content','header_desktop', 'header_mobile'));
    }

    public function delete_product(Request $request){
        if ($this->productService->delete_product($request->id)) {
            return redirect()->back()->with('success', 'Xóa Sản Phẩm Thành Công');
        }
        return redirect()->back()->with('error', 'Xóa Sản Phẩm Thất Bại');
    }

    public function create_product(Form_ProductRequest $request){
        // dd($request);
        $this->productService->create_product($request);
        return redirect()->back()->with('success', 'Thêm Sản Phẩm Thành Công');
    }

    public function page_edit_product(Request $request){
        $value = [         
            'admin' => Auth::guard('account')->user(),
            'categories' => $this->categoryService->all(),
            'product' => $this->productService->find($request->id),
        ];
        $header_desktop = 'admin.component.header_desktop';
        $header_mobile = 'admin.component.header_mobile';
        $main_content = 'admin.component.product.product_edit';
        return view('admin.product', compact('value','main_content','header_desktop', 'header_mobile'));
    }

    public function update_product(Form_ProductRequest $request){
        // dd($request->all());
        if($this->productService->update_product($request, $request->id)){
            return redirect()->route('page.product')->with('success','Cập Nhật Sản Phẩm Thành Công');
        }
        return redirect()->back()->with('error','Cập Nhật Sản Phẩm Thất Bại');
        
    }
}
