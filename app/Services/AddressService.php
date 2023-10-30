<?php

namespace App\Services;

use App\Repositories\AddressRepository;
use App\Repositories\AuthRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;

class AddressService
{
    protected $repository;


    public function __construct(AddressRepository $repository = null)
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
}
