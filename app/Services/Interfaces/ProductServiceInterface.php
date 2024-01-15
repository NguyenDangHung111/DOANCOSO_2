<?php

namespace App\Services\Interfaces;

/**
 * Interface ProductServiceInterface
 * @package App\Services\Interfaces
 */
interface ProductServiceInterface
{

   public function all();

   public function get_Product();
   public function delete_product($id);
   public function filter_Product($id);
   public function find_Product();
   public function create_product($request);
   public function update_product($request, $id);
   public function find($id);
   public function render_product($id);
   public function product_shop_cart($id);
}
