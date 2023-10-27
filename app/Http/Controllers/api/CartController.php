<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $CategoryService;

    public function __construct(CartService $CategoryService = null)
    {
        $this->CategoryService = $CategoryService ;
    }

    public function find($id){
        return $this->CategoryService->find($id);
    }

    public function create(Request $request){
        return $this->CategoryService->create($request->all());
    }

    public function update(Request $request,$id){
        return $this->CategoryService->update($id, $request);
    }

    public function delete($id){
        return $this->CategoryService->delete($id);
    }
}
