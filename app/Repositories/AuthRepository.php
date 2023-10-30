<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository
{
    protected $model;


    public function __construct(User $model = null)
    {
        $this->model = $model;
    }

    public function create($request){
       return $this->model->create($request);
    }

    public function update($id, $data){
        $this->model->find($id)->update($data);
        return $this->model->find($id);
    }
}
