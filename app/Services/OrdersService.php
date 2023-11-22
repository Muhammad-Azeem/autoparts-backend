<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use App\Repositories\OrdersRepository;
use Illuminate\Support\Facades\Auth;

class OrdersService
{
    protected $repository;


    public function __construct(OrdersRepository $repository = null)
    {
        $this->repository = $repository;
    }

    public function find($id){
        return $this->repository->find($id);
    }

    public function create($request){
        return $this->repository->create($request);
    }

    public function update($id, $data){
        return $this->repository->update($id, $data);

    }

    public function delete($id){
        return $this->repository->delete($id);

    }
    public function getByUserId($id){
        return $this->repository->getByUserId($id);

    }
}
