<?php

namespace App\Services\Interfaces;

/**
 * Interface DistrictServiceInterface
 * @package App\Services\Interfaces
 */
interface DistrictServiceInterface
{

   function findId($modeId,$columns = ['*'],$relation = []);
}
