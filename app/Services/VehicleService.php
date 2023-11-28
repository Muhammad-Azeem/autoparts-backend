<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use App\Repositories\ProductRepository;
use App\Repositories\VehicleRepository;
use Illuminate\Support\Facades\Auth;

class VehicleService
{
    protected $repository;


    public function __construct(VehicleRepository $repository = null)
    {
        $this->repository = $repository;
    }

    public function find($id){
        return $this->repository->find($id);
    }
    public function getAllYears($model) {
        return $this->repository->getAllYears($model);
    }

    public function getAllModels($company) {
        return $this->repository->getAllModels($company);
    }

    public function getVehicles() {
        return $this->repository->getVehicles();
    }

    public function getAllCompanies() {
        return $this->repository->getAllCompanies();
    }
    // public function findByYear($year) {
    //     return $this->repository->findByYear($year);
    // }

    // public function findByModel($model) {
    //     return $this->repository->findByModel($model);
    // }
    // public function findByCompany($company) {
    //     return $this->repository->findByCompany($company);
    // }
    public function searchVehicle($year, $model, $company) {
        return $this->repository->searchVehicle($year, $model, $company);
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
