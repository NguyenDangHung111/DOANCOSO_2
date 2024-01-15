<?php

namespace App\Services\Interfaces;

/**
 * Interface ProvinceServiceInterface
 * @package App\Services\Interfaces
 */
interface ProvinceServiceInterface
{

   function all();
   function findId($modeId,$columns = ['*'],$relation = []);
}
