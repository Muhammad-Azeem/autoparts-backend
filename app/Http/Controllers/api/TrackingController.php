<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\OrdersService;
use App\Services\ProductService;
use App\Services\TrackingService;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    protected $TrackingService;

    public function __construct(TrackingService $TrackingService = null)
    {
        $this->TrackingService = $TrackingService ;
    }

    public function find($id){
        return $this->TrackingService->find($id);
    }

    public function create(Request $request){
        return $this->TrackingService->create($request->all());
    }

    public function update(Request $request,$id){
        return $this->TrackingService->update($id, $request);
    }

    public function delete($id){
        return $this->TrackingService->delete($id);
    }
}
