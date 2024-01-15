<?php

namespace App\Services\Interfaces;

/**
 * Interface CategoryServiceInterface
 * @package App\Services\Interfaces
 */
interface CategoryServiceInterface
{

   public function all();
   public function delete($id);
   public function add($name_category);
   public function edit($id, $name_category);
  
}
