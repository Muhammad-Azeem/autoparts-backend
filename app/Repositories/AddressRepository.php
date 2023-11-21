<?php

namespace App\Repositories;

use App\Models\address;

class AddressRepository
{
    protected $model;


    public function __construct(address $model = null)
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
        $this->model->find($id)->update($data->all());
        return $this->model->find($id);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }
    public function getByUserId($id){
        return $this->model->where('user_id', $id)->get();
    }
}
