<?php

namespace App\Services;

use App\Services\Interfaces\CategoryServiceInterface;
use App\Models\Category; 
use App\Services\BaseService;

/**
 * Class CategoryService
 * @package App\Services
 */
class CategoryService extends BaseService implements CategoryServiceInterface
{

    protected $model;
    public function __construct(Category $Category){
        $this->model = $Category;
    }
 
    public function delete($id){
        return $this->model->find($id)->delete();
    }

    public function add($name_category){
        return $this->model->create(['name_category' => $name_category]);
    }

    public function edit($id, $name_category){
        return $this->model->find($id)->update(['name_category' => $name_category]);
    }
}
