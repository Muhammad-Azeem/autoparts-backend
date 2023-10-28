<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\GarageService;
use App\Services\OrdersService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    protected $GarageService;

    public function __construct(GarageService $GarageService = null)
    {
        $this->GarageService = $GarageService ;
    }

    public function find($id){
        return $this->GarageService->find($id);
    }

    public function create(Request $request){
        return $this->GarageService->create($request->all());
    }

    public function update(Request $request,$id){
        return $this->GarageService->update($id, $request);
    }

    public function delete($id){
        return $this->GarageService->delete($id);
    }
}
