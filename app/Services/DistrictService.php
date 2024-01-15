<?php

namespace App\Services;

use App\Services\Interfaces\DistrictServiceInterface;
use App\Models\District; 
use App\Services\BaseService;


/**
 * Class DistrictService
 * @package App\Services
 */
class DistrictService extends BaseService implements DistrictServiceInterface
{

    protected $model;
    public function __construct(District $district){
        $this->model = $district;
    }
 
}
