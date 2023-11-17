<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    protected $repository;


    public function __construct(CategoryRepository $repository = null)
    {
        $this->repository = $repository;
    }

    public function find($id){
        return $this->repository->find($id);
    }
    public function getAllCategories() {
        return $this->repository->getAllCategories();
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
