<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\AddProductService;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    protected $AddProductService;

    public function __construct(AddProductService $AddProductService = null)
    {
        $this->AddProductService = $AddProductService;
    }
    public function find($id){
        return $this->AddProductService->find($id);
    }

    public function create(Request $request){
        return $this->AddProductService->create($request->all());
    }

    public function update(Request $request,$id){
        return $this->AddProductService->update($id, $request);
    }

    public function delete($id){
        return $this->AddProductService->delete($id);
    }

}
