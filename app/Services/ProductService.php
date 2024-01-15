<?php

namespace App\Services;

use App\Services\Interfaces\ProductServiceInterface;
use App\Models\Product;
use App\Models\shop_cart;
use App\Services\BaseService;
use Illuminate\Support\Carbon;


/**
 * Class ProductService
 * @package App\Services
 */
class ProductService extends BaseService implements ProductServiceInterface
{

    protected $model;
    protected $shop_cart;
    public function __construct(Product $Product, shop_cart $shop_cart)
    {
        $this->model = $Product;
        $this->shop_cart = $shop_cart;
    }

    public function get_Product()
    {
        return Product::paginate(5);
    }

    public function delete_product($id)
    {
        return $this->model->find($id)->delete();
    }

    public function filter_Product($id)
    {
        return $this->model->where('id_category', '=', $id)->paginate(5);
    }

    public function find_Product()
    {
        return $this->model::query()
            ->where('name_product', 'like', '%' . request('search') . '%')
            ->orWhere('price', 'like', '%' . request('search') . '%')
            ->orWhere('long_description', 'like', '%' . request('search') . '%')
            ->paginate(5);
    }

    public function create_product($request)
    {
        $product = new Product();
        $product->name_product = $request->name_product;
        $product->id_category = $request->id_category;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->long_description = $request->long_description;
        $product->highlight = $request->highlight;
        $product->product_specification = $request->product_specification;
        $product->created_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
        $product->updated_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
        if ($product->image !== null) {
            $product->image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('Images', $product->image);
        } else {
            $product->image = 'default_2.jpg';
        }

        return $product->save();
    }

    public function update_product($request, $id)
    {

        $product = Product::find($id);
        $product->name_product = $request->name_product;
        $product->id_category = $request->id_category;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->long_description = $request->long_description;
        $product->highlight = $request->highlight;
        $product->product_specification = $request->product_specification;
        $product->updated_at = Carbon::now()::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('Y-m-d H:i:s');
        if ($request->image_product !== null) {
            $product->image = $request->file('image_product')->getClientOriginalName();
            $request->file('image_product')->storeAs('Images', $product->image, 'public');
        }
        return $product->save();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function render_product($id)
    {
        return $this->model->where('id_category', '=', $id)->paginate();
    }

    public function product_shop_cart($id)
    {
        $value = Product::join('shop_cart', 'product.id', '=', 'shop_cart.id_product')
            ->select('product.*', 'shop_cart.*')
            ->where('shop_cart.id_account', '=', $id)
            ->get();
        return $value;
    }
}
