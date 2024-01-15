<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\BillServiceInterface as BillService;


class OrderController extends Controller
{

   protected $billService;

   public function __construct(BillService $billService)
   {
      $this->billService = $billService;

   }

   public function index(Request $request)
   {
      $value = [
         'admin' => Auth::guard('account')->user(),
      ];

      if ($request->status == 2) {
         $value['status'] = 2;
         $value['products'] = $this->billService->get_bill(2);
      } elseif ($request->status == 3) {
         $value['status'] = 3;
         $value['products'] = $this->billService->get_bill(3);
      } elseif ($request->status == 0) {
         $value['status'] = 0;
         $value['products'] = $this->billService->all();
      } else {
         $value['status'] = 0;
         $value['products'] = $this->billService->all();
      }


      $header_desktop = 'admin.component.header_desktop';
      $header_mobile = 'admin.component.header_mobile';
      $content = 'admin.component.product.Order';
      return view('admin.order', compact('value', 'header_desktop', 'header_mobile', 'content'));
   }

   public function search(Request $request)
   {
     $value = [
      'admin' => Auth::guard('account')->user(),
   ];

   if ($request->status == 2) {
      $value['status'] = 2;
      $value['products'] = $this->billService->get_bill(2);
   } elseif ($request->status == 3) {
      $value['status'] = 3;
      $value['products'] = $this->billService->get_bill(3);
   }else {
      $value['status'] = 0;
      $value['products'] = $this->billService->search($request);
   }

   $header_desktop = 'admin.component.header_desktop';
   $header_mobile = 'admin.component.header_mobile';
   $content = 'admin.component.product.Order';
   return view('admin.order', compact('value', 'header_desktop', 'header_mobile', 'content'));
   }

   public function update(Request $request){
      if($this->billService->update($request)){
         return redirect()->back()->with('success', 'Cập nhật đơn hàng thành công');
      }else{
         return redirect()->back()->with('error', 'Cập nhật đơn hàng thất bại');
      }
      
   }
}
