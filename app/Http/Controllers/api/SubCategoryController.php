<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $SubCategoryService;

    public function __construct(SubCategoryService $SubCategoryService = null)
    {
        $this->SubCategoryService = $SubCategoryService ;
    }

    public function find($id){
        return $this->SubCategoryService->find($id);
    }

    public function create(Request $request){
        return $this->SubCategoryService->create($request->all());
    }

    public function update(Request $request,$id){
        return $this->SubCategoryService->update($id, $request);
    }

    public function delete($id){
        return $this->SubCategoryService->delete($id);
    }
}
