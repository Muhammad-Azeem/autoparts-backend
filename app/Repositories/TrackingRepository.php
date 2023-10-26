<?php

namespace App\Repositories;

use App\Models\product;
use App\Models\tracking;

class TrackingRepository
{
    protected $model;


    public function __construct(tracking $model = null)
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
