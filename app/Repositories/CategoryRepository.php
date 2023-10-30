<?php

namespace App\Repositories;

use App\Models\category;
use App\Models\product;

class CategoryRepository
{
    protected $model;


    public function __construct(category $model = null)
    {
        $this->model = $model;
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function create($request){
       return $this->model->create($request);
    }

    public function update($id, $data){
        $this->model->find($id)->update($data);
        return $this->model->find($id);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }
}
