<?php

namespace App\Repositories;
use App\Models\Province;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;

/**
 * Class ProvinceRepository
 * @package App\Services
 */
class ProvinceRepository implements ProvinceRepositoryInterface
{

   public function get_Province(){
       return Province::all();
   }
}
