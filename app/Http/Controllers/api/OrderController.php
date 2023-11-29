<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\OrdersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    protected $OrdersService;

    public function __construct(OrdersService $OrdersService = null)
    {
        $this->OrdersService = $OrdersService ;
    }

    public function find($id){
        return $this->OrdersService->find($id);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'token' => 'required',
        ]);
        if($validator->fails()){
            return response(['message'=>$validator->messages()->first(), 'data'=> []],422);
        }
        return $this->OrdersService->create($request->all());
    }

    public function update(Request $request,$id){
        return $this->OrdersService->update($id, $request);
    }

    public function getByUserId($id){
        return $this->OrdersService->getByUserId($id);
    }
}
