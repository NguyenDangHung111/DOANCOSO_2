<?php

namespace App\Services;

use App\Services\Interfaces\Shop_cartServiceInterface;
use App\Models\shop_cart; 
use App\Models\bill; 
use App\Services\BaseService;
use Illuminate\Support\Carbon;
/**
 * Class WardService
 * @package App\Services
 */
class Shop_cartService extends BaseService implements Shop_cartServiceInterface
{

    protected $model;
    protected $model1;
    public function __construct(shop_cart $model,bill $model1)
    {
        $this->model = $model;
        $this->model1 = $model1;
    }

    public function add_cart($request){
        if($this->model::where('id_product', '=', $request->id_product)->where('id_account', '=', $request->id_account)->exists()){
            return false;
        }else{
             $product = new shop_cart();
        $product->id_product = $request->id_product;
        $product->id_account = $request->id_account;
        $product->status = $request->status;
        return $product->save();
        }
       
    }

    public function delete_cart($id){
        return $this->model::where('id_product','=',$id)->delete();
    }
   public function list_cart($id){
        $product = shop_cart::where('id_account', $id)->paginate();
        return $product;
   }

   public function quantity_cart($id){
    $product = shop_cart::where('id_account', $id)->count();
    return $product;
   }

   public function buy($request){

    $this->delete_cart($request->id_product);

    $product = new bill();
    $product->name_product = $request->name_product;
    $product->id_account = $request->id_account;
    $product->created_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
    $product->status_bill = 2;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->image = $request->image;
    return $product->save();
   }

}
