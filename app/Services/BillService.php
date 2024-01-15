<?php

namespace App\Services;

use App\Services\Interfaces\BillServiceInterface;
use App\Models\bill;
use App\Models\account;
use App\Services\BaseService;
use Illuminate\Support\Carbon;

/**
 * Class WardService
 * @package App\Services
 */
class BillService extends BaseService implements BillServiceInterface
{

    protected $model;

    public function __construct(bill $model)
    {
        $this->model = $model;
    }

    public function product($id)
    {
        return $this->model::where('id_account', $id)->paginate();
    }

    public function get_bill($status_bill)
    {
        $value = Bill::join('account', 'account.id', '=', 'bill.id_account')
            ->select('bill.*', 'account.avatar', 'account.fullname', 'account.email', 'account.phone','account.address')
            ->where('bill.status_bill', '=', $status_bill)
            // ->orderBy('bill.created_at', 'desc')
            ->orderBy('bill.status_bill', 'desc')
            ->get();
        return $value;
    }

    public function all()
    {
        $value = Bill::join('account', 'account.id', '=', 'bill.id_account')
            ->select('bill.*', 'account.avatar', 'account.fullname', 'account.email', 'account.phone','account.address')
            ->where('bill.status_bill', '!=', 0)
            // ->orderBy('bill.created_at', 'desc')
            ->orderBy('bill.status_bill', 'asc')
            ->get();
        return $value;
    }

    public function search($request){

        $value = Bill::join('account', 'account.id', '=', 'bill.id_account')
            ->select('bill.*', 'account.avatar', 'account.fullname', 'account.email', 'account.phone','account.address')
            ->where(function ($query) {
                $query->where('account.phone', 'like', '%' . request('search') . '%')
                    ->orWhere('account.fullname', 'like', '%' . request('search') . '%')
                    ->orWhere('account.address', 'like', '%' . request('search') . '%')
                    ->orWhere('account.email', 'like', '%' . request('search') . '%');
            })
            ->get();
        return $value;
    }

    public function update($request){

        $bill = Bill::find($request->id);
        if($request->status_bill == 3){
            $bill->received_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
            $bill->status_bill = 3;   
        }elseif($request->status_bill == 0){
            $bill->status_bill = 0;
            $bill->messenger = $request->messenger;
            $bill->received_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
        }

       return $bill->save();
    }
 
    public function get_revenue(){

        $value = Bill::join('account', 'account.id', '=', 'bill.id_account')
            ->select('bill.price')
            ->where('bill.status_bill', '!=', 0)
            ->where('bill.status_bill', '!=', 2)
            ->sum('bill.price');
        return $value;
    }

    public function get_quantity($status_bill){

        $value = Bill::join('account', 'account.id', '=', 'bill.id_account')
            ->select('bill.status_bill')
            ->where('bill.status_bill', '=', $status_bill)
            ->count('bill.status_bill');
        return $value;
    }

}
