<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Services\BillService;

class DashboardController extends Controller
{
    protected $model;
    public function __construct(BillService $model)
    {
        $this->model = $model;
       
    }
    public function dashboard()
    {

        $value = [         
            'admin' => Auth::guard('account')->user(),
            'get_revenue' => $this->model->get_revenue(),
            'quantity1' => $this->model->get_quantity(2),
            'quantity2' => $this->model->get_quantity(3),
            'quantity3' => $this->model->get_quantity(0),
       ];
        $header_desktop  ='admin.component.header_desktop';
        $header_mobile  ='admin.component.header_mobile';
        return view('admin.dashboard',compact('value','header_desktop','header_mobile'));
    }
}
