<?php

namespace App\Services;

use App\Services\Interfaces\BaseServiceInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProvinceService
 * @package App\Services
 */
class BaseService implements BaseServiceInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(){
         return $this->model::all();
    }

    public function findId($modeId,$columns = ['*'],$relation = []){
        return $this->model->select($columns)->with($relation)->findOrFail($modeId);
    }

    
}
    
 
