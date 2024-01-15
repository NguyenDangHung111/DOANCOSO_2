<?php

namespace App\Services\Interfaces;

/**
 * Interface Shop_cartServiceInterface
 * @package App\Services\Interfaces
 */
interface Shop_cartServiceInterface
{

   public function add_cart($request);
   public function delete_cart($request);
   public function list_cart($request);
   public function quantity_cart($request);
   public function buy($request);
}
