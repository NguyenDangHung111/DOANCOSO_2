<?php

namespace App\Services;

use App\Services\Interfaces\WardServiceInterface;
use App\Models\Ward; 
use App\Services\BaseService;

/**
 * Class WardService
 * @package App\Services
 */
class WardService extends BaseService implements WardServiceInterface
{

    protected $model;
    public function __construct(Ward $Ward){
        $this->model = $Ward;
    }
 
    public function get_Ward($district_id){
        return $this->model->where('district_code','=',$district_id)->get();
    }
}
