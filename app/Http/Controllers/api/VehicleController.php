<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\OrdersService;
use App\Services\ProductService;
use App\Services\VehicleService;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    protected $VehicleService;

    public function __construct(VehicleService $VehicleService = null)
    {
        $this->VehicleService = $VehicleService ;
    }

    public function find($id){
        return $this->VehicleService->find($id);
    }
    public function getAllYears() {

        return $this->VehicleService->getAllYears();
    }
    public function getAllModels() {
        return $this->VehicleService->getAllModels();
    }
    public function getAllCompanies() {
        return $this->VehicleService->getAllCompanies();
    }
    // public function findByYear($year) {
    //     return $this->VehicleService->findByYear($year);
    // }

    // public function findByModel($model) {
    //     return $this->VehicleService->findByModel($model);
    // }

    // public function findByCompany($company) {
    //     return $this->VehicleService->findByCompany($company);
    // }

    public function searchVehicle($year, $model, $company) {
        return $this->VehicleService->searchVehicle($year, $model, $company);
    }

    public function create(Request $request){
        return $this->VehicleService->create($request->all());
    }

    public function update(Request $request,$id){
        return $this->VehicleService->update($id, $request);
    }

    public function delete($id){
        return $this->VehicleService->delete($id);
    }
}
