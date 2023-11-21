<?php

namespace App\Repositories;

use App\Models\product;
use App\Models\vehicle;

class VehicleRepository
{
    protected $model;


    public function __construct(vehicle $model = null)
    {
        $this->model = $model;
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function searchVehicle($year,$model,$company) {
        return  vehicle::where('year', $year)->where('model',$model)->where('company', $company)->first();
    }
    public function getAllYears($model) {
        return vehicle::where('model',$model)->distinct()->pluck('year');
    }

    public function getAllModels($company) {
        return vehicle::where('company',$company)->distinct()->pluck('model');
    }

    public function getAllCompanies() {
        return vehicle::distinct()->pluck('company');
    }

    // public function findByModel($model) {
    //     return vehicle::where('model', $model)->first();
    // }

    // public function findByCompany($company) {
    //     return vehicle::where('company', $company)->first();
    // }

    // public function findMyParts($year, $model, $company) {
    //     return vehicle::where('year', $year)
    //         ->where('model', $model)
    //         ->where('company', $company)
    //         ->first();
    // }

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
}
