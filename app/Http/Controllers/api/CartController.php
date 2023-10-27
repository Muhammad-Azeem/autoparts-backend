<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $CartService;

    public function __construct(CartService $CartService = null)
    {
        $this->CartService = $CartService ;
    }

    public function find($id){
        return $this->CartService->find($id);
    }

    public function create(Request $request){
        return $this->CartService->create($request->all());
    }

    public function update(Request $request,$id){
        return $this->CartService->update($id, $request);
    }

    public function delete($id){
        return $this->CartService->delete($id);
    }
}
