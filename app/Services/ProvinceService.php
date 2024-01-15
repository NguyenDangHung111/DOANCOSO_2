<?php

namespace App\Services;

use App\Services\Interfaces\ProvinceServiceInterface;
use App\Models\Province; 
use App\Services\BaseService;

/**
 * Class ProvinceService
 * @package App\Services
 */
class ProvinceService extends BaseService implements ProvinceServiceInterface
{

    protected $model;
    public function __construct(Province $province){
        $this->model = $province;
    }
 
}
